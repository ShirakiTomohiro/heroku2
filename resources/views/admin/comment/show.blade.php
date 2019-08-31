@extends('layouts.front')

@section('content')
<section class="container">
            <div class="posts col-md-10 mx-auto mt-5">
                @foreach($news as $result)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $result->user_name }}
                                </div>
                                <div class="date">
                                    {{ $result->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($result->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($result->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-8">
                                @if ($result->image_path)
                                    <img src="{{  $result->image_path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </section>
        <section class="container">
            <div class="posts col-md-7 mx-auto mt-5">
                <h2>コメント一覧</h2>
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
        </section>
@endsection