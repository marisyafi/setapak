@extends('layouts.master')

@section('content')
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>7</h3> 
                  <p>Artikel</p>
                </div>
                <div class="icon">
                  <i class="ion ion-compose"></i>
                </div>
                <a href="{{ url('/artikels') }}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>7</h3> 
                  <p>Tempat Pariwisata</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-location"></i>
                </div>
                <a href="{{ url('/informasis') }}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>7</h3> 
                  <p>Pengguna</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{ url('user') }}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Line Chart</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->  

                {{-- <div style="width:100%;">
                  {{ $chartjs->render() }}
                </div> --}}
              </div>
              <!-- /.col (LEFT) -->
              
              <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="barChart" style="height:250px"></canvas>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->  
              </div>
              <!-- /.col (RIGHT) -->
            </div>
        </section>
    </div>
@endsection
@section('script')
<script>
$(function () {
    

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartData = {
      labels  : [<?php for ($i=6;$i>=0;$i--){ echo "'".$data[$i]['bulan']."',";}?>],
      datasets: [
        {
          label               : 'Jasa',
          xAxisID             : 'jeje', 
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['jasa'].",";}?>]
        },
        {
          label               : 'Homestay',
          fillColor           : 'rgba(0, 0,0, 1)',
          strokeColor         : 'rgba(0, 0, 0, 1)',
          pointColor          : 'rgba(0, 0, 0, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['homestay'].",";}?>]
        },
        {
          label               : 'Produk',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['barang'].",";}?>]
        }
      ]
    }


    var lineChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
      
    }

    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartData, lineChartOptions)
    

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    // var barChartData                     = areaChartData

    var options = {
    showDatasetLabels : true
    }

    var barChartData = {
      labels  : ["Pertama","Kedua","Ketiga","Keempat","Kelima"],
      datasets: [
        {
          label               : 'Jasa',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php for ($i=0;$i<=4;$i++){ echo $data_pemanduJasa[$i]['nilai'].",";}?>]
        },
        {
          label               : 'Homestay',
          fillColor           : 'rgba(0, 0,0, 1)',
          strokeColor         : 'rgba(0, 0, 0, 1)',
          pointColor          : 'rgba(0, 0, 0, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php for ($i=0;$i<=4;$i++){ echo $data_pemanduHomestay[$i]['nilai'].",";}?>]
        },
        {
          label               : 'Produk',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php for ($i=0;$i<=4;$i++){ echo $data_pemanduBarang[$i]['nilai'].",";}?>]
        }
      ]
    }

    // barChartData.datasets[1].fillColor   = '#00a65a'
    // barChartData.datasets[1].strokeColor = '#00a65a'
    // barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData)
  })
</script>
@endsection


</html>
