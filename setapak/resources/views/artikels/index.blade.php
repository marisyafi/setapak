@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Artikel
                <small>Artikel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Artikel</li>
            </ol>
            <div class="box-tools pull-right">
                <a class="btn btn-success" href="{{ route('artikels.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            </div>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>USER</th>
                                <th>TANGGAL TERBIT</th>
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
// window.alert('yuhuuuu');
$(function () {
  $(".table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/artikel-data')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'user', name: 'user'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection
    <!-- /.content -->
