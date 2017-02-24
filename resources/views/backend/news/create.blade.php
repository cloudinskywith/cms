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
            <textarea name="content" class="form-control my-editor"></textarea>

        </div>

        {{ Form::submit('保存新闻', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            language: 'zh_CN',
            height: 600,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : '图片管理器',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "yes"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection