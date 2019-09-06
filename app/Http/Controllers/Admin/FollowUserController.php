<?php

namespace Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Article\Http\Controllers\Controller;
use Auth;
use Article\FollowUser;
use Article\User;
use DB;
use Carbon\Carbon;

class FollowUserController extends Controller
{
   public function store($id)
   {
      
       
    
       $dt = new Carbon();
       DB::insert('insert ignore into follow_users (user_id, followed_user_id ,created_at,updated_at) values (?,?,?,?)', [Auth::user()->id, $id, $dt, $dt]);
       
       return redirect('/home');
   }
   
   public function destroy($id)
   {
       $query = FollowUser::query();
       $query -> where('user_id',Auth::user()->id);
       $query -> where('followed_user_id',$id);
       $follow = $query->get();
       
       FollowUser::destroy($follow[0]->id);
       return redirect('/home');
   }
}
