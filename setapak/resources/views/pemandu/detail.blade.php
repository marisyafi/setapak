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
                                <li class="pull-right"><a class="btn btn-link" href="{{ route('pemandu-wisata.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table">
                                        <tr>
                                            <td class="col-md-4"><h5><strong>Nama Company</strong></h5></td>
                                            <td class="col-md-8"><h5><strong>{{$pemandu->nama_company}}</strong></h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4"><h5>Nama User</h5></td>
                                            <td class="col-md-8"><h5>Charlie</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4"><h5>Alamat</h5></td>
                                            <td class="col-md-8"><h5>{{$pemandu->alamat}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4"><h5>Deskripsi</h5></td>
                                            <td class="col-md-8"><h5>{{$pemandu->deskripsi}}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4"><h5>Status</h5></td>
                                            <td class="col-md-8">
                                                @if($pemandu->pemandu_verifikasi==0)
                                                    <h6>Unverified</h6>
                                                @else 
                                                    <h6>Verified</h6> 
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
                                                    <th>OPTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($jasa as $jas)
                                            <tr>
                                                <td>{{$jas->jasa_id}}</td>
                                                <td>{{$jas->nama_jasa}}</td>
                                                <td>{{$jas->deskripsi}}</td>
                                                <td>{{$jas->lokasi_wisata}}</td>
                                                <td>{{$jas->harga_jasa}}</td>
                                                <td style="min-width: 50px">
                                                    
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
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($homestay as $home)
                                            <tr>
                                                <td>{{$home->homestay_id}}</td>
                                                <td>{{$home->nama_homestay}}</td>
                                                <td>{{$home->alamat}}</td>
                                                <td>{{$home->harga_perhari}}</td>
                                                <td style="min-width: 50px">
                                                    
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
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $bar)
                                            <tr>
                                                <td>{{$bar->barang_id}}</td>
                                                <td>{{$bar->nama_barang}}</td>
                                                <td>{{$bar->deskripsi}}</td>
                                                <td>{{$bar->harga}}</td>
                                                <td>{{$bar->kuantitas}}</td>
                                                <td style="min-width: 50px">
                                                    
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
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
<script>
// $(function () {
//   $("#pemandu").DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ url('/pemandu-data')}}",
//         columns: [
//             {data: 'pemandu_id', name: 'pemandu_id'},
//             {data: 'nama_company', name: 'nama_company'},
//             {data: 'alamat', name: 'alamat'},
//             {data: 'action', name: 'action'},
//         ],
//   });
// });

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-jasa').DataTable();
    });
    $(document).ready(function(){
        $('#table-homestay').DataTable();
    });
    $(document).ready(function(){
        $('#table-barang').DataTable();
    });
</script>
</script>
@endsection
    <!-- /.content -->