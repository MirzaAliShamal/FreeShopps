@extends('layouts.front')

@section('title', 'Join With Us')

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
                <img src="{{ asset('join-with-us-4.jpg') }}" class="img-fluid" alt="">
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">Join With Us</h4>
                        <p class="text-muted">
                            Anything around your house holding space and you don’t need anymore just post them and someone will find that very useful, your listing will make your neighbor feel great and appreciated. Here we are sharing our neighbor a little love and care, within our least ability for building a better future a beautiful community. Can you join with us ?
                        </p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection

