@extends('layouts.admin')

@section('title', 'Why shopps free')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Why shopps free</li>
                    </ol>
                </div>
                <h4 class="page-title">Why shopps free</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Why Shoppsfree title *</label>
                            <input type="text"  name="shopfree_title" placeholder="Title" value="{{ setting('shopfree_title') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >Why Shoppsfree Image *</label>
                            <input type="file" id="shopfree_image" name="shopfree_image" data-default-file="{{ asset(setting("shopfree_image")) }}" class="form-control dropify">
                        </div>

                        <div class="form-group">
                            <label >Why Shoppsfree text *</label>
                            <textarea name="shopfree_text"  class="form-control editor">{{ setting('shopfree_text') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-purple waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div><!-- container -->
@endsection
