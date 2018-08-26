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
                            <div class="row pull-right">
                                    <a class="btn-sm btn-success " data-toggle="modal" data-target="#modal-tambah" data-bank="{{$lokasi}}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-lokasi" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>LOKASI</th>
                                        <th>KECAMATAN</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lokasi as $key => $lokasis)
                                    <tr>
                                        <td>{{$key=$key+1}}</td>
                                        <td>{{$lokasis->nama_wisata}}</td>
                                        <td>{{$lokasis->alamat->kecamatan}}</td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-lokasi" data-lokasi="{{$lokasis}}" data-wisataid="{{$lokasis->wisatacategory_id}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            <form action="{{route('lokasi.destroy', $lokasis->wisatacategory_id)}}" method="POST" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
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
                                <form action="{{ route('lokasi.update', $lokasis->wisatacategory_id) }}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <input type="hidden" id="wisata_id" name="wisata_id" value="">

                                    <div class="form-group @if($errors->has('kecamatan')) has-error @endif">
                                        <label for="kecamatan">Kecamatan</label>
                                        {{-- <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ is_null(old("kecamatan")) ? $lokasis->kecamatan : old("kecamatan") }}"/> --}}
                                        <select id="kecamatan-id" name="kecamatan" class="form-control select2" style="width: 100%;">
                                            @foreach($alamat as $alamats)
                                            <option value="{{$alamats->alamatcategory_id}}">{{$alamats->kecamatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group @if($errors->has('nama_wisata')) has-error @endif">
                                        <label for="nama_wisata">Lokasi</label>
                                        <input type="text" id="nama_wisata" name="nama_wisata" class="form-control" value="{{$lokasis->nama_wisata}}"/>
                                        @if($errors->has("nama_wisata"))
                                        <span class="help-block">{{ $errors->first("nama_wisata") }}</span>
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
                            <h4 class="modal-title"><strong>Tambah Lokasi</strong></h4>
                        </div>
                        <form action="{{ route('lokasi.store') }}" enctype="multipart/form-data" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('kecamatan')) has-error @endif">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        @foreach($alamat as $alamats)
                                        <option value="{{$alamats->alamatcategory_id}}">{{$alamats->kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group @if($errors->has('nama_wisata')) has-error @endif">
                                    <label for="nama_wisata">Lokasi</label>
                                    <input type="text" id="nama_wisata" name="nama_wisata" class="form-control" value=""/>
                                    @if($errors->has("nama_wisata"))
                                    <span class="help-block">{{ $errors->first("nama_wisata") }}</span>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        
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
    var wisata_id = link.data('wisataid');
    var modal = $(this);

    console.log(dataLokasiEdit["alamatcategory_id"]);
    
    // var echelle= document.getElementById('kecamatan-id');
    // echelle.value = '10' ;

    modal.find('#wisata_id').val(wisata_id);
    modal.find('#kecamatan-id option[value='+dataLokasiEdit["alamatcategory_id"]+']').attr('selected','true');
    modal.find('#nama_wisata').val(dataLokasiEdit["nama_wisata"]);
    });

</script>
@endsection