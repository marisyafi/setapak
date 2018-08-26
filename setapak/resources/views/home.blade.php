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
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$counterPemandu}}</h3> 
                  <h4>Total Pemandu</h4>
                </div>                 
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$counterJasa}}</h3> 
                  <h4>Total Jasa</h4>
                </div>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$counterHomestay}}</h3> 
                  <h4>Total Homestay</h4>
                </div>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$counterBarang}}</h3> 
                  <h4>Total Produk</h4>
                </div>
              </div>
            </div>
            <!-- ./col --> 
          </div>
        
          <div class="row">
            <div class="col-sm-6">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h4>Rangkuman Transaksi</h4>
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>  
                    </div>
                </div>
                <div class="box-body">
                  <div id="kegiatanPeneliti" style="width:95%; height:400px;"></div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h4>Top 5 Pemandu</h4>
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>  
                    </div>
                </div>
                <div class="box-body">
                  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
$(function () { 
    var myChart = Highcharts.chart('kegiatanPeneliti', {
        title: {
            text: 'Transaksi Jasa, Homestay, dan Produk'
        }, 
        subtitle: {
            text: 'dalam 6 bulan terakhir'
        },
        xAxis: {
            categories: [<?php for ($i=6;$i>=0;$i--){ echo "'".$data[$i]['bulan']."',";}?>]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: false
                },
                enableMouseTracking: true
            }
        },

        series: [{
            name: 'Jasa',
            data: [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['jasa'].",";}?>]
        },{
            name: 'Homestay',
            data: [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['homestay'].",";}?>]
        },{
            name: 'Produk',
            data: [<?php for ($i=6;$i>=0;$i--){ echo $data[$i]['barang'].",";}?>]
        }],

        responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

    });
  });
</script>

<script type="text/javascript">

$(function () { 
    var myChart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pemandu Terbaik'
    }, 
    subtitle: {
        text: 'dari jumlah transaksi satu bulan'
    }, 
    xAxis: {
        categories: ['Pertama','Kedua', 'Ketiga', 'Keempat', 'Kelima'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Transaksi'
        }
    },
    // tooltip: {
    //     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //     pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:13px">{series.name}: </td>' +
    //         '<td style="padding:0;font-size:13px"><b>{{$data_pemanduJasa['1']['nama']}} {point.y:.0f}</b></td></tr>',
    //     footerFormat: '</table>',
    //     shared: true,
    //     useHTML: true
    // },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
        },
    },
    series: [{
        name: 'Jasa',
        data: [
            @foreach($data_pemanduJasa as $data_jasa)
                {{$data_jasa['nilai'].","}}
            @endforeach
            ]
    }, {
        name: 'Homestay',
        data: [
            @foreach($data_pemanduHomestay as $data_homestay)
                {{$data_homestay['nilai'].","}}
            @endforeach
            ]
    }, {
        name: 'Produk',
        data: [
            @foreach($data_pemanduBarang as $data_barang)
                {{$data_barang['nilai'].","}}
            @endforeach
            ]
    }]
    
});
});
</script>

<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection


</html>
