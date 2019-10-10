<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    @if($number==1)
    <link rel="shortcut icon" href="{{asset('/storage')}}/{{$setting->logo}}">
    <title>{{$setting->title}}</title>
    @endif
    <!-- page title -->
    <!-- page title -->
    <!-- owl carousel-->

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
    {{-- <link href="{{asset('MainView/fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/taher.js')}}"></script>
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900|Noto+Sans:400,700|Nunito+Sans:400,400i,600,600i,700,700i,800,900,900i" rel="stylesheet">
</head>

<body>


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
                <p>A CloudFectiv and HSBLCO Joint Venture</p>
            </div>
            <div class="col-sm-6 col-xs-12">
                <ul class="new-links">
                  @php
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                  @endphp
                    <li class="n-l1">
                        <a href="{{ url('/cart') }}" class="position-relative">
                            <sup class="cart-no"> {{ total_cart_item() }}</sup><span><i class="fas fa-shopping-cart"></i></span> View Cart
                        </a>
                    </li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href={{ url('/register') }}>Register</a></li>
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
                <li class="dropdown active">
                    <a href="{{route('welcome')}}">Home</a>
                </li>

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
                                        <button class="btn button btn-sm white" type="button" name="button"> <a href="{{ url('/allapplications') }}">Show More</a> </button>
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
<button class="btn button btn-sm white" type="button" name="button"> <a href="{{ url('/allhostings') }}">Show More</a> </button>
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
        <style>
            .answer{
                padding:5px 5px 5px 0;
                display:none;
            }
        </style>
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
                <li class="query" id="query{{$j++}}"><a>{{$i++}}.  {{$why_faq->torq}}</a></li>
                <li class="answer" id="answer{{$k++}}"> {!! str_limit($why_faq->description,250) !!}</li>
            </ul>
            @endforeach
        </div>
    </div>
    <!-- End Side Menu -->
</nav>
<!-- End Navigation -->
<!-- home-header -->
<div class="new-header">
    <img src="{{asset('/storage')}}/{{$banner_img->image}}" alt="No image found" class="home-banner">
    <div class="container">
        <div class="col-lg-7 col-sm-12">
            <div class="text-content">
                <div class="typing-title wow slideInLeft">

                    <h2><span style="color: #ffffff;">{{$banner_img->title}}</span> {{$banner_img->sub_title}}</h2>
                    <h3>
                        {{-- <a href="#" class="typewrite" data-period="800" data-type='[ "One Stop Solution", "User friendly UI", "Cloud Applications", "Customized Solution" ]'> --}}
                        <a href="#" class="typewrite" data-period="800" data-type='[ {{$banner_img->typewrite}} ]'>
                            <span class="wrap"></span>
                        </a>
                    </h3>
                </div>
                <p>{!! $banner_img->description !!}</p>
                <ul class="new-header-list">
                @php
                    $i=1;
                @endphp
                @foreach($features as $feature)
                    <li>{{$feature->feature}}</li>
                    @if(($i++)==3)
                        @break
                    @endif
                @endforeach
                </ul>
                <div class="buttons">
                    <a href="#" class="btn button btn-lg btn-2 red wow slideInUp" data-wow-duration="1s">Get Started Now</a>
                    <a href="{{route('contact_view')}}" class="btn button btn-lg btn-2 dark wow slideInUp" data-wow-duration="2s">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="col-sm-5">

        </div>
    </div>
</div>
<!-- home-header -->

<!-- start of section -->
<div class="new-services">
    <div class="container">
        @php
            $i=1;
        @endphp
        @foreach($offer_categories as $offer_category)
        <a href="{{route('offer_per_cat',$offer_category->id)}}">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-3 icon-size pl-5 pt-5 text-white">{!! $offer_category->icon !!}</div>

                    <div class="text col-sm-9">
                        <h3>{{$offer_category->title}}</h3>
                        <p>{!! str_limit($offer_category->description,150) !!}</p>
                    </div>
                </div>
            </div>
        </a>

        @endforeach
    </div>
</div>
@if(session('success'))
    <script>
        swal({
            title:"Congrats!",
            text:"{{session('success')}}",
            icon:"success",
        })
    </script>
    @endif
<!-- end of section -->
@if((count($awesome_apps))>=1)
<section class="partners2">
    <div class="container">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 border-text">
            <h4>Cloud Factive Application</h4>
        </div>
        @foreach($awesome_apps as $awesome_app)
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 border-img">
            <a href="{{route('single_awesome_app',$awesome_app->id)}}">
                <img src="{{asset('/storage')}}/{{$awesome_app->image}}" class="img-responsive" alt="No Image Found">
            </a>
        </div>
        @endforeach
    </div>
</section>
@endif
<!-- section 1 -->
<section class="section-tabs">
    <div class="page-content tab-parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $i=1;
                        $t=2;
                        $h=1;
                        $l=1;
                    @endphp
                    <!--tabs square start-->
                    <section class="icon-box-tabs ">
                        <ul class="nav nav-pills">
                            @forelse($service_cats as $service_cat)
                                @if(($i++)==1)
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-{{$h++}}" aria-expanded="true">
                                        <h4 class="text-white">{!! $service_cat->icon !!}</h4>
                                        <p>{{$service_cat->category}}</p>
                                    </a>
                                </li>
                                @else
                                <li class="">
                                    <a data-toggle="tab" href="#tab-{{$t++}}" aria-expanded="false">
                                        <h4 class="text-white">{!! $service_cat->icon !!}</h4>
                                        <p>{{$service_cat->category}}</p>
                                    </a>
                                </li>
                                @endif
                                @if(($l++)==5)
                                    @break
                                @endif
                            @empty
                            <li class="">
                                <a data-toggle="tab" href="#tab-2" aria-expanded="false">
                                    <p>Nothing is found</p>
                                </a>
                            </li>
                            @endforelse
                        </ul>
                        @php
                            $j=1;
                            $l=1;
                            $k=2;
                        @endphp
                        <div class="panel-body">
                            <div class="tab-content">
                            @forelse($service_cats as $service_cat)
                            @php
                                $matches=DB::table('services')->where('category',$service_cat->id)->get();
                            @endphp
                                @if(($j++)==1)
                                    <div id="tab-{{$l++}}" class="tab-pane active wow slideInRight" data-wow-duration="1">
                                      <form class="" action="{{ url('/addtocart') }}" method="post">
                                        @csrf
                                        <div class="col-sm-7">
                                            <div class="heading-title-alt">
                                              <input type="hidden" name="product_title" value="{{$service_cat->title}}">
                                              <input type="hidden" name="product_id" value="{{$service_cat->id}}">
                                                <h2>{{$service_cat->title}}</h2>
                                            </div>
                                            <p class="parag">{!! $service_cat->description !!}</p>
                                            <div class="row">
                                                <div class="compare-hosting">
                                                    <div class="col-sm-6">
                                                        <ul>
                                                            @php
                                                                $i=1;
                                                            @endphp
                                                            @forelse($matches as $match)
                                                                <li>{{$match->service}}</li>
                                                                @if(($i++)==3)
                                                                    @break
                                                                @endif
                                                            @empty
                                                                <li>No services found</li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul>
                                                            @php
                                                                $m=1;
                                                                $n=1;
                                                            @endphp
                                                            @foreach($matches as $match)
                                                                @if(($m++)<=3)
                                                                    @continue
                                                                @endif
                                                                <li>{{$match->service}}</li>
                                                                @if(($n++)==3)
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_price" value="{{$service_cat->price}}">
                                            <h4>Starting From ${{$service_cat->price}}</h4>
                                            {{-- <a href="{{ url('add/cart') }}/{{ $service_cat->id }}" class="btn button btn-2 red btn-lg">Buy Now ndmncjn</a> --}}
                                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="img-shadow">
                                                <br>
                                                <input type="hidden" name="product_image" value="{{$service_cat->image}}">
                                                <img src="{{asset('/storage')}}/{{$service_cat->image}}" class="img-responsive" alt="No Image Found">
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                @else
                                    <div id="tab-{{$k++}}" class="tab-pane animated slideInRight">
                                      <form class="" action="{{ url('/addtocart') }}" method="post">
                                        @csrf
                                        <div class="col-sm-7">
                                            <div class="heading-title-alt">
                                              <input type="hidden" name="product_title" value="{{$service_cat->title}}">
                                              <input type="hidden" name="product_id" value="{{$service_cat->id}}">
                                                <h2>{{$service_cat->title}}</h2>
                                            </div>
                                            <p class="parag">{!! $service_cat->description !!}</p>
                                            <div class="row">
                                                <div class="compare-hosting">
                                                    <div class="col-sm-6">
                                                        <ul>
                                                            @php
                                                                $a=1;
                                                            @endphp
                                                            @forelse($matches as $match)
                                                                <li>{{$match->service}}</li>
                                                                @if(($a++)==3)
                                                                    @break
                                                                @endif
                                                            @empty
                                                                <li>No services found</li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul>
                                                            @php
                                                                $b=1;
                                                                $c=1;
                                                            @endphp
                                                            @foreach($matches as $match)
                                                                @if(($b++)<=3)
                                                                    @continue
                                                                @endif
                                                                <li>{{$match->service}}</li>
                                                                @if(($c++)==3)
                                                                    @break
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_price" value="{{$service_cat->price}}">
                                            <h4>Starting From ${{$service_cat->price}}</h4>
                                            {{-- <a href="{{ url('add/cart') }}/{{ $service_cat->id }}" class="btn button btn-2 red btn-lg">Buy Now jdjjd</a> --}}
                                            <button type="submit" name="button">Buy Now</button>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="img-shadow">
                                                <br>
                                                <input type="hidden" name="product_image" value="{{$service_cat->image}}">
                                                <img src="{{asset('/storage')}}/{{$service_cat->image}}" class="img-responsive" alt="No Image Found">
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                @endif
                            @empty
                                <div id="tab-2" class="tab-pane animated slideInRight">
                                    <div class="col-sm-12">
                                        <div class="heading-title-alt">
                                            <h2>There is nothing found</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforelse

                            </div>
                        </div>
                    </section>
                    <!--tabs square end-->

                </div>

            </div>
        </div>
    </div>
</section>
<!-- tabs  section -->
<!-- start of section -->
@php
    $i=1;
@endphp
<section class="why-tera">
    <div class="row2 justify-content-center px-5">
        <div class="default-title col-sm-12">
            <h3>{{$different_section->title}}</h3>
            <p>{!! $different_section->description !!}</p>
        </div>
        @forelse($diff_services as $diff_service)
            <div class="col-sm-4 wow slideInLeft">
                <div class="box sl1 fadesimple">
                    <h4 class="wt-1"> <font class="text-danger">{!! $diff_service->icon !!}</font> {{$diff_service->service}}</h4>
                    <hr>
                    @php
                        $match_id=DB::table('unique_service_features')->where('service',$diff_service->id)->get();
                    @endphp
                    <ul class="wt-list">
                        @forelse($match_id as $match)
                        <li class="wtl-1">{{$match->feature}}</li>
                        @empty
                        <li class="wtl-2">There is no feature found</li>
                        @endforelse
                    </ul>
                    <h4>Price:  <font class="text-danger">{{$diff_service->price}}</font></h4>
                    <form action="{{ url('/addtocart') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                          <input type="hidden" name="product_id" value="{{$diff_service->id}}">
                          <input type="hidden" name="product_title" value="{{$diff_service->service}}">
                          {{-- <input type="hidden" name="icon" value="{{$diff_service->icon}}"> --}}
                          <input type="hidden" name="product_price" value="{{$diff_service->price}}">
                          <input type="hidden" name="product_image" value="{{$diff_service->image}}">
                        </div>
                        <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                    </form>
                </div>
            </div>

        @empty
        <div class="col-sm-4 wow slideInUp" data-wow-duration="1s">
            <div class="box sl2 fadesimple">
                <h4 class="wt-2">There is no service found</h4>
            </div>
        </div>
        @endforelse
    </div>
</section>
<!-- end of section -->

@if((count($developer_apps))>=1)
<!-- section start here -->
<section class="list-part">
    <div class="row2 justify-content-center px-5">
        <div class="default-title col-sm-12">
            <h3>{{$develop_section->title}}</h3>
            <p>{!! $develop_section->description !!}</p>
        </div>
        <div class="col-sm-6 col-sm-6 col-xs-12 pl-1 wow slideInLeft">
            @php
                $i=1;
            @endphp
            @forelse($developer_apps as $developer_app)
                <div class="row mx-0 my-2">
                    <div class="col-sm-2 pt-4">
                        {{-- <font class="float-right icon-style rounded-0 p-4">
                            {!! $developer_app->icon !!}
                        </font> --}}
                        <img class="dev_img" src="{{asset('/storage')}}/{{$developer_app->image}}" alt="">
                    </div>
                    <div class="col-sm-10 pt-1">
                        <div class="text">
                            <a href="{{route('single_develop_app',$developer_app->id)}}"><h4>{{$developer_app->title}}</h4></a>
                            <p>{!! str_limit($developer_app->description,100) !!}</p>
                        </div>
                    </div>
                </div>
                @if(($i++)==4)
                    @break
                @endif
            @empty
                Nothing is found
            @endforelse
        </div>
        <div class="col-sm-6 col-sm-6 col-xs-12 pl-2 wow slideInRight">
            @php
                $j=1;
                $l=2;
                $m=3;
                $n=1;
                $k=1;
            @endphp
            @foreach($developer_apps as $developer_app)

                @if(($n++)<=4)
                    @continue
                @endif
            <div class="row mx-0 my-2">
                <div class="col-sm-2 pt-4">
                    {{-- <font class="float-right icon-style rounded-0 p-4">
                        {!! $developer_app->icon !!}
                    </font> --}}
                    <img class="dev_img" src="{{asset('/storage')}}/{{$developer_app->image}}" alt="">
                </div>
                <div class="col-sm-10 pt-1">
                    <div class="text">
                        <a href="{{route('single_develop_app',$developer_app->id)}}"><h4>{{$developer_app->title}}</h4></a>
                        <p>{!! str_limit($developer_app->description,100) !!}</p>
                    </div>
                </div>
            </div>
                @if(($j++)==4)
                    @break
                @endif
            @endforeach
        </div>
    </div>
    <br>
</section>
<!-- section end -->
@endif
<section class="arrow-f5-dark">
    <div class="arrow-red-top-dark"></div>
</section>
<!-- new section -->
<section class="red-section">
    <div class="container">
        <div class="col-sm-10">
            <h3>{{$full_managed_appCat->category}}</h3>
            <p>{!! str_limit($full_managed_appCat->description,200) !!}</p>
        </div>
        <div class="col-sm-2">
            <span class="on-salebtn"><a href="{{route('front_multipurpose_apps')}}" class="button btn btn-2 btn-lg">Quote</a> </span>
        </div>
    </div>
</section>
<!-- end of section -->
@php
    $stunning_section=DB::table('sections')->where('id','15')->first();
@endphp
<!-- section 2 -->
<section class="section2">
    <div class="container">
        <div class="title-new">
            <h2>{{$stunning_section->title}}</h2>
            <p>{!! str_limit($stunning_section->description) !!} </p>
        </div>
        <div class="row2 justify-content-center">
            @forelse($stunning_apps as $stunning_app)
            <div class="col-sm-4 my-4">
                <div class="box text-center pt-5">
                    <font class="stunning-icon text-white">{!! $stunning_app->icon !!}</font>
                    <a href="{{route('stunning_single_app',$stunning_app->id)}}"><h4 class="margin-top">{{$stunning_app->title}}</h4></a>
                    <p>{!! str_limit($stunning_app->description,200) !!}</p>
                </div>
            </div>
            @empty
            <div class="col-sm-4 ">
                <div class="box">
                    <h4>Nothing is found</h4>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>
<!-- section 2 end -->


<!-- start of section -->
<section class="arrow-f5-bg">
    <div class="arrow-white"></div>
</section>
<section class="df-media-3">
    @if(($number_tech)>=1)
    <div class="container">
        <div class="col-sm-5 wow slideInLeft">
            <div class="img-container">
                <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$latest_saas_tech->image}}" class="img-responsive">
            </div>
        </div>
        <div class="col-sm-7 wow slideInRight">
            <div class="text-container row2">
                <div class="col-sm-12 title">
                    <h3>{{$latest_saas_tech->title}}</h3>
                    <p>{!! str_limit($latest_saas_tech->description) !!}</p>
                </div>

                <div class="buttons col-sm-12">
                        <h5>Package Price: <font class="text-danger">{{$latest_saas_tech->price}}</font></h5>
                    <a href="{{ url('add/cart') }}/{{ $latest_saas_tech->id }}" class="btn button btn-2 red btn-lg">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="col-sm-12 text-center wow slideInLeft">
            <h4>There is no information found</h4>
        </div>
    </div>
    @endif
