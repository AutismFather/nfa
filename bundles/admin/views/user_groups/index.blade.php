@section('content')
<!-- #PORTLETS START -->
<div id="portlets">

	<!-- FIRST SORTABLE COLUMN END -->
	<div class="clear"></div>
	<!--THIS IS A WIDE PORTLET-->
	<div class="portlet">
		<div class="portlet-header fixed">{{ HTML::image('images/icons/user.gif', 'User Groups', array('width' => 16, 'height' => 16)) }} User Groups</div>
		<div class="portlet-content nopadding">
			<form action="" method="post">
				<table width="100%" cellpadding="0" cellspacing="0" id="userlist" summary="Employee Pay Sheet">
					<thead>
					<tr>
						<th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
						<th scope="col">Group</th>
						<th width="90" scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach( $groups as $group )
					<tr>
						<td><label>
								<input type="checkbox" name="checkbox" id="checkbox" />
							</label></td>
						<td>{{ $group->name }}</td>
						<td>
							{{ HTML::link(URL::to_action('admin@usergroups@edit', array($group->id)), '', array('class' => 'edit_icon', 'title' => 'Edit')) }}
							{{ HTML::link(URL::to_action('admin@usergroups@delete', array($group->id)), '', array('class' => 'delete_icon', 'title' => 'Delete')) }}
						</td>
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