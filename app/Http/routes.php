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

Route::get('/test','BoardController@test');

Route::get('/ganttGet', 'CardController@getCard');
//--------------------------------------------------------------------------------------Login
Route::get('/', function () {

    if (!Auth::check()) return view('auth/login');
    
        return redirect('/home');
    
});

//------------------------------------------------------------------------------------- Board

Route::get('/board/{id}','BoardController@showBoard');// get ข้อมูล

Route::get('/createBoard', 'BoardController@formCreateBoard' );

Route::post('/createBoard','BoardController@createBoard');//ส่งข้อมูล สร้าง board

Route::get('/editBoard/{id}','BoardController@formEditBoard');// get ข้อมูล

Route::post('/editBoard','BoardController@editBoard');// แก้ไข ข้อมูล

Route::get('/home','BoardController@showAllBoard'); // แสดง ทุก board

Route::get('/deleteBoard/{id}','BoardController@deleteBoard'); // board To Bin

Route::get('/hardDeleteBoard/{id}','BoardController@hardDeleteBoard'); // ลบ board

Route::get('/restoreBoard/{id}','BoardController@restoreBoard'); // กู้คืน board

Route::get('/getDataMember', 'BoardController@getDataMember' );

Route::post('/boardComplete','BoardController@boardComplete');// เปลี่ยนสถานะ เสร็จ

Route::post('/boardInComplete','BoardController@boardPostInComplete');// เปลี่ยนสถานะ ไม่เสร็จ

Route::get('/boardInComplete/{id}','BoardController@boardGetInComplete');// เปลี่ยนสถานะ ไม่เสร็จ

//---------------------------------------------------------------------------------------- Card

Route::get('/cards', 'CardController@getCard'); // get card data main

Route::get('/getCardEditData', 'CardController@getCardEditData');

Route::get('/createCard/{id}','CardController@formNewCard');//สร้าง form card

Route::get('/delCard/{id}','CardController@delCard');//สร้าง ลบ card Detail

Route::post('/createCard','CardController@createCard');// สร้าง card

Route::get('/editCard/{idBoard}/{id}','CardController@editFormCard');// แก้ไขform card อาจไม่จำเป็น

Route::post('/editCard/{id}','CardController@editCard');// แก้ไข card

Route::post('/moveCard','CardController@moveCard'); // ย้าย card

Route::post('/removeCard','CardController@removeCard');// ลบ card

Route::post('/getOneCard', 'CardController@getOneCard');//get One Card

//------------------------------------------------------------------- Checklist

Route::post('/changeCheckStatus/{id}','CardController@changeCheckStatus');// แก้ไขสถานะ checklist

Route::post('/addNewChecklist/{id}','CardController@addNewChecklist');// เพิ่ม checklist

Route::post('/updateChecklist/{id}','CardController@updateChecklist');// แก้ไข checklist

Route::post('/removeChecklist/{cardID}/{checklistID}','CardController@removeChecklist');// ลบ checklist

//-------------------------------------------------------------------------- Comment

Route::post('/addNewComment/{id}','CardController@addNewComment');// เพิ่ม comment

Route::post('/commentMoveBack/{id}','CardController@addNewCommentMoveBack');// เพิ่ม comment Move Back

Route::post('/commentMoveAllBack/{id}','CardController@addNewCommentMoveAllBack');// เพิ่ม comment Move Back

Route::post('/updateChecklist/{id}','CardController@updateChecklist');// แก้ไข comment

Route::post('/removeComment/{commentID}/{cardID}','CardController@removeComment');// ลบ comment

//-----------------------------------------------------------------------------------------Gantt

Route::get('/showGantt/{id}','GanttController@getGantt');

Route::get('/current-board/cards','GanttController@getCurrentBoardCards');

//-----------------------------------------------------------------------------------------Member
Route::get('/member/{id}','MemberController@showMember');
Route::post('/addMember/{id}','MemberController@addMember');

//del Member
Route::post('/delMember/{id}','MemberController@delMember');
Route::post('/getBackMember/{id}','MemberController@getbackMember');

//------------------------------------------------------------------------------------------------Help
Route::get('/help', function () {
    return view('pages.help');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
//---------------------------------------------------------------------------------------------------Edit
Route::get('/view-edit', 'MemberController@viewPassword');
Route::get('/changepassword', 'MemberController@viewChangePassword');
Route::get('/changename', 'MemberController@viewName');
Route::get('/change-email', 'MemberController@viewEmail');

Route::post('/changePassword/{id}', 'MemberController@changePassword');
Route::post('/changeName/{id}', 'MemberController@changeName');
Route::post('/changeEmail/{id}', 'MemberController@changeEmail');


//---------------------------------------------------------------------------------------

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// use for @break in blade 
Blade::extend(function($value)
{
    return preg_replace('/(\s*)@(break|continue)(\s*)/', '$1<?php $2; ?>$3', $value);
});
