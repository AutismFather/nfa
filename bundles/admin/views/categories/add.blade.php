@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Add Category. Slug will be created for you. You can modify/change it in edit.</div>

		<div class="portlet-content">
			{{ Form::open(URL::to_action('admin@categories@add')) }}

			{{ Form::label('name', 'Name: ') }}
			{{ Form::input('text', 'name', null, array('class' => 'smallInput')) }}

			<input type="submit" class="button" value="{{ __('Admin::form.addcategory') }}"/>
			<a class="button_grey"><span>{{ __('Admin::form.reset') }}</span></a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection