@extends('layouts.app');
@section('main_content')
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About Us</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  About Us</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->
    
        <!-- endtry -->
        @php
            $setting=DB::table('settings')->get()->first();
        @endphp
        <div class="container entry">
            <div class="row">
                <div class="col-sm-12">
                    <h2>About <span>{{$setting->title}}</span></h2>
                    <p>{!! $setting->description !!}</p>
                </div>
            </div>
        </div>
        <!-- entry /end -->
    
        <!-- start of section -->
        <section id="about-people">
            <div class="default-title">
                <h3>Meet Our Lovely Team</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet libero sit labore.</p>
                <br>
            </div>
            <div class="container">
                <div class="row2 justify-content-center">
                    @forelse($members as $member)
                    <div class="col-sm-6 col-xs-6 ap-1 wow slideInUp">
                        <img class="about-image img-responsive img-rounded" alt="No image found" src="{{asset('/storage')}}/{{$member->image}}">
                        <h2>{{$member->name}}</h2>
                        <p><i>{{$member->designation}}</i></p>
                        
                            <a href="{{$member->f_link}}" class="icon-box" target="_blank">{!! $member->f_icon !!}</a>
                            <a href="{{$member->t_link}}" class="icon-box" target="_blank">{!! $member->t_icon !!}</a>    
                            <a href="{{$member->l_link}}" class="icon-box" target="_blank">{!! $member->l_icon !!}</a>
                            
                            
                        <p>{!! $member->description !!}</p>
                    </div>
                    @empty
                    <div class="col-sm-6 col-xs-6 ap-2 wow slideInUp" data-wow-duration="1s">
                        <h2>Rebeka Taylor</h2>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </section>
        <!-- end of section -->
        <section class="arrow-f5-bg">
            <div class="arrow-red-top"></div>
        </section>
@php
    $abouts=DB::table('abouts')->get();
    $i=1;
    $j=1;
@endphp        
<!-- start of section -->
<section class="section-dd-ft">
    <div class="container fadesimple">
        @php
            $i=1;
        @endphp
        @forelse($abouts as $about)
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
        @empty
        <div class="col-sm-12 overflow">
            <div class="text text-center">
                <h3>There is no about information found</h3>
            </div>
        </div>
        @endforelse
    </div>
    <!-- section -->
</section>
<!-- end of section -->
    
    
        <!-- our story section -->
        @php $i=1; $j=1; @endphp
        <section id="our-story" data-speed="0.5">
            <div class="container fadesimple">
                <div class="row2">
                    @foreach($abouts as $about)
                        @if(($j++)<=6)
                            @continue
                        @endif
                        @if(($i++)%2!=0)
                        <div class="col-md-6 shadow-sm my-5">
                            <img src="{{asset('/storage')}}/{{$about->image}}" class="img-responsive2" alt="No image found">
                        </div>
                        <div class="col-md-6 shadow-sm my-5">
                            <h1>{{$about->title}}</h1>
                            <h6>Last updated at: {{(new DateTime($about->created_at))->format('d-m-Y')}}</h6>
                            <p>{!! $about->description !!}</p>
                        </div>
                        @else
                        <div class="col-md-6 shadow-sm my-5">
                            <h1>{{$about->title}}</h1>
                            <h6>Last updated at: {{(new DateTime($about->created_at))->format('d-m-Y')}}</h6>
                            <p>{!! $about->description !!}</p>
                        </div>
                        <div class="col-md-6 shadow-sm my-5">
                            <img src="{{asset('/storage')}}/{{$about->image}}" class="img-responsive2" alt="No image found">
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end of our story -->
    
        <div class="padding20"></div>
    @php
        $abouts=DB::table('abouts')->get();
        $i=1;
        $j=1;
    @endphp
        <!-- start of section -->
        <section class="section-dd-ft2">
            <div class="container fadesimple">
                @foreach($abouts as $about)
                    @if(($j++)<=3)
                        @continue
                    @endif
                    <div class="col-sm-4 overflow">
                        <div class="text">
                            <h4 class="text-danger icon-size">{!! $about->icon !!}</h4>
                            <h3>{{$about->title}}</h3>
                            <h5>{!! str_limit($about->description,250) !!}</h5>
                        </div>
                    </div>
                    @if(($i++)==3)
                        @break
                    @endif
                @endforeach
            </div>
            <!-- section -->
        </section>
        <!-- end of section -->

        


    <!-- ===== FOOTER ===== -->
   @endsection