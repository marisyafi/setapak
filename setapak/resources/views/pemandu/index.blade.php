@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Pemandu Wisata
                <small>Verifikasi</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Pemandu Wisata</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-condensed table-striped" id="pemandu">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>USERNAME</th>
                                <th>DESKRIPSI</th>
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
  $("#pemandu").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/pemandu-data')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'username', name: 'username'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection
    <!-- /.content -->