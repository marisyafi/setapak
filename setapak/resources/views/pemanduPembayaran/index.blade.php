@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pembayaran Pemandu Wisata
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pembayaran Pemandu</li>
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
                                    <table id="table-jasa" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>BULAN</th>
                                                <th>SALDO</th>
                                                <th>Hidden</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jasaBaru as $key => $jas)
                                        <tr>
                                            <td>{{$key++}}</td>
                                            <td>{{$jas->nama_pemandu}}</td>
                                            <td>{{$jas->bulan}}</td>
                                            <td><p class="pull-right">Rp {{$jas->total_harga}}</p></td>
                                            <td>{{$jas->hidden}}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-jasa" data-jasa="{{json_encode($jas)}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                <button type="submit" class=" btn btn-xs btn-warning"><i class="fa fa-envelope"></i> Send</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tab_2">
                                    <table id="table-homestay" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>BULAN</th>
                                                <th>SALDO</th>
                                                <th>Hidden</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($homestayBaru as $key => $home)
                                        <tr>
                                            <td>{{$key++}}</td>
                                            <td>{{$home->nama_pemandu}}</td>
                                            <td>{{$home->bulan}}</td>
                                            <td><p class="pull-right">Rp {{$home->total_harga}}</p></td>
                                            <td>{{$home->hidden}}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-homestay" data-homestay="{{json_encode($home)}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                <button type="submit" class=" btn btn-xs btn-warning"><i class="fa fa-envelope"></i> Send</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="tab_3">
                                    <table id="table-barang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>BULAN</th>
                                                <th>SALDO</th>
                                                <th>Hidden</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($barangBaru as $key => $bar)
                                        <tr>
                                            <td>{{$key++}}</td>
                                            <td>{{$bar->nama_pemandu}}</td>
                                            <td>{{$bar->bulan}}</td>
                                            <td><p class="pull-right">Rp {{$bar->total_harga}}</p></td>
                                            <td>{{$bar->hidden}}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-barang" data-barang="{{json_encode($bar)}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                <button type="button" class=" btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-email" data-email="{{json_encode($bar)}}"><i class="fa fa-envelope"></i> Send</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
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
                @include('pemanduPembayaran.modal')

                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-jasa').DataTable( {
            "order": [[ 4, "desc" ]],
            "columnDefs": [
                {
                    "targets": [ 4 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        } );

        $('#table-homestay').DataTable( {
            "order": [[ 4, "desc" ]],
            "columnDefs": [
                {
                    "targets": [ 4 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        } );

        $('#table-barang').DataTable( {
            "order": [[ 4, "desc" ]],
            "columnDefs": [
                {
                    "targets": [ 4 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        } );
    });
   
    $('#modal-jasa').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiJasa = link.data('jasa');
    var modal = $(this);
   
    console.log(transaksiJasa);
    modal.find('#id').val(transaksiJasa["id"]);
    modal.find('#jenis').val("jasa");
    modal.find('#tanggal').val(transaksiJasa["tanggal"]);
    modal.find('#status').val(transaksiJasa["status"]);
    modal.find('#nama').text(transaksiJasa["nama_pemandu"]);
    modal.find('#bulan').text(transaksiJasa["bulan"]);
    modal.find('#bulans').val(transaksiJasa["tanggal"]);
    modal.find('#total_harga').text("Rp "+transaksiJasa["total_harga"]);
    modal.find('#total').val(transaksiJasa["total_harga"]);
    modal.find('#no_rekening').text(transaksiJasa["no_rekening"]);
    modal.find('#nama_rekening').text(transaksiJasa["nama_rekening"]);
    modal.find('#bank').text(transaksiJasa["bank"]);
    });

    $('#modal-homestay').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiHomestay = link.data('homestay');
    var modal = $(this);
   
    modal.find('#id').val(transaksiHomestay["id"]);
    modal.find('#jenis').val("homestay");
    modal.find('#tanggal').val(transaksiHomestay["tanggal"]);
    modal.find('#status').val(transaksiHomestay["status"]);
    modal.find('#nama').text(transaksiHomestay["nama_pemandu"]);
    modal.find('#bulan').text(transaksiHomestay["bulan"]);
    modal.find('#bulans').val(transaksiHomestay["tanggal"]);
    modal.find('#total_harga').text("Rp "+transaksiHomestay["total_harga"]);
    modal.find('#total').val(transaksiHomestay["total_harga"]);
    modal.find('#no_rekening').text(transaksiHomestay["no_rekening"]);
    modal.find('#nama_rekening').text(transaksiHomestay["nama_rekening"]);
    modal.find('#bank').text(transaksiHomestay["bank"]);
    });

    $('#modal-barang').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiBarang = link.data('barang');
    var modal = $(this);
   
    modal.find('#id').val(transaksiBarang["id"]);
    modal.find('#jenis').val("barang");
    modal.find('#tanggal').val(transaksiBarang["tanggal"]);
    modal.find('#status').val(transaksiBarang["status"]);
    modal.find('#nama').text(transaksiBarang["nama_pemandu"]);
    modal.find('#bulan').text(transaksiBarang["bulan"]);
    modal.find('#bulans').val(transaksiBarang["tanggal"]);
    modal.find('#total_harga').text("Rp "+transaksiBarang["total_harga"]);
    modal.find('#total').val(transaksiBarang["total_harga"]);
    modal.find('#no_rekening').text(transaksiBarang["no_rekening"]);
    modal.find('#nama_rekening').text(transaksiBarang["nama_rekening"]);
    modal.find('#bank').text(transaksiBarang["bank"]);
    });

    $('#modal-email').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var email = link.data('email');
    var modal = $(this);
   
    modal.find('#nama').text(email["nama_pemandu"]);
    modal.find('#total').text("Rp "+email["total_harga"]);
    modal.find('#no_rekening').text(email["no_rekening"]);
    modal.find('#nama_rekening').text(email["nama_rekening"]);
    modal.find('#bank').text(email["bank"]);
    });
</script>
@endsection
<!-- /.content -->