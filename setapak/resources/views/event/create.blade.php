@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Event
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('/event')}}"><i class="fa fa-dashboard"></i> Event</a></li>
                <li class="active">Create</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('event.store') }}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            <label for="title-field">Title</label>
                            <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                            @if($errors->has("title"))
                             <span class="help-block">{{ $errors->first("title") }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('tanggal')) has-error @endif">
                            <label for="tanggal-field">Tanggal Terbit</label>
                            <input type="date" id="tanggal-field" name="tanggal" class="form-control date-picker" value="{{ old("tanggal") }}"/>
                            @if($errors->has("tanggal"))
                             <span class="help-block">{{ $errors->first("tanggal") }}</span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="description-field">Description</label>
                            <textarea class="form-control" id="editor1" rows="3" name="description">{{ old("description") }}</textarea>
                            @if($errors->has("description"))
                             <span class="help-block">{{ $errors->first("description") }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group @if($errors->has('picture')) has-error @endif">
                            <label for="picture-field">Picture</label>
                            <input type="file" id="picture-field" name="picture" accept="image/x-png,image/gif,image/jpeg" class="form-control" value="{{ old("picture") }}"/>
                            @if($errors->has("picture"))
                             <span class="help-block">{{ $errors->first("picture") }}</span>
                            @endif
                        </div>
                
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a class="btn btn-link pull-right" href="{{ route('event.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
    <!-- /.content -->
@section('script')
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    document.getElementById("tanggal-field").valueAsDate = new Date();
    
  });
</script>
@endsection