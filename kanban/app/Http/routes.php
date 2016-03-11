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
use App\Models\Board;
use App\Models\Member;
use App\Models\Membermanagement;

Route::get('/getdata', 'BoardController@testData');

Route::get('/cards', 'BoardController@getCard');

Route::get('/card', function () {
    $board = Board::with(['members','cards'])->find(10);
    $cards = $board->cards()->get();
    $statusCout = \App\Models\Status::all()->toArray();
    $status = \App\Models\Status::all('name')->toArray();
    $kanban = [];
    $kanban['columns'] = [];

    foreach ($statusCout as $s){
        $status['cards'] = [];
        foreach($cards as $card){
            if ($card->statuses_id == $s['id']){
                $s['cards'][] = $card;
            }
        }
        $kanban['columns'][] = $s;
    }

    return $kanban;
});


Route::get('/', function () {
    return view('pages.user.login');
});
Route::get('/board', function () {
    return view('pages.user.board');
});

Route::get('/board{id}','BoardController@showBoard');// get ข้อมูล
//------------------------------------------------- Board
Route::get('/createBoard', function () {
return view('pages.user.createBoard');
});

Route::post('/createBoard','BoardController@createBoard');// สร้าง board

Route::get('/editBoard{id}','BoardController@getEditBoard');// get ข้อมูล
Route::post('/editBoard','BoardController@editBoard');// แก้ไข ข้อมูล


Route::get('/index','BoardController@showAllBoard'); // แสดง ทุก board

Route::get('/deleteBoard/{id}','BoardController@deleteBoard'); // ลบ board

Route::get('/membersmanagement', function () {
    return view('pages.memberManagement');
});

Route::get('/member{id}','MemberController@showMember');


Route::get('/showGantt', function () {
    return view('pages.user.gantt');
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





