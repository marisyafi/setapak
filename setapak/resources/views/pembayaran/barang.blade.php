@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Konfirmasi Pembayaran Produk
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
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab"><h5>Unconfirm</h5></a></li>
                                        <li><a href="#tab_2" data-toggle="tab"><h5>Confirmed</h5></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <table id="table-barang" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO. ORDER</th>
                                                        <th>NAMA</th>
                                                        <th>NAMA BARANG</th>
                                                        <th>TANGGAL PEMBAYARAN</th>
                                                        <th>TOTAL HARGA</th>
                                                        <th>STATUS</th>
                                                        <th>OPTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($barangu as $bar)
                                                <tr>
                                                    <td>{{$bar->transaction_id}}</td>
                                                    <td>{{$bar->user->nama}}</td>
                                                    <td>{{$bar->daftarBarang->nama_barang}}</td>
                                                    <td>{{date('j F Y', strtotime($bar->transaction_date))}}</td>
                                                    <td><p class="pull-right">Rp {{$bar->total_harga}}</p></td>
                                                    <td>
                                                        @if ($bar->transaction_status == 0)
                                                            Belum bayar
                                                        @elseif ($bar->transaction_status == 1)
                                                            Sudah bayar
                                                        @endif
                                                    </td>
                                                    <td style="min-width: 50px">
                                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-barang" data-barang="{{$bar}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                        @if ($bar->transaction_status==1) 
                                                            <form action="{{ url('/barang-status', $bar->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="POST">
                                                                <input type="hidden" name="transaction_status" value="2">
                                                                {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                                <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="tab_2">
                                            <table id="table-barangc" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO. ORDER</th>
                                                        <th>NAMA</th>
                                                        <th>NAMA BARANG</th>
                                                        <th>TANGGAL PEMBAYARAN</th>
                                                        <th>TOTAL HARGA</th>
                                                        <th>STATUS</th>
                                                        <th>OPTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($barangu as $bar)
                                                <tr>
                                                    <td>{{$bar->transaction_id}}</td>
                                                    <td>{{$bar->user->nama}}</td>
                                                    <td>{{$bar->daftarBarang->nama_barang}}</td>
                                                    <td>{{date('j F Y', strtotime($bar->transaction_date))}}</td>
                                                    <td><p class="pull-right">Rp {{$bar->total_harga}}</p></td>
                                                    <td>
                                                        @if ($bar->transaction_status == 2)
                                                            Confirmed
                                                        @elseif ($bar->transaction_status == 3 || $bar->transaction_status == 4)
                                                            On going
                                                        @elseif ($bar->transaction_status == 5 || $bar->transaction_status == 6)
                                                            Done
                                                        @endif
                                                    </td>
                                                    <td style="min-width: 50px">
                                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-barang" data-barang="{{$bar}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                        @if ($bar->transaction_status==2) 
                                                            <form action="{{ url('/barang-status', $bar->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="POST">
                                                                <input type="hidden" name="transaction_status" value="1">
                                                                {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                                <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                @include('pembayaran.modal')

                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-barang').DataTable();
    });
    $(document).ready(function(){
        $('#table-barangc').DataTable();
    });

    $('#modal-barang').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiBarang = link.data('barang');
    var modal = $(this);
  
    modal.find('#id').text("No. Order "+transaksiBarang["transaction_id"]);
    modal.find('#tanggal_booking').text(transaksiBarang["tanggal_booking"]);
    modal.find('#transaction_date').text(transaksiBarang["transaction_date"]);
    modal.find('#total_harga').text("Rp. "+transaksiBarang["total_harga"]);
    modal.find('#jumlah_barang').html(transaksiBarang["jumlah_barang"]);
    modal.find('#ongkos_kirim').html("Rp. "+transaksiBarang["ongkos_kirim"]);
    modal.find('#bukti_pembayaran').html('<img width="250" height="250" src="'+transaksiBarang["photo_transfer"]+'"  class="img-responsive"/>');
    modal.find('#user').text(transaksiBarang.user["nama"]);
    });
  
</script>
@endsection
<!-- /.content -->