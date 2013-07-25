@section('content')
<h1>Cart</h1>

@if( empty($items) )
Nothing currently in your cart.
@else
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Product</th>
        <th></th>
        <th>Individual Price</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
@foreach( $items as $item )
<tr>
    <td><a href="{{ URL::to_action('product', array($item->products->slug)) }}">{{ $item->products->name }}</a> </td>
    <td><a href="{{ URL::to_action('cart.remove', array($item->id)) }}">Remove</a></td>
    <td>${{ $item->price }}</td>
    <td><form action="{{ URL::to_action('cart@update', array($item->id)) }}" method="post"><input style="width: 30px;" type="text" name="quantity" value="{{ $item->quantity }}"/></form></td>
    <td>${{ $item->price * $item->quantity }}</td>
</tr>
@endforeach
<tr>
    <td colspan="4"></td>
    <td>${{ $cart->total }}</td>
</tr>
    </tbody>
  </table>
@endif
</table>
@endsection