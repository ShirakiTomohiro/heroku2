@extends('layouts.admin')
@section('title', 'プロフィール編集')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>プロフィール編集</h2>
            <form action "{{ action('Admin\UsersController@update') }}"
            method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="name">ユーザー名</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="mail">メールアドレス</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="mail" value="{{ $users->email }}">
                    </div>
                </div>
                <!--<div class="form-group row">-->
                <!--    <label class="col-md-2" for="password">パスワード</label>-->
                <!--    <div class="col-md-10">-->
                <!--        <input type="text" class="form-control" name="password" value="{{ $users->password}}">-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
