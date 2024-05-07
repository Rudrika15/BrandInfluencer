@extends('layouts.app')
@section('title', 'Brand beans | Brands')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="d-flex justify-content-between mb-3">
                    <div class="p-2">
                        <h3 class="line-title">Popular Brands</h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid ">

            <section class="game-section">

                <div class="owl-carousel custom-carousel owl-theme">
                    @foreach ($brand as $data)
                        <div class="item active" style="background-image: url({{ asset('campaignPhoto') }}/{{ $data->brand->photo }});">
                            <div class="item-desc">
                                <h3>{{ strtoupper($data->brand->title) }}</h3>
                                <p>{{ $data->brand->detail }}.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".custom-carousel").owlCarousel({
                autoWidth: true,
                loop: true,
                dots: false, // Remove dots navigation
                nav: false // Disable navigation buttons
            });

            // Add d-none class to navigation elements
            $(".owl-nav").addClass("d-none");

            $(".custom-carousel .item").click(function() {
                $(".custom-carousel .item").not($(this)).removeClass("active");
                $(this).toggleClass("active");
            });
        });
    </script>
@endsection
