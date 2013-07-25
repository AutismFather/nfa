<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@if( !empty($title) ) {{ $title }} @endif</title>
	{{Asset::container('header')->styles()}}
</head>

<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="../">NewFrontierArmory</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a onclick="pageTracker._link(this.href); return false;" href="{{ URL::to('products') }}">Products</a></li>
          <li><a id="swatch-link" href="{{ URL::to('cart') }}">Cart</a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>

<div class="container">

		@yield('notification')
		@yield('content')
	<!-- END CONTENT-->
</div>
{{Asset::container('footer')->scripts()}}
<!-- FOOTER END -->
</body>
</html>