</section>
<!-- section end -->

<!-- start of section -->
<section id="features-list" class="features2">
    <div class="default-title">
        <h3> {{$service_feature_section->title}}</h3>
        <p>{!! str_limit($service_feature_section->description,150) !!}</p>
        <div class="line-title"></div>
        <div class="title-arrow"></div>
    </div>
    <div class="container feature-list-style">
        <div class="col-sm-4 fadesimple">
            <ul>
                @php
                    $i=1;
                @endphp
                @foreach($features as $feature)
                <li>{{$feature->feature}}</li>
                    @if(($i++)==4)
                        @break
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-sm-4 fadesimple">
            <ul>
                @php
                    $j=1;
                    $k=1;
                @endphp
                @forelse($features as $feature)
                    @if(($j++)<=4)
                        @continue
                    @endif

                    <li>{{$feature->feature}}</li>
                    @if(($k++)==4)
                        @break
                    @endif
                @empty
                <li>There is no feature found</li>
                @endforelse
            </ul>
        </div>
        <div class="col-sm-4 fadesimple">
            <ul>
                @php
                    $i=1;
                    $l=1;
                @endphp
                @foreach($features as $feature)
                    @if(($i++)<=8)
                        @continue
                    @endif
                    <li>{{$feature->feature}}</li>
                    @if(($l++)==4)
                        @continue
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!-- list container -->
</section>

