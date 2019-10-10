@extends('layouts.app');
@section('main_content')

<!-- header -->
<div class="jumbotron header-simple2 contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <h2>{{$matched_host->title}}</h2> --}}
                <p><a href="{{route('welcome')}}">Home</a> /  All Hosting</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->
<div class="container">
<div class="row2">
    @forelse($allhostings as $hosting)
        <div class="col-md-4 my-4">
            <h6 class="title">{{$hosting->title}}</h6>
            <div class="content">
                <img src="{{asset('/storage')}}/{{$hosting->image}}" alt="No image found" class="img-responsive">
                <h5>Starting from <b>{{$hosting->price}}</b></h5>
                <p>{!! str_limit($hosting->description,100) !!}</p>
                <a href="{{route('hosting_view',$hosting->id)}}" class="button btn btn-outline">Buy Now</a>
            </div>
        </div>
    @empty

    <div class="col-menu col-md-3 text-center">
        <h6 class="title">There is no hosting found</h6>
    </div>
    @endforelse
</div>

</div>
   @endsection
