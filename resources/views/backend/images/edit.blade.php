@extends('backend.backend')

@section('body')
    @include('error-notification')
    {!! Form::model($image,['url' => '/images/'.$image->id, 'method' => 'PUT', 'files'=>true]) !!}

    <img src="{{ asset($image->file) }}" height="150" />
    <div class="form-group">
        <label for="userfile">Image File</label>
        {!! Form::file('userfile',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="caption">Caption</label>
        {!! Form::text('caption',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ url('/images') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop