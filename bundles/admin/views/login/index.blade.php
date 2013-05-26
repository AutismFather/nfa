<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
	<link href="http://localhost/nfa/admin/css/960.css" media="all" type="text/css" rel="stylesheet">
	<link href="http://localhost/nfa/admin/css/reset.css" media="all" type="text/css" rel="stylesheet">
	<link href="http://localhost/nfa/admin/css/text.css" media="all" type="text/css" rel="stylesheet">
	<link href="http://localhost/nfa/admin/css/login.css" media="all" type="text/css" rel="stylesheet">

	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

@if(Session::get('error'))
Sorry, your username or password was incorrect.
@endif

{{Form::open()}}

{{Form::label('username', 'Username')}}
{{Form::text('username')}}

{{Form::label('password', 'Password')}}
{{Form::password('password')}}

{{Form::submit('Login', array('class' => 'btn btn-success'))}}

{{Form::token()}}
{{Form::close()}}

</body>
</html>