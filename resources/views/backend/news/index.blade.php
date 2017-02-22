@extends('backend.backend')

@section('title','新闻列表')

@section('content')
    <add-record indicate="新增新闻" location="/admin/news/create"></add-record>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>索引</td>
            <td>标题</td>
            <td>阅读数</td>
            <td>创建时间</td>
            <td>更新时间</td>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->read_counts }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $news->links() }}
@endsection