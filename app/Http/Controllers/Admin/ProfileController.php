<?php

namespace Article\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Article\Http\Controllers\Controller;


use Article\Profile;
use Article\Record;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
  {
      return view('admin.profile.create');
  }

  public function create(Request $request)
  {
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();
      
      unset($form['_token']);
      $profile->fill($form);
      $profile->save();
      
      return redirect('admin/profile/create');
  }
  
  public function index(Request $request)
  {
      $data = [];
//      $cond_title = $request->cond_title;
      $data['cond_title'] = $request->cond_title;
      echo $data['cond_title'];
      if ($data['cond_title'] != '') {
//          $posts = Profile::where('name', $cond_title)->get();
          $data['posts'] = Profile::where('name', $data['cond_title'])->get();
      } else {
//          $posts = Profile::all();
          $data['posts'] = Profile::all();
      }
//      return view('admin.profile.index', ['posts' => $posts, 'cond_title' =>
//      $cond_title]);
      return view('admin.profile.index', $data);
  }
  
  public function edit(Request $request)
  {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
          //abort(404);
      }
      
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }

 public function updata(Request $request)
 {
     // Validationをかける
     $this->validate($request, Profile::$rules);
     
     // Profile Modelからデータを取得する
     $profile = Profile::find($request->id);
     
     // 送信されてきたフォームデータを格納する
     $profile_form = $request->all();
     
     
     
     unset($profile_form['_token']);
     
     
     // 該当するデータを上書きして保存する
     $profile->fill($profile_form)->save();
     
     $records = new Record;
     $records->profile_id = $profile->id;
     $records->edited_at = Carbon::now();
     $records->save();
 
 return redirect('admin/profile/');
 }
 
 public function delete(Request $request)
 {
     $profile = Profile::find($request->id);
     $profile->delete();
     return redirect('admin/news/');
 }
 
}
