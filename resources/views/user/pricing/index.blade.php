@extends('layouts.app')
@section('title', 'Brand beans | Slogan Create')
@section('content')

    <style>
        .package-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            height: 100%;
        }

        .package-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
            font-size: 14px;
        }

        .table th {
            background-color: #f8f9fa;
        }

        /* ✅ FIX START */
        .row.g-4 {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* space between cards */
            justify-content: center;
        }

        .row.g-4>[class*='col-'] {
            flex: 1 1 30%;
            /* each card takes around 30% width */
            min-width: 280px;
            /* prevent too small cards */
            max-width: 350px;
        }

        .card.package-card {
            width: 100%;
        }

        /* ✅ FIX END */
    </style>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3 class="line-title">Packages</h3>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($subpack as $subpack)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card package-card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h3 class="card-title mb-3" style="color: #1d4880;">{{ $subpack->title }}</h3>

                            <h5 class="mb-3">
                                ₹{{ $subpack->price }} /
                                {{ $subpack->points }}
                                <span class="text-muted fs-6">Points</span>
                            </h5>

                            <div class="text-center mb-3">
                                @if ($subpack->priceType == 'Free')
                                    <a href="register">
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                            SIGN UP FREE
                                        </button>
                                    </a>
                                @else
                                    <form id="payment-form" action="{{ route('razorpay.payment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="amount" class="amount" value="{{ $subpack->price }}">
                                        <button class="btn btn-primary btn-sm pay-button" type="button">
                                            Get Started
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <h6 class="fw-bold mt-3 mb-2">Best features for this Package</h6>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Activities</th>
                                            <th class="text-end">Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subpack->brandPackageDetails as $subpackDetails)
                                            @foreach ($subpackDetails->activity as $activity)
                                                <tr>
                                                    <td>{{ $activity->title }}</td>
                                                    <td class="text-end">{{ $subpackDetails->points }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>





    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the 'pay-button' class
            var payButtons = document.querySelectorAll('.pay-button');
            console.log('pay button', payButtons);

            // Loop through each pay button and attach the click event handler
            payButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    var amountElement = button.closest('.pay-container').querySelector('.amount');
                    var amount = parseFloat(amountElement.value); // Retrieve the amount value

                    var options = {
                        "key": "{{ env('RAZORPAY_KEY') }}",
                        "amount": amount * 100, // amount in the smallest currency unit
                        "currency": "INR",
                        "name": "Brandbeans",
                        "description": "Razorpay payment",
                        "image": "/images/logo-icon.png",
                        "handler": function(response) {
                            // Handle the response after payment
                            // console.log(response);
                            var paymentId = response.razorpay_payment_id;
                            storePaymentId(paymentId, amount);
                        },
                        "prefill": {
                            "name": "ABC",
                            "email": "abc@gmail.com"
                        },
                        "theme": {
                            "color": "#012e6f"
                        }
                    };

                    var rzp = new Razorpay(options);
                    rzp.open();
                });
            });
        });

        function storePaymentId(paymentId = '', amount = '') {
            // Make an asynchronous POST request to your server
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/razorpay-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        paymentId: paymentId,
                        amount: amount
                    }),
                })
                .then(response => {
                    // Handle the response from the server
                    // console.log("responses", response);
                    // console.log("paymentId", paymentId);

                    console.log('Payment ID stored successfully');
                })
                .catch(error => {
                    console.error('Error storing payment ID: ', error);
                });
        }
    </script>
@endsection
