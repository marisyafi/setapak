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
                                            <td>{{$jas->user['nama']}}</td>
                                            <td>{{$jas->transaction_date}}</td>
                                            <td>{{$jas->total_harga}}</td>
                                            <td style="min-width: 50px">
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-default" data-jasa="{{$jas, $jas->pemandu->nama_company}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                {{-- <a href="{{ route('pembayaran.show', $jas->transaction_id)}}" type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> View</a> --}}
                                                <form action="{{ url('/jasa-hapus', $jas->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form>
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
                                                <th>TANGGAL CHECK IN</th>
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
                                            <td>{{$home->check_in}}</td>
                                            <td>{{$home->transaction_date}}</td>
                                            <td>{{$home->total_harga}}</td>
                                            <td style="min-width: 50px">
                                            <button type="button" id="modal-jasa" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-default"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                <form action="{{ url('/home-hapus', $home->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form>
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
                                                <th>HARGA</th>
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
                                            {{-- {{dd($bar->daftarBarang)}} --}}
                                            <td>{{$bar->daftarBarang['nama_barang']}}</td>
                                            <td>{{$bar->daftarBarang['harga']}}</td>
                                            <td>{{$bar->jumlah_barang}}</td>
                                            <td>{{$bar->total_harga}}</td>
                                            <td>{{$bar->transaction_date}}</td>
                                            <td style="min-width: 50px">
                                                <button type="button" id="modal-jasa" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-default"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                <form action="{{ url('/barang-hapus', $bar->transaction_id)}}" method="GET" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                                </form>
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
    console.log(transaksiJasa);
    modal.find('#id').text(transaksiJasa["transaction_id"]);
    modal.find('#tanggal_booking').text(transaksiJasa["tanggal_booking"]);
    modal.find('#transaction_date').text(transaksiJasa["transaction_date"]);
    modal.find('#total_harga').text(transaksiJasa["total_harga"]);
    modal.find('#bukti_pembayaran').text(transaksiJasa["photo_transfer"]);
    modal.find('#user').text(transaksiJasa.user["nama"]);
    modal.find('#pemandu').text(transaksiJasa.pemandu["nama_company"]);
    // modal.find('#user').html(transaksiJasa.jasa["nama_jasa"]);
   
  });
</script>
@endsection
<!-- /.content -->