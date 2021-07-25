@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li> --}}
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Revenue</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="media my-3">
                                <img src="{{ asset('admin/assets/images/widgets/dollar.png') }}" alt="" class="thumb-md rounded-circle">
                                <div class="media-body align-self-center text-truncate ml-3">
                                    <h4 class="mt-0 mb-1 font-weight-semibold text-dark font-24">$36154.00</h4>
                                    <p class="text-muted text-uppercase mb-0 font-12">Total Revenue Of This Month</p>
                                </div><!--end media-body-->
                            </div>
                        </div><!--end col-->
                        <div class="col-md-8">
                            <ul class="nav-border nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link font-weight-semibold" data-toggle="tab" href="#Today" role="tab">Today</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-semibold" data-toggle="tab" href="#This_Week" role="tab">This Week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#This_Month" role="tab">This Month</a>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div> <!--end row-->
                    <div class="tab-content">
                        <div class="tab-pane pt-3" id="Today" role="tabpanel">
                            <div id="eco_dash" class="apex-charts"></div>
                        </div><!-- Tab panes -->
                        <div class="tab-pane pt-3" id="This_Week" role="tabpanel">
                            <div id="Top_Week" class="apex-charts"></div>
                        </div><!-- Tab panes -->
                        <div class="tab-pane active pt-3" id="This_Month" role="tabpanel">
                            <canvas id="bar" class="drop-shadow w-100"  height="350"></canvas>
                        </div><!-- Tab panes -->
                    </div><!-- Tab content -->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 align-self-center text-center">
                                    <i data-feather="users" class="align-self-center icon-lg icon-dual-pink"></i>
                                </div><!--end col-->
                                <div class="col-8">
                                    <h3 class="mt-0 mb-1 font-weight-semibold">24k</h3>
                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt">Visits</p>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end  card-->
                </div> <!--end col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="row">
                                <div class="col-4 align-self-center text-center">
                                    <i data-feather="shopping-cart" class="align-self-center icon-lg icon-dual-secondary"></i>
                                </div><!--end col-->
                                <div class="col-8">
                                    <h3 class="mt-0 mb-1 font-weight-semibold">10k</h3>
                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt">New Orders</p>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end  card-->
                </div> <!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 align-self-center text-center">
                                    <i data-feather="repeat" class="align-self-center icon-lg icon-dual-purple"></i>
                                </div><!--end col-->
                                <div class="col-8">
                                    <h3 class="mt-0 mb-1 font-weight-semibold">1.5k</h3>
                                    <p class="mb-0 font-12 text-uppercase font-weight-semibold-alt text-muted">Return Orders</p>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end  card-->
                </div> <!--end col-->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="row">
                                <div class="col-4 align-self-center text-center">
                                    <i data-feather="layers" class="align-self-center icon-lg icon-dual-warning"></i>
                                </div><!--end col-->
                                <div class="col-8">
                                    <h3 class="mt-0 mb-1 font-weight-semibold">+22.98%</h3>
                                    <p class="mb-0 font-12 text-uppercase font-weight-semibold-alt text-muted">Growth</p>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-body-->
                    </div><!--end  card-->
                </div> <!--end col-->
            </div><!--end row-->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Monthly Trends</h4>
                    <div class="row">
                        <div class="col-6">
                            <div id="eco_categories" class="apex-charts mb-n3"></div>
                        </div><!--end col-->
                        <div class="col-6 align-self-center">
                            <ul class="list-unstyled">
                                <li class="list-item mb-2 font-weight-semibold-alt">
                                    <i class="fas fa-play text-primary mr-2"></i>Electronic
                                </li>
                                <li class="list-item mb-2 font-weight-semibold-alt">
                                    <i class="fas fa-play text-success mr-2"></i>Footwear
                                </li>
                                <li class="list-item font-weight-semibold-alt">
                                    <i class="fas fa-play text-pink mr-2"></i>Clothes
                                </li>
                            </ul>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-round dual-btn-icon">View Details <i class="mdi mdi-arrow-right"></i></button>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-body-->
            </div><!--end  card-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body order-list">
                    <h4 class="header-title mt-0 mb-3">Order List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Pro Name</th>
                                    <th class="border-top-0">Order Date/Time</th>
                                    <th class="border-top-0">Pcs.</th>
                                    <th class="border-top-0">Amount ($)</th>
                                    <th class="border-top-0">Status</th>
                                </tr><!--end tr-->
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img class="" src="{{ asset('admin/assets/images/products/img-1.png') }}" alt="user"> </td>
                                    <td>
                                        Shoe
                                    </td>
                                    <td>3/03/2019 4:29 PM</td>
                                    <td>200</td>
                                    <td> $750</td>
                                    <td>
                                        <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>
                                        <img class="" src="{{ asset('admin/assets/images/products/img-5.png') }}" alt="user"> </td>
                                    <td>
                                      Wall Watch
                                    </td>
                                    <td>13/03/2019 1:09 PM</td>
                                    <td>180</td>
                                    <td> $970</td>
                                    <td>
                                        <span class="badge badge-md badge-boxed  badge-soft-danger">Delivered</span>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>
                                        <img class="" src="{{ asset('admin/assets/images/products/img-5.png') }}" alt="user"> </td>
                                    <td>
                                        Showpiece
                                    </td>
                                    <td>22/03/2019 12:09 PM</td>
                                    <td>30</td>
                                    <td> $2800</td>
                                    <td>
                                        <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>
                                        <img class="" src="{{ asset('admin/assets/images/products/img-5.png') }}" alt="user"> </td>
                                    <td>
                                        Watch
                                    </td>
                                    <td>14/03/2019 8:27 PM</td>
                                    <td>100</td>
                                    <td> $520</td>
                                    <td>
                                        <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td>
                                        <img class="" src="{{ asset('admin/assets/images/products/img-5.png') }}" alt="user"> </td>
                                    <td>
                                        Beg
                                    </td>
                                    <td>18/03/2019 5:09 PM</td>
                                    <td>100</td>
                                    <td> $1150</td>
                                    <td>
                                        <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                    </td>
                                </tr><!--end tr-->
                            </tbody>
                        </table> <!--end table-->
                    </div><!--end /div-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

</div><!-- container -->
@endsection
