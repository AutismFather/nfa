@section('content')
<!-- #PORTLETS START -->
<div id="portlets">

	<!-- FIRST SORTABLE COLUMN END -->
	<div class="clear"></div>
	<!--THIS IS A WIDE PORTLET-->
	<div class="portlet">
		<div class="portlet-header fixed">{{ HTML::image('images/icons/user.gif', 'Latest Registered Users', array('width' => 16, 'height' => 16)) }} Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
Reeports will go here.
		</div>
	</div>
	<!--  END #PORTLETS -->
	<!-- FIRST SORTABLE COLUMN START -->
	<div class="column">
	</div>
</div>
<div class="clear"> </div>
<script>
	$('#userlist').dataTable();
</script>
@endsection