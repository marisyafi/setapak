@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Pemandu Wisata
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Pemandu Wisata</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-condensed table-striped" id="pemandu">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA COMPANY</th>
                                        <th>ALAMAT</th>
                                        <th>STATUS</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                    </div>               
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script>
$(function () {
  $("#pemandu").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/pemandu-data')}}",
        columns: [
            {data: 'pemandu_id', name: 'pemandu_id'},
            {data: 'nama_company', name: 'nama_company'},
            {data: 'alamat', name: 'alamat'},
            {data: 'pemandu_verifikasi', name: 'pemandu_verifikasi'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection
    <!-- /.content -->