<!-- section 1 -->
@php
    $why_saas_img=DB::table('banner_images')->where('id','5')->first();
@endphp
<section class="section1 whySaasApp">
    <img src="{{asset('/storage')}}/{{$why_saas_img->image}}" alt="No image found" class="why-saas-image">
    <div class="container-fluid">
        <div class="col-md-6 col-sm-12 text">
            <div class="parts">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-container">
                            <div class="title">
                                <h2>{{$why_saas_cat->category}}</h2>
                                <h3>{!! str_limit($why_saas_cat->description,150) !!}</h3>
                            </div>
                            <div class="line-title left"></div>
                            <div class="title-arrow-left"></div>
                            <div class="row">
                                <div class="col-sm-12 text-col">
                                    @forelse($why_saas_faqs as $why_saas_faq)
                                    <div class="row mx-0 my-2">
                                        <div class="col-sm-2 pt-4">
                                            <font class="float-right icon-style2 rounded-0 p-4">
                                                {!! $why_saas_faq->icon !!}
                                            </font>
                                        </div>
                                        <div class="col-sm-10 bg-transparent pt-1">
                                            <div class="text2 no-bg">
                                                <a href="{{route('frontend_single_faq',$why_saas_faq->id)}}"><h4>{{$why_saas_faq->title}}</h4></a>
                                                <p>{!! str_limit($why_saas_faq->description,100) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-lines">
                                        <h4>No Faqs are found</h4>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 hidden-sm no-padding arrow2">
            <div class="parts image">
            </div>
        </div>
    </div>
</section>
<!-- section 1 -->

<!-- section start here -->
<div class="home-boxes gray-bg">
    <div class="container">
        <div class="boxes-content row2 justify-content-center">
            <div class="default-title w-100 col-sm-12">
                <h3>{{$sale_section->title}}</h3>
                <p>{!! str_limit($sale_section->description,200) !!}</p>
            </div>
            @forelse($onSale_services as $onSale_service)
            <div class="col-sm-4 my-3">
                <div class="text-container pt-5">
                    <font class="easy-icon">{!! $onSale_service->icon !!}</font>
                    <h3 class="margin-top">{{$onSale_service->title}}</h3>
                    <div class="ss">
                      {!! str_limit($onSale_service->description, 200) !!}
                    </div><br>
                    <a href="{{route('single_onsale_app',$onSale_service->id)}}" class="button btn btn-lg btn-outline">Read More</a>
                </div>
            </div>
            @empty
            <div class="col-sm-12">
                <div class="text-container">
                    <h3>No services of on sale found</h3>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- end of section -->


<!-- table -->
<div class="table-pricing">
    <div class="container">
        <div class="default-title wow slideInDown">
            <h3>{{$plan_section->title}}</h3>
            <p>{!! str_limit($plan_section->description,250) !!}</p>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Package</th>
                            <th>Basic</th>
                            <th>Premium</th>
                            <th>Amount</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    @forelse($plans as $plan)
                      <form class="" action="{{ url('/addtocart') }}" method="post">
                        @csrf
                        <tr>
                          <input type="hidden" name="product_title" value="{{$plan->service}}">
                          <input type="hidden" name="product_id" value="{{$plan->id}}">
                            <td>{{$plan->service}}</td>
                            <td>{{$plan->package}}</td>
                            <td>{{$plan->basic}}</td>
                            <td>{{$plan->premium}}</td>
                            <input type="hidden" name="product_price" value="{{$plan->price}}">
                            <td>{{$plan->price}}</td>
                            <td>
                                <button type="submit" class="btn button btn-red radius5 btn-sm">Purchase Now</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">There is nothing found for service plan</td>
                        </tr>
                    </form>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table end-->


<!-- start of section -->
{{-- <section class="section-dd-ft">
    <div class="container fadesimple">
        @php
            $i=1;
        @endphp
        @forelse($abouts as $about)
            {{-- <div class="col-sm-3 overflow">
                <div class="row">
                    <div class="col-sm-3 icon-size pl-5 pt-4 text-white">{!! $about->icon !!}</div>

                    <div class="text col-sm-9">
                        <h3>{{$about->title}}</h3>
                        <p>{!! str_limit($about->description,200) !!}</p>
                    </div>

                </div>
            </div> --}}
            {{-- <div class="">

            </div>
            @if(($i++)==3)
                @break
            @endif
        @empty
        <div class="col-sm-12 overflow">
            <div class="text text-center">
                <h3>There is no about information found</h3>
            </div>
        </div>
        @endforelse
    </div>
    <!-- section -->
</section> --}}


<section class="subscribe-area pb-50 pt-70">
<div class="container">
	<div class="row">

					<div class="col-md-4">
						<div class="subscribe-text mb-15">

							<h2>NEWSLETTER</h2>
						</div>
					</div>
					<div class="col-md-8">
						<div class="subscribe-wrapper subscribe2-wrapper mb-15">
							<div class="subscribe-form">
								<form action="{{ url('/insert/newsletter') }}" method="post">
                  @csrf
									<input placeholder="enter your email address" type="email" name="email">
									<button>subscribe <i class="fas fa-long-arrow-alt-right"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>

</div>
</section>
<!-- end of section -->

<!-- faq -->
<section class="faq-new">
    <div class="container">
        <div class="row">
            <div class="title-new wow slideInDown">
                <h2>{{$faq_section->title}}</h2>
                <p>{!! str_limit($faq_section->description,250) !!} </p>
                <div class="line-title"></div>
                <div class="title-arrow"></div>
            </div>
            <div class="col-sm-5 wow slideInLeft">
                <div class="panel-group" id="accordion">
                    @php
                        $i=1;
                        $j=1;
                    @endphp
                    @forelse($frequent_faqs as $frequent_faq)

                    <div class="panel panel-default">
                        <div class="panel-heading faq{{$i++}}">
                            <h4 class="panel-title">
                                <a class="accordion-toggle">{{$frequent_faq->torq}}</a>
                            </h4>
                        </div>
                        <div id="collapse-answer{{$j++}}" class="collapse-answer">
                            <div class="panel-body">
                                <p>{!! $frequent_faq->description !!}</p>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="row2">
                        <div class="col-sm-12">

                                <h3 class="color-black">There is no faq found under this section</h3>

                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-sm-7 blog wow slideInRight">
                <div class="blog-container">
                    @php
                        $i=1;
                    @endphp
                    @forelse($blogs as $blog)
                        <div class="col-sm-6 blog1">
                            <img src="{{asset('/storage')}}/{{$blog->thumbnail}}" class="img-responsive blog-img" alt="No blog image found">
                            <span class="date">Posted: {{(new DateTime($blog->created_at))->format('d-m-Y')}}</span>
                            <h5>Blog Category: {{ (!empty($blog->rel_to_categories)?$blog->rel_to_categories->category:'') }}</h5>
                            <h5>Blog Category: {{ (!empty($blog->rel_to_writers)?$blog->rel_to_writers->name:'') }}</h5>
                            <p>{!! str_limit($blog->description,200) !!}</p>
                            <a href="#" class="btn button btn-sm btn-outline">Read More</a>
                        </div>
                        @if(($i++)==2)
                            @break
                        @endif
                    @empty
                    <div class="col-sm-6">
                        <p>There is no blog posted yet</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq end -->

<!-- start of section -->
<section class="arrow-f5-bg">
    <div class="arrow-white"></div>
</section>
<section id="testimonials-slide">
    <div class="container fadesimple">
        <div class="row">
            <div class='col-md-offset-2 col-md-8 text-center'>
                <div class="default-title">
                    <h3>WHAT OUR CUSTOMERS <span class="red-text">SAY</span></h3>
                </div>
            </div>
        </div>
        <hr>
        <div class='row'>
            <div class="col-sm-12">
                <div class="owl-testimonial owl-carousel owl-theme text-center wow slideInLeft">
                    <div class="row">
                        @forelse($cust_sayings as $cust_saying)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>{{$cust_saying->name}}</h2>
                                    <p>
                                        <i class="fa fa-quote-left text-danger"></i>
                                            {!! str_limit($cust_saying->description,350) !!}
                                        <i class="fa fa-quote-right text-danger"></i>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="client"><img height="200" src="{{asset('/storage')}}/{{$cust_saying->image}}" alt="No image found"></div>
                                    <h4>{{$cust_saying->designation}}</h4>
                                    {{-- <div class="rating">
                                        <span><img src="img/star/large_4.png" alt=""> (4/5)</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>There is no opinion of customer</h2>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- container -->
</section>
<!-- end of section -->

<!-- ===== FOOTER ===== -->
<!-- start of section -->
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
                            <img height="60" class="img-fluid d-block mx-auto" src="{{asset('/storage')}}/{{$partner->logo}}" alt="">
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
            <div class="col-lg-3 col-md-4 col-sm-3 wow slideInLeft" data-wow-duration="1s">
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
            <div class="col-lg-3 col-md-2 col-sm-3 col-xs-6 wow slideInDown" data-wow-duration="2s">
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
            <div class="col-lg-3 col-md-2 col-sm-3 col-xs-6 wow slideInDown" data-wow-duration="3s">
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
            {{-- <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 wow slideInDown" data-wow-duration="4s">
                <!-- widgets column left -->
                <ul class="list-unstyled clear-margins">
                    <!-- widgets -->
                    <li class="widget-container widget_nav_menu">
                        <!-- widgets list -->
                        <h2 class="title-widget">Development Platform</h2>
                        <ul>
                            @php
                                $i=1;
                            @endphp
                            @forelse($developer_apps as $developer_app)
                                <li><a href="{{route('single_develop_app',$developer_app->id)}}"><i class="fa fa-angle-right"></i> {{$developer_app->title}}</a></li>
                                @if(($i++)==10)
                                    @break
                                @endif
                            @empty
                                <li>There is no developing product found</li>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </div> --}}
            <!-- widgets column left end -->
            <div class="col-lg-3 col-md-2 col-sm-6 col-xs-6 wow slideInRight" data-wow-duration="2s">
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

                    © 2019 All rights reserved <a href="#">Saas Application</a>

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

<script src="{{asset('MainView/javascript/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('MainView/javascript/jquery.scroll-with-ease.min.js')}}"></script>
<script src="{{asset('MainView/javascript/parallax.js')}}"></script>
<script src="{{asset('MainView/javascript/bootsnav.js')}}"></script>
<script src="{{asset('MainView/js/bootstrap.min.js')}}"></script>
<script src="{{asset('MainView/javascript/javascript.js')}}"></script>
<script src="{{asset('MainView/javascript/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('MainView/javascript/customcarousel.js')}}"></script>
<script src="{{asset('MainView/javascript/wow.min.js')}}"></script>
<script src="{{asset('Admin/vendor/font-awesome-5/js/all.min.js')}}"></script>
<script>new WOW().init();</script>

<!-- javascript -->
</body>

</html>
