<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setlist;

class SetlistsController extends Controller
{
    public function index(Request $request)
    {
       
         $cond_name = $request->cond_name;
         
            if ($cond_name !='') {
                $posts = Setlist::where('name', $cond_name)->get();
            } else{
                $posts = Setlist::all()->sortByDesc('updated_at');
            }
       
            return view('setlist.index', ['posts' =>$posts, 'cond_name' => $cond_name]);
    }
    
}
