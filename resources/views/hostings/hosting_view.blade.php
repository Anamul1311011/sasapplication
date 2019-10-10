@extends('layouts.app');
@section('main_content')

<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$matched_host->title}}</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$matched_host->title}}</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->



    <section id="features-list">
      <form class="" action="{{ '/addtocart' }}" method="post">
        @csrf
        <div class="default-title">
          <input type="hidden" name="product_title" value="{{$matched_host->title}}">
          <input type="hidden" name="product_id" value="{{$matched_host->id}}">
            <input type="hidden" name="main_category" value="hosting">
            <h3> {{$matched_host->title}}'s FEATURES </h3>
            <input type="hidden" name="product_image" value="{{$matched_host->image}}">
            <img class="host_img"  src="{{asset('/storage')}}/{{$matched_host->image}}" alt="No image found" class="img-responsive">
            <p>{!! str_limit($matched_host->description,150) !!}</p>
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
                    @forelse($features as $feature)
                        <li>{{$feature->feature}}</li>
                        @if(($i++)==4)
                            @break
                        @endif
                    @empty
                        <li>There is no feature found</li>
                    @endforelse
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
        <div class="row2 justify-content-center">
            <div class="col-sm-4 pl-5">
              <input type="hidden" name="product_price" value="{{$matched_host->price}}">
                <h4 class=" ml-5">Unit Price {{$matched_host->price}}</h4>
                {{-- <a href="{{ url(url('add/cart')) }}/{{ $matched_host->id }}" class="btn ml-5 button btn-lg btn-2 red mt-3">Buy Now</a> --}}
                <button class="btn button btn-sm red" type="submit">Buy Now</button>
            </div>
        </div>
        <!-- list container -->
          </form>
    </section>

    <!-- start of section -->
    <section class="pricing-columns pricing-section">
        <div class="default-title">
            <h3>Choose your perfect Dedicated Plan</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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
            <div class="col-md-6 col-sm-4"></div>
        </div>
    </section>
    <!-- end of section -->

    <!------------start of section----------->
    @if((count($abouts))>6)
<section class="section-dd-ft">
    <div class="container fadesimple">
        @php
            $i=1;
            $j=1;
        @endphp
        @foreach($abouts as $about)
            @if(($j++)<=6)
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
        @endforeach
    </div>
    <!-- section -->
</section>
@endif
    <!-- end of section -->



    <section class="arrow-f5-bg">
        <div class="arrow-red"></div>
    </section>
    <!-- start of section -->
    <section>

        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="py-4">Have a look at more hostings available</h3>
            </div>
        </div>
    </section>
    @php
        $i=1;
        $j=1;
    @endphp
    @forelse($hostings as $hosting)
        @if($hosting->id==$matched_host->id)
            @continue
        @endif
        @php
            $host_features=DB::table('hosting_features')->where('hosting',$hosting->id)->get();
        @endphp
        @if(($i++)%2!=0)
            <section id="df-media">
              <form class="" action="{{ '/addtocart' }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple wow slideInLeft">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$hosting->title}}">
                              <input type="hidden" name="product_id" value="{{$hosting->id}}">
                                    <input type="hidden" name="main_category" value="hosting">
                                <h3>{{$hosting->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($hosting->description,150) !!}</h5>
                            </div>
                            <ul>
                                @forelse($host_features as $host_feature)
                                <li>{{$host_feature->feature}}</li>
                                @empty
                                <li>There is no feature found</li>
                                @endforelse
                            </ul>
                            <input type="hidden" name="product_price" value="{{$hosting->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">{{$hosting->price}}</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $hosting->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$hosting->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$hosting->image}}" class="img-responsive">
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
              <form class="" action="{{ '/addtocart' }}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$hosting->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$hosting->image}}" class="img-responsive">
                        </div>
                        <div class="col-sm-6 fadesimple wow slideInRight">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$hosting->title}}">
                              <input type="hidden" name="main_category" value="hosting">
                                <h3>{{$hosting->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($hosting->description,150) !!}</h5>
                            </div>
                            <ul>
                                @forelse($host_features as $host_feature)
                                <li>{{$host_feature->feature}}</li>
                                @empty
                                <li>There is no feature found</li>
                                @endforelse
                            </ul>
                            <input type="hidden" name="product_price" value="{{$hosting->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">{{$hosting->price}}</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $hosting->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
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
    @php
        $host_reasons=DB::table('sections')->where('id','11')->first();
        $why_saas_hosts=DB::table('faqs')->where('category','5')->get();
    @endphp
    @if((count($why_saas_hosts))>=1)
    <section id="section-05">
        <div class="default-title">
            <h3>{{$host_reasons->title}}</h3>
            <p>{!! str_limit($host_reasons->description,150) !!}</p>
        </div>
        <div class="container">
            <div class="row2 justify-content-center slideinup">
                @foreach($why_saas_hosts as $why_saas_host)
                <div class="col-sm-3 my-3 col-xs-6 position-relative section-05-box pt-5">
                    <font class="reason-round">{!! $why_saas_host->icon !!}</font>
                    <h3 class="margin-top2">{{$why_saas_host->torq}}</h3>
                    <h4>{!! str_limit($why_saas_host->description,150) !!}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- end of section -->


    <!-- start of section -->
    @php
        $host_faqs=DB::table('faqs')->where('category','6')->get();
    @endphp
    @if((count($host_faqs))>=1)
    <section class="faq">
        <div class="default-title">
            <h3>ASK AND QUESTION</h3>
        </div>
        <div class="row2 justify-content-center faq-cf">
            @foreach($host_faqs as $host_faq)
            <div class="col-md-4 my-4 col-sm-6 col-xs-12 faq-text">
                <div class="box">
                    <h3>{{$host_faq->torq}}</h3>
                    <p>{!! str_limit($host_faq->description,350) !!}</p>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    @endif
    <!-- end of section -->

    <!-- ===== FOOTER ===== -->
   @endsection
