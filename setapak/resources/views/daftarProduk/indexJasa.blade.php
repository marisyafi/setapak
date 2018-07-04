@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Produk
                <small>Jasa</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Daftar Produk</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA PEMANDU</th>
                            </tr>
                        </thead>
                    </table>                
                </div>
            </div>
        </section>
    </div>
@endsection