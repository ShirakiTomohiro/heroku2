<?php

namespace Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Article\Type;
use Article\News;
use Article\Profile;
use Article\User;
use Article\Relationship;
use Auth;


class NewsController extends Controller
{
    public function index(Request $request)
    {
        //dd($request);
        $cond_title = $request->cond_title;
       
        if ($cond_title !='' ) {
            $posts = News::where('title', $cond_title)->get();
        
            }else {
                 $posts = News::all()->sortByDesc('updated_at');

            }
            return view('news.index', ['posts' =>$posts, 'cond_title' => $cond_title]);
    }
            
            

        
    
    
    
   
    
    
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
