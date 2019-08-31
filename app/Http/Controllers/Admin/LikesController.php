<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use Auth;
use App\News;
use App\User;
use DB;
use Carbon\Carbon;

class LikesController extends Controller
{
    public function store($id)
    {
        
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->news_id = $id;
        
        $news = News::find($id);
        $user = User::find($news->user_id);
 //       $like->save();
        $dt = new Carbon();
        DB::insert('insert ignore into likes (user_id, news_id ,created_at,updated_at) values (?,?,?,?)', [$like->user_id, $id, $dt, $dt]);
        
        return redirect('/home');
    }
    
    public function delete($id)
    {

       $query = Like::query();
       $query->where('user_id',Auth::user()->id);
       $query->where('news_id',$id);
       $like = $query->get();
       
      Like::destroy($like[0]->id);
      return redirect('/home');
    }
    
}
