@section('content')
<!-- #PORTLETS START -->
<div id="portlets">

	<!-- FIRST SORTABLE COLUMN END -->
	<div class="clear"></div>
	<!--THIS IS A WIDE PORTLET-->
	<div class="portlet">
		<div class="portlet-header fixed">{{ HTML::image('images/icon_reports.gif', 'Categories', array('width' => 16, 'height' => 16)) }} {{ __('Admin::title.categories_subheading') }}</div>
		<div class="portlet-content nopadding">
			<form action="" method="post">
				<table width="100%" cellpadding="0" cellspacing="0" id="categoryList" summary="Categories">
					<thead>
					<tr>
						<th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
						<th width="102" scope="col">Name</th>
						<th width="102" scope="col">Slug</th>
						<th width="90" scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach( $categoryList as $category )
					<tr>
						<td width="34"><label>
								<input type="checkbox" name="checkbox" id="checkbox" />
							</label></td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td width="90">
							{{ HTML::link(URL::to_action('admin@categories@edit', array($category->id)), '', array('class' => 'edit_icon', 'title' => 'Edit')) }}
							{{ HTML::link(URL::to_action('admin@categories@delete', array($category->id)), '', array('class' => 'delete_icon', 'title' => 'Delete')) }}
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
	$('#categoryList').dataTable();
</script>
@endsection