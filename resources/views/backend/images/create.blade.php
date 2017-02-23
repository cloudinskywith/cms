@extends('backend.backend')

@section('content')
    {!! Form::open(['url'=>'/admin/images', 'method'=>'POST', 'files'=>'true']) !!}

    <div class="form-group">
        <label for="userfile">Image File</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control" name="caption" value="">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">上传</button>
    <a href="{{ url('/admin/images') }}" class="btn btn-warning">取消</a>

    {!! Form::close() !!}
@stop