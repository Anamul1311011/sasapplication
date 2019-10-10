@extends('layouts.app');
@section('main_content')

<!-- header -->
<div class="jumbotron header-simple contact text-center">
    <div class="container">
        <div class="row">
        @if (session('status'))
          <div class="alert alert-success" >
            {{ session('status') }}
          </div>
        @endif
            <div class="col-md-12">
                <h2>The Products That Are Added To Cart</h2>
                <p><a href="{{route('welcome')}}">Home</a> /  Cart View</p>
            </div>
        </div>
    </div>
</div>
<!-- end of header -->
<!-- Shopping Cart Start -->
    <section id="card">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="cart-info">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="tl">Product_id</th>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove Item</th>
                                </tr>
                                @php
                                  $cart_subtotal = 0;
                                  $shipping = 15;
                                  $discount = 5;
                                @endphp
                                <form  action="{{ url('update/cart') }}" method="post">
                                  @csrf

                                @forelse ($cart_products as $cart_product)
                                  <tr>
                                    <td>{{ $cart_product->product_id }}</td>
                                      <td>
                                          <div class="col-md-12 pl">
                                              <div class="col-md-3 pl">
                                                  <img src="{{ asset('storage/'.$cart_product->product_image) }}" alt="cart1" class="img-responsive">
                                              </div>
                                              <div class="col-md-9 pro-info pl text-left">
                                                  <h3>{{ $cart_product->product_title }}</h3>
                                                  {{-- <p>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star-half"></i>
                                                  </p> --}}
                                                  {{-- <p>Color: Silver</p> --}}
                                              </div>
                                          </div>
                                      </td>
                                      <td>${{ $cart_product->product_price }}</td>
                                      <td>
                                          <div class="quantity">
                                              <div class="handle-counter" id="handleCounter{{ $cart_product->id }}" style="width:62px;">
                                                  <div class="input">
                                                      <input type="text" value="{{ $cart_product->product_quantity }}" name="jony[{{ $cart_product->id }}]">
                                                  </div>
                                                  <div class="click">
                                                      <a class="counter-plus btn btn-primary">+</a>
                                                      <a class="counter-minus btn btn-primary">-</a>
                                                  </div>
                                                  <div class="clearfix"></div>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                        @php
                                          $cart_subtotal = $cart_subtotal + ($cart_product->product_price * $cart_product->product_quantity)
                                        @endphp
                                        ${{ $cart_product->product_price * $cart_product->product_quantity }}
                                      </td>
                                      <td><a href="{{ url('cart/delete') }}/{{ $cart_product->id }}"><i class="fa fa-trash"></i></a></td>
                                  </tr>
                                @empty
                                  <tr>
                                    <td colspan="6"> <p>No Products are available</p> </td>
                                  </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cart-total">
                        <h2>Have a coupon?</h2>
                        <div class="input-group">
                          @if (isset($coupon_by_user))
                              <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user" value="{{ $coupon_by_user }}"/>
                              @else
                                  <input id="1" class="form-control" type="text" placeholder="type your code" name="coupon_by_user" value=""/>
                          @endif

                            {{-- <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Add</button>
                            </span> --}}
                        </div>
                    </div>
                    <div class="total-amount">
                        <ul>
                            <li>
                                <h3>Cart Total</h3>
                            </li>
                            <li><span>Cart Subtotal</span>
                              <a href="#">
                              ${{ $cart_subtotal }}
                              <input type="hidden" name="cart_subtotal" value="{{ $cart_subtotal }}">
                            </a></li>

                            <li><span>(+) Shipping</span>
                              <a href="#">
                                $ {{ $shipping }}
                                <input type="hidden" name="shipping" value="{{ $shipping }}">
                              </a></li>

                            <li><span>(-) Discount</span>
                              <a href="#">
                                $ {{ $discount }}
                                <input type="hidden" name="discount" value="{{ $discount }}">
                              </a></li>

                            <li><span>Grand Total</span>
                              <a href="#">
                                $ {{ ($cart_subtotal+$shipping) - $discount }}
                                <input type="hidden" name="grand_total" value="{{ ($cart_subtotal+$shipping) - $discount }}">
                            </a></li>

                            @if (isset($coupon_amount))
                            @php
                              $grand_total = ($cart_subtotal+$shipping) - $discount;
                              $coupon_discount = ($grand_total*$coupon_amount) / 100;
                              $after_coupon_discount = $grand_total - $coupon_discount;
                            @endphp
                            <li><span>(-)Coupon Discount</span>
                              <a href="#">
                                {{ $coupon_amount }}%
                                <input type="hidden" name="coupon_amount" value="{{ $coupon_amount }}">
                              </a></li>

                            <li><span>(-)After Coupon Discount</span>
                              <a href="#">
                                 {{ $after_coupon_discount }}%
                                   <input type="hidden" name="after_coupon_discount" value="{{ $after_coupon_discount }}">
                               </a></li>
                            @endif
                        </ul>

                    </div>
                    <div class="proceed">
                        <button name="update_cart" value="update_cart" class="btn button btn-sm red" type="submit">update cart</button>
                        <button name="proceed_btn" value="proceed_btn" class="btn button btn-sm red" type="submit">proceed</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart End -->

    <!-- ===== FOOTER ===== -->
    @endsection
    @section('footer_scripts')
      <script>
     $(function($) {
         var options = {
             minimum: 1,
             maximize: 100,
             onChange: valChanged,
             onMinimum: function(e) {
                 console.log('reached minimum: ' + e)
             },
             onMaximize: function(e) {
                 console.log('reached maximize' + e)
             }
         }
         @foreach ($cart_products as $cart_product)
         $('#handleCounter{{ $cart_product->id }}').handleCounter(options)
         @endforeach

     })

     function valChanged(d) {
         //            console.log(d)
     }

 </script>

   @endsection
