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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Input;
use Validator;
date_default_timezone_set('Asia/Bangkok');

class BoardController extends Controller
{


    public function test()
    {
            return date('Y-m-d');
    }

    //แสดงข้อมูลบอร์ดในหน้าแรก
    public function showAllBoard()
    {
        $data = Board::with(['members', 'manager'])
          //->where('members.id','=',Auth::user()->id)
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
        $data = Board::all()->find($id);
        $dateFormatStart = preg_split('[-]', $data->estimate_start);
        $dateFormatStart =  $dateFormatStart[0]."/".$dateFormatStart[1]."/".$dateFormatStart[2];
        $dateFormatEnd = preg_split('[-]', $data->estimate_end);
        $dateFormatEnd =  $dateFormatEnd[0]."/".$dateFormatEnd[1]."/".$dateFormatEnd[2];
        
        return view('pages.board.edit')
            ->with('Board', $data)
            ->with('dateStart', $dateFormatStart)
            ->with('dateEnd', $dateFormatEnd);
    }

    public function editBoard()
    {

        $dateEs = preg_split('[-]', \Input::get('date'));
        
        $edit = Board::find(\Input::get('id'));
        $edit->name = \Input::get('name');
        $edit->detail = \Input::get('detail');
        $edit->estimate_start = $dateEs[0];
        $edit->estimate_end = $dateEs[1];
        $edit->save();
        return redirect('/home');
    }

    public function formCreateBoard(){
        return view('pages.board.createBoard');
    }

    //สร้าง Bord
    public function createBoard()
    {
        $dateEs = preg_split('[-]', \Input::get('date'));

        $Board = new Board();
        $Board->name = \Input::get('name');
        $Board->detail = \Input::get('detail');
        $Board->estimate_start = $dateEs[0];
        $Board->estimate_end = $dateEs[1];
        $Board->manager_id = Auth::user()->id;

        $Board->save();

        $id =  $Board['id'];
        $managerID = $Board['manager_id'];

        $Manager = new Membermanagement();
        $Manager->Boards_id = $id;
        $Manager->Members_id = $managerID;
        $Manager->save();

        return redirect('/home');
        /*$id = Board::find('name', '=', \Input::get('name'))
            ->select('id')
            ->get();
        $manager = new Membermanagement();
        //***     ยังไม่ได้สร้าง manager ตอนสร้างบอร์ด*/
    }

    //ลบ Baord
    public function deleteBoard($id)
    {

     /*   $cards = Card::where('Boards_id', '=', $id)
        ->get();

        $ids = [];
        foreach ($cards as $cards){
            $ids[] = $cards['id'];
        }

        $checklist = Checklist::whereIn('Cards_id',$ids)
            ->delete();

        $cards = Card::where('Boards_id', '=', $id)
            ->delete();

        $membermana = Membermanagement::where('Boards_id', '=', $id)->delete();


        $board = \App\Models\Board::find($id)->delete();*/
        $board= Board::find($id);
        $board->board_hide = 1;
        $board->save();

        return redirect('/home');
    }

    public function restoreBoard($id)
    {


        $board= Board::find($id);
        $board->board_hide = 0;
        $board->save();

        return redirect('/home');
    }
}
