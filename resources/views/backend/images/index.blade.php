@extends('backend.backend')

@section('content')
    <div class="row">
        @if(count($images) > 0)
            <div class="col-md-12 text-center" >
                <a href="{{ url('/admin/images/create') }}" class="btn btn-primary" role="button">
                    新增图片
                </a>
                <hr />
            </div>
        @endif
        @forelse($images as $image)
            <div class="col-md-3" >
                <div class="thumbnail">
                    <img src="{{asset($image->file)}}" style="height: 300px;" />
                    <div class="caption">
                        <h3>{{$image->caption}}</h3>
                        <p>{!! substr($image->description, 0,100) !!}</p>
                        <p>
                        <div class="row text-center" style="padding-left:1em;">
                            <a href="{{ url('/admin/images/'.$image->id.'/edit') }}" class="btn btn-warning pull-left">编辑</a>
                            <span class="pull-left">&nbsp;</span>
                            {!! Form::open(['url'=>'/admin/images/'.$image->id, 'class'=>'pull-left']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('删除', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'确定删除???\')']) !!}
                            {!! Form::close() !!}
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>还没有图片  <a href="{{ url('/admin/images/create') }}">新增一个</a>?</p>
        @endforelse
    </div>
    <div align="center">{!! $images->render() !!}</div>
@stop