<?php

namespace Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Article\Http\Controllers\Controller;
use Auth;
use Article\User;
class UsersController extends Controller
{
    public function change()
    {
        $user_id = Auth::user()->id;
      $users = User::find($user_id);
     
      if (empty($users)) {
          abort(404);
      }
       //dd($users);
        return view('admin.users.change', ['users' => $users]);
    }
    
    public function update(Request $request)
    {
       
        $users = User::find($request->id);
       
        $users_form = $request->all();
       
        unset($users_form['_token']);
       
        $users->fill($users_form)->save();
        
        return redirect('/home');
    }
}
