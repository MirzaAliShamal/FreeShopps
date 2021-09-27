@extends('layouts.front')

@section('title', 'About Us')

@section('content')

@include('front.components.pages_banner')


<section class="section">
    <div class="container">
        <div class="row align-items-center" id="counter">
            <div class="col-md-6">
                <img src="{{ asset(setting('about_us_image')) }}" class="img-fluid" alt="">
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    {{-- <div class="d-flex mb-4">
                        <span class="text-primary h1 mb-0"><span class="counter-value display-1 fw-bold" data-target="15">0</span>+</span>
                        <span class="h6 align-self-end ms-2">Years <br> Experience</span>
                    </div> --}}
                    <div class="section-title">
                        <h4 class="title mb-4">{{ setting('about_sec_title') }}</h4>
                        {!! setting('about_sec_detail') !!}
                        {{-- <a href="javascript:void(0)" class="btn btn-primary mt-3">Contact us</a> --}}
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h6 class="text-primary">Work Process</h6>
                    <h4 class="title mb-4">How do we works ?</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start using <span class="text-primary fw-bold">Free shopps</span> , help others and get helped.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Add to Cart</h5>
                        <p class="text-muted mb-0">Like something ! Just add it to cart.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-airplay d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Proceed to Pay</h5>
                        <p class="text-muted mb-0">Pay the processing Fee.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent d-none-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-image-check d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Get your Item</h5>
                        <p class="text-muted mb-0">Get your order number and contact Donar to receive Item..</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<section class="section bg-light pt-0">
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative">
                        <img src="{{ asset('freeshopps-banner.png') }}" class="img-fluid rounded-md shadow-lg" alt="">
                        <div class="play-icon">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox">
                                <i class="mdi mdi-play text-primary rounded-circle bg-white shadow-lg"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div><!--end col-->
        </div><!--end row -->
    </div><!--end container--> --}}
    <div class="offset-lg-3 col-lg-6 mt-4 pt-2 mt-lg-0 pt-lg-0">
        <div class="card border-0 shadow rounded ms-lg-4 overflow-hidden">
            <div class="d-flex p-2 bg-light justify-content-between align-items-center">
                <div>
                    <a href="javascript:void(0)" class="text-danger"><i class="mdi mdi-circle"></i></a>
                    <a href="javascript:void(0)" class="text-warning"><i class="mdi mdi-circle"></i></a>
                    <a href="javascript:void(0)" class="text-success"><i class="mdi mdi-circle"></i></a>
                </div>

                <small class="fw-bold"><i class="mdi mdi-circle-medium text-success"></i> FreeShopps</small>
            </div>
            <div class="bg-light px-2 position-relative">
                <video class="w-100 rounded" controls="" loop="">
                    <source src="{{ setting('about_video') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>

@endsection

