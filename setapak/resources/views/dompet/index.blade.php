@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Penarikan Dana
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Penarikan Dana</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table-dompet" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>JUMLAH DANA</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dompet as $key => $dom)
                                    <tr>
                                        <td>{{$key++}}</td>
                                        <td>{{$dom->user->nama}}</td>
                                        <td><p class="pull-right">Rp. {{$dom->saldo}}</p></td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-dompet" data-dompet="{{$dom}}"><i class="glyphicon glyphicon-eye-open"></i> Detail</button>
                                            @if ($dom->status==0) 
                                                <form action="{{route('dompet.update', $dom->dompet_id)}}" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="status" value="1">
                                                    {{-- <input type="hidden" name="_token" value="'.csrf_token().'"> --}}                                                         
                                                    <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
                                                </form>
                                            @elseif ($dom->status == 1)
                                                <a class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-ok"></i> Done</button>
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

            <div class="modal fade" id="modal-dompet">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><strong id="user"> </strong></h4>
                        </div>
                        <div class="modal-body">
                            <table class="table"> 
                                <tr>
                                    <td class="col-md-4"><h5>Tanggal Pengajuan</h5></td>
                                    <td class="col-md-8"><h5 id="tanggal_keluar"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Jumah Penarikan Dana</h5></td>
                                    <td class="col-md-8"><h5 id="saldo"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Nama di Rekening Bank</h5></td>
                                    <td class="col-md-8" ><h5 id="nama"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Nomor Rekening</h5></td>
                                    <td class="col-md-8" ><h5 id="no_rekening"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Nama Bank</h5></td>
                                    <td class="col-md-8" ><h5 id="nama_bank"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Cabang</h5></td>
                                    <td class="col-md-8" ><h5 id="cabang"></h5></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4"><h5>Tanggal Transfer</h5></td>
                                    <td class="col-md-8" ><h5 id="tanggal_transfer"></h5></td>
                                </tr>
                            </table>
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
        $('#table-dompet').DataTable();
    });

    // set the value of modal detail
    $('#modal-dompet').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // get the to the element DOM
        var dataDompet= link.data('dompet'); // get the data that passed on
        var modal = $(this); // make the current elemtn, which is #modal-bank to be accessible

        // debuging console
        console.log('link ', link);
        console.log('bank data ', dataDompet);
        console.log('element/dom modalnya ', modal);
        // set the value of the form modal edit 
        modal.find('#user').text(dataDompet.user["nama"]);
        modal.find('#tanggal_masuk').text(dataDompet["tanggal_masuk"]);
        modal.find('#tanggal_keluar').text(dataDompet["tanggal_keluar"]);
        modal.find('#tanggal_transfer').text(dataDompet["updated_at"]);
        modal.find('#saldo').text("Rp. "+dataDompet["saldo"]);
        modal.find('#nama').text(dataDompet["nama"]);
        modal.find('#nama_bank').text(dataDompet["nama_bank"]);
        modal.find('#no_rekening').text(dataDompet["no_rekening"]);
        modal.find('#cabang').text(dataDompet["cabang"]);
    });
</script>
@endsection