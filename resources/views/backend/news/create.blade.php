@extends('backend.backend')

@section('title','新增新闻')

@section('styles')
    <link rel="stylesheet" href="/vendor/wangeditor/css/wangEditor.css">
@endsection
@section('content')
    <div id="edit-news">
        {{ Form::open(array('url' => 'admin/news')) }}

        <div class="form-group">
            {{ Form::label('title', '新闻标题') }}
            {{ Form::text('title', null,array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('content', '新闻内容') }}
            <textarea name="content" class="form-control"></textarea>
        </div>

        {{ Form::submit('保存新闻', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/vendor/wangeditor/js/lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/vendor/wangeditor/js/wangEditor.js"></script>
    <script>
        var textarea = $('textarea');
        var editor = new wangEditor(textarea);
        editor.config.menus = [
            'underline','bold','undo', 'redo','link', 'img','fullscreen'
        ];
        editor.config.hideLinkImg = true;
        editor.create();
    </script>
@endsection