@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')

	<div class="col-md-9">
		<div class="edit_profile padding_down_s">
			@include('admin.partials.error_section') 
			<h3 class="f_profile_content text-center">Lectures</h3>
		</div>
		@include('partials.error_section')
		<div class="row">
			<div class="col-md-12">
				<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
				<thead>
					<tr>
						<th>#</th>
						<th>Id</th>
						<th>Amount</th>
						<th>Type</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>sad</td>
						<td>sad</td>
						<td>sd</td>
						<td>asd</td>
						<td>asd</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>		
	</div>
</div>
@endsection
