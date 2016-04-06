<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 7:12 PM
 */
namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Color;
use App\Models\Member;
use App\Models\Membermanagement;
use App\Models\Card;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Checklist;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Input;
use Validator;

class BoardController extends Controller
{


    public function test()
    {

    $data = Card::with(['checkList'])
        ->get();
            return $data;
    }

    //แสดงข้อมูลบอร์ดในหน้าแรก
    public function showAllBoard()
    {

        $data = Board::with(['members', 'manager'])
            ->select('boards.*')
            ->get();

        return view('pages.board.index')->with('allBoards', $data);
    }

    //แสดงบอร์ด
    public function showBoard($id)
    {
        $data = Board::find($id);

        session::put("Board", $id);  //--------------------------------------- CreateSession
        session::put("Manager", $data->manager_id);

        return view('pages.board.board')->with('Board', $data);
    }

    //แก้ไขบอร์ด
    public function formEditBoard($id)
    {
        $data = Board::find($id);
        return view('pages.board.edit')->with('getEdit', $data);
    }

    public function editBoard()
    {
        $edit = Board::find(\Input::get('id'));
        $edit->name = \Input::get('name');
        $edit->detail = \Input::get('detail');
        $edit->save();
        return redirect('/index');
    }

    //สร้าง Bord
    public function createBoard()
    {
        $Board = new Board();
        $Board->name = \Input::get('name');
        $Board->detail = \Input::get('detail');
        $Board->save();
        return redirect('/index');
        /*$id = Board::find('name', '=', \Input::get('name'))
            ->select('id')
            ->get();
        $manager = new Membermanagement();
        //***     ยังไม่ได้สร้าง manager ตอนสร้างบอร์ด*/


    }

    //ลบ Baord
    public function deleteBoard($id)
    {

        $membermana = Membermanagement::where('Boards_id', '=', $id);
        $membermana->delete();

        $board = \App\Models\Board::find($id);
        $board->delete();
        return redirect('/index');
    }
}
