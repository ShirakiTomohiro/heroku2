@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
  <div class="container">
    <div class="myhome col-me-5 float-left">
        <div class="row">
            <ul>
                <li>退会</li>
            </ul>
        </div>
    </div>
            <div class="list-news col-md-6 float-right">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@edit', 
                                            ['id' => $news->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@delete',
                                            ['id' => $news->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <!--</section>-->
    </div>
@endsection