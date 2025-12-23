@extends('admin.layout.app')
@push('styles')
<style>
.step-wizard {
    margin-bottom: 2rem;
}

.step-wizard-list {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    background: #f8f9fa;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.step-wizard-list .nav-item {
    flex: 1;
    position: relative;
}

.step-wizard-list .nav-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem 0.5rem;
    text-decoration: none;
    color: #6c757d;
    background: transparent;
    border: none;
    border-radius: 0;
    transition: all 0.3s ease;
    position: relative;
    min-height: 80px;
}

.step-wizard-list .nav-link:hover {
    background: rgba(67, 97, 238, 0.1);
    color: #4361ee;
    text-decoration: none;
}

.step-wizard-list .nav-link.active {
    background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
    color: white;
    font-weight: 600;
}

.step-wizard-list .nav-link.active::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ffd60a, #ffc300);
}

.step-counter {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #e9ecef;
    color: #6c757d;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.step-wizard-list .nav-link.active .step-counter {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.step-wizard-list .nav-link:hover .step-counter {
    background: rgba(67, 97, 238, 0.2);
    color: #4361ee;
}

.step-name {
    font-size: 12px;
    text-align: center;
    line-height: 1.2;
}

.step-wizard-list .nav-item:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    width: 1px;
    height: 30px;
    background: rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .step-wizard-list .nav-link {
        padding: 0.75rem 0.25rem;
        min-height: 70px;
    }
    
    .step-counter {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .step-name {
        font-size: 10px;
    }
}

@media (max-width: 576px) {
    .step-wizard-list {
        flex-wrap: wrap;
    }
    
    .step-wizard-list .nav-item {
        flex: 0 0 33.333%;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    
    .step-wizard-list .nav-item:nth-child(3n)::after {
        display: none;
    }
    
    .step-wizard-list .nav-item:not(:last-child)::after {
        display: none;
    }
}
</style>
@endpush

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head-content">
                        <div class="step-wizard">
                            <ul class="nav nav-pills nav-justified step-wizard-list">
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=0" class="nav-link {{ $step == 0 ? 'active' : '' }}">
                                        <span class="step-counter">0</span>
                                        <span class="step-name">Initial</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=1" class="nav-link {{ $step == 1 ? 'active' : '' }}">
                                        <span class="step-counter">1</span>
                                        <span class="step-name">Basic Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=2" class="nav-link {{ $step == 2 ? 'active' : '' }}">
                                        <span class="step-counter">2</span>
                                        <span class="step-name">Pricing</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=3" class="nav-link {{ $step == 3 ? 'active' : '' }}">
                                        <span class="step-counter">3</span>
                                        <span class="step-name">Extras</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=4" class="nav-link {{ $step == 4 ? 'active' : '' }}">
                                        <span class="step-counter">4</span>
                                        <span class="step-name">Documents</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=5" class="nav-link {{ $step == 5 ? 'active' : '' }}">
                                        <span class="step-counter">5</span>
                                        <span class="step-name">Availability</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=6" class="nav-link {{ $step == 6 ? 'active' : '' }}">
                                        <span class="step-counter">6</span>
                                        <span class="step-name">MOT + Service</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=7" class="nav-link {{ $step == 7 ? 'active' : '' }}">
                                        <span class="step-counter">7</span>
                                        <span class="step-name">Damage + Repair</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step=8" class="nav-link {{ $step == 8 ? 'active' : '' }}">
                                        <span class="step-counter">8</span>
                                        <span class="step-name">Requirements</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="components-preview wide-md- mx-auto" id="form-container">
                        @include('admin.cars.edit_steps.step' . $step, compact('car'))
                    </div>

                    <br>

                    <div class="nk-block-between g-3 mt-3" style="background:#eee; padding:15px; border-radius:10px;">
                        <div>
                            @if($step != 0)
                                <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step={{ $step - 1 }}" class="btn btn-lg btn-warning">Previous</a>
                            @endif
                        </div>

                        <div>
                            @stack('car_edit_form_button')

                            &nbsp;
                            
                            @if($step != 8)
                                <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}?step={{ $step + 1 }}" class="btn btn-lg btn-success">Next</a>
                            @endif
                            
                            @if($step == 8)
                                <a href="{{ route('admin.cars.index') }}" class="btn btn-lg btn-success">Back to List</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
function toggler(select, div, to_enable){
    if(to_enable){
        div.classList.remove('d-none');
        div.querySelectorAll('input, select, textarea').forEach(function(elem){
            if(elem.getAttribute('data-required')){
                elem.required = true;
            }
        });
    }else{
        div.classList.add('d-none');
        div.querySelectorAll('input, select, textarea').forEach(function(elem){
            elem.value = '';
            if(elem.required){
                elem.required = false;
                elem.setAttribute('data-required', 1);
            }
        });
    }
}

function helper_attr_rev_init(){
    document.querySelectorAll('[name]:not(.ha-rev-init)').forEach(function(elem){
        elem.classList.add('ha-rev-init');

        var containerSelector = elem.getAttribute('data-ha-container');
        var container = containerSelector ? document.querySelector(containerSelector) : document;
        var name = elem.getAttribute('name');
        var callback = elem.getAttribute('data-ha-callback') ? window[ elem.getAttribute('data-ha-callback') ] : false;
        
        function exec(){
            container.querySelectorAll('[data-ha-relative="'+name+'"]').forEach(function(relative){
                var to_enable = false;
                var elem_value = '';

                if( elem.tagName == 'SELECT' ){
                    if(elem.multiple === true){
                        var selectedOptions = [];
                        for(var option of elem.options){
                            if( option.selected === true ){
                                selectedOptions.push(option.value);
                            }
                        }
                        elem_value = selectedOptions;
                    } else {
                        elem_value = elem.value;
                    }
                } else if( elem.tagName == 'INPUT' ){
                    if(elem.type == 'checkbox' || elem.type == 'radio'){
                        elem_value = (elem.checked === true ? elem.value : '');
                    } else {
                        elem_value = elem.value;
                    }
                } else if( elem.tagName == 'TEXTAREA' ){
                    elem_value = elem.value;
                }

                if( relative.getAttribute('data-ha-equal') ){
                    to_enable = (relative.getAttribute('data-ha-equal') == elem_value) ? true : false;
                } else if( relative.getAttribute('data-ha-else') ){
                    to_enable = (relative.getAttribute('data-ha-else') != elem_value) ? true : false;
                } else if( relative.getAttribute('data-ha-in') ){
                    var arr = JSON.parse( relative.getAttribute('data-ha-in') );
                    to_enable = ( arr.indexOf(elem_value) > -1 ) ? true : false;
                } else if( relative.getAttribute('data-ha-var') ){
                    to_enable = ( elem_value == window[ relative.getAttribute('data-ha-var') ] ) ? true : false;
                } else if( relative.getAttribute('data-ha-func') && typeof window[ relative.getAttribute('data-ha-func') ] === 'function' ){
                    var arr = window[ relative.getAttribute('data-ha-func') ]();
                    
                    if( Array.isArray( arr ) && arr.indexOf(elem_value) > -1 ){
                        to_enable = true;
                    } else if( typeof arr === 'object' && arr !== null && typeof arr[ elem_value ] !== 'undefined' ){
                        to_enable = true;
                    } else if( arr == elem_value ) {
                        to_enable = true;
                    }
                } else if( relative.getAttribute('data-ha-resolver') && typeof window[ relative.getAttribute('data-ha-resolver') ] === 'function' ){
                    to_enable = window[ relative.getAttribute('data-ha-resolver') ]( relative, elem_value );
                }

                callback && callback(elem, relative, to_enable); // select, div, bool
            })
        }

        jQuery(elem).on('change', exec)
        // elem.addEventListener('change', exec);
        exec();
    });
}

function initFlatpickr() {
    document.querySelectorAll('.flatpickr').forEach(input => {
        if (input && !input.classList.contains('flatpickr-applied')) {
            const type = input.getAttribute('data-type');

            input = $(input);
            
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
            });

            input.addClass('flatpickr-applied');
        }
    })
}

function form_ajax_init(selector, custom = {}){
	var loader_url = 'loader.gif';
	(new Image()).src = loader_url;
	
	if( 'preBeforeSend' in custom ){
		var preBeforeSend = custom['preBeforeSend'];
		delete custom['preBeforeSend'];
	}
	
	if( 'postComplete' in custom ){
		var postComplete = custom['postComplete'];
		delete custom['postComplete'];
	}

	document.querySelectorAll(selector).forEach(function(form){
		form.style.position = 'relative';
		
		form.addEventListener('submit', function(e){
			e.preventDefault();

			var config = {
				url: (form.getAttribute('action') ? form.getAttribute('action') : window.location),
				method: (form.getAttribute('method') ? form.getAttribute('method').toUpperCase() : 'POST'),
				beforeSend: function(){
					if( typeof preBeforeSend !== 'undefined' ){
						preBeforeSend(form);
					}
					jQuery(form).append('<div class="ajax-form-blocker" style="position:absolute;background:black;opacity:0.4;z-index:99999;border-radius:8px;top:-10px;bottom:-10px;left:-10px;right:-10px;text-align:center;"><img style="position: relative; top: 50%; transform: translateY(-50%);" src="'+loader_url+'"></div>');
				},
				complete: function(){
					jQuery(form).children('.ajax-form-blocker').remove();
					if( typeof postComplete !== 'undefined' ){
						postComplete(form);
					}
				},
				success: function(response){
					var fn = window[ form.getAttribute('onsuccess') ];
					if(typeof fn === 'function'){ fn(response, form); }
				},
				error: function(response){
					if('responseJSON' in response){
						response = response.responseJSON;
					} else {
						response = response.responseText;
					}
					
					var fn = window[ form.getAttribute('onfailure') ];
					if(typeof fn === 'function'){ fn(response, form); }
				}
			};
			
			if(config['method'] == 'GET'){
				config['data'] = {};
				
				(new FormData(form)).forEach(function(value, key){
					config['data'][key] = value;
				});
			} else {
				config['processData'] = config['contentType'] = false;
				config['data'] = new FormData(form);
			}
			
			for(i in custom){ config[i] = custom[i]; }
			
			$.ajax(config);

			return false;
		});
	});
}

function showError(response){
    NioApp.Toast(response.message, 'error', {
        position: 'top-right'
    });
}

function containerFullOrEmpty(selector){
    var full = document.querySelector('[data-container-full="'+selector+'"]').children.length > 0;

    document.querySelector('[data-container-empty="'+selector+'"]').classList.toggle('d-none', full);
    document.querySelector('[data-container-full="'+selector+'"]').classList.toggle('d-none', !full);
}

function updateStepData(response){
    NioApp.Toast(response.message, response.status, {
        position: 'top-right'
    });
}

function enforceMaxLength(input) {
    const maxLength = parseInt(input.getAttribute('maxlength'), 10);
    input.addEventListener('change', () => {
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
    });
}

document.querySelectorAll('input[type="number"][maxlength]').forEach(input => {
    // Avoid attaching multiple times
    if (!input.dataset.maxlengthBound) {
        enforceMaxLength(input);
        input.dataset.maxlengthBound = "true";
    }
});

helper_attr_rev_init()
initFlatpickr()
form_ajax_init('#form-container form');
</script>
@endpush