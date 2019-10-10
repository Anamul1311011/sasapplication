@extends('layouts.app');
@section('main_content')
    <!-- header -->
    <div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>QUOTATION</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  Quotation</p>
            </div>
        </div>
    </div>
</div>
    <!-- end of header -->


                    <!-- /.feature-sections -->
                    <div class="container">
                    <div class="mt-5 mb-5">
                        <form action="{{ url('/insert/quotation') }}" method="post">
                          @csrf
                            <!-- service-form -->
                            <div class="service-form">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
                                      @if(session('success'))
                                                      <div class="alert alert-info">
                                                          {{ session('success') }}
                                                      </div>
                                                      @endif
                                        <h3>Get Affordable & Best IT Services</h3>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="name"></label>
                                            <input id="name" type="text" placeholder="First Name" class="form-control" name="f_name" required>
                                            <div class="form-icon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="name"></label>
                                            <input id="name" type="text" placeholder="Last Name" class="form-control" name="l_name" required>
                                            <div class="form-icon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" required />
                                            <div class="form-icon"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group service-form-group">
                                            <label class="control-label sr-only" for="phone"></label>
                                            <input id="phone" type="text" placeholder="Phone" class="form-control" name="phone" >
                                            <div class="form-icon"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>


                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="textarea"></label>
                                            <textarea class="form-control" id="textarea" rows="3" placeholder="Messages" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button type="submit" name="singlebutton" class="btn btn-default btn-block mb10">send message</button>
                                        <p><small>We promise we will never SPAM you with unwanted emails.</small></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.service-form -->
                    </div>

                  </div>





    <!-- start of section -->

    <!-- end of section -->

    <!-- ===== FOOTER ===== -->
   @endsection
