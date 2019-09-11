<?php

namespace Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Article\Http\Controllers\Controller;
use Article\User;
class UsersController extends Controller
{
    public function delete($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return redirect('/');
    }
}
