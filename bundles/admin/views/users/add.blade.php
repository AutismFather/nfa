@section('content')
<div class="grid_15 column">
<div class="portlet">
	<div class="portlet-header">Anything  (no icon too if you like it better)</div>

	<div class="portlet-content">
{{ Form::open(URL::to('/users/add')) }}

{{ Form::label('firstname', 'First Name: ') }}
{{ Form::input('text', 'firstname', null, array('class' => 'smallInput')) }}

{{ Form::label('lastname', 'Last Name: ') }}
{{ Form::input('text', 'lastname', null, array('class' => 'smallInput')) }}

{{ Form::label('email', 'E-Mail: ') }}
{{ Form::input('text', 'email', null, array('class' => 'smallInput')) }}
<a class="button"><span>Add User</span></a>
<a class="button_grey"><span>Reset</span></a>
{{ Form::close() }}
</div>
</div>
</div>
@endsection