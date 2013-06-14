<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ $title }}</title>
	{{Asset::container('header')->styles()}}
</head>

<body>
<div class="container_16">
	<div class="grid_6 prefix_5 suffix_5">
		<h1>Profi Admin - Login</h1>
		<div id="login">
			<p class="tip">You just need to hit the button and you're in!</p>
			<p class="error">This is when something is wrong!</p>
			<form id="form1" name="form1" method="post" action="{{ URL::to_action('admin@login') }}">
				<p>
					<label><strong>Username</strong>
						<input type="text" name="username" class="inputText" id="username" />
					</label>
				</p>
				<p>
					<label><strong>Password</strong>
						<input type="password" name="password" class="inputText" id="password" />
					</label>
				</p>
                <input type='submit' value='Authentication' class='black_button'/>
				<label>
					<input type="checkbox" name="checkbox" id="checkbox" />
					Remember me</label>
			</form>
			<br clear="all" />
		</div>
		<div id="forgot">
			<a href="#" class="forgotlink"><span>Forgot your username or password?</span></a></div>
	</div>
</div>
<br clear="all" />
</body>
</html>