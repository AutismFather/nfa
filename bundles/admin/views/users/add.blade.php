@section('content')
<div class="grid_15 column">
<div class="portlet">
	<div class="portlet-header">Anything  (no icon too if you like it better)</div>

	<div class="portlet-content">
{{ Form::open(URL::to_action('admin@users@add')) }}

{{ Form::label('user_groups_id', 'User Group:') }}
{{ Form::select('user_groups_id', $groups, null, array('class' => 'smallInput')) }}

{{ Form::label('username', 'Username') }}
{{ Form::input('text', 'username', null, array('class' => 'smallInput')) }}

{{ Form::label('firstname', 'First Name: ') }}
{{ Form::input('text', 'firstname', null, array('class' => 'smallInput')) }}

{{ Form::label('lastname', 'Last Name: ') }}
{{ Form::input('text', 'lastname', null, array('class' => 'smallInput')) }}

{{ Form::label('email', 'E-Mail: ') }}
{{ Form::input('text', 'email', null, array('class' => 'smallInput')) }}
<input type="submit" value="{{ __('Admin::form.adduser') }}" class="button"/>
<input type="reset" value="{{ __('Admin::form.reset') }}" class="button_grey"/>
{{ Form::close() }}
</div>
</div>
</div>
@endsection