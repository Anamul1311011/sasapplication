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
                       <th>Order Status</th>
                       <th>View More</th>
                   </thead>

                   @foreach($orders as $order)
                   <tr>
                       <td>{{ $order->id }}</td>
                       <td>{{ $order->cart_subtotal }}</td>
                       <td>{{ $order->shipping }}</td>
                       <td>{{ $order->discount }}</td>
                       <td>{{ $order->grand_total }}</td>
                       <td>{{ $order->created_at->format('d-m-Y H:i:s A') }}</td>
                       <td>{{ $order->status }}</td>
                       <td>
                         <a href="{{ url('purchase/order') }}/{{ $order->id }}">View More</a>
                       </td>
                   </tr>
                   @endforeach
               </table>

             </div>
          </div>
      </div>

          {{-- row --}}


        @endsection
