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
                    <div class="row">
                        <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Jasa</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Homestay</a></li>
                                <li><a href="#tab_4" data-toggle="tab">Produk</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table table-condensed table-striped" id="pemandu">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA COMPANY</th>
                                                <th>ALAMAT</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <table class="table table-condensed table-striped" id="pemandu">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAMA COMPANY</th>
                                                    <th>ALAMAT</th>
                                                    <th>OPTION</th>
                                                </tr>
                                            </thead>
                                        </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table class="table table-condensed table-striped" id="pemandu">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAMA COMPANY</th>
                                                <th>ALAMAT</th>
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
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection
    <!-- /.content -->