<div class="mobilemenu_f4">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title"></div>
            <button type="button" class="mobilemenu__close">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse="" data-collapse-opened-class="mobile-links__item--open">
                @widget('MobileMenu', ['menu_position' => 'Header'])
            </ul>
        </div>
    </div>
</div>
<div id="sticky-header" class="header-middle-area">
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
        <div class="mobile-header__panel">
            <div class="mobile-header__body">
                <div class="mobile_header--right">
                    <div class="logo"><a href="{{url('/')}}"><img src="{{asset('logo.png')}}" alt=""></a></div>
                </div>
                <div class="mobile_header--left">
                    <div class="ss-social">
                        <ul>
                            <li class="social">
                                <a href="https://www.facebook.com/epillars.dubai" target="_blank">
                                    <i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="social">
                                <a href="https://twitter.com/ePillars_System" target="_blank">
                                    <i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="social">
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li class="social">
                                <a href="https://www.linkedin.com/company/epillars-systems-llc" target="_blank">
                                    <i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" class="hamburger fadeInLeft is-closed mobile-header__menu-button" data-toggle="offcanvas">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<header id="header">
    <div id="trueHeader">
        <div class="wrapper">
            <div class="menu_main">
            <div class="logoarea">
                <div class="container">
                    <!-- Logo -->
                    <div class="logo"><a href="{{url('/')}}" id="logo"></a></div>


                    <div class="right_links">
                        <ul>
                            <li class="link"><a href="tel:+97143263939" onclick="notifyep('043263939')"><i class="fa fa-phone"></i> +971 4 326 3939</li></a>
                            <li class="link"><i class="fa fa-envelope"></i> info@epillars.com</li>
                            <li class="social"><a href="https://www.facebook.com/epillars.dubai" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social"><a href="https://twitter.com/ePillars_System" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="social"><a href="https://www.linkedin.com/company/epillars-systems-llc" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- end right links -->
                </div>
            </div>
            </div>
            <!-- Menu Bar-->

            <!-- Menu Bar-->
            <div class="menu_main">
                <div class="container">
                    <div class="navbar yamm navbar-default">
                        <div class="container">
                            <div class="navbar-header">
                                <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
                                    <button type="button" > <i class="fa fa-bars"></i></button>
                                </div>
                            </div>
                            <div id="navbar-collapse-1" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    @widget('MainMenu', ['menu_position' => 'Header'])
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div> </div>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>