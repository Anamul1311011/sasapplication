@extends('layouts.app');
@section('main_content')
    <!-- header -->
    <div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$single_faq->rel_to_categories->category}}</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  {{$single_faq->title}}</p>
            </div>
        </div>
    </div>
</div>
    <!-- end of header -->

    
   <section id="df-media">
                
        <div class="container">
            <div class="row2">
                <div class="col-sm-12 text-center fadesimple wow slideInLeft">
                    
                        <h3 class="py-4"><font class="text-danger mr-3">{!! $single_faq->icon !!}</font>{{$single_faq->title}}</h3>
                        <h5 class="w-100 text-center">{!! str_limit($single_faq->description) !!}</h5>
                    
                </div>
                
            </div>
        </div>
    </section>

    



    
    <!-- start of section -->
@if((count($allFaqs))>=2)
    <section>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="py-4">Have a look at remaining FAQs</h3>
            </div>
        </div>
    </section>
    @php
        $i=1;
        $j=1;
    @endphp    
        
    <section id="df-media">
        
        <div class="container">
            <div class="row">
                @foreach($allFaqs as $faq)
                    @if($single_faq->id==$faq->id)
                        @continue
                    @endif
                    <div class="col-sm-6 fadesimple wow slideInLeft">
                        
                            <h3><font class="text-danger mr-3">{!! $faq->icon !!}</font>{{$faq->title}}</h3>
                            <h5 class="w-100 text-left">{!! str_limit($faq->description,150) !!}</h5>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
    <!-- section end -->

   
    
    


    <!-- start of section -->
    
    <!-- end of section -->

    <!-- ===== FOOTER ===== -->
   @endsection