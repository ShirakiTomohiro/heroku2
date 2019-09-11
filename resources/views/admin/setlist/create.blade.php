@extends('layouts.setfront')
@section('title', 'セットリスト作成')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>セットリスト作成</h2>
                <form action="{{ action('Admin\SetlistsController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="user_name" value="{{ $user_name }}">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <div class="form-group row">
                        <label class="col-md-2" for="name">アーティスト</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ツアータイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="place">開催地</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                           {!! Form::label('period', '日付:') !!}
                                <?php $today = \Carbon\Carbon::now(); ?>

                                    {{Form::selectRange('from_year', 2015, 2019, '', ['placeholder' => ''])}}年
                                    {{Form::selectRange('from_month', 1, 12, '', ['placeholder' => ''])}}月
                                    {{Form::selectRange('from_day', 1, 31, '', ['placeholder' => ''])}}日
                           
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="body">セットリスト</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection