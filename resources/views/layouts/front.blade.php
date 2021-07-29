
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Freeshopps.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('theme/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
    <!-- Slider -->
    <link href="{{ asset('theme/css/tiny-slider.css') }}" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('theme/css/font/font-fileuploader.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/jquery.fileuploader.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Main Css -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{ asset('theme/css/colors/default.css') }}" rel="stylesheet" id="color-opt">
    <link href="{{ asset('theme/css/custom.css') }}" rel="stylesheet" id="color-opt">

    <style>
        #toast-container .toast {
            opacity: 1;
        }
    </style>
    @yield('css')
</head>

<body>

    <!-- Navbar STart -->
    @include('front.components.header')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('front.components.footer')
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->


    <!-- Account Modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-body p-0">
                    <div class="container-fluid px-0">
                        <div class="row align-items-center g-0">
                            <div class="col-lg-6 col-md-5">
                                <img src="{{ asset('theme/images/course/online/ab02.jpg') }}" class="img-fluid" alt="">
                            </div><!--end col-->

                            <div class="col-lg-6 col-md-7">
                                <div id="status" class="loader" style="display: none;">
                                    <div class="spinner">
                                        <div class="double-bounce1"></div>
                                        <div class="double-bounce2"></div>
                                    </div>
                                </div>

                                <form class="login-form p-4 accounts" action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="text-center">Sign up / Log in</h3>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <a href="" class="btn btn-primary facebook d-block"><i class="mdi mdi-facebook mdi-18px icons"></i> Continue with Facebook</a>
                                        </div><!--end col-->
                                        <div class="col-lg-12 mb-3">
                                            <a href="" class="btn btn-primary google d-block"><i class="mdi mdi-google mdi-18px icons"></i> Continue with Google</a>
                                        </div><!--end col-->
                                        <div class="col-lg-12 mb-3">
                                            <button type="button" class="btn btn-primary d-block w-100" onclick="accountsModalHandle('.login')"><i class="mdi mdi-email mdi-18px icons"></i> Continue with Email</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>

                                <form class="login-form p-4 login" style="display: none;" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="email" class="form-control ps-5" placeholder="Email"
                                                    name="email">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" placeholder="Password"
                                                    name="password">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault4">
                                                        <label class="form-check-label" for="flexCheckDefault4">Remember me</label>
                                                    </div>
                                                </div>
                                                <p class="forgot-pass mb-0"><a href="javascript:;" class="text-dark fw-bold" onclick="accountsModalHandle('.forget')">Forgot password ?</a></p>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Log in</button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.signup')" class="text-dark fw-bold">Sign Up</a></p>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>

                                <form class="login-form p-4 signup" style="display: none;" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="text" class="form-control ps-5" placeholder="Name"
                                                    name="name">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input type="email" class="form-control ps-5" placeholder="Email"
                                                    name="email">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" class="form-control ps-5" placeholder="Password"
                                                    name="password">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Sign up</button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.login')" class="text-dark fw-bold">Log in</a></p>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>

                                <form class="login-form p-4 forget" style="display: none;" action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <strong>Forgot your password?</strong> No problem. Just let us know your email address and we will
                                                email you a password reset link that will allow you to choose a new one.
                                            </p>
                                        </div>

                                        <div class="col-lg-12 status-message"></div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input type="email" class="form-control ps-5" placeholder="Email"
                                                    name="email">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Send</button>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="javascript:;" onclick="accountsModalHandle('.login')" class="text-dark fw-bold">Log in</a></p>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div>
            </div>
        </div>
    </div>
    <!-- Account Modal -->


    <!-- javascript -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function accountsModalHandle(target) {
            $(".login-form").find("span.invalid-feedback").remove();
            $(".login-form").find(".form-control").removeClass('is-invalid');
            $(".login-form").hide();
            $(target).fadeIn();
        }
        function printValidationMessages(errorObj) {
            $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
		    $.map(errorObj, function(value, index) {
                $(document).find('[name="' + index + '"]').closest('div').find('span.invalid-feedback').remove();
                let appendIn = $(document).find('[name="' + index + '"]').closest('div');
                if (!$(appendIn).find('span.invalid-feedback').length) {
                    $(document).find('[name="' + index + '"]').addClass('is-invalid');
                    $(appendIn).append('<span class="invalid-feedback"><strong>' + value[0] + '</strong></span>')
                }
            });
        }

        // Login Form Event
        $(".login-form").submit(function (e) {
            e.preventDefault();
            let elm = $(this);
            let url = elm.attr('action');
            elm.hide();
            $(".loader").show();
            $.ajax({
                type: "POST",
                url: url,
                data: elm.serialize(),
                success: function (response) {
                    // console.log(response);
                    if (response.statusCode == 200) {
                        if (response.reload) {
                            window.location.reload(true);
                        } else {
                            elm.show();
                            $(".loader").hide();
                            $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
                            elm.find(".status-message").html('<div class="alert alert-success">'+response.message+'</div>')
                        }
                    }
                    if (response.statusCode == 400) {
                        if (response.reload) {
                            window.location.reload(true);
                        } else {
                            elm.show();
                            $(".loader").hide();
                            $(document).find('.login-form .form-control').closest('div').find('span.invalid-feedback').remove();
                            elm.find(".status-message").html('<div class="alert alert-danger">'+response.message+'</div>')
                        }
                    }
                },
                error: function(xhr, status, error) {
                    // console.log(xhr);
                    elm.show();
                    if (xhr.status == 422) {
                        let errorObj = xhr.responseJSON.errors;
                        printValidationMessages(errorObj);
                    } else {
                        // toastr.error('Unknown Error!');
                    }
                    $(".loader").hide();
                }
            });
        });

        // Add To Fav Event
        $(document).on("click", ".addFav", function() {
            let elm = $(this);
            let parent = $(this).closest("li");

            elm.addClass('active');
            elm.removeClass('addFav');

            $.ajax({
                type: "GET",
                url: "{{ route('add.fav') }}/"+elm.data('id'),
                success: function (response) {
                    if (response.statusCode == 200) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

        // Add To Cart Event
        $(document).on("click", ".addCart", function() {
            let elm = $(this);
            let parent = $(this).closest("li");

            $(".cart-dropdown").click();
            $('.cart-block').hide();
            $(".dropdown .loader").show();

            elm.addClass('active');
            elm.removeClass('addCart');

            $.ajax({
                type: "GET",
                url: "{{ route('add.cart') }}/"+elm.data('id'),
                success: function (response) {
                    if (response.statusCode == 200) {
                        $(".cart").html(response.html);
                        $(".dropdown .loader").hide();
                        $('.cart-block').show();
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });

        $(document).on("click", ".removeCart", function(e) {
            let elm = $(this);
            alert('df');
            elm.closest("div").remove();

            $.ajax({
                type: "GET",
                url: "{{ route('remove.cart') }}/"+elm.data('id'),
                success: function (response) {
                    if (response.statusCode == 200) {

                    } else {
                        toastr.error(response.message);
                    }
                }
            });
            e.stopPropagation();
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
    </script>
    @yield('js')
</body>
</html>
