@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Verifikasi Pembayaran
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pembayaran</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
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