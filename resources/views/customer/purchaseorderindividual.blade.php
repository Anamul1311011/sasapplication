@extends('admin.layouts.main')

@section('content')

        <div class="row">
          <div class="col-lg-12">
            <h1>Individual Purchase Order</h1>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header bg-info text-white">
              Purchase Order
            </h5>
             <div class="card-body">

               @php
                 $orders = App\Order::where('sale_id', $sale->id)->get();
                 $grand_total = 0;
               @endphp

               <table class="table table-bordered">
                 <tr>
                   <th>Product Name</th>
                   <th>Product Price</th>
                   <th>Product Quantity</th>
                   <th>Discount</th>
                   <th>Coupon Discount</th>
                   <th>Total</th>
                 </tr>
                 @foreach ($orders as $order)
                     @if($order->main_category == "application")
                      @php $sohel=App\Application::where('id',$order->product_id)->first(); @endphp

                    @elseif($order->main_category == "dev_application")
                     @php $sohel=App\DevelopmentApplication::where('id',$order->product_id)->first(); @endphp

                    @elseif($order->main_category == "stunning_application")
                     @php $sohel=App\StunningApplication::where('id',$order->product_id)->first(); @endphp

                   {{-- @elseif($order->main_category == "dev_")
                    @php $sohel=App\DevelopmentApplication::where('id',$order->product_id)->first(); @endphp --}}



                     @elseif($order->main_category == "hosting")
                      @php $sohel=App\Hosting::where('id',$order->product_id)->first(); @endphp

                     @elseif($order->main_category == "service")
                      @php $sohel=App\Service::where('id',$order->product_id)->first();
                      @endphp
                     @endif
                     @php
                       $total = $discount = $coupon = 0;
                       $coupon   = App\Sale::find($order->sale_id)->coupon_discount;

                       if(empty($coupon)){
                         $coupon =0;
                       }
                       $discount = App\Sale::find($order->sale_id)->discount;
                       if(empty($discount)){
                         $discount =0;
                       }
                       $price = $sohel->price;
                       $quantity = $order->product_quantity;
                        $total  = $price * $quantity;
                        $total = $total - $discount - $coupon;
                        $shipping   = App\Sale::find($order->sale_id)->shipping;
                     @endphp
                     <tr>
                        <td>{{ $sohel->title }}</td>
                        <td>{{ $sohel->price }}</td>
                        <td>{{ $order->product_quantity }}</td>
                        <td>{{ $discount }}</td>
                        <td>{{ $coupon }}</td>
                        <td>{{ $total }}</td>
                     </tr>
                     @php
                       $grand_total += $total;
                     @endphp
                  @endforeach
                 <tr>
                   <td colspan="4"></td>
                   <td colspan="2" style="text-align:right;">Shipping Charge = 15</td>
                 </tr>
                 <tr>
                   <td colspan="4"></td>
                   <td colspan="2"  style="text-align:right;">Grand Total = {{ $grand_total+$shipping }}</td>
                 </tr>
               </table>
             </div>
          </div>
      </div>

          {{-- row --}}


        @endsection
