@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Anything  (no icon too if you like it better)</div>

		<div class="portlet-content">
			{{ Form::open(URL::to_action('admin@products@add')) }}

			{{ Form::label('category_id', 'Category:') }}
			{{ Form::select('category_id', $categories, null, array('class' => 'smallInput')) }}

			{{ Form::label('name', 'Name: ') }}
			{{ Form::input('text', 'name', null, array('class' => 'smallInput')) }}

			{{ Form::label('sku', 'SKU: ') }}
			{{ Form::input('text', 'sku', null, array('class' => 'smallInput')) }}

			{{ Form::label('price', 'Price: ') }}
			{{ Form::input('text', 'price', null, array('class' => 'smallInput')) }}
			<input type="submit" value="{{ __('Admin::form.addproduct') }}" class="button"/>
			<input type="reset" value="{{ __('Admin::form.reset') }}" class="button_grey"/>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection