@extends('admin.layouts.main')

@section('content')

        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header bg-info text-white">
              </div>
              Total Purchase
            </h5>

         <div class="card-body">
               <h1>{{ $total_sale }}</h1>
             </div>
          </div>
      </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header bg-info text-white">

              Total Service Purchase
            </h5>
             <div class="card-body">
               <h1>{{ $total_products }}</h1>
             </div>
          </div>
      </div>

          {{-- row --}}


        @endsection
