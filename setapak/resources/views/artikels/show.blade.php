<!DOCTYPE html>
<html>
@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Artikel
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('/artikels')}}"><i class="fa fa-dashboard"></i> Artikel</a></li>
                <li  class="active">View</li>
            </ol>

            <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('artikels.edit', $artikel->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                            <p class="form-control-static">{{$artikel->id}}</p>
                        </div>

                        <div class="form-group">
                            <label for="title">TITLE</label>
                            <p class="form-control-static">{{$artikel->title}}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">USER</label>
                            <p class="form-control-static">Admin</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="user">TANGGAL TERBIT</label>
                            <p class="form-control-static">{{date('j F Y', strtotime($artikel->tanggal))}}</p>
                        </div>

                        <div class="form-group">
                            <label for="description">DESCRIPTION</label>
                            <p class="form-control-static">{!!$artikel->description!!}</p>
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