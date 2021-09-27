@extends('layouts.front')

@section('title', 'What We Are Upto')

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
                        <p class="text-muted">Sharing better than throwing away don’t you think ? million of tons stuff we throwing every week, there is lot of stuff we putting out because of space or other reason, which I can helping someone with something our neighbor need and appreciate it, what is better than helping neighbors and building a better Community. Love and care that’s all we need.</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Terms & Conditions -->

@endsection

