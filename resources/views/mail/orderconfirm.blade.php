<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1>Invoice Id: {{ $sale_id }}</h1>

@php
  $orders = App\Order::where('sale_id', $sale_id)->get();
@endphp

<table class="table table-bordered">
  <tr>
    <th>Product Name</th>
    <th>Product Quantity</th>

  </tr>
  @foreach ($orders as $order)
    <tr>
      {{-- <td>{{ App\Cart::find($order->product_id)->product_name }}</td> --}}
      <td>Name</td>
      <td>{{ $order->product_quantity }}</td>

    </tr>
  @endforeach

</table>
