<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@if( !empty($title) ) {{ $title }} @endif</title>
	{{Asset::container('header')->styles()}}
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/ui.core.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/ui.sortable.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/ui.dialog.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/ui.datepicker.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/effects.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/flot/jquery.flot.pack.js"></script>
	<script type="text/javascript" src="http://localhost/nfa/public/js/jquery.dataTables.min.js"></script>
	<!--[if IE]>
	<script language="javascript" type="text/javascript" src="http://localhost/nfa/public/js/flot/excanvas.pack.js"></script>
	<![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="http://localhost/nfa/public/css/iefix.css" />
	<script src="http://localhost/nfa/public/js/pngfix.js"></script>
	<script>
		DD_belatedPNG.fix('#menu ul li a span span');
	</script>
	<![endif]-->
	<script id="source" language="javascript" type="text/javascript" src="http://localhost/nfa/public/js/graphs.js"></script>
</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">
	<!-- HIDDEN COLOR CHANGER -->
	<div style="position:relative;">
		<div id="colorchanger">
			<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
			<a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
			<a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
		</div>
	</div>
	<!--LOGO-->
	<div class="grid_8" id="logo">Profi Admin - Website Administration</div>
	<div class="grid_8">
		<!-- USER TOOLS START -->
		<div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#">Admin Username</a>  |  <a class="dropdown" href="#">Change Theme</a>  |  <a href="#">Logout</a></span></div>
	</div>
	<!-- USER TOOLS END -->
	<div class="grid_16" id="header">
		<!-- MENU START -->
		@yield('menumain')
		<!-- MENU END -->
	</div>
	<div class="grid_16">
		<!-- TABS START -->
		<div id="tabs">
			<div class="container">
				<ul>
					<li><a href="#" class="current"><span>Dashboard elements</span></a></li>
					<li><a href="forms.html"><span>Content Editing</span></a></li>
					<li><a href="#"><span>Submenu Link 3</span></a></li>
					<li><a href="#"><span>Submenu Link 4</span></a></li>
					<li><a href="#"><span>Submenu Link 5</span></a></li>
					<li><a href="#"><span>Submenu Link 6</span></a></li>
					<li><a href="#" class="more"><span>More Submenus</span></a></li>
				</ul>
			</div>
		</div>
		<!-- TABS END -->
	</div>
	<!-- HIDDEN SUBMENU START -->
	<div class="grid_16" id="hidden_submenu">
		<ul class="more_menu">
			<li><a href="#">More link 1</a></li>
			<li><a href="#">More link 2</a></li>
			<li><a href="#">More link 3</a></li>
			<li><a href="#">More link 4</a></li>
		</ul>
		<ul class="more_menu">
			<li><a href="#">More link 5</a></li>
			<li><a href="#">More link 6</a></li>
			<li><a href="#">More link 7</a></li>
			<li><a href="#">More link 8</a></li>
		</ul>
		<ul class="more_menu">
			<li><a href="#">More link 9</a></li>
			<li><a href="#">More link 10</a></li>
			<li><a href="#">More link 11</a></li>
			<li><a href="#">More link 12</a></li>
		</ul>
	</div>
	<!-- HIDDEN SUBMENU END -->

	<!-- CONTENT START -->
	<div class="grid_16" id="content">
		<!--  TITLE START  -->
		<div class="grid_9">
			<h1 class="dashboard">Users</h1>
		</div>
	@yield('content')
	<!-- END CONTENT-->
	</div>
<div class="clear"> </div>

<!-- This contains the hidden content for modal box calls -->
<div class='hidden'>
	<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
		<p><strong>This content comes from a hidden element on this page.</strong></p>

		<p><strong>Try testing yourself!</strong></p>
		<p>You can call as many dialogs you want with jQuery UI.</p>
	</div>
</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
	Website Administration by <a href="http://www.webgurus.biz">WebGurus</a></div>

{{Asset::container('footer')->scripts()}}
<!-- FOOTER END -->
</body>
</html>
