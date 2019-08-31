<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Comment;
use App\News;

class CommentsController extends Controller
{
    
  public function comment($id)
  {
    return view('admin.comment.create',['id'=>$id]);
  }
  
    public function add(Request $request)
    {
       
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->news_id = $request->id;
        $comment->body = $request->body;
        $comment->user_name = Auth::user()->name;
        
        unset($comment['_token']);
        $comment->save();
        return redirect('/home');
    }
  
    public function show($id)
    {
        $news_id = $id;
        $news = News::where('id', $news_id)->get();
        $comment = Comment::where('news_id', $news_id)->get();
        
        
        return view('admin.comment.show', ['comment' => $comment, 'news' => $news]); 
        
    }
}
