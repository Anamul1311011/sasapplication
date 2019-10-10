@extends('layouts.app');
@section('main_content')
    <!-- header -->
    <div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Applications on sale</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$sale_app->title}}</p>
            </div>
        </div>
    </div>
</div>
    <!-- end of header -->


   <section id="df-media">
     <form class="" action="{{ url('/addtocart') }}" method="post">
       @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple wow slideInLeft">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$sale_app->title}}">
                              <input type="hidden" name="product_id" value="{{$sale_app->id}}">
                              <input type="hidden" name="main_category" value="application">
                                <h3>{{$sale_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($sale_app->description,150) !!}</h5>
                            </div>
                            <input type="hidden" name="product_price" value="{{$sale_app->price}}">
                            <h5 class="w-100 text-left pt-5">Price: <font class="text-danger">{{$sale_app->price}}</font></h5>
                            {{-- <a href="{{ 'add/cart' }}/{{ $sale_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$sale_app->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$sale_app->image}}" class="img-responsive">
                        </div>
                    </div>
                </div>
            </section>






    <!-- start of section -->
    @if((count($allSaleApps))>=2)
    <section>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="py-4">Have a look at remaining onsale applications</h3>
            </div>
        </div>
    </section>
    @php
        $i=1;
        $j=1;
    @endphp

    @foreach($allSaleApps as $hosting)
        @if($hosting->id==$sale_app->id)
            @continue
        @endif

        @if(($i++)%2!=0)
            <section id="df-media">
              <form class="" action="{{ url('/addtocart') }}" method="post">
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
                            <input type="hidden" name="product_price" value="{{$hosting->price}}">
                            <h5 class="w-100 text-left pt-5">Price: <font class="text-danger">{{$hosting->price}}</font></h5>
                            {{-- <a href="{{ 'add/cart' }}/{{ $hosting->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                           <input type="hidden" name="product_image" value="{{$hosting->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$hosting->image}}" class="img-responsive">
                        </div>
                    </div>
                </div>
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
                          <input type="hidden" name="product_image" value="{{$hosting->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$hosting->image}}" class="img-responsive">
                        </div>
                        <div class="col-sm-6 fadesimple wow slideInRight">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$hosting->title}}">
                              <input type="hidden" name="product_id" value="{{$hosting->id}}">
                              <input type="hidden" name="main_category" value="hosting">
                                <h3>{{$hosting->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($hosting->description,150) !!}</h5>
                            </div>
                            <input type="hidden" name="product_price" value="{{$hosting->price}}">
                            <h5 class="w-100 text-left mt-4 pt-5">Price: <font class="text-danger">{{$hosting->price}}</font></h5>
                            {{-- <a href="{{ 'add/cart' }}/{{ $hosting->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                    </div>
                </div>
              </form>
            </section>

        @endif

    @endforeach
    @endif
    <!-- section end -->






    <!-- start of section -->

    <!-- end of section -->

    <!-- ===== FOOTER ===== -->
   @endsection
