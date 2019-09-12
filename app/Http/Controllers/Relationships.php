<?php

namespace Article\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Article\Relationship;

class Relationships extends Controller
{
    public function create(Request $request)
    {
        
        $relationship = new Relationship;
        $relationship->followed_id = $request->id;
        $relationship->follower_id = Auth::user()->id;
        $relationship->save();
        return redirect('/home');
    }
    public function destroy(Request $request)
    {
        //dd($request->id);
        Relationship::whereRaw("followed_id = ? AND follower_id = ?", [$request->id, Auth::user()->id])->delete();
        return redirect('/home');
    }
}
