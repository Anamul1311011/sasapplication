@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Applications</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  Applications</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $j=1;
    $categories=DB::table('application_categories')->get();
@endphp
    <!-- start of section -->
@forelse($categories as $category)
    <section class="why-tera">
        <div class="row2 justify-content-center px-5">
            <div class="default-title col-sm-12 w-100">
                <h3>{{$category->category}}</h3>
                <p>{!! str_limit($category->description,120) !!}</p>
            </div>
            @php
                $match_id=DB::table('applications')->where('category',$category->id)->get();
            @endphp
            @forelse($match_id as $match)
                <div class="col-sm-4 my-3 wow slideInLeft">
                    <div class="box sl1 fadesimple">
                        <h4 class="wt-1"> <font class="text-danger">{!! $match->icon !!}</font> {{$match->title}}</h4>
                        <h4 class="wt-1 ml-4">Unit Price: {{$match->price}}</h4>
                        <hr>
                        @php
                            $options=DB::table('application_features')->where('application',$match->id)->get();
                        @endphp
                        <ul class="wt-list">
                            @forelse($options as $option)
                            <li class="wtl-1">{{$option->feature}}</li>
                            @empty
                            <li class="wtl-2">There is nothing found</li>
                            @endforelse
                        </ul>
                        <a href="{{ url('add/cart') }}/{{ $category->id }}" class="btn button btn-lg btn-2 red">Buy Now</a>
                    </div>
                </div>
            @empty
                <div class="col-sm-12 wow slideInUp" data-wow-duration="1s">
                    <div class="box sl2 text-center fadesimple">
                        <h4 class="wt-1">There is no application found under this category</h4>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@empty
<section>
    <div class="row">
        <div class="col-lg-12">
            <h3>There is no application found yet</h3>
        </div>
    </div>
</section>
@endforelse
    <!-- end of section -->


<!-- ===== FOOTER ===== -->
@endsection
