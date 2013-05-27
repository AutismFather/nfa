@section('content')
<!-- #PORTLETS START -->
<div id="portlets">

	<!-- FIRST SORTABLE COLUMN END -->
	<div class="clear"></div>
	<!--THIS IS A WIDE PORTLET-->
	<div class="portlet">
		<div class="portlet-header fixed">{{ HTML::image('images/icons/user.gif', 'Latest Registered Users', array('width' => 16, 'height' => 16)) }} Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
			<form action="" method="post">
				<table width="100%" cellpadding="0" cellspacing="0" id="userlist" summary="Employee Pay Sheet">
					<thead>
					<tr>
						<th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
						<th width="102" scope="col">Username</th>
						<th width="102" scope="col">First Name</th>
						<th width="102" scope="col">Last Name</th>
						<th width="130" scope="col">E-Mail</th>
						<th width="90" scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach( $userList as $user )
					<tr>
						<td width="34"><label>
								<input type="checkbox" name="checkbox" id="checkbox" />
							</label></td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->email }} </td>
						<td width="90">{{ HTML::link(URL::to_action('admin@users@edit', array($user->id)), '', array('class' => 'edit_icon', 'title' => 'Edit')) }}<a href="#" class="approve_icon" title="Approve"></a> <a href="#" class="reject_icon" title="Reject"></a> <a href="#" class="edit_icon" title="Edit"></a> <a href="#" class="delete_icon" title="Delete"></a></td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</form>
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