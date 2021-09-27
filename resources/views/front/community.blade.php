@extends('layouts.front')

@section('title', 'Community')

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
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow border-0 rounded">
                    <div class="card-body">
                        <p class="text-muted">Community needs us and we need Community, as we all part of it, we have to engage doing things what makes community a better place to live. we all have to Create an environment where people can get to know each other and communicate, we need to participate, we need to celebrate, we need to connect , we need to share, and we have to care, after all we need to help out, freeshopps opened the door for everyone, every level of the community to allow them to share their available stuff giving away to other neighbors who need them this just way to connect in between the neighbors inside the community. This is beautiful</p>
                        <div class="text-center">
                            <img src="{{ asset('community-1.jpg') }}" class="img-fluid" alt="Community">
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Terms & Conditions -->

@endsection

