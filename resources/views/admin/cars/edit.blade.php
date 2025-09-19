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
@endsection


@section('js')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Fetch and populate models based on selected make
        $(document).ready(function() {
            onChangeMake()
        });

        document.addEventListener('livewire:navigated', function() {
            onChangeMake()
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

                    flatpickr(input, {
                        enableTime: type.includes('time') === true,
                        noCalendar: type.includes('date') === false,
                        dateFormat: type == 'datetime' ? 'Y-m-d H:i' : (type == 'time' ? 'H:i' : 'Y-m-d'),
                        onChange: function(selectedDates, dateStr) {
                            input.dispatchEvent(new Event('input'));
                        }
                    });

                    input.classList.add('flatpickr-applied');
                }
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            initFlatpickr();

            const observer = new MutationObserver(() => {
                initFlatpickr();
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
@endsection
