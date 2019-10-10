@extends('layouts.app');
@section('main_content')
    <!-- header -->
    <div class="jumbotron header-simple wordpress-header text-center">
        <img src="{{asset('/storage')}}/{{$matched_app->image}}" alt="No Image Found" class="software-img">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$matched_app->title}}</h2>
                    <p><a href="{{route('welcome')}}">Home</a> / {{$matched_app->title}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end of header -->

    <!-- start of section -->
    @if((count($features))>=1)
    <section id="features-list">
        <div class="default-title">
            <h3> "{{$matched_app->title}}" FEATURES </h3>
            <p>{!! str_limit($matched_app->description,150) !!}</p>
        </div>
        <div class="feature-list-style row2 justify-content-center">
            <div class="col-sm-4 fadesimple">
                <ul>
                    @php
                        $i=1;
                        $j=1;
                        $k=1;
                        $l=1;
                        $m=1;
                    @endphp
                    @foreach($features as $feature)
                        <li>{{$feature->feature}}</li>
                        @if(($i++)==4)
                            @break
                        @endif
                    @endforeach
                </ul>
            </div>
            @if((count($features))>4)
            <div class="col-sm-4 fadesimple">
                <ul>
                    @foreach($features as $feature)
                        @if(($j++)<=4)
                            @continue
                        @endif
                        <li>{{$feature->feature}}</li>
                        @if(($k++)==4)
                            @break
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
            @if((count($features))>8)
            <div class="col-sm-4 fadesimple">
                <ul>
                    @foreach($features as $feature)
                        @if(($l++)<=8)
                            @continue
                        @endif
                        <li>{{$feature->feature}}</li>
                        @if(($m++)==4)
                            @break
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <!-- list container -->
    </section>
    @else
    <section>
        <div class="row mx-0 my-5">
            <div class="col-lg-12 text-center">
                <h4>There is no feature in this application</h4>
            </div>
        </div>
    </section>
    @endif
    <!-- start of section -->
    <section class="pricing-columns pricing-section">
        <div class="default-title">
            <h3>{{$dedicated_section->title}}</h3>
            <p>{!! str_limit($dedicated_section->description,150) !!}</p>
        </div>
        <div class="container">
            <label class="toggler toggler--is-active" id="filt-monthly">Monthly</label>
            <div class="toggle">
                <input type="checkbox" id="switcher" class="check">
                <b class="b switch"></b>
            </div>
            <label class="toggler" id="filt-hourly">Yearly</label>
            <div id="monthly" class="wrapper-full">
                <div id="pricing-chart-wrap">
                    <div id="pricing-chart">
                        <div id="smaller-plans">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="11.99">11.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">mo</span>
                                    </div>
                                    <ul>
                                        <li class="list1">30GB SSD Space</li>
                                        <li class="list2">1024MB Memory</li>
                                        <li class="list3">1 Core vCPU</li>
                                        <li class="list4">1TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">50 E-mails</li>
                                        <li class="list7">50 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan offer">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="19.99">19.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">mo</span>
                                    </div>
                                    <ul>
                                        <li class="list1">50GB SSD Space</li>
                                        <li class="list2">2024MB Memory</li>
                                        <li class="list3">2 Core vCPU</li>
                                        <li class="list4">2TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">100 E-mails</li>
                                        <li class="list7">100 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="29.99">29.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">mo</span>
                                    </div>
                                    <ul>
                                        <li class="list1">100GB SSD Space</li>
                                        <li class="list2">4024MB Memory</li>
                                        <li class="list3">2 Core vCPU</li>
                                        <li class="list4">1.5TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">150 E-mails</li>
                                        <li class="list7">150 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="34.99">34.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">mo</span>
                                    </div>
                                    <ul>
                                        <li class="list1">200GB SSD Space</li>
                                        <li class="list2">4024MB Memory</li>
                                        <li class="list3">3 Core vCPU</li>
                                        <li class="list4">5TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">300 E-mails</li>
                                        <li class="list7">300 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="yearly" class="wrapper-full hide">
                <div id="pricing-chart-wrap">
                    <div id="pricing-chart">
                        <div id="smaller-plans">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="89.99">89.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">y</span>
                                    </div>
                                    <ul>
                                        <li class="list1">30GB SSD Space</li>
                                        <li class="list2">1024MB Memory</li>
                                        <li class="list3">1 Core vCPU</li>
                                        <li class="list4">1TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">50 E-mails</li>
                                        <li class="list7">50 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan offer">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="109.99">109.49</span>
                                        <span class="slash">/</span>
                                        <span class="month">y</span>
                                    </div>
                                    <ul>
                                        <li class="list1">50GB SSD Space</li>
                                        <li class="list2">2024MB Memory</li>
                                        <li class="list3">2 Core vCPU</li>
                                        <li class="list4">2TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">100 E-mails</li>
                                        <li class="list7">100 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="179.99">179.49</span>
                                        <span class="slash">/</span>
                                        <span class="month">y</span>
                                    </div>
                                    <ul>
                                        <li class="list1">100GB SSD Space</li>
                                        <li class="list2">4024MB Memory</li>
                                        <li class="list3">2 Core vCPU</li>
                                        <li class="list4">1.5TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">150 E-mails</li>
                                        <li class="list7">150 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="plan">
                                    <div class="price">
                                        <span class="dollar">$</span>
                                        <span class="amount" data-dollar-amount="219.99">219.99</span>
                                        <span class="slash">/</span>
                                        <span class="month">y</span>
                                    </div>
                                    <ul>
                                        <li class="list1">200GB SSD Space</li>
                                        <li class="list2">4024MB Memory</li>
                                        <li class="list3">3 Core vCPU</li>
                                        <li class="list4">5TB/mo Bandwidth</li>
                                        <li class="list5">Unlimited MySQL</li>
                                        <li class="list6">300 E-mails</li>
                                        <li class="list7">300 FTP Accounts</li>
                                        <li class="list8">Unlimited Free Support</li>
                                    </ul>
                                    <a class="button sign-up" href="#">Sign Up</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of section -->



    <!-- start of section -->
    <section class="parallax" data-speed="0.6">
        <div class="container">
            <div class="col-md-6 col-sm-8">
                <a href="#" class="btn btn-2 red btn-lg">Get Started Now</a>
            </div>
        </div>
    </section>
    <!-- end of section -->
<!------------start of section----------->
<section class="section-dd-ft">
    <div class="container fadesimple">
        @php
            $i=1;
            $j=1;
        @endphp
        @forelse($abouts as $about)
            @if(($j++)<=3)
                @continue
            @endif
            <div class="col-sm-4 overflow">
                <div class="row">
                    <div class="col-sm-3 icon-size pl-5 pt-4 text-white">{!! $about->icon !!}</div>

                    <div class="text col-sm-9">
                        <h3>{{$about->title}}</h3>
                        <p>{!! str_limit($about->description,200) !!}</p>
                    </div>
                </div>
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
</section>
<!-- end of section -->
    <section class="arrow-f5-bg">
        <div class="arrow-red"></div>
    </section>
    <!-- start of section -->
    <section>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="py-4">Have a look at more software available</h3>
            </div>
        </div>
    </section>
    @php
        $i=1;
        $j=1;
    @endphp
    @forelse($software_apps as $software_app)
        @if($software_app->id==$matched_app->id)
            @continue
        @endif
        @php
            $soft_features=DB::table('application_features')->where('application',$software_app->id)->get();
        @endphp
        @if(($i++)%2!=0)
            <section id="df-media">
              <form class="" action="{{ url('/addtocart') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple wow slideInLeft">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$software_app->title}}">
                              <input type="hidden" name="product_id" value="{{$software_app->id}}">
                              <input type="hidden" name="main_category" value="application">
                                <h3>{{$software_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($software_app->description,150) !!}</h5>
                            </div>
                            <ul>
                                @forelse($soft_features as $soft_feature)
                                <li>{{$soft_feature->feature}}</li>
                                @empty
                                <li>There is no feature found</li>
                                @endforelse
                            </ul>
                            <input type="hidden" name="product_price" value="{{$software_app->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">{{$software_app->price}}</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $software_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button type="submit" name="button">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$software_app->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$software_app->image}}" class="img-responsive">
                        </div>
                    </div>
                </div>
              </form>
            </section>


            <section class="trng-bg for-df">
                <div class="trng trng-df"></div>
            </section>
        @else
            <section id="df-media2">
              <form class="" action="{{ url('/addtocart') }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$software_app->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$software_app->image}}" class="img-responsive">
                        </div>
                        <div class="col-sm-6 fadesimple wow slideInRight">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$software_app->title}}">
                              <input type="hidden" name="product_id" value="{{$software_app->id}}">
                              <input type="hidden" name="main_category" value="application">

                                <h3>{{$software_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($software_app->description,150) !!}</h5>
                            </div>
                            <ul>
                                @forelse($soft_features as $soft_feature)
                                <li>{{$soft_feature->feature}}</li>
                                @empty
                                <li>There is no feature found</li>
                                @endforelse
                            </ul>
                            <input type="hidden" name="product_price" value="{{$software_app->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">{{$software_app->price}}</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $software_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                    </div>
                </div>
              </form>
            </section>
            <section class="trng-bg for-df">
                <div class="trng trng-df"></div>
            </section>
        @endif
    @empty
    <section id="df-media2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 fadesimple wow slideInRight">
                    <div class="default-title w-100 text-center">
                        <h3>There is no more software apps available</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforelse
    <!-- section end -->

    <!-- section start -->
    <section class="arrow-f5-bg">
        <div class="arrow-white"></div>
    </section>
    <!-- start of section -->

    <section id="section-05">
        <div class="default-title">
            <h3>{{$app_reasons->title}}</h3>
            <p>{!! str_limit($app_reasons->description,150) !!}</p>
        </div>
        <div class="container">
            <div class="row slideinup">
                @foreach($why_saas_faqs as $why_saas_faq)
                <div class="col-sm-3 my-3 col-xs-6 position-relative section-05-box pt-5">
                    <font class="reason-round">{!! $why_saas_faq->icon !!}</font>
                    <h3 class="margin-top2">{{$why_saas_faq->torq}}</h3>
                    <h4>{!! str_limit($why_saas_faq->description,150) !!}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of section -->


    <!-- start of section -->
    @if((count($soft_faqs))>=1)
    <section class="faq">
        <div class="default-title">
            <h3>ASK AND QUESTION</h3>
        </div>
        <div class="row2 justify-content-center faq-cf">
            @foreach($soft_faqs as $soft_faq)
            <div class="col-md-4 col-sm-6 col-xs-12 faq-text">
                <div class="box">
                    <h3>{{$soft_faq->torq}}</h3>
                    <p>{!! $soft_faq->description !!}</p>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    @endif
    <!-- end of section -->

    <!-- ===== FOOTER ===== -->
   @endsection
