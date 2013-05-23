{{ Form::open(URL::to('/users/add')) }}

{{ Form::label('firstname', 'First Name: ') }}
{{ Form::input('text', 'firstname') }}

{{ Form::label('lastname', 'Last Name: ') }}
{{ Form::input('text', 'lastname') }}

{{ Form::submit() }}
{{ Form::close() }}