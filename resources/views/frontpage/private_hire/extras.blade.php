@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background: #f4f6fb;
            font-family: "Inter", sans-serif;
            padding-bottom: 120px;
        }

        .back-link {
            color: #1E6AF9;
            font-size: 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
        }

        .description-text {
            font-size: 14px;
            color: #666;
        }

        .car-summary {
            background: #fff;
            padding: 18px 22px;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .extras-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            transition: 0.2s ease;
        }

        .extras-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e9f2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .extras-icon-box i {
            color: #1E6AF9;
            font-size: 22px;
        }

        .qty-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #fff;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .skip-btn {
            background: #fff;
            color: #000;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            padding: 8px 20px;
            border: none;
            font-size: 15px;
            font-weight: 500;
        }

        .checkout-btn {
            background: #1E6AF9;
            color: #fff;
            border-radius: 12px;
            padding: 12px 30px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(30, 106, 249, 0.4);
        }

        .checkout-btn i {
            margin-left: 8px;
        }

        /* Mobile tweaks */
        @media (max-width: 768px) {
            .extras-card {
                margin-bottom: 15px;
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <form method="get" action="{{ route('private_hire_checkout', $car->id) }}" class="container py-4">

        <!-- Back link -->
        <a href="{{ route('private_hire_single', $car->id) }}" class="back-link">
            <i class="fas fa-arrow-left me-2"></i>Back to protection
        </a>

        <h2 class="section-title mt-3">Add Extras</h2>
        <p class="description-text">Enhance your journey with our optional extras</p>

        <!-- Car Summary -->
        <div class="car-summary mt-3 d-flex align-items-center">
            <img src="https://via.placeholder.com/80x55" class="rounded me-3" alt="car">
            <div>
                <h6 class="fw-bold mb-1">{{ $car->title }}</h6>
                @if(isset($query['start_date']) && isset($query['end_date']))
                <div class="text-muted small">{{ $query['start_date'] }} to {{ $query['end_date'] }}</div>
                @endif
            </div>
        </div>

        <!-- Extras Grid -->
        <div class="row mt-4 g-3">

            @foreach($car->extras ?? [] as $index => $extra)
            <!-- Toll Road Pass -->
            <div class="col-md-6">
                <div class="extras-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="extras-icon-box">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-2">{{ $extra['title'] }}</h6>
                            <p class="text-mute mb-2">{{ $extra['description'] }}</p>
                            <p class="fw-bold mb-2">{{ amt($extra['price']) }} <span class="text-muted fw-normal">/{{ $extra['interval'] }}</span></p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="qty-btn" onclick="setExtraQuantity({{ $index }}, -1)">-</button>
                        <input type="hidden" class="extras-quantity" name="extras[{{ $index }}]" data-extra-id="{{ $index }}" value="0">
                        <span class="px-2" data-extra-id="{{ $index }}">0</span>
                        <button type="button" class="qty-btn" onclick="setExtraQuantity({{ $index }}, 1)">+</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        @foreach($query as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <!-- Footer Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="javascript:void(0)" onclick="redirectMe()" class="skip-btn">Skip Extras</a>
            <button type="submit" class="checkout-btn">Continue to Checkout <i class="fas fa-arrow-right"></i></button>
        </div>

    </form>

    <script>
        function setExtraQuantity(id, quantity) {
            const input = document.querySelector(`input[name="extras[${id}]"]`);
            let currentQuantity = parseInt(input.value);
            currentQuantity += quantity;

            if (currentQuantity < 0) {
                currentQuantity = 0;
            }

            input.value = currentQuantity;
            document.querySelector(`span[data-extra-id="${id}"]`).textContent = currentQuantity;
        }

        window.addEventListener('DOMContentLoaded', function() {
            const extras = document.querySelectorAll('.extras-quantity');
            extras.forEach(extra => {
                extra.nextElementSibling.textContent = extra.value;
            });
        });

        function redirectMe(){
            const params = new URLSearchParams();

            @foreach($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('private_hire_checkout', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endsection
