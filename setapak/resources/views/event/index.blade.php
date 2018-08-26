@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div>
                <h1>
                <i class=""></i>
                    Event
                    <div class="box-tools pull-right">
                        <a class="btn btn-success" href="{{ route('event.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                    </div>
                </h1>
            </div>    
        </section>
        
        <section class="content">
            <div class="row">
               <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>TANGGAL</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                             </table>                
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection
    <!-- /.content -->
@section('script')
<script>
$(function () {
  $(".table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/event-data')}}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'tanggalpelaksanaan', name: 'tanggalpelaksanaan'},
            {data: 'action', name: 'action'},
        ],
  });
});
</script>
@endsection