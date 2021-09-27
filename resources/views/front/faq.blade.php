@extends('layouts.front')

@section('title', 'FAQs')

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
                        <h5 class="card-title">Frequently Asked Questions</h5>
                        <div class="accordion mt-4 pt-2" id="payquestion">
                            <div class="accordion-item rounded">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Why should we pay ?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse border-0 collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#payquestion">
                                    <div class="accordion-body text-muted bg-white">
                                        We are providing service through website which need development and maintenance, process the transaction, Customer Support, mailing Communication, advertisements, paying employee and other Expenses, there’s no way we can survive without paying those cost therefore charging a processing fee for as minimum as $1 actually is not enough to maintain.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item rounded">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-0 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        Can we pay Cash ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse border-0 collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#payquestion">
                                    <div class="accordion-body text-muted bg-white">
                                        All are done in the website but <b class="text-primary">Freeshopps</b> does not meet in person so the only way to pay the fee is our secure payment system.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Terms & Conditions -->

@endsection

