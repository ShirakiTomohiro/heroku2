@extends('layouts.admin')
@section('title', '記事の新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記事の新規作成</h2>
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="type">ジャンル</label>
                        <div class="col-md-10">
                            <select name="type" id="type">
                                <option value="Janru">--- 記事のジャンル ---</option>
                                <option value="テクノロジー">テクノロジー</option>
                                <option value="エンタメ">エンタメ</option>
                                <option value="ライフスタイル">ライフスタイル</option>
                                <option value="ビジネス">ビジネス</option>
                                <option value="音楽">音楽</option>
                                <option value="写真">写真</option>
                                <option value="小説">小説</option>
                                <option value="コラム">コラム</option>
                                <option value="サブカルチャー">サブカルチャー</option>
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="user_name" value="{{ $user_name }}">
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection