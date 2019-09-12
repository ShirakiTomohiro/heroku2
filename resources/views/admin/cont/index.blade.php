@extends('layouts.setfront')

@section('content')
<section class="container">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($setlist as $setlists)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6 mx-auto">
                                <div class="user_name">
                                    {{ $setlists->user_name }}
                                </div>
                                <div class="date">
                                    {{ $setlists->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($setlists->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                   
                                    <p>{!! nl2br(e($setlists->body)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
         <section class="container">
            <div class="posts col-md-7 mx-auto mt-5">
                @foreach($cont as $conts)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="user_name">
                                    {{ $conts->user_name }}
                                </div>
                                <div class="date">
                                    {{ $conts->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="body">
                                    {{ $conts->body }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </section>
 @endsection