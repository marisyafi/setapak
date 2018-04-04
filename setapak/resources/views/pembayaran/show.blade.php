<!DOCTYPE html>
<html>
@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pembayaran
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('/pembayaran')}}"><i class="fa fa-dashboard"></i> Pembayaran</a></li>
                <li  class="active">View</li>
            </ol>

            <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    
                    <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="#">
                        <div class="form-group">
                            <label for="nome">ID</label>
                            <p class="form-control-static">{{$pembayaran->id}}</p>
                        </div>

                        <div class="form-group">
                            <label for="title">NO. ORDER</label>
                            <p class="form-control-static">{{$pembayaran->no_order}}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">USER</label>
                            <p class="form-control-static">{{$pembayaran->user}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="user">TANGGAL TRANSAKSI</label>
                            <p class="form-control-static">{{date('j F Y', strtotime($pembayaran->tanggal_transaksi))}}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">TANGGAL PEMBAYARAN</label>
                            <p class="form-control-static">{{date('j F Y', strtotime($pembayaran->tanggal_pembayaran))}}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">TOTAL</label>
                            <p class="form-control-static">Rp. {{$pembayaran->total}}</p>
                        </div>

                        <div class="form-group">
                            <label for="picture">PICTURE</label>
                            @if($pembayaran['picture'] != null)
                             <img width="100" height="100" src="{{ asset($pembayaran->picture) }}" class="img-responsive"/>
                            @else
                             <img width="100" height="100" src="{{ asset("/upload/images/profil/noimage.png") }}" class="img-responsive">
                            @endif
                        </div>
                    </form>

                    <a class="btn btn-link" href="{{ route('pembayaran.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </section>
    </div>
@endsection