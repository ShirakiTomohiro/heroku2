<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setlist;
use App\Cont;
use Auth;
class ContsController extends Controller
{
    public function collect($id)
    {
        
        return view('admin.cont.addcreate',['id'=>$id]);
    }
    
     public function addcreate(Request $request)
    {
    
        $cont = new Cont;
        $cont->user_id = Auth::user()->id;
        $cont->setlist_id = $request->id;
        $cont->body = $request->body;
        $cont->user_name = Auth::user()->name;
        
        unset($cont['_token']);
        $cont->save();
        return redirect('setlist/index');
    }
    
     public function index($id)
    {
        
        $setlist_id = $id;      
        $setlist = Setlist::where('id', $setlist_id)->get();
        $cont = Cont::where('setlist_id', $setlist_id)->get();
        
        return view('admin.cont.index', ['cont' => $cont, 'setlist' => $setlist]);
    }
}
