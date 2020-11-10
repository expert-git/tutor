@extends('admin.admin-app', ['no_boxes' => true])
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
                @include('admin.partials.error_section')         
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{isset($usercount) ? $usercount : 0}}</h3>

              <p>Total Users</p>
            </div>
            <a href="#" class="small-box-footer">Registered today: {{isset($today_usercount) ? $today_usercount : 0}}</a>
          </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{isset($activitylogcount) ? $activitylogcount : 0}}</h3>

              <p>Total Activities</p>
            </div>
<!--             <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div> -->
            <a href="#" class="small-box-footer">Activities today: {{isset($today_activitylogcount) ? $today_activitylogcount : 0}}</a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{isset($todocount) ? $todocount : 0}}</h3>
              <p>Total Tasks</p>
            </div>
<!--             <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> -->
            <a href="#" class="small-box-footer">Completed Tasks: {{isset($com_todocount) ? $com_todocount : 0}}</a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red"> 
            <div class="inner">
              <h3>{{isset($pagecount) ? $pagecount : 0}}</h3>
              <p>Total Pages</p>
            </div>
            <!-- <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div> -->
            <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
        <!-- Different elements here pick from theme -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('custom-script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@if(env('ANALYTICS_CONFIGURED') == true)
 <script>
     
     google.charts.load("visualization", "1", {packages:["geochart"], mapsApiKey: '{{  env('GOOGLE_MAPS_API_KEY') }}'});
     google.charts.setOnLoadCallback(drawRegionsMap);
     function drawRegionsMap() {
         var data = new google.visualization.DataTable();
         data.addColumn('string', 'country chart');
         data.addColumn('number', 'visitors chart');
         data.addRows({!! $country !!});
         var options = {
             colors:['#c8e0ed','#24536e'],
             backgroundColor: '#f9f9f9',
             datalessRegionColor: '#e5e5e5',
             legend:  {textStyle: {fontName: 'Source Sans Pro'}}
         };
         var chart = new google.visualization.GeoChart(document.getElementById('world-map-dash'));
         chart.draw(data, options);
     }
 </script>
@endif
@endsection
