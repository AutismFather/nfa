@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Edit Usergroup {{ $group->name }}</div>

		<div class="portlet-content">
			{{ Form::open(URL::to('/usergroups/edit/$group->id')) }}

			{{ Form::label('name', 'Name') }}
			{{ Form::input('text', 'name', $group->name, array('class' => 'smallInput')) }}
			<a class="button"><span>Update Group</span></a>
			<a class="button_grey"><span>Reset</span></a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection