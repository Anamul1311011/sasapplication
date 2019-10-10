@extends('layouts.app');
@section('main_content')
<!-- header -->
<div class="jumbotron header-simple1 contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <h2>An application of "{{$awesomes->rel_to_categories->category}}"</h2> --}}
                <p><a href="{{route('welcome')}}">Home</a> /  All Applications</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
<div class="row row equal">
      @forelse($allapplications as $application)
      <div class="col-md-4 mb-3">
        <div class="allapp">
          <h6 class="title">{{$application->title}}</h6>
          <div class="content">
              <img src="{{asset('/storage')}}/{{$application->image}}" alt="No image found" class="img-responsive">
              <h5>Starting from <b>{{$application->price}}</b></h5>
              <p>{!! str_limit($application->description,100) !!}</p>
              <a href="{{route('single_app',$application->id)}}" class="btn button btn-sm red">Buy Now</a>

          </div>
      </div>
        </div>
      @empty

      <div class="col-menu col-md-3 text-center">
          <h6 class="title">There is no application found</h6>
      </div>
      @endforelse
</div>
</div>
@endsection
<style media="screen">
.allapp{
  /* border: 1px solid #444; */
  height: 100%;
  width: 100%;
}

</style>
