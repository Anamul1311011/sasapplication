@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Mobile Apps</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  Mobile Apps</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $i=1;
    $mobile_apps=DB::table('applications')->where('category','7')->get();
@endphp
<!-- start of section -->
@foreach($mobile_apps as $mobile_app)
    @if(($i++)%2!=0)
    <section class="media-code-2">
      <form class="" action="{{ '/addtocart' }}" method="post">
        @csrf
        <div class="container fadesimple wp-con1">
            <div class="row">
                <div class="col-sm-6 col-xs-6 mi">
                  <input type="hidden" name="product_image" value="{{$mobile_app->image}}">
                  <input type="hidden" name="main_category" value="application">
                    <img src="{{asset('/storage')}}/{{$mobile_app->image}}" class="img-responsive" alt="No image found">
                </div>
                @php
                    $features=DB::table('application_features')->where('application',$mobile_app->id)->get();
                @endphp
                <div class="col-sm-6 col-xs-6 wp-text wow slideInRight">
                  <input type="hidden" name="product_title" value="{{$mobile_app->title}}">
                  <input type="hidden" name="product_id" value="{{$mobile_app->id}}">
                  <input type="hidden" name="main_category" value="application">
                    <h2>{{$mobile_app->title}}</h2>
                    <p>{!! str_limit($mobile_app->description,250) !!}</p>
                    <ul class="wt-list">
                        @forelse($features as $feature)
                        <li class="wtl-1">{{$feature->feature}}</li>
                        @empty
                        <li class="wtl-2">There is no feature found </li>
                        @endforelse
                    </ul>
                    <input type="hidden" name="product_price" value="{{$mobile_app->price}}">
                    <p>Unit Price  {{$mobile_app->price}}</p>
                    {{-- <a href="{{ url('add/cart') }}/{{ $mobile_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                    <button type="submit" name="button">Buy Now</button>
                </div>
            </div>
        </div>
        <!-- container -->
        </form>
    </section>
    <!-- end of section -->
    <section class="trng-bg for-df">
        <div class="trng trng-df"></div>
    </section>
    @else
    <section class="media-code-1">
      <form class="" action="{{ '/addtocart' }}" method="post">
        @csrf
        <div class="container fadesimple wp-con1">
            <div class="row">

                <div class="col-sm-6 col-xs-6 wp-text wow slideInLeft">
                  <input type="hidden" name="product_title" value="{{$mobile_app->title}}">
                  <input type="hidden" name="product_id" value="{{$mobile_app->id}}">
                  <input type="hidden" name="main_category" value="application">
                    <h2>{{$mobile_app->title}}</h2>
                    <p>{!! str_limit($mobile_app->description,250) !!}</p>
                    <ul class="wt-list">
                        @forelse($features as $feature)
                        <li class="wtl-1">{{$feature->feature}}</li>
                        @empty
                        <li class="wtl-2">There is no feature found </li>
                        @endforelse
                    </ul>
                    <input type="hidden" name="product_price" value="{{$mobile_app->price}}">
                    <p>Unit Price  {{$mobile_app->price}}</p>
                    {{-- <a href="{{ url('add/cart') }}/{{ $mobile_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                    <button type="submit" name="button">Buy Now</button>
                </div>
                <div class="col-sm-6 col-xs-6 mi">
                  <input type="hidden" name="product_image" value="{{$mobile_app->image}}">
                    <img src="{{asset('/storage')}}/{{$mobile_app->image}}" class="img-responsive" alt="No image found">
                </div>
            </div>
        </div>
        <!-- container -->
        </form>
    </section>
    <section class="trng-bg for-df">
        <div class="trng trng-df"></div>
    </section>
    @endif
@endforeach
    <!-- end of section -->

    @php
        $web_serve_reasons=DB::table('faqs')->where('category','8')->get();
    @endphp
        <!-- start of section -->
        <section class="web-header" data-speed="0.4">
            <div class="row2 justify-content-center" style="padding:10px 80px;">
                @forelse($web_serve_reasons as $web_serve_reason)
                <div class="col-sm-6 col-xs-12 px-4">
                    <div class="box-container fadesimple">
                        {{-- <h3>Some major reasons</h3> --}}
                        <h2>{{$web_serve_reason->torq}}</h2>
                        <div class="sss">{!! $web_serve_reason->description !!}</div>
                        <a href="{{ url('/applications/front_multipurpose_apps') }}" class="btn button btn-2">Get a free Quote</a>
                    </div>
                </div>
                @empty
                <div class="col-sm-12">There is no reason found</div>
                @endforelse
            </div>
        </section>
        <!-- end of section -->
        @php
            $j=1;
            $section=DB::table('sections')->where('id','16')->first();
            $unique_services=DB::table('services')->where('category','8')->get();
        @endphp

        <!-- start of section -->
        <section class="why-tera">
            <div class="row2 justify-content-center px-5">
                <div class="default-title col-sm-12">
                    <h3>{{$section->title}}</h3>
                    <p>{!! str_limit($section->description,120) !!}</p>
                </div>
                @forelse($unique_services as $unique_service)
                    <div class="col-sm-4 wow slideInLeft">
                      <form class="" action="{{ '/addtocart' }}" method="post">
                        @csrf
                        <div class="box sl1 fadesimple">
                          <input type="hidden" name="product_title" value="{{$unique_service->service}}">
                          <input type="hidden" name="product_id" value="{{$unique_service->id}}">
                          <input type="hidden" name="main_category" value="service">
                            <h4 class="wt-1"> <font class="text-danger">{!! $unique_service->icon !!}</font> {{$unique_service->service}}</h4>
                            <hr>
                            @php
                                $match_id=DB::table('service_options')->where('service',$unique_service->id)->get();
                            @endphp
                            <ul class="wt-list">
                                @forelse($match_id as $match)
                                <li class="wtl-1">{{$match->option}}</li>
                                @empty
                                <li class="wtl-2">There is nothing found</li>
                                @endforelse
                            </ul>
                            <input type="hidden" name="product_price" value="{{$unique_service->price}}">
                            <h4>Price: <font class="text-danger">{{$unique_service->price}}</font></h4>
                            {{-- <a href="{{ url('add/cart') }}/{{ $unique_service->id }}" class="btn button btn-lg btn-2 red">Buy Now</a> --}}
                            <button type="submit" name="button">Buy Now</button>
                        </div>
                        </form>
                    </div>
                    @if(($j++)==3)
                        @break
                    @endif
                @empty
                <div class="col-sm-4 wow slideInUp" data-wow-duration="1s">
                    <div class="box sl2 fadesimple">
                        <h4 class="wt-2">There is nothing found</h4>
                    </div>
                </div>

                @endforelse
            </div>

        </section>
        <!-- end of section -->

    <div class="line-part"></div>

    <div class="line-part"></div>


    <!-- ===== FOOTER ===== -->
   @endsection
