@extends('layouts.setfront')
@section('title', 'コメント')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>コメントする</h3>
            <form action="{{ action('Admin\ContsController@addcreate') }}" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-10">
                       <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                </div>
                <input name="id" type="hidden" value="{{ $id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="送信">
            </form>
        </div>
    </div>
</div>
@endsection