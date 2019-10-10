@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>An application of "{{$awesomes->rel_to_categories->category}}"</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$awesomes->title}}</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->

@php
    $j=1;
    $features=DB::table('application_features')->where('application',$awesomes->id)->get();
@endphp
    <!-- start of section -->

    <section id="features-list">
      <form class="" action="{{ url('/addtocart') }}" method="post">
        @csrf

        <div class="default-title">
          <input type="hidden" name="product_title" value="{{$awesomes->title}}">
          <input type="hidden" name="product_id" value="{{$awesomes->id}}">
            <h3> {{$awesomes->title}}'s FEATURES</h3>
              <input type="hidden" name="product_image" value="{{$awesomes->image}}">
            <img class="awesome_image"  src="{{asset('/storage')}}/{{$awesomes->image}}" alt="No image found" class="img-responsive">

            <p>{!! str_limit($awesomes->description,150) !!}</p>
        </div>
        <div class="feature-list-style row2 justify-content-center">
            <div class="col-sm-4 fadesimple">
                <ul>
                    @php
                        $i=1;
                        $j=1;
                        $k=1;
                        $l=1;
                        $m=1;
                    @endphp
                    @forelse($features as $feature)
                        <li>{{$feature->feature}}</li>
                        @if(($i++)==4)
                            @break
                        @endif
                    @empty
                        <li>There is no feature found under this application</li>
                    @endforelse
                </ul>
            </div>
            @if((count($features))>4)
            <div class="col-sm-4 fadesimple">
                <ul>
                    @foreach($features as $feature)
                        @if(($j++)<=4)
                            @continue
                        @endif
                        <li>{{$feature->feature}}</li>
                        @if(($k++)==4)
                            @break
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
            @if((count($features))>8)
            <div class="col-sm-4 fadesimple">
                <ul>
                    @foreach($features as $feature)
                        @if(($l++)<=8)
                            @continue
                        @endif
                        <li>{{$feature->feature}}</li>
                        @if(($m++)==4)
                            @break
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="row2 justify-content-center">
            <div class="col-sm-4 pl-5">
                <h4 class=" ml-5">Unit Price ${{$awesomes->price}}/Year</h4>
                <input type="hidden" name="product_price" value="{{$awesomes->price}}">
                <input type="hidden" name="main_category" value="application">
                <button class="btn button btn-sm red" type="submit">Buy Now</button>
            </div>
        </div>
        <!-- list container -->
</form>
    </section>



    <section class="why-tera">
      <form class="" action="{{ url('/addtocart') }}" method="post">
        @csrf
        <div class="row2 justify-content-center px-5">
            <div class="default-title col-sm-12 w-100">
                <h3>Another apps of "{{$awesomes->rel_to_categories->category}}"</h3>
                <p>{!! str_limit($awesomes->rel_to_categories->description,120) !!}</p>
            </div>
            @php
                $match_id=DB::table('applications')->where('category',$awesomes->category)->get();
            @endphp
            @forelse($match_id as $match)
                @if($match->id==$awesomes->id)
                    @continue
                @endif
                <div class="col-sm-4 wow slideInLeft">
                    <div class="box sl1 fadesimple">
                      <input type="hidden" name="product_title" value="{{$match->title}}">
                      <input type="hidden" name="product_id" value="{{$match->id}}">
                      <input type="hidden" name="main_category" value="application">
                        <h4 class="wt-1"> <font class="text-danger">{!! $match->icon !!}</font> {{$match->title}}</h4>
                        <input type="hidden" name="product_price" value="{{$match->price}}">
                        <h4 class="wt-1 ml-4">Unit Price: <font class="text-danger">{{$match->price}}</font></h4>
                        <hr>
                        @php
                            $options=DB::table('application_features')->where('application',$match->id)->get();
                        @endphp
                        <ul class="wt-list">
                            @forelse($options as $option)
                            <li class="wtl-1">{{$option->feature}}</li>
                            @empty
                            <li class="wtl-2">There is no feature found</li>
                            @endforelse
                        </ul>
                        {{-- <a href="{{ url('add/cart') }}/{{ $match->id }}" class="btn button btn-lg btn-2 red">Buy Now</a> --}}
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
