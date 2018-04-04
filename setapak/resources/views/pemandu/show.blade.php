<!DOCTYPE html>
<html>
@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pemandu
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('/pemandu-wisata')}}"><i class="fa fa-dashboard"></i> Pemandu</a></li>
                <li  class="active">View</li>
            </ol>

            <form action="{{ route('pemandu-wisata.destroy', $pemandu->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
                            <label for="title">USERNAME</label>
                            <p class="form-control-static">{{$pembayaran->username}}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">EMAIL</label>
                            <p class="form-control-static">{{$pembayaran->email}}</p>
                        </div>

                        <div class="form-group">
                            <label for="description">DESCRIPTION</label>
                            <p class="form-control-static">{!!$pembayaran->description!!}</p>
                        </div>

                        <div class="form-group">
                            <label for="picture">PICTURE</label>
                            @if($artikel['picture'] != null)
                             <img width="100" height="100" src="{{ asset($artikel->picture) }}" class="img-responsive"/>
                            @else
                             <img width="100" height="100" src="{{ asset("/upload/images/profil/noimage.png") }}" class="img-responsive">
                            @endif
                        </div>
                    </form>

                    <a class="btn btn-link" href="{{ route('artikels.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </section>
    </div>
@endsection