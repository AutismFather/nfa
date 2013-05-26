@section('content')

<!-- #PORTLETS START -->
<div id="portlets">
	<!-- FIRST SORTABLE COLUMN START -->
	<div class="column" id="left">
		<!--THIS IS A PORTLET-->
		<div class="portlet">
			<div class="portlet-header"><img src="images/icons/chart_bar.gif" width="16" height="16" alt="Reports" /> Visitors - Last 30 days</div>
			<div class="portlet-content">
				<!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
				<div id="placeholder" style="width:auto; height:250px;"></div>
			</div>
		</div>
	</div>
	<!-- FIRST SORTABLE COLUMN END -->
	<div class="clear"></div>
	<!--THIS IS A WIDE PORTLET-->
	<div class="portlet">
		<div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
			<form action="" method="post">
				<table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
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
						<td width="90"><a href="#" class="approve_icon" title="Approve"></a> <a href="#" class="reject_icon" title="Reject"></a> <a href="#" class="edit_icon" title="Edit"></a> <a href="#" class="delete_icon" title="Delete"></a></td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!--  END #PORTLETS -->
</div>
<div class="clear"> </div>

@endsection