@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Panel
        <small>- Booking List </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booking List</h3>
                @include('admin.partials.error_section')              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
          <thead>
            <tr>
               <th>#</th>
                <th>Job Title</th>
               <th>St. Name</th>
               <th>Location</th>
               <th>Amount</th>
               <th>Lesson Hours</th>
              <th>Service Fee</th>
              <th>Admin Fee</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($book_data as $key => $value)
            <tr>
             <td>{{ ++$key }}</td>
              <td>{{ $value->title }}</td>
              <td>{{ $value->first_name }}</td>
              <td>{{ $value->location }}</td>
              <td>{{ $value->amount }}</td>
              <td>{{ $value->lesson_hours }}</td>

                <?php
              $amt=$value->amount;
              $service_fee= ($amt*8/100);
                ?>

              <td>{{ $service_fee }}</td>

       <?php
      $hour_amount = $value->lesson_hours; 
if ($hour_amount > 0 && $hour_amount <= 20) {
    $net_amt = $amt-35;

} else if ($hour_amount >= 21 && $hour_amount <= 50) {
     $net_amt = $amt-30;
 
} else if ($hour_amount >= 51 && $hour_amount <= 200) {
     $net_amt = $amt-25;
   
} else if ($hour_amount >= 201 && $hour_amount <= 400) {
     $net_amt = $amt-20;
   
} 
else if ($hour_amount >= 401) {
     $net_amt = $amt-15;
    
} 

$tamt=$amt-$net_amt;
                 ?>

              <td>{{  $tamt }}</td>
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