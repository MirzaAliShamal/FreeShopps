@extends('layouts.front')

@section('title', 'Why Shopps Free!')

@section('css')
    <style>
        .section {
            padding: 60px 0px;
        }
    </style>
@endsection

@section('content')

@include('front.components.pages_banner')


<section class="section">
    <div class="container">
        <div class="row align-items-center" id="counter">
            <div class="col-md-6">
                <img src="{{ asset('why-shopps-free-1.jpg') }}" class="img-fluid" alt="">
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">Why Shopps Free!</h4>
                        <p class="text-muted">
                            We’re the neighbors asking to all neighbors ” Does any unnecessary item’s that holding your space or thinking to get rid of it ? do you know this item might be very helpful to your next-door someone who need it ? do you know doing this little thing could make our community more closer, more better and more happier? . please don’t waste them, let someone use it, please join us to make this world a better place for everyone “we all can do something for someone to make a different”. One feels great giving away also others who need it being appreciated and grateful for having them for free. What do you think ?
                        </p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection

