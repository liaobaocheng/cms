@extends('backend.backend')

@section('content')
    <form class="form-horizontal">

        <img src="{{ asset($image->file) }}" height="150" />
        <div class="form-group">
            <label class="col-sm-2 control-label">Caption</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $image->caption }}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{ $image->description }}</p>
            </div>
        </div>

        <a href="{{ url('/images/'.$image->id.'/edit') }}" class="btn btn-warning">Edit</a>
        <a href="{{ url('/images') }}" class="btn btn-warning">&lt;Back</a>

    </form>
@stop