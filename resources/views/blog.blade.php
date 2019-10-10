@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Blog</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  Blog</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $j=1;
@endphp
    <!-- start of section -->
@forelse($blogs as $blog)
    <!-- start of section -->
    @if(($j++)%2!=0)
    <section class="media-code-2">
        <div class="container fadesimple wp-con1">
            <div class="row">
                <div class="col-sm-6 col-xs-6 mi">
                    <img src="{{asset('/storage')}}/{{$blog->thumbnail}}" class="img-responsive2" alt="No thumbnail image found">
                </div>
                <div class="col-sm-6 col-xs-6 wp-text wow slideInRight">
                    <h4>Blog Category: {{$blog->rel_to_categories->category}}</h4>
                    <h6>Written By: {{$blog->rel_to_writers->name}}</h6>
                    <p>{!! str_limit($blog->description,450) !!}</p>
                    <a href="#" class="btn button btn-2 red btn-lg">Read More</a>
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
        <div class="container fadesimple wp-con1">
            <div class="row">
                <div class="col-sm-6 col-xs-6 wp-text wow slideInLeft">
                    <h4>Blog Category: {{$blog->rel_to_categories->category}}</h4>
                    <h6>Written By: {{$blog->rel_to_writers->name}}</h6>
                    <p>{!! str_limit($blog->description,450) !!}</p>
                    <a href="#" class="btn button btn-2 red btn-lg">Read More</a>
                </div>
                <div class="col-sm-6 col-xs-6 mi">
                    <img src="{{asset('/storage')}}/{{$blog->thumbnail}}" class="img-responsive2" alt="No thumbnail image found">
                </div>
            </div>
        </div>
        <!-- container -->
    </section>
    <section class="trng-bg for-df">
        <div class="trng trng-df"></div>
    </section>
    @endif
@empty
<section>
    <div class="row">
        <div class="col-lg-12">
            <h3>There is no blog found yet</h3>
        </div>
    </div>
</section>
@endforelse
    <!-- end of section -->





 <!-- ===== FOOTER ===== -->
@endsection