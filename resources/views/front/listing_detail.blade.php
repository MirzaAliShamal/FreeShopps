@extends('layouts.front')
@section('title', $listing->title)


@section('content')

@include('front.components.pages_banner')

<section class="section pt-5 pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="tiny-single-item">
                    @foreach ($listing->listing_images as $item)
                        <div class="tiny-slide"><img src="{{ asset($item->path) }}" class="img-fluid rounded" alt=""></div>
                    @endforeach
                </div>
            </div><!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ms-md-4">
                    <h4 class="title">{{ $listing->title }}</h4>
                    <small class="text-muted d-block"><i class="mdi mdi-clock"></i> {{ $listing->created_at->format('M d, Y H:i a') }} </small>
                    <small class="text-muted d-block"><i class="mdi mdi-map-marker"></i> {{ $listing->location }} </small>
                    <ul class="list-unstyled text-warning h5 mb-0">
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                    </ul>

                    <h5 class="mt-4 py-2">Description :</h5>
                    {!! $listing->description !!}
                    @if($listing->availablity == '1')
                        <div class="mt-4 pt-2">
                            <a  class="btn btn-soft-primary ms-2 addCart" data-id="{{ $listing->id }}">Add to Cart</a>
                        </div>
                    @endif
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

@if ($listing->user->store)
<section class="section pt-5 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h4>Store Information</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-start text-center">
                                <img src="{{ asset($listing->user->store->logo) }}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">{{ $listing->user->store->name }}</h3>
                                        <small class="text-muted h6 me-2">{{ $listing->user->store->tagline }}</small>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--ed container-->
</section><!--end section-->
@endif

<section class="section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-4">
                    <h4>Location</h4>
                </div>
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')
    <script>
        let lat = <?php echo  $listing->location_lat; ?>;
        let lng = <?php echo  $listing->location_long; ?>;
        function initMap() {
            // The location of Uluru
            const uluru = { lat: lat, lng: lng };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    </script>
@endsection
