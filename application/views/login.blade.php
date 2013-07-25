{{ Laravel\Form::open('login') }}

@if( Session::has('login_errors') )
    Error!
@endif

<p>{{ Laravel\Form::label('email', 'Email Address') }}</p>
<p>{{ Laravel\Form::text('email') }}</p>
<br/>

<p>{{        Laravel\Form::label('password', 'Password') }}</p>
<p>{{ Laravel\Form::password('password') }}</p>

<p>{{ Form::submit('Login') }}</p>
