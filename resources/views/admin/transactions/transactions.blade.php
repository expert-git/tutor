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
                <a href="{{ route('admin_transaction_detail', ['id' => $value->id]) }}" class="btn a_href_btn">View Detail</a>
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