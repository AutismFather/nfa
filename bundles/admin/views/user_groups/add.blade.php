@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Add User Group</div>

		<div class="portlet-content">
			{{ Form::open(URL::to('/admin/usergroups/add')) }}

			{{ Form::label('name', 'Name: ') }}
			{{ Form::input('text', 'name', null, array('class' => 'smallInput')) }}
			<input type="submit" class="button" value="{{ __('Admin::forms.addusergroup') }}"/>
			<input type="reset" class="button_grey" value="{{ __('Admin::forms.reset') }}" />
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection