@section('content')
<div class="grid_15 column">
	<div class="portlet">
		<div class="portlet-header">Anything  (no icon too if you like it better)</div>

		<div class="portlet-content">
			{{ Form::open(URL::to('/users/edit/$user->id')) }}

			{{ Form::label('user_group_id', 'User Groups: ') }}
			{{ Form::select('user_group_id', $groups, $user->user_group_id, array('class' => 'smallInput')) }}

			{{ Form::label('firstname', 'First Name: ') }}
			{{ Form::input('text', 'firstname', $user->firstname, array('class' => 'smallInput')) }}

			{{ Form::label('lastname', 'Last Name: ') }}
			{{ Form::input('text', 'lastname', $user->lastname, array('class' => 'smallInput')) }}

			{{ Form::label('email', 'E-Mail: ') }}
			{{ Form::input('text', 'email', $user->email, array('class' => 'smallInput')) }}

			{{ Form::label('username', 'Username') }}
			{{ Form::input('text', 'username', $user->username, array('class' => 'smallInput')) }}
			<a class="button"><span>Add User</span></a>
			<a class="button_grey"><span>Reset</span></a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection