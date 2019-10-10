<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
@php
$setting=DB::table('settings')->get()->first();
$number=DB::table('settings')->get()->count();
$applications=DB::table('applications')->get();
$app_offers=DB::table('application_offers')->get();
$host_offers=DB::table('hosting_offers')->get();
@endphp
    @if($number==1)
    <link rel="shortcut icon" href="{{asset('/storage')}}/{{$setting->logo}}">
    <title>{{$setting->title}}</title>
    @endif
    <!-- page title -->


    <!-- page title -->
     <!-- owl carousel-->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('MainView/javascript/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('MainView/javascript/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- bootstrap css -->
    <link href="{{asset('MainView/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- default css / Style Pages -->
    <link href="{{asset('MainView/style/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('MainView/style/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('MainView/style/megamenu-style.css')}}" rel="stylesheet">
    <!-- responsive css -->
    <link href="{{asset('MainView/style/responsive.css')}}" rel="stylesheet" type="text/css">
    <!-- animations -->
    <link href="{{asset('MainView/style/animate.min.css')}}" rel="stylesheet" type="text/css">
    <!-- fontawesome -->
    <link href="{{asset('MainView/fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/taher.js')}}"></script>
    <script src="{{asset('Admin/vendor/font-awesome-5/js/all.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900|Noto+Sans:400,700|Nunito+Sans:400,400i,600,600i,700,700i,800,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

</head>

<body>
@php
    $contacts=DB::table('contacts')->get();
    $i=1;
@endphp
    <!-- preloader -->
    <!--<div id="preloader">-->
    <!--    <div class="text-center " id="status">-->
    <!--        @if($number==1)-->
    <!--        <img src="{{asset('/storage')}}/{{$setting->logo}}" alt="Preloader" class="img-responsive" style="margin: 0 auto">-->
    <!--        @else-->
    <!--        <h1><a style="color:#00FFE6" href="#">SAS Application</a></h1>-->
    <!--        @endif-->
    <!--    </div>-->
    <!--</div>-->
    <!-- preloader -->

    @php
    $icons=DB::table('social_icons')->get();
@endphp
<!--START OF TOP-BAR -->
<div class="container-fluid top-bar">
    <div class="row2 mx-0 px-2">
        <div class="col-sm-5 col-xs-5 top-list">
            <ul>
                @foreach($icons as $icon)
                    <li>
                        <a href="{{$icon->link}}">{!! $icon->icon !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-7 col-xs-7 top-list-right">
            <ul>
                <li class="account"><a href="#">My Account</a></li>
                <li class="toplist-3"><a href="{{route('about')}}">About</a></li>
                @php
                    $i=1;
                @endphp
                @foreach($contacts as $contact)
                    <li>{!! $contact->icon !!} {{$contact->phone_text_email}}</li>
                    @if(($i++)==2)
                        @break
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--END OF TOP-BAR  -->

        <!-- new header for html -->
<div class="new-header-html">
        <div class="container">
            <div class="new-hedaer-links">
                <div class="col-sm-6 hidden-xs">
                    <p>YOU ARE MOST WELCOME</p>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <ul class="new-links">
                      @php
                        $ip_address = $_SERVER['REMOTE_ADDR'];
                      @endphp
                        <li class="n-l1">
                            <a href="{{ url('/cart') }}" class="position-relative">
                                <sup class="cart-no">{{ App\Cart::where('ip_address', $ip_address)->count() }}</sup><span><i class="fas fa-shopping-cart"></i></span> View Cart
                            </a>
                        </li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <!-- new header for html -->


    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-sticky navbar-mobile bootsnav">
        <div class="container">
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                @if($number==1)
                  <img src="{{asset('/storage')}}/{{$setting->logo}}" alt="{{$setting->title}}" srcset="">
                  @else
                  SAS Application
                @endif
            </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="slideInUp" data-out="fadeOut">
                    <li class="dropdown">
                        <a href="{{route('welcome')}}">Home</a>
                    </li>
                    @php
                        $i=1;
                        $hostings=DB::table('hostings')->get();
                    @endphp
                    <li class="dropdown megamenu-fw">

                        <a href="#" class="dropdown-toggle before" data-toggle="dropdown">Applications</a>

                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row2">
                                @php
                                    $i=1;
                                @endphp
                                        <div class="col-menu col-md-9">
                                            <div class="row2">
                                                @forelse($applications as $application)
                                                <div class="col-md-4 my-4">
                                                    <h6 class="title">{{$application->title}}</h6>
                                                    <div class="content">
                                                        <img src="{{asset('/storage')}}/{{$application->image}}" alt="No image found" class="img-responsive">
                                                        <h5>Starting from <b>{{$application->price}}</b></h5>
                                                        <p>{!! str_limit($application->description,100) !!}</p>
                                                        <a href="{{route('single_app',$application->id)}}" class="button btn btn-outline">Buy Now</a>
                                                    </div>
                                                </div>
                                                @empty

                                                <div class="col-menu col-md-3 text-center">
                                                    <h6 class="title">There is no application found</h6>
                                                </div>
                                                @endforelse
                                            </div>

                                        </div>
                                    <div class="col-menu col-md-3">
                                        <div class="row2">
                                            @forelse($app_offers as $app_offer)
                                            <div class="col-md-12 my-5">
                                                <h6 class="title">{{$app_offer->title}}</h6>
                                                <div class="content dedicated">
                                                    <h2>{{$app_offer->offer}}</h2>
                                                    <p>{!! str_limit($app_offer->description,150) !!}</p>
                                                    <a href="{{route('single_app_offer',$app_offer->id)}}" class="button btn btn-outline">Read More</a>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-md-12">There is no offer found</div>
                                            @endforelse
                                        </div>

                                    </div>

                                </div>

                            </li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fab fa-ioxhost mr-2 text-primary"></i>Hosting
                        </a>

                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row2">
                                @php
                                    $i=1;
                                @endphp
                                    <div class="col-menu col-md-9">
                                        <div class="row2">
                                            @forelse($hostings as $hosting)
                                                <div class="col-md-4 my-4">
                                                    <h6 class="title">{{$hosting->title}}</h6>
                                                    <div class="content">
                                                        <img src="{{asset('/storage')}}/{{$hosting->image}}" alt="No image found" class="img-responsive">
                                                        <h5>Starting from <b>{{$hosting->price}}</b></h5>
                                                        <p>{!! str_limit($hosting->description,100) !!}</p>
                                                        <a href="{{route('hosting_view',$hosting->id)}}" class="button btn btn-outline">Buy Now</a>
                                                    </div>
                                                </div>
                                            @empty

                                            <div class="col-menu col-md-3 text-center">
                                                <h6 class="title">There is no hosting found</h6>
                                            </div>
                                            @endforelse
                                        </div>

                                    </div>
                                    <div class="col-menu col-md-3">
                                        <div class="row2">
                                            @forelse($host_offers as $host_offer)
                                            <div class="col-md-12 my-5">
                                                <h6 class="title">{{$host_offer->title}}</h6>
                                                <div class="content dedicated">
                                                    <h2>{{$host_offer->offer}}</h2>
                                                    <p>{!! str_limit($host_offer->description,150) !!}</p>
                                                    <a href="{{route('single_host_offer',$host_offer->id)}}" class="button btn btn-outline">Read More</a>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-md-12">There is no offer found</div>
                                            @endforelse
                                        </div>

                                    </div>

                                </div>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('web_services')}}" class="before-wd">Web Services <span class="new">NEW</span></a>
                    </li>
                    <li>
                        <a href="{{route('mobile_apps')}}" class="before-wd">Mobile Apps <span class="new">NEW</span></a>
                    </li>
                    <li><a href="{{route('contact_view')}}">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">OUR COMPANY</h6>
                <ul class="link">
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('all_services')}}">Services</a></li>
                    <li><a href="{{route('all_applications')}}">Applications</a></li>
                    <li><a href="{{route('front_blog')}}">Blog</a></li>
                    <li><a href="{{route('contact_view')}}">Contact</a></li>
                </ul>
            </div>
            @php
                $i=1;
                $j=1;
                $k=1;
                $faq_cat=DB::table('faq_categories')->where('id','1')->first();
                $why_faqs=DB::table('faqs')->where('category',$faq_cat->id)->get();
            @endphp
            <div class="widget">
                <h6 class="title">{{$faq_cat->category}}</h6>
                @foreach($why_faqs as $why_faq)
                <ul class="link">
                    <li class="query" id="query{{$j++}}"><a href="#">{{$i++}}.  {{$why_faq->torq}}</a></li>
                    <li class="answer" id="answer{{$k++}}">{!! str_limit($why_faq->description,250) !!}</li>
                </ul>
                @endforeach
            </div>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
@yield('main_content')
          <!-- ===== FOOTER ===== -->
@php
    $contacts=DB::table('contacts')->get();
    $partners=DB::table('partners')->get();
    $services=DB::table('services')->get();
    $contacts=DB::table('contacts')->get();
    $setting=DB::table('settings')->get()->first();
    $software_apps=DB::table('applications')->where('category','5')->get();
    $developer_apps=DB::table('applications')->where('category','3')->get();
@endphp
<section id="contact-parts">
    <div class="container-fluid">
    @php
        $i=1;
        $j=1;
    @endphp
    @forelse($contacts as $contact)
        @if(($i++)%2!=0)
            <div class="col-sm-6 contact-p wow slideInLeft" data-wow-duration="1s">
                <h2>{!! $contact->icon !!}   {{$contact->title}} : {{$contact->phone_text_email}}</h2>
            </div>
        @else
            <div class="col-sm-6 contact-q wow slideInLeft" data-wow-duration="1s">
                <h2>{!! $contact->icon !!}   {{$contact->title}} : {{$contact->phone_text_email}}</h2>
            </div>
        @endif
        @if(($j++)==2)
            @break
        @endif
    @empty
        <div class="col-sm-12 wow slideInLeft" data-wow-duration="1s">
            <h2>Nothing is found</h2>
        </div>
    @endforelse
    </div>
</section>
<!-- end of first section -->
<footer>
    <div class="container-fluid footer-fluid">
        <div class="container-fluid partners">
            <div class="owl-client owl-carousel">
                @forelse($partners as $partner)
                    <div class="col">
                        <a href="#">
                            <img height="80" class="img-fluid d-block mx-auto" src="{{asset('/storage')}}/{{$partner->logo}}" alt="">
                        </a>
                    </div>
                @empty
                    <div class="col">
                        There is no partner of this business found
                    </div>
                @endforelse

            </div>
        </div>
        <div class="row">
            <!-- row -->
            <div class="col-lg-3 col-md-3 col-sm-3 wow slideInLeft" data-wow-duration="1s">
                <!-- widgets column left -->
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->
                        <h2 class="title-widget">ABOUT {{$setting->title}}</h2>
                        <p>{!! $setting->description !!}</p>
                    </li>
                </ul>
            </div>
            <!-- widgets column left end -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 wow slideInDown" data-wow-duration="2s">
                <!-- widgets column left -->
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_nav_menu">
                        @php
                            $i=1;
                        @endphp
                        <h2 class="title-widget">Services</h2>
                        <ul>
                            @forelse($services as $service)
                                <li><a href="{{route('single_service',$service->id)}}"><i class="fa fa-angle-right"></i> {{$service->service}}</a></li>
                                @if(($i++)==10)
                                    @break
                                @endif
                            @empty
                                <li>There is no service found</li>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 wow slideInDown" data-wow-duration="3s">
                <!-- widgets column left -->
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->
                        <h2 class="title-widget">Applications</h2>
                        <ul>
                            @php
                                $i=1;
                            @endphp
                            @forelse($applications as $application)
                                <li><a href="{{route('single_app',$application->id)}}"><i class="fa fa-angle-right"></i> {{$application->title}}</a></li>
                                @if(($i++)==10)
                                    @break
                                @endif
                            @empty
                                <li>There is no products found</li>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </div>



            <!-- widgets column left end -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 wow slideInRight" data-wow-duration="2s">
                <!-- widgets column center -->
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_recent_news">
                        <!-- widgets list -->
                        <h2 class="title-widget">Contact </h2>
                        <div class="footerp">
                            <h1><img src="{{asset('/storage')}}/{{$setting->logo}}"/></h1>
                            <br>
                            <h2 class="title-median">{{$setting->typing}}</h2>
                            @php
                                $i=1;
                            @endphp
                            @forelse($contacts as $contact)
                                @if(($i++)==1)
                                    <p>{{$contact->title}}: <a href="#">{{$contact->phone_text_email}}</a></p>
                                @elseif(($i++)>1)
                                    <p>{{$contact->title}}: {{$contact->phone_text_email}}</p>
                                @endif
                            @empty
                                <p>There is no contact information found</p>
                            @endforelse
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="footer-bottom">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 half">

                <div class="copyright wow slideInUp">

                    � 2019 All rights reserved <a href="#">CloudFective</a> & <a href="#">HSBLCO Solution</a>

                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 half">

                <div class="design wow slideInUp">
                    <a href="#">Terms of Use</a> | <a href="#"> Privacy Policy</a> | <a href="#"> Sitemap</a>
                </div>
            </div>

        </div>

    </div>

</div>
        <!-- ===== FOOTER / END ===== -->

     <!-- javascript -->
     <script
     			  src="https://code.jquery.com/jquery-3.4.1.min.js"
     			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
     			  crossorigin="anonymous"></script>
    <script src="{{asset('MainView/javascript/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('MainView/javascript/jquery.scroll-with-ease.min.js')}}"></script>
    <script src="{{asset('MainView/javascript/parallax.js')}}"></script>
    <script src="{{asset('MainView/javascript/handleCounter.js')}}"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="{{asset('MainView/javascript/bootsnav.js')}}"></script>
    <script src="{{asset('MainView/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('MainView/javascript/javascript.js')}}"></script>
    <script src="{{asset('MainView/javascript/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('MainView/javascript/customcarousel.js')}}"></script>
    <script src="{{asset('MainView/javascript/wow.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
        <script>new WOW().init();</script>
        @yield('footer_scripts')

        <!-- javascript -->
    </body>

    </html>
