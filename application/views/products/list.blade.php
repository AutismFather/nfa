@section('content')
<section id="typography">
    <div class="page-header">
        <h1>Products</h1>
    </div>
    @foreach( $products->results as $product )
    <div class="span4">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->description }}</p>
        <a class="btn btn-primary" href="{{ URL::to_action('cart@add', array($product->id)) }}"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
    </div>
    @endforeach
    </ul>
</section>
<?php echo $products->links(); ?>
@endsection