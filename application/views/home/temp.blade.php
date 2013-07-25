<table>
@foreach( $products as $product )
    <tr><td>{{ $product->name }}</td><td>SKU: {{ $product->sku }}</td><td>Price: ${{ $product->price }}</td><td>Add to Cart</td></tr>
@endforeach
</table>