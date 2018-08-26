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
                    <div class="row">
                        <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab"><h4><strong>Profile</strong></h4></a></li>
                                <li><a href="#tab_2" data-toggle="tab"><h4>Jasa</h4></a></li>
                                <li><a href="#tab_3" data-toggle="tab"><h4>Homestay</h4></a></li>
                                <li><a href="#tab_4" data-toggle="tab"><h4>Produk</h4></a></li>
                                <li class="pull-right"><a class="btn btn-link" href="{{ route('pemandu-wisata.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table">
                                        <tr>
                                            <td class="col-md-3"><h5>Nama Company</h5></td>
                                            <td class="col-md-9"><h5>{{$pemandu->nama_company}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><h5>Nama</h5></td>
                                            <td class="col-md-9"><h5>{{$pemandu->user->nama}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><h5>Nomor Handphone</h5></td>
                                            <td class="col-md-9"><h5>{{$pemandu->user->no_hp}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><h5>Alamat</h5></td>
                                            <td class="col-md-9"><h5>{{$pemandu->alamat}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><h5>Deskripsi</h5></td>
                                            <td class="col-md-9"><h5>{{$pemandu->deskripsi}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><h5>Status</h5></td>
                                            <td class="col-md-9">
                                                @if($pemandu->pemandu_verifikasi==0)
                                                    <h5><strong>Unverified</strong></h5>
                                                @else 
                                                    <h5 style="color: blue"><strong>Verified</strong></h5> 
                                                @endif      
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5 for="picture">Photo</h5></td> 
                                            <td>
                                                @if($pemandu['photo'] != null)
                                                <img width="100" height="100" src="{{ asset($pemandu->photo) }}" class="img-responsive"/>
                                                @else
                                                <img width="100" height="100" src="{{ asset("/upload/images/profil/noimage.png") }}" class="img-responsive">
                                                @endif
                                            </td>
                                        </tr>
                                    </div>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <table id="table-jasa" class="table table-condensed table-striped" id="pemandu">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>LOKASI</th>
                                                    <th>HARGA</th> 
                                                    <th> </th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($jasa as $key => $jas)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$jas->nama_jasa}}</td>
                                                <td >{{$jas->deskripsi}}</td>
                                                <td>{{$jas->lokasi_wisata}}</td>
                                                <td><p class="pull-right">Rp {{$jas->harga_jasa}}</p></td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-jasa" data-jasa="{{$jas}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table id="table-homestay" class="table table-condensed table-striped" id="pemandu">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA HOMESTAY</th>
                                                <th>ALAMAT</th>
                                                <th>HARGA</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($homestay as $key =>$home)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$home->nama_homestay}}</td>
                                                <td>{{$home->alamat}}</td>
                                                <td><p class="pull-right">Rp {{$home->harga_perhari}}</p></td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-homestay" data-homestay="{{$home}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4">
                                    <table id="table-barang" class="table table-condensed table-striped" id="pemandu">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>DESKRIPSI</th>
                                                <th>HARGA</th>
                                                <th>JUMLAH</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $key => $bar)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$bar->nama_barang}}</td>
                                                <td>{{$bar->deskripsi}}</td>
                                                <td><p class="pull-right">Rp {{$bar->harga}}</p></td>
                                                <td>{{$bar->kuantitas}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-barang" data-barang="{{$bar}}"><i class="glyphicon glyphicon-eye-open"></i> View</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col --> 
                    @include('pemandu.modal')              
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')

{{-- <script src="assets/js/lib/data-table/datatables.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-jasa').DataTable();
        $('#table-homestay').DataTable();
        $('#table-barang').DataTable();
    });

    // set the value of modal jasa
    $('#modal-jasa').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // get the to the element DOM
        var dataJasa= link.data('jasa'); // get the data that passed on
        var modal = $(this); // make the current elemtn, which is #modal-bank to be accessible

        console.log(dataJasa);
        // set the value of the form modal jasa 
        modal.find('#nama_jasa').text(dataJasa["nama_jasa"]);
        modal.find('#harga').text(dataJasa["harga_jasa"]);
        modal.find('#deskripsi').text(dataJasa["deskripsi"]);
        modal.find('#lokasi').text(dataJasa["lokasi_wisata"]);
        // modal.find('#jenis').text(dataJasa.jenis["nama_jeniscategory"]);
        modal.find('#photo').html('<img style="cursor:zoom-in" width="250" height="250" src="'+dataJasa["mainphoto"]+'"  class="img-responsive">')
    });

    // set the value of modal homestay
    $('#modal-homestay').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // get the to the element DOM
        var dataHomestay= link.data('homestay'); // get the data that passed on
        var modal = $(this); // make the current elemtn, which is #modal-bank to be accessible

        console.log(dataHomestay);
        // set the value of the form modal Homestay 
        modal.find('#nama_homestay').text(dataHomestay["nama_homestay"]);
        modal.find('#harga').text(dataHomestay["harga_perhari"]);
        modal.find('#deskripsi').text(dataHomestay["deskripsi"]);
        modal.find('#alamat').text(dataHomestay["alamat"]);
        modal.find('#lokasi').text(dataHomestay.alamat["kecamatan"]);
        modal.find('#photo').html('<img style="cursor:zoom-in" width="250" height="250" src="'+dataHomestay["mainphoto"]+'"  class="img-responsive">');
    });

    // set the value of modal barang
    $('#modal-barang').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // get the to the element DOM
        var dataBarang= link.data('barang'); // get the data that passed on
        var modal = $(this); // make the current elemtn, which is #modal-bank to be accessible

        console.log(dataBarang);
        // set the value of the form modal Barang 
        modal.find('#nama_barang').text(dataBarang["nama_barang"]);
        modal.find('#harga').text(dataBarang["harga"]);
        modal.find('#deskripsi').text(dataBarang["deskripsi"]);
        modal.find('#berat').text(dataBarang["berat_gram"]);
        modal.find('#jumlah').text(dataBarang["kuantitas"]);
        modal.find('#photo').html('<img style="cursor:zoom-in" width="250" height="250" src="'+dataBarang["mainphoto"]+'"  class="img-responsive">');
    });
</script>
@endsection
    <!-- /.content -->