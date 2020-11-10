@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Page Panel
      <small>- Pages </small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">    
   <div class="row">


    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Page list</h3>
          @include('admin.partials.error_section')              
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         @if(session()->has('message'))
         <div class="alert alert-info">
         {{ session()->get('message') }}
         </div>
         @endif
          <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
            <thead>
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Available Balance</th>
                <th>Amount</th>
                <th>Role</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
         
              @foreach ($withdraws as $key => $value)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->phone_no }}</td>
                <td>{{ $value->balance }}</td>
                <td>{{ $value->amount }}</td>
                <td>{{ $value->display_name }}</td>
                <td>{{date('Y-m-d', strtotime($value->date))  }}</td>
                <td>{{ $value->status }}</td>
                <td>
                  <!-- Accept Payment buuton -->
                  @if (($value->status) != 'pending')
                  <a href="#"><button type="button" class="btn btn-info"}}">Accepted</button></a>
                   @else
                   <a href="{{route('payment_detection', ['id' => $value->wallet_id])}}"><button type="button" class="btn btn-info"}}">Accept</button></a>

                    <a href="{{route('destroy_withdraw', ['id' => $value->wallet_id])}}"><button type="button" class="btn btn-danger"}}">Delete</button></a>
                   @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection