<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') - FreeShopps </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

        <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/plugins/lightpick/lightpick.css') }}" rel="stylesheet" />
        <!-- DataTables -->
        <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
        <link href="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .cursor-pointer {
                cursor: pointer;
            }
        </style>
        @yield('css')
    </head>

    <body class="">

        <!-- Left Sidenav -->
        @include('admin.components.sidenav')
        <!-- end left-sidenav-->

        <!-- Top Bar Start -->
        @include('admin.components.topbar')
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                @yield('content')

                <footer class="footer text-center text-sm-left">
                    &copy; 2019 - 2020 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->


        <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>


        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('admin/plugins/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/chartjs/roundedBar.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ asset('admin/assets/pages/jquery.ecommerce_dashboard.init.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Sweet-Alert  -->
        <script src="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('admin/assets/pages/jquery.sweet-alert.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.js') }}"></script>
        <script>
            // Datatable Initalized
            function serverDT(url, data) {
                var table = $('#datatable').DataTable({
                    "sort": true,
                    "ordering": true,
                    "pagingType": "full_numbers",
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    "columnDefs": [{
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }],
                    "select": {
                        'style': 'multi'
                    },
                    "order": [
                        [1, 'asc']
                    ],
                    ajax: url,
                    columns: data,
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                    }
                });
            }


            // General Delete Function
            function deleteAlert(url) {
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        location.href = url;
                    }
                });
            }

            // General alert
            function alertMessage(url, msg) {
                Swal.fire({
                title: 'Are you sure?',
                text: msg,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.value) {
                        location.href = url;
                    }
                });
            }
        </script>
        @yield('js')
    </body>

</html>
