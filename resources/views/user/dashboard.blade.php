@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
@if (count($orders_placed) > 0)
<div class="border-bottom pb-4">
    <h5>Active Orders Placed</h5>

    @foreach ($orders_placed as $item)
        <div class="d-flex key-feature align-items-center p-3 rounded shadow mt-4">
            <img src="{{ asset($item->listing->featured_image) }}" class="avatar rounded-circle" width="60px" alt="">
            <div class="flex-1 content ms-3">
                <small class="text-muted mb-0 font-10">{{ $item->listing->location }}</small>
                <h4 class="title mb-0">{{ $item->listing->title }}</h4>
            </div>
            <div class="flex-2 content ms-3">
                <small class="text-muted mb-0 font-10">Order No:</small>
                <h4 class="title mb-0">#{{ $item->order_no }}</h4>
            </div>
            <div class="flex-2 content ms-3">
                <a href="" class="btn btn-primary btn-sm"><i data-feather="message-circle" class="fea icon-sm icons"></i> Message</a>
            </div>
        </div>
    @endforeach
</div>
@endif

@if (count($orders_receive) > 0)
<div class="border-bottom pb-4">
    <h5>Active Orders Received</h5>

    @foreach ($orders_receive as $item)
        <div class="d-flex key-feature align-items-center p-3 rounded shadow mt-4">
            <img src="{{ asset($item->listing->featured_image) }}" class="avatar rounded-circle" width="60px" alt="">
            <div class="flex-1 content ms-3">
                <small class="text-muted mb-0 font-10">{{ $item->listing->location }}</small>
                <h4 class="title mb-0">{{ $item->listing->title }}</h4>
            </div>
            <div class="flex-2 content ms-3">
                <small class="text-muted mb-0 font-10">Order No:</small>
                <h4 class="title mb-0">#{{ $item->order_no }}</h4>
            </div>
            <div class="flex-2 content ms-3">
                <a href="" class="btn btn-primary btn-sm"><i data-feather="message-circle" class="fea icon-sm icons"></i> Message</a>
            </div>
        </div>
    @endforeach
</div>
@endif


@endsection
