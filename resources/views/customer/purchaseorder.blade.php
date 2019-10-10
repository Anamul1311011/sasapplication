@extends('admin.layouts.main')

@section('content')

        <div class="row">
          <div class="col-lg-12">
            <h1>Your Purchase Order</h1>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header bg-info text-white">
              Purchase Order
            </h5>
             <div class="card-body">
               <table class="table table-bordered">
                   <thead>
                     <th>Sale Id</th>
                       <th>Subtotal</th>
                       <th>Shipping</th>
                       <th>Discount</th>
                       <th>Grand_total</th>
                       <th>purchase_time</th>
                       <th>View More</th>
                   </thead>

                   @foreach($purchaseorders as $purchaseorder)
                   <tr>
                       <td>{{ $purchaseorder->id }}</td>
                       <td>{{ $purchaseorder->cart_subtotal }}</td>
                       <td>{{ $purchaseorder->shipping }}</td>
                       <td>{{ $purchaseorder->discount }}</td>
                       <td>{{ $purchaseorder->grand_total }}</td>
                       <td>{{ $purchaseorder->created_at->format('d-m-Y H:i:s A') }}</td>
                       <td>
                         <a href="{{ url('purchase/order') }}/{{ $purchaseorder->id }}">View More</a>
                       </td>
                   </tr>
                   @endforeach
               </table>

             </div>
          </div>
      </div>

          {{-- row --}}


        @endsection
