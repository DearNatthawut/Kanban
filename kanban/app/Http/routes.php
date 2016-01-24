<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('pages.user.login');

});
Route::get('/board', function () {
    return view('pages.user.board');
});
Route::get('/index', function () {
    return view('pages.index');
});
Route::get('/membersmanagement', function () {
    return view('pages.memberManagement');
});

Route::get('/member', function () {
    return view('pages.user.member');
});

Route::get('/showGantt', function () {
    return view('pages.user.gantt');
});

Route::get('/setting', function () {
    return view('pages.user.setting');
});
Route::get('/profile', function () {
    return view('pages.user.profile');
});
Route::get('/template', function () {
    return view('pages.user.template');
});


Route::group(['prefix' => 'api'], function () {
    Route::get('users', function () {
        return "All users";
    });

    Route::post('newUser', function () {
       $user =  Input::all();
        return "User ID : $user[id]";
    });

});
Route::get('/login',function(){
    return view('pages.user.login');
});
// Authentication routes...

Route::post('auth/login','Login\LoginController@postLogin');
Route::get('auth/logout','Login\LoginController@getLogout');





