@extends('layouts.front')

@section('title', 'Something New!')

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
            <div class="col-md-6 text-center">
                <img src="{{ asset('something-new.jpg') }}" width="250px" class="img-fluid m-auto" alt="">
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">Something New!</h4>
                        <p class="text-muted">
                            We have experienced every step of our life there is always something we have extra and don’t need at all but don’t feel like to offer or don’t know who to offer them rather one day through them to trash bin. Now we feel it’s important for us to do something where someone can be happy and have no doubt people would appreciate it, technology makes thing more easier now then ever, so anyone can communicate using our messaging and pick up stuff on their convenient time and location, , with no financial interest, but Our goal is to send message to everyone ” little or big , rich or poor we all can do something different and which will benefit everyone“. This is a beautiful World.
                        </p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center justify-content-center" id="counter">
            <div class="col-md-8 mt-4 pt-2 mt-sm-0 pt-sm-0 text-center">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <img src="{{ asset('something-new-2.jpg') }}" class="img-fluid" alt="">
                        <p class="text-muted mt-3">
                            <span class="text-primary fw-bold">Freeshopps</span> has a message to everyone " please don't just waste let someone use it, help us make this world a better place for everyone "no matter who and where we are , we all can do something for someone to make a little different". Life is beautiful
                        </p>
                    </div>
                </div>
            </div><!--end col-->
            
        </div><!--end row-->
    </div><!--end container-->
</section>

@endsection

