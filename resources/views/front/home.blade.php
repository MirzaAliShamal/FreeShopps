@extends('layouts.front')
@section('title', 'Home')
@section('content')

<!-- Start Products -->
<section class="section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">

                <div class="row">
                    @foreach ($listings as $item)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4 pt-2">
                            <div class="card shop-list border-0 position-relative">
                                @if ($item->availablity == "2")
                                    <ul class="label list-unstyled mb-0">
                                        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">Sold</a></li>
                                    </ul>
                                @endif
                                <div class="shop-image position-relative overflow-hidden rounded shadow">
                                    <a href="{{ route('listing', $item->slug) }}"><img src="{{ asset($item->featured_image) }}" class="img-fluid" alt=""></a>
                                    <ul class="list-unstyled shop-icons">
                                        @auth
                                            <li><a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-icon btn-pills btn-soft-danger {{ checkFav($item->id) ? 'active' : 'addFav' }}"><i data-feather="heart" class="icons"></i></a></li>
                                            <li class="mt-2"><a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-icon btn-pills btn-soft-warning {{ checkCart($item->id) ? 'active' : 'addCart' }}"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                        @else
                                            <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#accountModal" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                            <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#accountModal" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                        @endauth
                                    </ul>
                                </div>
                                <div class="card-body content p-2">
                                    <small class="text-muted d-block font-12">{{ $item->category->name }}</small>
                                    <a href="{{ route('listing', $item->slug) }}" class="text-dark text-capitalize product-name h5">{{ \Str::limit($item->title, 15, '...') }}</a>
                                    <p class="text-muted font-14"><i data-feather="map-pin" class="fea icon-sm"> </i> {{ $item->location }}</p>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Products -->

<section class="w-100">
    <div class="container">
        <div class="row align-items-center m-auto">
            <div class="col-md-10 m-auto">
                <img src="{{ asset('freeshopps-banner.png') }}" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
</section>

<section class="section d-table w-100">
    <div class="container-fluid">
        <div class="row mt-5 align-items-center position-relative" style="z-index: 1;">
            <div class="col-lg-6">
                <div class="title-heading text-center text-lg-start">
                    <h4 class="heading fw-bold mb-3 mt-3">Sharing is, <br> Better than, <br> Throwing away...</h4>
                    <p class="para-desc text-muted mx-auto mx-lg-start mb-0">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                    <div class="mt-3">
                        <a href="" class="btn btn-primary me-2 mt-2">+ Post you Ad</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-6 mt-4 pt-2 mt-lg-0 pt-lg-0">
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
                        <video class="w-100 rounded" controls loop>
                            <source src="{{ asset('freeshopps.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->



@endsection
