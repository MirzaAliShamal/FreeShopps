@extends('layouts.front')

@section('title', 'Our Goal')

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
                <img src="{{ asset('our-goal-1.jpg') }}" class="img-fluid" alt="">
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">Our Goal</h4>
                        <p class="text-muted">
                            We will be stand on honesty, integrity and our neighbors sentiment, not on money making commercial interest, and that is most powerful tools to protect our platform. We will be working hard to established our mission every neighbors in the world, finance, language, technology, whether whatever is the barrier is all we will overcome with our confidence and determination.
                        </p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center" id="counter">

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4">We are helping to</h4>
                        <ol>
                            <li>Reducing waste by letting someone using it.</li>
                            <li>Having space inside the house and giving out unnecessary stuff to someone will appreciate it.</li>
                            <li>Creating a positive environment in the neighborhood.</li>
                            <li>Letting someone saving money and making other happy for giving away</li>
                            <li>Sharing is caring means something someone can’t afford where’s other just giving it away.</li>
                            <li>Lot of brand new things are not returnable or maybe unnecessary or doesn’t fit for who has it, here is the way will make you feel great.</li>
                            <li>Getting for free even if it’s a big smile is always good.</li>
                            <li>Tenent’s are moving everyday in every neighborhood can’t take all stuff here’s the way to solve the problem.</li>
                            <li>School supply books and Toy’s which every kids buy more often after school year all your used / un used books and unnecessary stuff could helpful to others.</li>
                        </ol>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-md-6">
                <img src="{{ asset('our-goal-2.jpg') }}" class="img-fluid" alt="">
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection

