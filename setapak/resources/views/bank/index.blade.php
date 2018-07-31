@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Bank
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Bank</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                            <div class="box-tools pull-right">
                                    <a class="btn-sm btn-success " data-toggle="modal" data-target="#modal-tambah" data-bank="{{$bank}}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                            </div></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-bank" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA BANK</th>
                                        <th>NO. REK</th>
                                        <th>PHOTO</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bank as $key => $banks)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$banks->nama_bank}}</td>
                                        <td>{{$banks->no_rekening}}</td>
                                        <td>
                                            <img width="50" height="50" src="{{ asset($banks->photo) }}" class="img-responsive"/>
                                        </td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-bank" data-bank="{{$banks}}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                            <form action="{{route('bank.destroy', $banks->bank_id)}}" method="POST" style="display: inline;" onclick="if(confirm("Delete? Are you sure?")) { return true } else {return false };">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                                            </form>
                                            @if ($banks->status==0) 
                                                <form action="{{url('/bank-status', $banks->bank_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="status" value="1">
                                                    {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}}                                                         
                                                    <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                    </form>
                                                @else
                                                    <form action="{{url('/bank-status', $banks->bank_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="status" value="0">
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
                        <!-- /.box-body -->
                    </div>  
                </div>
            </div>

            <div class="modal fade" id="modal-bank">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong>Edit</strong></h4>
                        </div>
                        <div class="modal-body">
                                <form action="{{ route('bank.update', $banks->bank_id) }}" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group @if($errors->has('nama_bank')) has-error @endif">
                                        <label for="nama_bank">Nama Bank</label>
                                        <input type="text" id="nama_bank" name="nama_bank" class="form-control" />
                                        @if($errors->has("nama_bank"))
                                        <span class="help-block">{{ $errors->first("nama_bank") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('no_rekening')) has-error @endif">
                                        <label for="no_rekening">Nomor Rekening</label>
                                        <input type="text" id="no_rekening" name="no_rekening" class="form-control"/>
                                        @if($errors->has("no_rekening"))
                                        <span class="help-block">{{ $errors->first("no_rekening") }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if($errors->has('photo')) has-error @endif">
                                        <label for="picture-field">Photo</label>
                                        <input type="file" id="picture-field" name="photo" accept="image/x-png,image/gif,image/jpeg" class="form-control"/>
                                        @if($errors->has("photo"))
                                        <span class="help-block">{{ $errors->first("photo") }}</span>
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
                            <h4 class="modal-title"><strong>Tambah Bank</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('bank.store') }}" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group @if($errors->has('nama_bank')) has-error @endif">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input type="text" id="nama_bank" name="nama_bank" class="form-control" value="{{ old("nama_bank") }}"/>
                                    @if($errors->has("nama_bank"))
                                    <span class="help-block">{{ $errors->first("nama_bank") }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('no_rekening')) has-error @endif">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input type="text" id="no_rekening" name="no_rekening" class="form-control" value="{{ old("no_rekening") }}"/>
                                    @if($errors->has("no_rekening"))
                                    <span class="help-block">{{ $errors->first("no_rekening") }}</span>
                                    @endif
                                </div>

                                <div class="form-group @if($errors->has('photo')) has-error @endif">
                                    <label for="picture">Photo</label>
                                    <input type="file" id="picture" name="photo" accept="image/x-png,image/gif,image/jpeg" class="form-control" value="{{ old("photo") }}"/>
                                    @if($errors->has("photo"))
                                    <span class="help-block">{{ $errors->first("photo") }}</span>
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
        $('#table-bank').DataTable();
    });

    // set the value of modal edit
    $('#modal-bank').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // get the to the element DOM
        var dataBankEdit= link.data('bank'); // get the data that passed on
        var modal = $(this); // make the current elemtn, which is #modal-bank to be accessible

        // debuging console
        console.log('link ', link);
        console.log('bank data ', dataBankEdit);
        console.log('element/dom modalnya ', modal);
        // set the value of the form modal edit 
        modal.find('#nama_bank').val(dataBankEdit["nama_bank"]);
        modal.find('#no_rekening').val(dataBankEdit["no_rekening"]);
    });
</script>
@endsection