@extends('layouts.app');
@section('main_content')


@if($errors->any())
    <script>
        swal({
            title:"Oops! Something went wrong!",
            text:"Please check",
            icon:"warning",
        })
    </script>
@endif

@if(session('insert'))
    <script>
        swal({
            title:"Congrats!",
            text:"{{session('insert')}}",
            icon:"success",
        })
    </script>
@endif


@php
    $web_serve_reasons=DB::table('faqs')->where('category','7')->get();
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
    $unique_service_section=DB::table('sections')->where('id','12')->first();
    $unique_services=DB::table('services')->where('category','7')->get();
@endphp
    <!-- start of section -->
    <section class="why-tera">
      <form class="" action="{{ '/addtocart' }}" method="post">
        @csrf
        <div class="row2 justify-content-center px-5">
            <div class="default-title col-sm-12">
                <h3>{{$unique_service_section->title}}</h3>
                <p>{!! str_limit($unique_service_section->description,120) !!}</p>
            </div>
            {{-- @php print_r($unique_services); @endphp --}}
            @forelse($unique_services as $unique_service)
                <div class="col-sm-4 wow slideInLeft">
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
                        <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                    </div>
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
        </form>
    </section>
    <!-- end of section -->

@php
    $t=1;
@endphp
    <!-- section start -->
    <section class="timeline">
      <form class="" action="{{ '/addtocart' }}" method="post">
        @csrf
        <div class="container">
            <ul class="timeline">
                @forelse($unique_services as $unique_service)
                @if(($t++)%2!=0)
                <li>
                    <div class="timeline-badge">{!! $unique_service->icon !!}</div>
                    <div class="timeline-panel fadesimple">
                        <div class="timeline-heading">
                          <input type="hidden" name="product_title" value="{{$unique_service->service}}">
                          <input type="hidden" name="product_id" value="{{$unique_service->id}}">
                          <input type="hidden" name="main_category" value="service">
                            <h4 class="timeline-title">{{$unique_service->service}}</h4>
                        </div>
                        <div class="timeline-body">
                            <p>{!! str_limit($unique_service->description,250) !!}</p>
                            {{-- <a href="{{ url('add/cart') }}/{{ $unique_service->id }}" class="btn button btn-lg btn-2 red mt-3">Buy Now</a> --}}
                            <input type="hidden" name="product_price" value="{{$unique_service->price}}">
                            <h4>Price: <font class="text-danger">{{$unique_service->price}}</font></h4>
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                    </div>
                </li>
                @else
                <li class="timeline-inverted fadesimple">
                    <div class="timeline-badge">{!! $unique_service->icon !!}</div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                          <input type="hidden" name="product_title" value="{{$unique_service->service}}">
                          <input type="hidden" name="product_id" value="{{$unique_service->id}}">
                          <input type="hidden" name="main_category" value="service">
                            <h4 class="timeline-title">{{$unique_service->service}}</h4>
                        </div>
                        <div class="timeline-body">
                            <p>{!! str_limit($unique_service->description,250) !!}</p>
                            {{-- <a href="{{ url('add/cart') }}/{{ $unique_service->id }}" class="btn button btn-lg btn-2 mt-3">Buy Now</a> --}}
                            <input type="hidden" name="product_price" value="{{$unique_service->price}}">
                            <h4>Price: <font class="text-danger">{{$unique_service->price}}</font></h4>
                            <button type="submit" name="button">Buy Now</button>
                        </div>
                    </div>
                </li>
                @endif
                @empty
                <li>
                    <div class="timeline-panel fadesimple">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">There is no web services available</h4>
                        </div>
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        </form>
    </section>
    <!-- end of section -->

    <section class="search-bar sb2">
        <div class="container sb">
            <div class="col-sm-3">
                <img src="img/other/domain.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-8">
                <!-- Search Form -->
                <form>
                    <!-- Search Field -->
                    <div class="row fadesimple">
                        <div class="default-title">
                            <h3>Begin the search for your domain</h3>
                            <p>Register your domain idea before anyone else does</p>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control bar" type="text" name="search" placeholder="Enter your domain name..." required/>
                                <span class="input-group-btn">
                            <button class="btn button btn-2 btn-lg">Search Domain</button>
                                </span>
                            </div>
                            <div class="ltds">
                                <div class="col-sm-2 col-xs-1 border-right1">
                                    <p>.com <span>$12.99</span></p>
                                </div>
                                <div class="col-sm-2 col-xs-1 border-right2">
                                    <p>.org <span>$9.99</span></p>
                                </div>
                                <div class="col-sm-2 col-xs-1 border-right3">
                                    <p>.net <span>$11.99</span></p>
                                </div>
                                <div class="col-sm-2 col-xs-1 border-right4">
                                    <p>.info <span>$6.99</span></p>
                                </div>
                                <div class="col-sm-2 col-xs-1 border-right5">
                                    <p>.us <span>$9.99</span></p>
                                </div>
                                <div class="col-sm-2 col-xs-1 border-right6">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <!-- End of Search Form -->
            </div>
        </div>
    </section>
    <!-- end of section -->

    <div class="line-part"></div>

    <!-- start of section -->
    @php
        $web_serve_glance=DB::table('sections')->where('id','13')->first();
    @endphp
    <section id="cl-web">
        <div class="default-title">
            <h3>{{$web_serve_glance->title}}</h3>
            <p>{!! str_limit($web_serve_glance->description,130) !!}</p>
        </div>
        <div class="container fadesimple">
            <div class="row2 justify-content-center fit-center-col-web">
                @forelse($unique_services as $unique_service)
                <div class="col-sm-12 col-xs-12 cl-box py-5 hvr-float-shadow">
                    <h3 class="text-danger mt-0" style="font-size:35px;">{!! $unique_service->icon !!}</h3>
                    <h3 class="mb-5">{{$unique_service->service}}</h3>
                    <p class="hidden-text mt-0">{!! str_limit($unique_service->description,120) !!}</p>
                </div>
                @empty
                <div class="col-sm-12 col-xs-6 cl-box hvr-float-shadow">
                    <h3>there is no web services available yet</h3>
                </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- end of sction -->

    <div class="line-part"></div>

    <!-- contact us -->
        <section id="contact-us">
            <div class="default-title">
                <h3>SEND A TICKET</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <!-- message content -->
            <div class="container fadesimple">
                <div class="col-sm-8">
                    <form action="{{route('send_message')}}" id="contact-form" method="post" name="contact-form">
                        @csrf
                        <div class="messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{old('first_name')}}" name="first_name" placeholder="Your firstname *" type="text">

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{old('last_name')}}" name="last_name" placeholder="Your lastname *" type="text">
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}" name="email" placeholder="Your email *" type="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone</label>
                                        <input class="form-control" name="phone" placeholder="Your phone" type="tel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message *</label>
                                        <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" placeholder="Message*" rows="4">{{old('message')}}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-warning btn-send" type="submit" value="Send message">
                                </div>
                            </div>
                            <div class="row"></div>
                        </div>
                    </form>
                </div>
                <!-- end of message content -->
                <div class="col-sm-4 contact-info">
                    <!-- header contact info -->
                    <div class="col-sm-12">
                        <hr>
                        <div class="col-sm-12">
                            @foreach($contacts as $contact)
                            <p>
                                <font class="mr-3 text-success font-weight-light">{!! $contact->icon !!}</font>
                                {{$contact->phone_text_email}}
                            </p>
                            @endforeach
                        </div>
                        <!-- end of header info -->
                    </div>
                </div>
            </div>
            <!-- container -->
        </section>


    <!-- ===== FOOTER ===== -->
   @endsection
