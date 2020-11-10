@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
	@include('dashboard.partials.dashboard-sidebar')

	<div class="col-md-9">
		<div class="edit_profile padding_down_s">
			@include('admin.partials.error_section') 
			<h3 class="f_profile_content text-center">My Wallet</h3>
		</div>
		@include('partials.error_section')
		<div class="row">
			<div class="col-md-12">
				<h3>Balance $: {{ $wallet->balance}}</h3>
			</div>
			<div class="col-md-12">
				<h3 class="sub_heading">Deposit</h3>
				<form action="{{route('depositWallet')}}" method="post">
					{{csrf_field()}}
					<div class="form-group profile_form s_profile_form col-md-4">
						<label>Amount <span>*</label><br>
							<input type="text" name="amount" class="form-control span3" value="" required>
						</div>
						<div class="form-group profile_form s_profile_form col-md-2">
							<input type="submit" value="ADD" class="btn s_save">
						</div>
					</form>
				</div>
			</div><br>
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
						@foreach ($transactions as $key => $value)
						@php $description = json_decode($value->description) @endphp	
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $description->id }}</td>
							<td>{{ $description->transactions[0]->amount->total }} {{ $description->transactions[0]->amount->currency }}</td>
							<td>{{ $value->type }}</td>
							<td>{{ $value->created_at }}</td>
							<td>
								<a href="{{ route('transaction_detail', ['id' => $value->id]) }}" class="btn a_href_btn">View Detail</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
			@include('partials.error_section')
			@if(Auth::user()->role_id == 3)
				<div class="row">
				<div class="col-md-12">
					<h3 class="sub_heading">Withdraw</h3>
					<form action="{{route('walletWithdraw')}}" method="post">
						{{csrf_field()}}
						<div class="form-group profile_form s_profile_form col-md-4">
							<label>Amount <span>*</label><br>
								<input type="text" name="amount" class="form-control span3" value="" required >
							</div>
							<div class="form-group profile_form s_profile_form col-md-2">
								<input type="submit" value="ADD" class="btn s_save">
							</div>
						</form>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
							<thead>
								<tr>
									<th>#</th>
									<th>Amount</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($withdraw as $key => $value)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $value->amount }}</td>
									<td>{{ $value->created_at }}</td>
									<td>{{ $value->status }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			</div>
		</div>
		@endsection
