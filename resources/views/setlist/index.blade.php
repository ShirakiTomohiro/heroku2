@extends('layouts.setfront')
@section('title', 'セットリスト一覧')

@section('content')
        <section class="container">
            <div class="search col-md-8 mx-auto mt-3">
                   <form action="{{ action('SetlistsController@index') }}" method="get">
                       <div class="form-group row">
                             <label class="col-md-2">アーティスト名</label>
                              <div class="col-md-8">
                                <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
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
                                    {{ $post->user_name }}
                                </div>
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 20) }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 30) }}
                                </div>
                                <div>
                                    <a href="admin/cont/index/{{$post->id}}" role="button">続きを読む</a><br>
                                    <br>
                                    <div>
                                        <a href="{{route('cont.collect', [$post->id])}}"><i class="far fa-comment-alt fa-lg" role="button"></a></i><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </section>

@endsection