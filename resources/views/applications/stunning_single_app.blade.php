@extends('layouts.app');
@section('main_content')
    <!-- header -->
    <div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Stunning Applicatins</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$stunning_app->title}}</p>
            </div>
        </div>
    </div>
</div>
    <!-- end of header -->


   <section id="df-media">
     <form class="" action="{{ '/addtocart' }}" method="post">
       @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple wow slideInLeft">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$stunning_app->title}}">
                              <input type="hidden" name="product_id" value="{{$stunning_app->id}}">
                              <input type="hidden" name="main_category" value="application">
                                <h3>{{$stunning_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($stunning_app->description,150) !!}</h5>
                            </div>
                            <input type="hidden" name="product_price" value="{{$stunning_app->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">${{$stunning_app->price}}/Month</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $stunning_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$stunning_app->image}}">
                            <img class="stunning_img" alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$stunning_app->image}}" class="img-responsive">
                        </div>
                    </div>
                </div>
                </form>
            </section>






    <!-- start of section -->
    @if((count($allApps))>=2)
    <section>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="py-4">Have a look at other stunning applications</h3>
            </div>
        </div>
    </section>
    @php
        $i=1;
        $j=1;
    @endphp

    @foreach($allApps as $single_app)
        @if($single_app->id==$stunning_app->id)
            @continue
        @endif

        @if(($i++)%2!=0)
            <section id="df-media">
              <form class="" action="{{ '/addtocart' }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple wow slideInLeft">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$single_app->title}}">
                              <input type="hidden" name="product_id" value="{{$single_app->id}}">
                              <input type="hidden" name="main_category" value="stunning_application">
                                <h3>{{$single_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($single_app->description,150) !!}</h5>
                            </div>
                            <input type="hidden" name="product_price" value="{{$single_app->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">${{$single_app->price}}/Month</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $stunning_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                            <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                        </div>
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$single_app->image}}">
                            <img class="stunning_img" alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$single_app->image}}" class="img-responsive">
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
              <form class="" action="{{ '/addtocart' }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 fadesimple">
                          <input type="hidden" name="product_image" value="{{$single_app->image}}">
                            <img alt="Dedicated Hosting" src="{{asset('/storage')}}/{{$single_app->image}}" class="img-responsive">
                        </div>
                        <div class="col-sm-6 fadesimple wow slideInRight">
                            <div class="default-title">
                              <input type="hidden" name="product_title" value="{{$single_app->title}}">
                              <input type="hidden" name="product_id" value="{{$single_app->id}}">
                              <input type="hidden" name="main_category" value="stunning_application">
                                <h3>{{$single_app->title}}</h3>
                                <h5 class="w-100 text-left">{!! str_limit($single_app->description,150) !!}</h5>
                            </div>
                            <input type="hidden" name="product_price" value="{{$single_app->price}}">
                            <h5 class="w-100 text-left">Price: <font class="text-danger">${{$single_app->price}}/Month</font></h5>
                            {{-- <a href="{{ url('add/cart') }}/{{ $single_app->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
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
