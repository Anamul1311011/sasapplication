@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Application Offer</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$matched_offer->title}}</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $j=1;
@endphp
    <!-- start of section -->

    <section id="features-list">
      <form class="" action="{{ url('/addtocart') }}" method="post">
        @csrf
        <div class="default-title">
          <input type="hidden" name="product_title" value="{{$matched_offer->title}}">
          <input type="hidden" name="product_id" value="{{$matched_offer->id}}">
          <input type="hidden" name="main_category" value="application">
            <h3> {{$matched_offer->title}}</h3>
            <p>{!! $matched_offer->description !!}</p>
        </div>

        <div class="row2 justify-content-center">
            <div class="col-sm-4 text-center">
              <input type="hidden" name="product_price" value="{{$matched_offer->price}}">
                <h4>Unit Price {{$matched_offer->price}}</h4>
                {{-- <a href="{{ url('add/cart') }}/{{ $matched_offer->id }}" class="btn button btn-lg btn-2 red mt-3">Buyyyy Now</a> --}}
                <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
            </div>
        </div>
        <!-- list container -->
      </form>
    </section>



    <section class="why-tera">
      <form class="" action="{{ url('/addtocart') }}" method="post">
        @csrf
        <div class="row2 justify-content-center px-5">
            <div class="default-title col-sm-12 shadow-sm w-100">
                <h5 style="font-size:30px;">Another application offer(s)</h5>
            </div>

            @forelse($offers as $offer)
                @if($matched_offer->id==$offer->id)
                    @continue
                @endif
                <div class="col-sm-4 wow slideInLeft">
                    <div class="box sl1 fadesimple">
                      <input type="hidden" name="product_title" value="{{$offer->title}}">
                      <input type="hidden" name="product_id" value="{{$offer->id}}">
                      <input type="hidden" name="main_category" value="application">
                        <h4 class="wt-1"> {{$offer->title}}</h4>
                        <p> {!! $offer->description !!}</p>
                        <input type="hidden" name="product_price" value="{{$offer->price}}">
                        <h4 class="wt-1">Unit Price: <font class="text-danger">{{$offer->price}}</font></h4>
                        <hr>

                        {{-- <a href="{{ url('add/cart') }}/{{ $offer->id }}" class="btn button btn-lg btn-2 red">Buy Now</a> --}}
                        <button class="btn button btn-sm red" type="submit" name="button">Buy Now</button>
                    </div>
                </div>
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


    <!-- ===== FOOTER ===== -->
   @endsection
