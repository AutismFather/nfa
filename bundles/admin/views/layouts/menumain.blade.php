@section('menumain')
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="#" class="main current"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
		<li class="item middle" id="two"><a href="forms.html" class="main"><span class="outer"><span class="inner content">Content</span></span></a></li>
		<li class="item middle" id="three"><a href="#"><span class="outer"><span class="inner reports png">Reports</span></span></a></li>
		<li class="item middle" id="four"><a href="{{ URL::to('admin/users') }}" class="main"><span class="outer"><span class="inner users">Users</span></span></a></li>
		<li class="item middle" id="five"><a href="#" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>
		<li class="item middle" id="six"><a href="#" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>
		<li class="item middle" id="seven"><a href="#" class="main"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>
		<li class="item last" id="eight"><a href="#" class="main"><span class="outer"><span class="inner settings">Settings</span></span></a></li>
	</ul>
</div>
@endsection