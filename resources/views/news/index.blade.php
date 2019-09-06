@extends('layouts.front')
@section('title', '記事一覧')

@section('content')
        <section class="container">
            <div class="search col-md-8 mx-auto mt-3">
                   <form action="{{ action('NewsController@index') }}" method="get">
                       <div class="form-group row">
                             <label class="col-md-2">アーティスト名</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                              </div>
                                <div class="col-md-2">
                                       {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                                </div>
                       </div>
                   </form>
                </div>
            <div class="posts col-md-8 mx-auto mt-3">
                
                @foreach($posts as $post)
                    
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $post->user->name }}
                                </div>
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 40) }}
                                </div>
                                <div>
                                    <a href="admin/comment/show/{{$post->id}}" role="button">続きを読む</a><br>
                                    <br>
                                    <ul class="icon">
                                    <?php $liked = false; ?>
                                    @foreach($post->likes as $like)
                                     @if ($like->user->id == Auth::id())
                                     <?php $liked = true;?>
                                     @endif
                                    @endforeach
                                    @if ($liked == true)
                                    
                                    <a href="/likes/delete/{{$post->id}}"><i class="fas fa-heart fa-lg my-white" role="button"></a></i><span> : {{count($post->likes)}}</span>
                                    @else
                                    <a href="/likes/store/{{$post->id}}" ><i class="far fa-heart fa-lg my-red"　role="button"></a></i><span> : {{count($post->likes)}}</span>
                                   
                                    @endif
                                   
                                    <a href="{{route('comment.comment', [$post->id])}}"><i class="far fa-comment-alt fa-lg" role="button"></a></i><span> : {{count($post->comment)}}</span>
                                    
                                    <?php $followed = false; ?>
                                    @if(Auth::user())
                                        @foreach(Auth::user()->follow_user as $followUser)
                                        @if ($followUser->id == $post->user_id)
                                        <?php $followed = true;?>
                                        @endif
                                        @endforeach
                                        @if (Auth::id() == $post->user_id)
                                        @else
                                        
                                            @if ($followed == true)
                                            <a href="/follow/destroy/{{$post->user->id}}" role = "button" class="btn btn-primary">解除</a>
                                            @else
                                            <a href="/follow/store/{{$post->user->id}}" role = "button" class="btn btn-primary">フォロー</a>
                                            @endif
                                        @endif
                                    @endif
                                    </ul>
                                    
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