@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">{{ __('admin::title.editproduct', array('name' => $product->name)) }}</div>

		<div class="portlet-content">
			{{ Form::open(URL::to_action('admin@products@edit', array($product->id))) }}

			{{ Form::label('category_id', 'Category: ') }}
			{{ Form::select('category_id', $categories, $product->category_id, array('class' => 'smallinput')) }}

			{{ Form::label('name', 'Name :') }}
			{{ Form::input('text', 'name', $product->name, array('class' => 'smallInput')) }}

			{{ Form::label('sku', 'SKU :') }}
			{{ Form::input('text', 'sku', $product->sku, array('class' => 'smallInput')) }}

			{{ Form::label('price', 'Price: ') }}
			{{ Form::input('text', 'price', $product->price, array('class' => 'smallInput')) }}

			<input class="button" type="submit" value="{{ __('Admin::form.updateproduct') }}"/>
			<input class="button_grey" type="submit" value="{{ __('Admin::form.reset') }}" />
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection