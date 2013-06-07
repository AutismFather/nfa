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
						<th width="102" scope="col">Name</th>
						<th width="102" scope="col">Category</th>
						<th width="102" scope="col">SKU</th>
						<th width="102" scope="col">Price</th>
						<th width="90" scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach( $products as $product )
					<tr>
						<td width="34"><label>
								<input type="checkbox" name="checkbox" id="checkbox" />
							</label></td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->category->name }}</td>
						<td>{{ $product->sku }}</td>
						<td>{{ $product->price }} </td>
						<td width="90">
							{{ HTML::link(URL::to_action('admin@products@edit', array($product->id)), '', array('class' => 'edit_icon', 'title' => 'Edit')) }}
							{{ HTML::link(URL::to_action('admin@products@delete', array($product->id)), '', array('class' => 'delete_icon', 'title' => 'Delete')) }}
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