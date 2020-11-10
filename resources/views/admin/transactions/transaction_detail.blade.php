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
              <div class="row">
            <div class="col-md-10 col-md-offset-1 border_transaction_page">
                <h3 class="order_heading">Transaction Detail</h3>
                <div class="row description_heading">
                    <div class="col-md-8 col-xs-8">
                        <p>Detail</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <p>Amount</p>
                    </div>
                </div>
                <div class="row description_list">
                    <div class="col-md-8 col-xs-8">
                        <p>
                            <i class="fa fa-id-card"></i>
                            <span>{{ $description->id }}</span>
                        </p>
                        <p>
                            <i class="fa fa-user"></i>
                            <span>{{ $description->payer->payer_info->first_name }} {{ $description->payer->payer_info->last_name }}</span>
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i>
                            <span>{{ $description->payer->payer_info->email }}</span>
                        </p>
                        <p>
                            <i class="fa fa-clock-o"></i>
                            <span>{{ $description->create_time }}</span>
                        </p>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            <span>{{ $description->payer->payer_info->shipping_address->city }}</span>
                            <span> , </span>
                            <span>{{ $description->payer->payer_info->shipping_address->country_code }}</span>
                        </p>
                        <p>
                            <i class="fa fa-money"></i>
                            <span>{{ $description->transactions[0]->amount->currency }}</span>
                        </p>
                        <p class="description_heading_p">Description</p>
                        <p class="description_detail">{{ $description->transactions[0]->description }}</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <p>{{ $description->transactions[0]->amount->currency }} {{ $description->transactions[0]->amount->total }}</p>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection