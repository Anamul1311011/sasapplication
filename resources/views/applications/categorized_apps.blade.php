@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$category->category}}</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$category->category}}</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $j=1;
    $categories=DB::table('service_categories')->get();
@endphp
    <!-- start of section -->
@forelse($apps as $offer)
    @if(($j++)%2!=0)
    <section class="media-code-2">
      <form class="" action="{{ url('/addtocart') }}" method="post">

      </form>
        <div class="container fadesimple wp-con1">
            <div class="row">
                <div class="col-sm-6 col-xs-6 mi">
                  <input type="hidden" name="product_image" value="{{$offer->image}}">
                    <img src="{{asset('/storage')}}/{{$offer->image}}" class="img-responsive2" alt="No image found">
                </div>

                <div class="col-sm-6 col-xs-6 wp-text wow slideInRight">
                  <input type="hidden" name="product_title" value="{{$offer->title}}">
                  <input type="hidden" name="product_id" value="{{$offer->id}}">
                  <input type="hidden" name="main_category" value="application">
                    <h2>{{$offer->title}}</h2>
                    <p>{!! $offer->description !!}</p>
                    <input type="hidden" name="product_price" value="{{$offer->price}}">
                    <p>Unit Price  <font class="text-danger">{{$offer->price}}</font></p>
                    {{-- <a href="{{ url('add/cart') }}/{{ $offer->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                     <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                </div>
            </div>
        </div>
        <!-- container -->
    </section>
    <!-- end of section -->
    <section class="trng-bg for-df">
        <div class="trng trng-df"></div>
    </section>
    @else
    <section class="media-code-1">
      <form class="" action="{{ url('/addtocart') }}" method="post">
        <div class="container fadesimple wp-con1">
            <div class="row">
                <div class="col-sm-6 col-xs-6 wp-text wow slideInLeft">
                  <input type="hidden" name="product_title" value="{{$offer->title}}">
                  <input type="hidden" name="product_id" value="{{$offer->id}}">
                  <input type="hidden" name="main_category" value="application">
                    <h2>{{$offer->title}}</h2>
                    <p>{!! $offer->description !!}</p>
                      <input type="hidden" name="product_price" value="{{$offer->price}}">
                    <p>Unit Price  <font class="text-danger">{{$offer->price}}</font></p>
                    {{-- <a href="{{ url('add/cart') }}/{{ $offer->id }}" class="btn button btn-2 red btn-lg">Buy Now</a> --}}
                     <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                </div>
                <div class="col-sm-6 col-xs-6 mi">
                  <input type="hidden" name="product_image" value="{{$offer->image}}">
                    <img src="{{asset('/storage')}}/{{$offer->image}}" class="img-responsive2" alt="No image found">
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
@empty
<section>
    <div class="row">
        <div class="col-lg-12">
            <h3>There is no service offer found yet</h3>
        </div>
    </div>
</section>
@endforelse
    <!-- end of section -->


    <!-- ===== FOOTER ===== -->
   @endsection
