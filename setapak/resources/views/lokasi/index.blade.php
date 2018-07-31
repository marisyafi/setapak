@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Lokasi Wisata
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Lokasi Wisata</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                            <div class="box-tools pull-right">
                                    <a class="btn-sm btn-success " data-toggle="modal" data-target="#modal-tambah" data-bank="{{$lokasi}}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                            </div></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-lokasi" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KABUPATEN</th>
                                        <th>KECAMATAN</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lokasi as $key => $lokasis)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$lokasis->kabupaten}}</td>
                                        <td>{{$lokasis->kecamatan}}</td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-lokasi" data-lokasi="{{$lokasis}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            <form action="{{route('lokasi.destroy', $lokasis->bank_id)}}" method="POST" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>  
                </div>
            </div>

            <div class="modal fade" id="modal-lokasi">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong>Edit</strong></h4>
                        </div>
                        <div class="modal-body">
                                <form action="{{ route('lokasi.update', $lokasis->lokasi_id) }}" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group @if($errors->has('kabupaten')) has-error @endif">
                                        <label for="title-field">Kabupaten</label>
                                        <input type="text" id="kabupaten" name="kabupaten" class="form-control" value="{{ is_null(old("kabupaten")) ? $lokasis->kabupaten : old("kabupaten") }}"/>
                                        @if($errors->has("kabupaten"))
                                        <span class="help-block">{{ $errors->first("kabupaten") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('kecamatan')) has-error @endif">
                                        <label for="title-field">Kecamatan</label>
                                        <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ is_null(old("kecamatan")) ? $lokasis->kecamatan : old("kecamatan") }}"/>
                                        @if($errors->has("kecamatan"))
                                        <span class="help-block">{{ $errors->first("kecamatan") }}</span>
                                        @endif
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="modal-tambah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong>Tambah Kecamatan</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('lokasi.update', $lokasis->alamatcategory_id) }}" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('kabupaten')) has-error @endif">
                                    <label for="kabupaten">Nama Kabupaten</label>
                                    <input type="text" id="kabupaten" name="kabupaten" class="form-control" />
                                    @if($errors->has("kabupaten"))
                                    <span class="help-block">{{ $errors->first("kabupaten") }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('kecamatan')) has-error @endif">
                                    <label for="kecamatan">Nomor Kecamatan</label>
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control"/>
                                    @if($errors->has("kecamatan"))
                                    <span class="help-block">{{ $errors->first("kecamatan") }}</span>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </section>
    </div>
@endsection
    <!-- /.content -->
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-lokasi').DataTable();
    });

    $('#modal-lokasi').on('show.bs.modal', function (event) {
    var link = $(event.relatedTarget);
    var dataLokasiEdit = link.data('lokasi');
    var modal = $(this);
   
    modal.find('#kabupaten').val(dataLokasiEdit["kabupaten"]);
    modal.find('#kecamatan').val(dataLokasiEdit["kecamatan"]); 
    });

</script>
@endsection