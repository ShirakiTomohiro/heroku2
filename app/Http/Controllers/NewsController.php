<?php

namespace ARTICLE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use ARTICLE\News;
use ARTICLE\Profile;

class NewsController extends Controller
{
    public function index()
    {
     
            $posts = News::all()->sortByDesc('updated_at');
            
            

        return view('news.index', ['posts' =>$posts]);
    }
    
    
    // public function search(Request $request)
    // {
    //     dd($request);
    //     $cond_name = $request->cond_name;
    //     if ($cond_name != '') {
    //         $result = News::where('type', $cond_name)->get();
    //     } else {
    //         "検索結果なし";
    //     }
    //     return view('admin.layouts.front', ['result' => $result, 'cond_name' => $cond_name]);
    // }
    
    
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
