@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')

	<div class="edit_profile">
		<h3 class="f_profile_content text-center">Tutor Earnings</h3>
	</div>
	
	<div class="col-md-9">
		@include('partials.error_section')
		<div class="row padding_top">
			<div class="col-md-12">
				<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
					<thead>
						<tr>
							<th>#</th>
							<th>booking id</th>
							<th>title</th>
							<th>details</th>
							<th>student</th>
							
							<th>subject</th>
							<th>type</th>
							
							<th>amount</th>
						
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tutor_earnings as $key => $value)
						
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $value->booking_id }}</td>
							<td>{{ $value->title }}</td>
							<td>{{ $value->details }}</td>
							<td><a href="{{route('tutor_profile',['name' => $value->student_id ])}}">{{ $value->first_name }}</a></td>
		
							<td>{{ $value->subject }}</td>
							<td>{{ $value->type }}</td>
							
							<td>{{ $value->amount }}</td>
							
							<td>{{ $value->date }}</td>
							<td>
								<a href="{{ route('tutor_earnings_details', ['id' => $value->booking_id]) }}" class="btn a_href_btn">View Detail</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
