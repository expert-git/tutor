@extends('admin.admin-app', ['no_boxes' => true])

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Google Analytics
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analytics</li>
      </ol>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#pages" data-toggle="tab">
                              <i class="fa fa-file"></i> Pages
                            </a>
                        </li>
                        <li>
                            <a href="#keywords" data-toggle="tab">
                              <i class="fa fa-key"></i> Keywords
                            </a>
                        </li>
                        <li>
                            <a href="#time-pages" data-toggle="tab">
                                <i class="fa fa-clock-o"></i> Time
                            </a>
                        </li>
                        <li>
                            <a href="#traffic-sources" data-toggle="tab">
                                <i class="fa fa-lightbulb-o"></i> Traffic Source
                            </a>
                        </li>
                        <li>
                            <a href="#browsers" data-toggle="tab">
                                <i class="fa fa-android"></i> Browsers
                            </a>
                        </li>
                        <li>
                            <a href="#os" data-toggle="tab">
                                <i class="fa fa-linux"></i> Operating System
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane statistic-tabs active" id="pages">
                            <ul class="item-list">
                                @foreach($statistics['pages'] as $p)
                                <li>
                                    {{ $p['url'] }}<span class="pull-right"> {{ $p['pageViews'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="keywords">
                            <ul class="item-list">
                                @foreach($statistics['keywords'] as $p)
                                <li>
                                    {{ $p['keyword'] }}<span class="pull-right"> {{ $p['sessions'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="time-pages">
                            <ul class="item-list">
                                @foreach($statistics['times'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ gmdate('H:i:s', $p['time']) }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="traffic-sources">
                            <ul class="item-list">
                                @foreach($statistics['sources'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="browsers">
                            <ul class="item-list">
                                @foreach($statistics['browsers'] as $p)
                                <li>
                                    {{ $p['browser'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="os">
                            <ul class="item-list">
                                @foreach($statistics['ops'] as $p)
                                <li>
                                    {{ $p['os'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box bg-gray-white">
                    <div class="box-header">
                        <i class="fa fa-location-arrow"></i>
                        <h3 class="box-title">Region Visitors</h3>
                    </div>
                    <div class="box-body">
                        <div id="region-map"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box bg-gray-white">
                    <div class="box-header">
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title">World visitors</h3>
                    </div>
                    <div class="box-body">
                        <div id="world-map" style="min-height: 350px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    
</div>
@endsection

@section('custom-script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(function() {
        Morris.Line({
            element: 'visitor-chart',
            data: {!! $statistics['visits'] !!},
            xkey: 'date',
            ykeys: ['visits'],
            labels: ['visitors'],
            lineColors: ['#3B525E'],
            gridTextColor: ['#ebf4f9'],
            hideHover: 'auto',
            resize: true,
            redraw: true
        });
    });
    google.charts.load("visualization", "1", {packages:["geochart"], mapsApiKey: '{{  env('GOOGLE_MAPS_API_KEY') }}'});
    google.charts.setOnLoadCallback(drawRegionsMap);
    google.charts.setOnLoadCallback(drawLocalRegionsMap);
    function drawRegionsMap() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'country chart');
        data.addColumn('number', 'visitors chart');
        data.addRows({!! $statistics['countries'] !!});
        var options = {
            colors:['#c8e0ed','#24536e'],
            backgroundColor: '#f9f9f9',
            datalessRegionColor: '#e5e5e5',
            legend:  {textStyle: {fontName: 'Source Sans Pro'}}
        };
        var chart = new google.visualization.GeoChart(document.getElementById('world-map'));
        chart.draw(data, options);
    }
    function drawLocalRegionsMap(){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'chart region');
        data.addColumn('number', 'chart visitor');
        data.addRows({!! $statistics['regions'] !!});
        var options = {
            colorAxis: {colors: ['#92c1dc', '#2d688a']},
            backgroundColor: '#55a9bc',
            legend:  {textStyle: {color: '#000', fontName: 'Source Sans Pro'}},
            displayMode: 'markers',
            region: '{{  env('ANALYTICS_COUNTRY_CODE') }}'
        };
        var chart = new google.visualization.GeoChart(document.getElementById('region-map'));
        chart.draw(data, options);
    }
</script>
@endsection
