<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    public function delete($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return redirect('/');
    }
}
