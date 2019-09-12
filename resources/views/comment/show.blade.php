@extends('layouts.front')
@section('title', '記事')

@section('content')
<div class="container">
            <div class="posts col-md-6 mx-auto mt-3">
                @foreach($news as $result)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-12">
                                <div class="user_name">
                                    {{ $result->user->name }}
                                </div>
                                <div class="date text-right">
                                    {{ $result->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($result->title, 150) }}
                                </div>
                                <div class="image col-md-10 mt-4">
                                    @if ($result->image_path)
                                    <img src="{{ $result->image_path }}">
                                    @endif
                               </div>
                                <div class="body mt-3">
                                    {{ str_limit($result->body, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="posts col-md-7 mx-auto mt-5">
                @foreach($comment as $comments)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $comments->user_name }}
                                </div>
                                <div class="date">
                                    {{ $comments->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="body">
                                    {{ $comments->body }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
@endsection