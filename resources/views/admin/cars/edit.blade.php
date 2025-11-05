@extends('admin.layout.app')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">
                        <livewire:admin.cars.form :car="$car" :car_types="$car_types" :car_models="$car_models" :car_makes="$car_makes"
                            :drivers="$drivers" :pcns="$pcns" />
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <style>
        #image_preview_container {
            display: flex; /* or 'grid' */
            flex-wrap: wrap;
            gap: 10px; /* Space between images */
            margin-top: 15px;
        }
        
        .image-preview-wrapper {
            width: 100px; /* Set a fixed size for the container */
            height: 100px;
            overflow: hidden; /* Hide parts of the image that go outside the box */
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .image-preview0 {
            /* Make the image cover the wrapper container */
            width: 100%; 
            height: 100%;
            object-fit: cover; /* This ensures the image covers the area without distortion, cropping if necessary */
        }
        
        .custom-select-wrapper {
            position: relative; 
        }
        
        /* --- 2. Select Element Styling --- */
        .custom-select-wrapper select {
            -webkit-appearance: none; 
            -moz-appearance: none;
            appearance: none; 
            padding-right: 30px !important; 
        }
        
        .custom-select-wrapper select::-ms-expand {
            display: none;
        }
        
        /* --- 3. Icon Styling and Positioning --- */
        .select-icon {
            position: absolute;
            top: 50%; 
            right: 20px;
            transform: translateY(-50%); 
            pointer-events: none; 
            color: #6c757d;
            font-size: 0.75rem;
            line-height: 1;
        } 
    </style>
@endsection


@section('js')
    <script>
        // Fetch and populate models based on selected make
        $(document).ready(function() {
            onChangeMake()
        });

        document.addEventListener('livewire:navigated', function() {
            onChangeMake()
            bindMaxLengthEnforcers();
        });

        function onChangeMake() {
            $('#make').on('change', function() {
                var makeId = $(this).val();
                // alert(makeId)
                if (makeId) {
                    $.ajax({
                        url: "{{ route('admin.api.get.models') }}?make_id=" + makeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#model').empty().append('<option value="">Select Model</option>');
                            if (data.data.length > 0) {
                                $.each(data.data, function(index, model) {
                                    $('#model').append('<option value="' + model.name + '">' +
                                        model.name + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('#model').empty().append('<option value="">Select Model</option>');
                }
            })
        }

        function initFlatpickr() {
            document.querySelectorAll('.flatpickr').forEach(input => {
                if (input && !input.classList.contains('flatpickr-applied')) {
                    const type = input.getAttribute('data-type');

                    input = $(input);
                    let livewireProperty = input.attr('wire:model');
                    let initialValue = input.val();
                    
                    let format = '';
                    let timepicker = false;
                    let datepicker = true;
                    
                    switch(type){
                        case 'date':
                            format = 'Y-m-d';
                            break;
                        case 'time':
                            format = 'H:i';
                            timepicker = true;
                            datepicker = false;
                            break;
                        case 'datetime':
                            format = 'Y-m-d H:i';
                            timepicker = true;
                            break;
                    }
                    
                    input.datetimepicker({
                        format: format,
                        timepicker: timepicker,
                        datepicker: datepicker,
                        onChangeDateTime: function(dp, $input) {
                            if (livewireProperty) { 
                                const valueToSet = $input.val();
        
                                if (window.Livewire) {
                                    const componentRoot = $input.closest('[wire\\:id]');
                                    if (componentRoot.length) {
                                        window.Livewire.find(componentRoot.attr('wire:id')).set(livewireProperty, valueToSet);
                                    }
                                } 
                                else if (window.Alpine) {
                                    const alpineScope = $input.closest('[x-data]');
                                    if (alpineScope.length && alpineScope[0].__x && alpineScope[0].__x.$data.$wire) {
                                        alpineScope[0].__x.$data.$wire.set(livewireProperty, valueToSet);
                                    }
                                }
                            }
                        }
                    });
        
                    if (initialValue) {
                        input.val(initialValue);
                    }

                    input.addClass('flatpickr-applied');
                }
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            initFlatpickr()
            
            const observer = new MutationObserver(() => {
                bindMaxLengthEnforcers();
                initFlatpickr()
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
            
            jQuery(document).on('change', '#photos_input', function(event) {
                const previewContainer = document.querySelector('#image_preview_container');
                // 1. Clear any existing previews
                previewContainer.innerHTML = ''; 
            
                // Get the file list from the input element
                const files = event.target.files;
            
                // Check if any files were selected
                if (files) {
                    // 2. Loop through the files
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
            
                        // Ensure the file is an image before proceeding
                        if (file.type.startsWith('image/')) {
                            // 3. Create a URL for the file
                            const fileURL = URL.createObjectURL(file);
            
                            // 4. Create an <img> element
                            const img = document.createElement('img');
                            img.src = fileURL;
                            img.alt = `Preview of ${file.name}`;
                            // Optional: Add a class for styling (recommended)
                            img.classList.add('image-preview0'); 
                            
                            // Optional: Create a wrapper element for better layout control
                            const wrapper = document.createElement('div');
                            wrapper.classList.add('image-preview-wrapper');
                            wrapper.appendChild(img);
            
            
                            // 5. Append the image to the preview container
                            previewContainer.appendChild(wrapper);
            
                            // Optional: Add a cleanup function for the URL after the image is loaded
                            // This is good practice for memory management, though modern browsers are usually fine.
                            // img.onload = () => {
                            //     URL.revokeObjectURL(fileURL); 
                            // }
                        } else {
                             console.warn(`File ${file.name} is not an image and was skipped.`);
                        }
                    }
                }
            });
        });
        
        function enforceMaxLength(input) {
            const maxLength = parseInt(input.getAttribute('maxlength'), 10);
            input.addEventListener('input', () => {
                let changed = false;

                const old = input.value;
                input.value = input.value.replace(/[^0-9\.]/g, "").replace(/(\..*?)\..*/g, '$1');
                
                if (old !== input.value) {
                    changed = true;
                }

                if (input.value.length > maxLength) {
                    changed = true;
                    input.value = input.value.slice(0, maxLength);
                }

                const min = input.getAttribute("min");
                if (min !== null && input.value !== '' && +input.value < +min) {
                    changed = true;
                    input.value = min;
                }

                const max = input.getAttribute("max");
                if (max !== null && input.value !== '' && +input.value > +max) {
                    changed = true;
                    input.value = max;
                }

                if (changed) {
                    input.dispatchEvent(new Event('input')); // keep Livewire synced
                }
            });
        }
        
        function bindMaxLengthEnforcers() {
            document.querySelectorAll('input[min][maxlength]').forEach(input => {
                // Avoid attaching multiple times
                if (!input.dataset.maxlengthBound) {
                    enforceMaxLength(input);
                    input.dataset.maxlengthBound = "true";
                }
            });
        }
    </script>
@endsection
