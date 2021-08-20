
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Freeshopps.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="current" content="{{ auth()->user()->id }}">
    <meta name="role" content="{{ auth()->user()->role }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('theme/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
    <!-- Slider -->
    <link href="{{ asset('theme/css/tiny-slider.css') }}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{ asset('theme/css/colors/default.css') }}" rel="stylesheet" id="color-opt">
    <link href="{{ asset('theme/css/custom.css') }}" rel="stylesheet" id="color-opt">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('theme/css/font/font-fileuploader.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/jquery.fileuploader.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.min.css" rel="stylesheet">

    @yield('css')
</head>

<body>

    <!-- Navbar STart -->
    @include('user.components.header')
    <!-- Navbar End -->

    <!-- Profile Start -->
    @if (Route::currentRouteName() == "user.chat")
        <section class="section mt-60">
            <div class="container mt-lg-3">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
    @else
        <section class="section mt-60">
            <div class="container mt-lg-3">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 d-lg-block d-none">
                        @include('user.components.sidebar')
                    </div><!--end col-->

                    <div class="col-lg-8 col-12">
                        @yield('content')
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
    @endif

    <!-- Profile End -->

    <!-- Footer Start -->
    @include('user.components.footer')
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

    <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>


    <!-- javascript -->
    <script>
        let notification_url = "{{ route('notification') }}";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('theme/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/js/gumshoe.polyfills.min.js') }}"></script>
    <!-- SLIDER -->
    <script src="{{ asset('theme/js/tiny-slider.js') }}"></script>
    <!-- Icons -->
    <script src="{{ asset('theme/js/feather.min.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ asset('theme/js/plugins.init.js') }}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="{{ asset('theme/js/app.js') }}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('theme/js/jquery.fileuploader.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&callback=initMap&libraries=places&v=weekly"async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();

            $('input[name="files"]').fileuploader({
                limit: 20,
                maxSize: 50,

                addMore: true
            });
        });

        $(document).on("click", ".cat-item", function(e) {
            e.preventDefault();
            let val = $(this).data('slug');
            $("[name='category']").val(val);

            $(".navbar-search").submit();
        });

        $(document).on("change", "[name='sorting']", function(e) {
            let val = $(this).val();
            $("[name='sort']").val(val);

            $(".navbar-search").submit();
        });

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

        // Notification Functions
        $("body").on('click', '.read-status', function (e) {
            e.preventDefault();
            let unread = "<i class='uil uil-envelope align-middle icons'></i>";
            let read = "<i class='uil uil-envelope-open align-middle icons'></i>";
            let elm = $(this);
            let id = elm.data("id");
            let count = parseInt($(".notif-count").html());

            if (elm.closest('li').hasClass('active')) {
                elm.closest('li').removeClass('active');
                markNotifRead(id);
                $(".notif-count").html(count - 1);
                elm.html(read);
            } else {
                elm.closest('li').addClass('active');
                markNotifUnread(id);
                $(".notif-count").html(count + 1);
                elm.html(unread);
            }

            e.stopPropagation();
        });

        $("body").on('click', '.read-all', function (e) {
            let unread = "<i class='uil uil-envelope align-middle icons'></i>";
            let read = "<i class='uil uil-envelope-open align-middle icons'></i>";
            let elm = $(this);
            elm.closest('.notification-dropdown').find("li").removeClass('active');
            markNotifRead();
            $(".notif-count").html("0");
            elm.html(read);
            $(".read-status").html(read);
            $(".notif button").removeClass('notif-drop');

            e.stopPropagation();
        });

        function markNotifRead(id = null) {
            let url;
            if (id) {
                url = "{{ route('mark.read') }}/"+id;
            } else {
                url = "{{ route('mark.read') }}";
            }

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response);
                }
            });
        }

        function markNotifUnread(id) {
            let url = "{{ route('mark.unread') }}/"+id;

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>

    @yield('js')
</body>
</html>
