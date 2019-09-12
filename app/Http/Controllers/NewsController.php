<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Type;
use App\News;
use App\Profile;
use App\User;
use App\Relationship;
use Auth;



class NewsController extends Controller
{
    public function index(Request $request)
    {
       //dd($request);
        $cond_title = $request->cond_title;
        $selected = $request->follow;
        $user = Auth::user();
        if ($cond_title !='' ) {
            $posts = News::where('title', $cond_title)->get();
            
            }elseif($selected == "followed") {
                //$posts = Auth::user()->active_relationships;//->pluck("followed_id")
                $follow_user_ids = Relationship::select(['followed_id'])->where('follower_id', $user->id)->get();
                //dd($follow_user_ids);
                $posts = News::whereIn('user_id', $follow_user_ids)->get();
                //dd($posts);
            }else {
                 $posts = News::all()->sortByDesc('updated_at');

            }
            return view('news.index', ['posts' =>$posts, 'cond_title' => $cond_title]);
    }
            
            

        
    
    
    
   //$posts = Relationship::where('followed_id',$user_id)->get();
    
    
    public function profile(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Profile::where('name', $cond_title).orderBy('updated_at', 
            'desc')->get();
        } else {
            $posts = Profile::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
            
        
        
        return view('profile.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
   }
 }
