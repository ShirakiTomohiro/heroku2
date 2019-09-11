<?php

namespace Article\Http\Controllers\Admin;
use Auth;
use Article\Setlist;

use Illuminate\Http\Request;
use Article\Http\Controllers\Controller;

class SetlistsController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
            if ($cond_title !='') {
                $posts = Setlist::where('name', $cond_name)->get();
            } else{
                $posts = Setlist::all()->sortByDesc('updated_at');
                
            }
            
        return view('setlist.index', ['posts' =>$posts, 'cond_name' => $cond_name]);
    }
    
    public function add()
    {
        $user_name =  Auth::user()->name;
        $user_id = Auth::user()->id;
        
        return view('admin.setlist.create', ['user_name' => $user_name, 'user_id'=> $user_id]);
    }
    
    public function create(Request $request)
    {
        
       $this->validate($request, Setlist::$rules);
      
       $list = new Setlist;
        
       $form = $request->all();
       
        unset($form['_token']);
        
        $list->fill($form);
        
        $list->save();
        
        return redirect('setlist/index');
    }
    
   
}
