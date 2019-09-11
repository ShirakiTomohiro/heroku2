<?php

namespace Article\Http\Controllers;

use Illuminate\Http\Request;
use Article\News;
use Article\Comment;

class CommentsController extends Controller
{
    public function show($id)
    {
        $news_id = $id;
        $news = News::where('id', $news_id)->get();
        $comment = Comment::where('news_id', $news_id)->get();
        
        
        return view('comment.show', ['comment' => $comment, 'news' => $news]); 
        
    }
}
