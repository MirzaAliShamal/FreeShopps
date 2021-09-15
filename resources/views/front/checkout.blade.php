@extends('layouts.front')
@section('title', 'Checkout')

@section('css')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 12px 15px;
        border: 1px solid #dee2e6;
        height: 43px;
        border-radius: .25rem;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    #card-errors{
        color: #fa755a;
    }
</style>
@endsection

@section('content')

@include('front.components.pages_banner')
<!-- Start -->
<div class="modal fade" id="detailModal" tabindex="-1"  role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Blog Detail</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span>
                </div>

                <div class="modal-body blog-details">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive bg-white shadow">
                                <table class="table table-center table-padding mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom py-3" style="min-width:20px "></th>
                                            <th class="border-bottom py-3" style="min-width: 300px;">Product</th>
                                            <th class="border-bottom text-center py-3" style="min-width: 160px;">Processing Fee</th>
                                            <th class="border-bottom text-center py-3" style="min-width: 160px;">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart as $item)
                                            <tr class="shop-list">
                                                <td class="h6"><a href="{{ route('remove.cart', $item->id) }})" class="text-danger">X</a></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset($item->listing->featured_image) }}" class="img-fluid avatar avatar-small rounded shadow" style="height:auto;" alt="">
                                                        <h6 class="mb-0 ms-3">{{ $item->listing->title }}</h6>
                                                    </div>
                                                </td>
                                                <td class="text-center">$1</td>
                                                <td class="text-center fw-bold">$1</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="rounded shadow-lg p-4 sticky-bar">
                    <div class="d-flex mb-4 justify-content-between">
                        <h5>{{ count($cart) }} Items</h5>
                        <a class="text-muted h6" style="cursor: pointer" onclick="$('#detailModal').modal('show')">Show Details</a>
                        {{--   <a href="{{ route('cart') }}" class="text-muted h6">Show Details</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center table-padding mb-3">
                            <tbody>
                                <tr>
                                    <td class="h6 border-0">Subtotal</td>
                                    <td class="text-end fw-bold border-0">${{ count($cart)*1 }}</td>
                                </tr>
                                <tr class="bg-light">
                                    <td class="h5 fw-bold">Total</td>
                                    <td class="text-end text-primary h4 fw-bold">${{ count($cart)*1 }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <form action="{{ route('place.order') }}" method="POST" id="payment-form">
                            @csrf
                            <input id="card-holder-name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Card Holder Name" autocomplete="off">
                            <div id="card-element" class="mt-3"></div>
                            <div id="card-errors" role="alert"></div>
                            <div class="mt-4 pt-2">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="purchase-btn">Place Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
@endsection
@section('js')
<script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            // Create a Stripe client.
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"proxima-nova", "Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                    color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style, hidePostCode:true});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable The submit button on click
                document.getElementById('purchase-btn').disabled = true;

                var options = {
                    name: document.getElementById('card-holder-name').value,
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Enable The submit button
                        document.getElementById('purchase-btn').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    </script>
@endsection
