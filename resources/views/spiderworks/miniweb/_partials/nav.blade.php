<nav class="page-sidebar" data-pages="sidebar" style="    background: linear-gradient(0deg, #28a22e, #385968);">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
                </a>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header" style="background: white">

        <img src="{{asset('logo-backend.png')}}" alt="" width="120px;">
        {{--<div class="sidebar-header-controls">--}}
            {{--<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">--}}
                {{--<i class="fa fa-angle-down fs-16"></i>--}}
            {{--</button>--}}
            {{--<button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar"><i class="fa fs-12"></i>--}}
            {{--</button>--}}
        {{--</div>--}}
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu" style="margin-top: 20px;">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li>
                <a href="{{route('spiderworks.miniweb.media.index')}}"  class="detailed">
                    <span class="title"><i class="fa fa-picture-o" aria-hidden="true"></i> Media Library</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('spiderworks.miniweb.category.index')}}"  class="detailed">--}}
                    {{--<span class="title">Manage Categories</span>--}}
                {{--</a>--}}
                {{--<span class="icon-thumbnail"><i class="pg-calender"></i></span>--}}
            {{--</li>--}}
            <li>
                <a href="{{route('spiderworks.miniweb.pages.index')}}"  class="detailed">
                    <span class="title"><i class="fa fa-file-text-o" aria-hidden="true"></i> Manage Pages</span>
                </a>
            </li>
            <li>
                <a href="{{route('spiderworks.miniweb.menus.index')}}"  class="detailed">
                    <span class="title"><i class="fa fa-bars" aria-hidden="true"></i> Manage Menu</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('spiderworks.miniweb.frontend-pages.index')}}"  class="detailed">--}}
                    {{--<span class="title">Manage Internal Pages</span>--}}
                {{--</a>--}}
                {{--<span class="icon-thumbnail"><i class="pg-calender"></i></span>--}}
            {{--</li>--}}
        </ul>

        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>