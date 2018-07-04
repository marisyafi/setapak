@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Verifikasi Pembayaran
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pembayaran</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="row">
                        <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><h4>Jasa</h4></a></li>
                            <li><a href="#tab_2" data-toggle="tab"><h4>Homestay</h4></a></li>
                            <li><a href="#tab_3" data-toggle="tab"><h4>Produk</h4></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA</th>
                                                <th>NO. ORDER</th>
                                                <th>TANGGAL TRANSAKSI</th>
                                                <th>TOTAL</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tab_2">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA</th>
                                                <th>NO. ORDER</th>
                                                <th>TANGGAL TRANSAKSI</th>
                                                <th>TOTAL</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tab_3">
                                    <table class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA</th>
                                                <th>NO. ORDER</th>
                                                <th>TANGGAL TRANSAKSI</th>
                                                <th>TOTAL</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>                   
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script>
$(function () {
  $(".table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/pembayaran-data')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'user', name: 'user'},
            {data: 'no_order', name: 'no_order'},
            {data: 'tanggal_transaksi', name: 'tanggal_transaksi'},
            {data: 'total', name: 'total'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection
    <!-- /.content -->