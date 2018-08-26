<!DOCTYPE html>
<html>
@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div>
                <h1>
                    Artikel

                    <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <a class="btn btn-warning btn-group" role="group" href="{{ route('artikels.edit', $artikel->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form> 
                </h1>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="#">
                        <div class="form-group">
                            <h4 for="title"><strong>TITLE</strong></h4>
                            <h5 class="form-control-static">{{$artikel->title}}</h5>
                        </div>

                        <div class="form-group">
                            <h4 for="user"><strong>TANGGAL TERBIT</strong></h4>
                            <h5 class="form-control-static">{{date('j F Y', strtotime($artikel->updated_at))}}</h5>
                        </div>

                        <div class="form-group">
                            <h4 for="description"><strong>DESCRIPTION</strong></h4>
                            <h5 class="form-control-static">{!!$artikel->description!!}</h5>
                        </div>

                        <div class="form-group">
                            <h4 for="sumber"><strong>SUMBER</strong></h4>
                            <h5 class="form-control-static">{{$artikel->sumber}}</h5>
                        </div>

                        <div class="form-group">
                            <h4 for="picture"><strong>PICTURE</strong></h4>
                            @if($artikel['picture'] != null)
                             <img width="250" height="250" src="{{ asset($artikel->picture) }}" class="img-responsive"/>
                            @else
                             <img width="250" height="250" src="{{ asset("/upload/images/profil/noimage.png") }}" class="img-responsive">
                            @endif
                        </div>
                    </form>

                    <a class="btn btn-link" href="{{ route('artikels.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </div>
        </section>
    </div>
@endsection