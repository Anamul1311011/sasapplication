<!DOCTYPE html>
<html lang="en">
@php
    use Illuminate\Support\Facades\Auth;
    $setting=DB::table('settings')->get()->first();
    $number=DB::table('settings')->get()->count();

@endphp
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        @if(($number)==1)
        <link rel="shortcut icon" href="{{asset('/storage')}}/{{$setting->logo}}">
        <title>{{$setting->title}} Dashboard</title>
        @endif


        <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

        <!-- Fontfaces CSS-->
        <link href="{{asset('Admin/css/font-face.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/font-awesome-5/css/all.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
            media="all">

        <!-- Bootstrap CSS-->
        <link href="{{asset('Admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">


        <!-- Vendor CSS-->
        <link href="{{asset('Admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}"
            rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{asset('Admin/css/theme.css')}}" rel="stylesheet" media="all">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/DataTables/jquery.dataTables.min.css')}}">




        <script src="{{asset('Admin/vendor/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('plugins/DataTables/jquery.dataTables.min.js')}}"></script>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


    </head>
@php
    $setting=DB::table('settings')->get()->first();
@endphp
    <body class="animsition">
        <div class="page-wrapper">

            <!-----------------------------------------MENU SIDEBAR---------------------------------------->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="{{url('/dashboard')}}">
                        <img src="{{asset('storage')}}/{{$setting->logo}}" alt="{{$setting->title}}">
                    </a>
                </div>
          @if (Auth::user()->user_type == 1)
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow no-underline" href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{route('admin_setting')}}">
                                <i class="fas fa-user-tie mr-3"></i>Admin Setting</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="fab fa-phoenix-squadron mr-3"></i>Frontend
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="no-underline" href="{{route('offer_categories')}}">Service Areas</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_offers')}}">Offers</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_category')}}">Sliding Service Categories</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('services')}}">Sliding Services</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_options')}}">Sliding Service Options</a>
                                </li>


                                <li>
                                    <a class="no-underline" href="{{route('quotation')}}">Quotation</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('unique_services')}}">Different Services</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('unique_services_features')}}">Different Services Features</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('development_apps')}}">Development Applications</a>
                                </li>
                                {{-- <li>
                                    <a class="no-underline" href="{{route('multipurpose_apps')}}">Multipurpose Applications</a>
                                </li> --}}
                                <li>
                                    <a class="no-underline" href="{{route('stunning_apps')}}">Stunning Applications</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('sale_applications')}}">Featured Solutions</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('latest_technologies')}}">Latest Technologies</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_features')}}">Service Features</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('frontend_faq_categories')}}">FAQ Categories</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('frontend_faqs')}}">FAQs</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_plans')}}">Service Plans</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('sections')}}">Section Type</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="fab fa-elementor mr-3"></i>Services
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="no-underline" href="{{route('service_category')}}">Key Service</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('services')}}">Services</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_options')}}">Service Options</a>
                                </li>

                                <li>
                                    <a class="no-underline" href="{{route('offer_categories')}}">Service Area</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('service_offers')}}">Service Offers</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="fab fa-accusoft mr-3"></i>Applications
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="no-underline" href="{{route('application_category')}}">Application Category</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('application_category_details')}}">Category Details</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('applications')}}">Applications</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('application_features')}}">Application Features</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('application_offers')}}">Application Offers</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="fas fa-h-square mr-3"></i>Hosting
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('hostings')}}" class="no-underline">Hostings</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('host_features')}}">Hosting Features</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('host_offers')}}">Hosting Offers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="far fa-question-circle mr-3"></i>FAQ
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('faq_categories')}}" class="no-underline">FAQ Categories</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('faqs')}}">FAQs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="fas fa-blog mr-3"></i>Blog
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('blog_categories')}}" class="no-underline">Blog Categories</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('blog_writers')}}">Blog Writers</a>
                                </li>
                                <li>
                                    <a class="no-underline" href="{{route('blogs')}}">Blogs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="#">
                                <i class="mr-3 fab fa-spotify"></i>Others
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('contacts')}}">Contact</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('newsletter')}}">Newsletter</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('team_members')}}">Team Members</a>
                                </li>

                                <li>
                                    <a class="js-arrow no-underline" href="{{route('partners')}}">Partners</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('aboutUs')}}">About Us</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('customer_sayings')}}">Customer Sayings</a>
                                </li>
                                <li>
                                    <a class="js-arrow no-underline" href="{{route('messages')}}">Messages</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{route('social_icons')}}">
                                <i class="fas fa-grip-horizontal mr-3"></i>Social Icons</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{route('banner_images')}}">
                                <i class="far fa-images mr-3"></i>Banner Images</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{route('settings')}}">
                                <i class="fas fa-sliders-h mr-3"></i>Settings</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{ url('add/coupon') }}">
                                <i class="fas fa-sliders-h mr-3"></i>Add Coupons</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow no-underline" href="{{ url('/admin/view-orders') }}">
                                <i class="fas fa-sliders-h mr-3"></i>View Orders</a>
                        </li>



                    </ul>
                </nav>
            </div>
            @else
              <li class="has-sub">
                  <a class="js-arrow no-underline" href="{{ url('purchase/order') }}">
                      <i class="fas fa-sliders-h mr-3"></i>Your Purchase Order</a>
              </li>

          @endif
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-deskPtop shadow-lg py-3">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <form class="form-header" action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="search"
                                        placeholder="Search for datas &amp; reports..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                                <div class="header-button">
                                    <div class="noti-wrap">
                                        <div class="noti__item js-item-menu">
                                            <i class="zmdi zmdi-comment-more"></i>
                                            <span class="quantity">1</span>
                                            <div class="mess-dropdown js-dropdown">
                                                <div class="mess__title">
                                                    <p>You have 2 news message</p>
                                                </div>
                                                <div class="mess__item">
                                                    <div class="image img-cir img-40">
                                                        <img src="{{asset('Admin/images/icon/avatar-06.jpg')}}"
                                                            alt="Michelle Moreno" />
                                                    </div>
                                                    <div class="content">
                                                        <h6>Michelle Moreno</h6>
                                                        <p>Have sent a photo</p>
                                                        <span class="time">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="mess__item">
                                                    <div class="image img-cir img-40">
                                                        <img src="{{asset('Admin/images/icon/avatar-04.jpg')}}"
                                                            alt="Diane Myers" />
                                                    </div>
                                                    <div class="content">
                                                        <h6>Diane Myers</h6>
                                                        <p>You are now connected on message</p>
                                                        <span class="time">Yesterday</span>
                                                    </div>
                                                </div>
                                                <div class="mess__footer">
                                                    <a href="#">View all messages</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="noti__item js-item-menu">
                                            <i class="zmdi zmdi-email"></i>
                                            <span class="quantity">1</span>
                                            <div class="email-dropdown js-dropdown">
                                                <div class="email__title">
                                                    <p>You have 3 New Emails</p>
                                                </div>
                                                <div class="email__item">
                                                    <div class="image img-cir img-40">
                                                        <img src="{{asset('Admin/images/icon/avatar-06.jpg')}}"
                                                            alt="Cynthia Harvey" />
                                                    </div>
                                                    <div class="content">
                                                        <p>Meeting about new dashboard...</p>
                                                        <span>Cynthia Harvey, 3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="email__item">
                                                    <div class="image img-cir img-40">
                                                        <img src="{{asset('Admin/images/icon/avatar-05.jpg')}}"
                                                            alt="Cynthia Harvey" />
                                                    </div>
                                                    <div class="content">
                                                        <p>Meeting about new dashboard...</p>
                                                        <span>Cynthia Harvey, Yesterday</span>
                                                    </div>
                                                </div>
                                                <div class="email__item">
                                                    <div class="image img-cir img-40">
                                                        <img src="{{asset('Admin/images/icon/avatar-04.jpg')}}"
                                                            alt="Cynthia Harvey" />
                                                    </div>
                                                    <div class="content">
                                                        <p>Meeting about new dashboard...</p>
                                                        <span>Cynthia Harvey, April 12,,2018</span>
                                                    </div>
                                                </div>
                                                <div class="email__footer">
                                                    <a href="#">See all emails</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="noti__item js-item-menu">
                                            <i class="zmdi zmdi-notifications"></i>
                                            <span class="quantity">3</span>
                                            <div class="notifi-dropdown js-dropdown">
                                                <div class="notifi__title">
                                                    <p>You have 3 Notifications</p>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c1 img-cir img-40">
                                                        <i class="zmdi zmdi-email-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>You got a email notification</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c2 img-cir img-40">
                                                        <i class="zmdi zmdi-account-box"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Your account has been blocked</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c3 img-cir img-40">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>You got a new file</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__footer">
                                                    <a href="#">All notifications</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            @if (Auth::check())


                                            <div class="image">
                                                <img src="{{asset('/storage')}}/{{ Auth::user()->image }}"
                                                    alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                            </div>
                                            @endif
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    @if (Auth::check())
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="{{asset('/storage')}}/{{ Auth::user()->image }}"
                                                                alt="John Doe" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">{{ Auth::user()->name }}</a>
                                                        </h5>
                                                        <span class="email">{{ Auth::user()->email }}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="{{route('admin_setting')}}">
                                                            <i class="zmdi zmdi-account"></i>Account
                                                        </a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="{{route('settings')}}">
                                                            <i class="zmdi zmdi-settings"></i>Setting
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content">
                        <div class="container-fluid">


                            <div class="row px-2">
                                @yield('content')
                            </div>


                            <div class="row shadow-sm">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2018 SAAS Application. All rights reserved. Template by <a
                                                href="https://colorlib.com">HSBLCO</a>.</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>




        <!-------------Laravel JS---------------->

        <!-- Jquery JS-->

        <!-- Bootstrap JS-->
        <script src="{{asset('Admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
        <!-- Vendor JS       -->
        <script src="{{asset('Admin/vendor/font-awesome-5/js/all.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/slick/slick.min.js')}}">
        </script>
        <script src="{{asset('Admin/vendor/wow/wow.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/animsition/animsition.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
        </script>
        <script src="{{asset('Admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/counter-up/jquery.counterup.min.js')}}">
        </script>
        <script src="{{asset('Admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('Admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('Admin/vendor/select2/select2.min.js')}}"></script>

        <!-- Main JS-->
        <script src="{{asset('Admin/js/main.js')}}"></script>

        @yield('javaScript')
    </body>

</html>
<!-- end document-->
