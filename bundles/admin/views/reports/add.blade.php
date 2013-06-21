@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Add Report</div>

		<div class="portlet-content">
			{{ Form::open(URL::to_action('admin@reports@add')) }}

			{{ Form::label('name', 'Name: ') }}
			{{ Form::input('text', 'name', null, array('class' => 'smallInput')) }}

			<input type="submit" class="button" value="Add Report"/>
			<a class="button_grey"><span>{{ __('Admin::form.reset') }}</span></a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection