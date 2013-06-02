@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">{{ __('admin::title.editcategory', array('name' => $category->name)) }}</div>

		<div class="portlet-content">
			{{ Form::open(URL::to_action('admin@category@edit', array($category->id))) }}

			{{ Form::label('name', 'Name') }}
			{{ Form::input('text', 'name', $category->name, array('class' => 'smallInput')) }}
			<input class="button" type="submit" value="{{ __('Admin::form.updatecategory') }}"/>
			<input class="button_grey" type="submit" value="{{ __('Admin::form.reset') }}" />
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection