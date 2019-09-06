<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create');
    
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
    Route::get('comment/show/{id}', 'Admin\CommentsController@show')->middleware('auth')->name('comment.show');
    Route::get('users/change', 'Admin\UsersController@change')->middleware('auth');
    Route::post('users/change', 'Admin\UsersController@update')->middleware('auth');
    Route::get('setlist/create', 'Admin\SetlistsController@add')->middleware('auth');
    Route::post('setlist/create', 'Admin\SetlistsController@create')->middleware('auth');
    Route::get('cont/index/{id}', 'Admin\ContsController@index')->middleware('auth')->name('cont.index');
    
    //Route::get('profile', 'NewsController@profile')->middleware('auth');
});

Route::get('/setlist/index', 'SetlistsController@index')->middleware('auth');


Route::get('/news/comment/{id}', 'Admin\CommentsController@comment')->middleware('auth')->name('comment.comment');
Route::post('/news/comment', 'Admin\CommentsController@add')->middleware('auth');

Route::get('/setlist/cont/{id}', 'Admin\ContsController@collect')->middleware('auth')->name('cont.collect');
Route::post('/setlist/cont/', 'Admin\ContsController@addcreate')->middleware('auth');

    
Route::get('/likes/store/{id}', 'Admin\LikesController@store')->middleware('auth');
Route::get('/likes/delete/{id}', 'Admin\LikesController@delete')->middleware('auth');

Route::get('/follow/store/{id}', 'Admin\FollowUserController@store')->middleware('auth');
Route::get('/follow/destroy/{id}', 'Admin\FollowUserController@destroy')->middleware('auth');
    


Route::get('/', 'NewsController@index');
Route::get('/home', 'NewsController@index')->middleware('auth')->name('comment.show');





