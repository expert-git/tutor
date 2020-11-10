@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
@include('dashboard.partials.dashboard-sidebar')

<div class="edit_profile">
<h3 class="f_profile_content text-center">Bookings</h3>
</div>
<div class="col-md-9">
@include('partials.error_section')
<div class="row padding_top">
<div class="col-md-12">
<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
<thead>
<tr>
<th>#</th>
<th>Date</th>
<th>Location</th>
<th>Amount</th>
<th>Status</th>
<th>Detail</th>
<th>Action</th>
</tr>
</thead>
<tbody>

@foreach ($bookings as $key => $value)	
<tr>
<td>{{ ++$key }}</td>
<td>{{ date("M jS, Y", strtotime($value->date)) }} </td>
<td>{{ $value->location }}</td>
<td>${{ $value->amount }}</td>
<td>@if($value->status_id == 4)
<span class="label label-warning">Pending</span>
@elseif($value->status_id == 3)
<span class="label label-danger">Cancelled</span>
@elseif($value->status_id == 7)
<span class="label label-success">Accepted</span>
@elseif($value->status_id == 8)
<span class="label label-default">Rejected</span>
@endif
</td>
<td>
<a target="_blank" href="{{ route('booking_detail', ['id' => $value->id]) }}" class="btn btn-warning btn-sm">View</a>
</td>							
<td>
@if($value->status_id != 3)
<a href="{{ route('booking_cancel', ['id' => $value->id]) }}" class="btn btn-danger btn-sm">Cancel Booking</a>
@endif

@if(Auth::user()->role_id == 3)
@if($value->status_id == 4)

@if($value->status_id != 8)
<a href="{{ route('booking_accept', ['id' => $value->id]) }}" class="btn btn-success btn-sm">Accept</a>
@endif

@if($value->status_id != 8)
<a href="{{ route('book_refer', ['id' => $value->id]) }}" class="btn btn-success btn-sm">Refer</a>
@endif

@if($value->status_id != 7)
<a href="{{ route('booking_reject', ['id' => $value->id]) }}" class="btn btn-warning btn-sm">Reject</a>
@endif
@endif
@endif
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
