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

        /* Toast styles */
        .custom-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1060;
            background-color: #28a745;
            color: #fff;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .custom-toast.error {
            background-color: #dc3545;
        }
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
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subpack->brandPackageDetails as $subpackDetails)
                                            @foreach ($subpackDetails->activity as $activity)
                                                <tr>
                                                    <td>{{ $activity->title }}</td>
                                                    <td>{{ $subpackDetails->points }}</td>
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

    <div id="payment-toast" class="custom-toast"><span class="toast-text"></span></div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1080">
        <div id="paymentToast" class="toast align-items-center border-0" style="background-color: #28a745; text-color: #fff;" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function showToast(message, type = 'success') {
            var toastEl = document.getElementById('paymentToast');
            if (!toastEl || typeof bootstrap === 'undefined') return;
            var bodyEl = toastEl.querySelector('.toast-body');
            if (bodyEl) bodyEl.textContent = message;
            toastEl.classList.remove('text-bg-success', 'text-bg-danger');
            toastEl.classList.add(type === 'error' ? 'text-bg-danger' : 'text-bg-success');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Show persisted toast after page refresh
            var persistedMsg = localStorage.getItem('paymentToastMessage');
            if (persistedMsg) {
                var persistedType = localStorage.getItem('paymentToastType') || 'success';
                showToast(persistedMsg, persistedType);
                localStorage.removeItem('paymentToastMessage');
                localStorage.removeItem('paymentToastType');
            }

            // Get all elements with the 'pay-button' class
            var payButtons = document.querySelectorAll('.pay-button');
            console.log('pay button', payButtons);

            // Loop through each pay button and attach the click event handler
            payButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    var amountElement = button.closest('form').querySelector('.amount');
                    if (!amountElement) {
                        console.error('Amount field not found');
                        showToast('Something went wrong. Please try again.', 'error');
                        return;
                    }
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
                            var paymentId = response.razorpay_payment_id;
                            storePaymentId(paymentId, amount);

                            // Persist toast message for page refresh
                            localStorage.setItem('paymentToastMessage', 'Payment successful!');
                            localStorage.setItem('paymentToastType', 'success');
                            // Trigger a reload shortly after success to show the persisted toast
                            setTimeout(function() {
                                window.location.reload();
                            }, 500);
                            // Do not show toast immediately; it will appear after page refresh
                            // Page will refresh when modal closes via ondismiss
                        },
                        "prefill": {
                            "name": "ABC",
                            "email": "abc@gmail.com"
                        },
                        "theme": {
                            "color": "#012e6f"
                        },
                        "modal": {
                            "ondismiss": function() {
                                // Refresh page when Razorpay modal closes
                                setTimeout(function() {
                                    window.location.reload();
                                }, 400);
                            }
                        }
                    };

                    var rzp = new Razorpay(options);

                    // Show error toast on payment failure
                    rzp.on('payment.failed', function(response) {
                        // Do not show toast immediately; persist for display after page refresh
                        localStorage.setItem('paymentToastMessage', 'Payment failed. Please try again.');
                        localStorage.setItem('paymentToastType', 'error');
                    });

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
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    console.log('Payment ID stored successfully');
                    return response.json().catch(() => ({}));
                })
                .catch(error => {
                    console.error('Error storing payment ID: ', error);
                    localStorage.setItem('paymentToastMessage', 'Payment saved failed, but payment may be successful. Please check.');
                    localStorage.setItem('paymentToastType', 'error');
                    // Do not show toast immediately; it will appear after page refresh
                });
        }
    </script>
@endsection
