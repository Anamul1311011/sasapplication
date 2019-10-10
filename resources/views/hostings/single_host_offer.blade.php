@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Hosting Offer</h2>
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
        <div class="default-title">
            <h3> {{$matched_offer->title}}</h3>
            <p>{!! $matched_offer->description !!}</p>
        </div>
        <div class="feature-list-style row2 justify-content-center">
            <div class="col-sm-4 fadesimple">

            </div>

            <div class="col-sm-4 fadesimple">

            </div>
            <div class="col-sm-4 fadesimple">

            </div>
        </div>
        <div class="row2 justify-content-center">
            <div class="col-sm-4 text-center">
                <h4>Unit Price ${{$matched_offer->price}}/Year</h4>
                <a href="{{ url('add/cart') }}/{{ $matched_offer->id }}" class="btn button btn-sm red">Buy Now</a>
            </div>
        </div>
        <!-- list container -->
    </section>



    <section class="why-tera">
        <div class="row2 justify-content-center px-5">
            <div class="default-title col-sm-12 shadow-sm w-100">
                <h5 style="font-size:30px;">Another hosting offer(s)</h5>
            </div>

            @forelse($offers as $offer)
                @if($matched_offer->id==$offer->id)
                    @continue
                @endif
                <div class="col-sm-4 wow slideInLeft">
                    <div class="box sl1 fadesimple">
                        <h4 class="wt-1"> {{$offer->title}}</h4>
                        <p> {!! $offer->description !!}</p>
                        <h4 class="wt-1">Unit Price: <font class="text-danger">${{$offer->price}}/Year</font></h4>
                        <hr>

                        <a href="{{ url('add/cart') }}/{{ $offer->id }}" class="btn button btn-sm red">Buy Now</a>
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
    </section>


    <!-- end of section -->


    <!-- ===== FOOTER ===== -->
   @endsection
