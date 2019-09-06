@extends('layouts.front')
@section('title', 'カテゴリの記事一覧')

@section('content')

<section class="container">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($result as $results)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $results->user_name }}
                                </div>
                                <div class="date">
                                    {{ $results->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($results->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($results->body, 40) }}
                                </div>
                                <div>
                                    <a href="admin/comment/show/{{$results->id}}" role="button">続きを読む</a><br>
                                    <br>
                                    <ul class="icon">
                                    <?php $liked = false; ?>
                                    @foreach($results->likes as $like)
                                     @if ($like->user->id == Auth::id())
                                     <?php $liked = true;?>
                                     @endif
                                    @endforeach
                                    @if ($liked == true)
                                    <a href="/likes/delete/{{$results->id}}"><i class="fas fa-heart fa-lg my-white" role="button"></a></i><span> : {{count($results->likes)}}</span>
                                    @else
                                    <a href="/likes/store/{{$results->id}}" ><i class="far fa-heart fa-lg my-red"　role="button"></a></i><span> : {{count($results->likes)}}</span>
                                   
                                    @endif
                                   
                                    <a href="{{route('comment.comment', [$results->id])}}"><i class="far fa-comment-alt fa-lg" role="button"></a></i><span> : {{count($results->comment)}}</span>
                                    
                                    </ul>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($results->image_path)
                                    <img src="{{  $results->image_path }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </section>