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

use App\Models;


//--------------------------------------------------------------------------------------Login
Route::get('/', function () {
    return view('pages.member.login');
});

//------------------------------------------------------------------------------------- Board

Route::get('/board{id}','BoardController@showBoard');// get ข้อมูล

Route::get('/createBoard', function () {// สร้าง board
    return view('pages.board.createBoard');
});

Route::post('/createBoard','BoardController@createBoard');//ส่งข้อมูล สร้าง board

Route::get('/editBoard{id}','BoardController@formEditBoard');// get ข้อมูล

Route::post('/editBoard','BoardController@editBoard');// แก้ไข ข้อมูล

Route::get('/index','BoardController@showAllBoard'); // แสดง ทุก board

Route::get('/deleteBoard/{id}','BoardController@deleteBoard'); // ลบ board


//---------------------------------------------------------------------------------------- Card

Route::get('/cards', 'CardController@getCard'); // get card data main

Route::get('/createCard','CardController@formNewCard');//สร้าง form card

Route::post('/createCard','CardController@createCard');// สร้าง card

Route::post('/moveCard','CardController@moveCard'); // ย้าย card

Route::post('/removeCard','CardController@removeCard');// ลบ card

//-----------------------------------------------------------------------------------------Member
Route::get('/member{id}','MemberController@showMember');

// Authentication routes...
Route::post('auth/member','Login\LoginController@postLogin');
Route::get('auth/logout','Login\LoginController@getLogout');