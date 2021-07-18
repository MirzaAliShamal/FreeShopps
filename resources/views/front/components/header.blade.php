<header id="topnav" class="defaultscroll sticky">
    <div class="container-fluid">
        <!-- Logo container-->
        <div class="row">
            <div class="col-lg-12 col-md-1 col-sm-2 col-2 order-lg-1 order-1">
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-3 order-lg-2 order-2 px-1">
                <a class="logo" href="index.html">
                    <img src="{{ asset('logo.png') }}" height="60" alt="">
                </a>
            </div>
            <div class="col-lg-5 col-md-12 order-lg-3 order-4 m-auto">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Entery Keyword..." name="q" autocomplete="off">
                        <button class="btn btn-sm btn-primary"><i data-feather="search" class="icons"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-md-12 order-lg-4 order-5 m-auto">
                <a href="" class="location"><i data-feather="map-pin" class="icons"></i> Nearby</a>
            </div>
            <div class="col-lg-4 col-md-10 col-sm-8 col-7 order-lg-5 order-3 m-auto">
                <div class="top-nav text-end">
                    <ul>
                        <li class="d-sm-inline-block d-none"><a href="">About</a></li>
                        <li class="d-sm-inline-block d-none"><a href="">Terms of Service</a></li>
                        <li><a href="">Login</a></li>
                        <li><a href="" class="btn btn-primary">Post Ad</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Logo container-->


    </div><!--end container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li><a href="{{ route('home') }}" class="sub-menu-item">Home</a></li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Community</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href=""> Community Guidelines</a></li>
                                <li><a href=""> Privacy Policy</a></li>
                                <li><a href=""> What we're up to</a></li>
                                <li><a href=""> Something New!</a></li>
                                <li><a href=""> How it works</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Contact</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href=""> About Us</a></li>
                                <li><a href=""> Terms of Service / User Agreement</a></li>
                                <li><a href=""> Our Goal</a></li>
                                <li><a href=""> We Shopps Free!</a></li>
                            </ul>
                        </li>

                        <li><a href="" class="sub-menu-item">Reviews</a></li>
                        <li><a href="" class="sub-menu-item">Blog</a></li>
                        <li><a href="" class="sub-menu-item">My Account</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div>
        </div>
    </div>
</header><!--end header-->
