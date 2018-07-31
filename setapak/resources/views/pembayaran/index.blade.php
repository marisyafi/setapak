@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Konfirmasi Pembayaran
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
                                    <table id="table-jasa" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. ORDER</th>
                                                <th>NAMA</th>
                                                <th>TANGGAL PEMBAYARAN</th>
                                                <th>TOTAL HARGA</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jasa as $jas)
                                        <tr>
                                            <td>{{$jas->transaction_id}}</td>
                                            <td>{{$jas->user->nama}}</td>
                                            <td>{{$jas->transaction_date}}</td>
                                            <td><p class="pull-right">Rp. {{$jas->total_harga}}</p></td>
                                            <td style="min-width: 50px">
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-default" data-jasa="{{$jas, $jas->pemandu->nama_company}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                {{-- <a href="{{ route('pembayaran.show', $jas->transaction_id)}}" type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a> --}}
                                                {{-- <form action="{{ url('/jasa-hapus', $jas->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form> --}}
                                                @if ($jas->transaction_status==0) 
                                                    <form action="{{ url('/jasa-status', $jas->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="1">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                    </form>
                                                @else
                                                    <form action="{{ url('/jasa-status', $jas->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="0">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
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
                                    <table id="table-homestay" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>NO. ORDER</th>
                                                <th>NAMA</th>
                                                <th>NAMA HOMESTAY</th>
                                                <th>TANGGAL PEMBAYARAN</th>
                                                <th>TOTAL HARGA</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($homestay as $home)
                                        <tr>
                                            <td>{{$home->transaction_id}}</td>
                                            <td>{{$home->user->nama}}</td>
                                            <td>{{$home->daftar->nama_homestay}}</td>
                                            <td>{{$home->transaction_date}}</td>
                                            <td><p class="pull-right">Rp. {{$home->total_harga}}</p></td>
                                            <td style="min-width: 50px">
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-homestay" data-home="{{$home}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                {{-- <form action="{{ url('/home-hapus', $home->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form> --}}
                                                @if ($home->transaction_status==0) 
                                                    <form action="{{ url('/homestay-status', $home->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="1">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                    </form>
                                                @else
                                                    <form action="{{ url('/homestay-status', $home->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="0">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
                                                    </form>
                                                @endif
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
                                                <th>NO. ORDER</th>
                                                <th>NAMA</th>
                                                <th>NAMA BARANG</th>
                                                <th>JUMLAH</th>
                                                <th>TOTAL HARGA</th>
                                                <th>TANGGAL PEMBAYARAN</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($barang as $bar)
                                        <tr>
                                            <td>{{$bar->transaction_id}}</td>
                                            <td>{{$bar->user->nama}}</td>
                                            <td>{{$bar->daftarBarang->nama_barang}}</td>
                                            <td>{{$bar->jumlah_barang}}</td>
                                            <td><p class="pull-right">Rp. {{$bar->total_harga}}</p></td>
                                            <td>{{$bar->transaction_date}}</td>
                                            <td style="min-width: 50px">
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-barang" data-barang="{{$bar}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                {{-- <form action="{{ url('/barang-hapus', $bar->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form> --}}
                                                @if ($bar->transaction_status==0) 
                                                    <form action="{{ url('/barang-status', $bar->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="1">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                    </form>
                                                @else
                                                    <form action="{{ url('/barang-status', $bar->transaction_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="transaction_status" value="0">
                                                        {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}} 
                                                        <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
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
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
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
<!-- <script>
$(function () {
  $(".table_jasa").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/pembayaran-data')}}",
        columns: [
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'transaction_date', name: 'transaction_date'},
            {data: 'total_harga', name: 'total_harga'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script> -->
<!-- <script src="assets/js/lib/data-table/datatables.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-jasa').DataTable();
    });
    $(document).ready(function(){
        $('#table-homestay').DataTable();
    });
    $(document).ready(function(){
        $('#table-barang').DataTable();
    });

    $('#modal-default').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiJasa = link.data('jasa');
    var modal = $(this);
   
    modal.find('#id').text("No. Order "+transaksiJasa["transaction_id"]+" ");
    modal.find('#tanggal_booking').text(transaksiJasa["tanggal_booking"]);
    modal.find('#transaction_date').text(transaksiJasa["transaction_date"]);
    modal.find('#total_harga').text("Rp. "+transaksiJasa["total_harga"]);
    modal.find('#bukti_pembayaran').html('<img style="cursor:zoom-in" width="250" height="250" src="'+transaksiJasa["photo_transfer"]+'"  class="img-responsive">');
    modal.find('#user').text(transaksiJasa.user["nama"]);
    modal.find('#pemandu').text(transaksiJasa.pemandu["nama_company"]);
    // modal.find('#user').html(transaksiJasa.jasa["nama_jasa"]);
    });


    $('#modal-homestay').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var transaksiHomestay = link.data('home');
    var modal = $(this);
   
    modal.find('#id').text("No. Order "+transaksiHomestay["transaction_id"]);
    modal.find('#tanggal_booking').text(transaksiHomestay["tanggal_booking"]);
    modal.find('#transaction_date').text(transaksiHomestay["transaction_date"]);
    modal.find('#check_in').text(transaksiHomestay["check_in"]);
    modal.find('#check_out').text(transaksiHomestay["check_out"]);
    modal.find('#total_harga').text("Rp. "+transaksiHomestay["total_harga"]);
    modal.find('#bukti_pembayaran').html('<img width="250" height="250" src="'+transaksiHomestay["photo_transfer"]+'"  class="img-responsive"/>');
    modal.find('#user').text(transaksiHomestay.user["nama"]);
    modal.find('#nama_homestay').html(transaksiHomestay.daftar["nama_homestay"]);
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