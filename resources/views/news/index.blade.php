@extends('layouts.front')

@section('content')
        <section class="container">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $post->user_name }}
                                </div>
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                                <div>
                                    <a href="admin/comment/show/{{$post->id}}" role="button">続きを読む</a><br>
                                    <br>
                                    <?php $liked = false; ?>
                                    @foreach($post->likes as $like)
                                     @if ($like->user->id == Auth::id())
                                     <?php $liked = true;?>
                                     @endif
                                    @endforeach
                                    @if ($liked == true)
                                    <a href="/likes/delete/{{$post->id}}" role="button" class="btn btn-primary">いいね解除</a>
                                    @else
                                    <a href="/likes/store/{{$post->id}}" role="button" class="btn btn-primary">いいね : {{count($post->likes)}}</a>
                                    @endif
                                    
                                    
                                    <a href="{{route('comment.comment', [$post->id])}}" role="button" class="btn btn-primary">コメント : {{count($post->comment)}}</a>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{  $post->image_path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </section>

@endsection