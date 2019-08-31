<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Comment;

class CommentsController extends Controller
{
    
  public function comment($id)
  {
    return view('admin.comment.create',['id'=>$id]);
  }
  
    public function show(Request $request)
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
    
    // public function (Request $request)
    // {
    //     $query = Comment::query();
    //     $query->where('user_id',Auth::user()->id);
    //     $query->where('news_id',$request->id);
    //     $query->where('comments',$request->comment);
    //     $query->where('user_name',Auth::user()->name);
    //     $comment = $query->get();
    //     return view('admin.news.comment', ['_form' => $comment]);
    // }
}
