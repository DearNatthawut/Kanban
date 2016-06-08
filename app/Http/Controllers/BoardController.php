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
use App\Models\User;

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
        $data = Card::
        where('Board_id', '=', session()->get('Board'))
            ->select('id', 'name', 'estimate_start', 'estimate_end', 'date_start', 'date_end')
            ->get();
        return $data;
    }

    //แสดงข้อมูลบอร์ดในหน้าแรก
    public function showAllBoard()
    {
        if (!Auth::check()) return redirect("/");

        $data = Board::with(['members', 'manager','membersManager'])
            ->select('boards.*')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.board.index')->with('allBoards', $data);
    }

    //แสดงบอร์ด
    public function showBoard($id)
    {
        if (!Auth::check()) return redirect("/");

        $data = Board::find($id);
        session::put("Board", $id);  //--------------------------------------- CreateSession
        session::put("Manager", $data->manager_id);

        return view('pages.board.board')->with('Board', $data);
    }

    //แก้ไขบอร์ด
    public function formEditBoard($id)
    {
        if (!Auth::check()) return redirect("/");

        $data = Board::all()->find($id);
        $dateFormatStart = preg_split('[-]', $data->estimate_start);
        $dateFormatStart = $dateFormatStart[0] . "/" . $dateFormatStart[1] . "/" . $dateFormatStart[2];
        $dateFormatEnd = preg_split('[-]', $data->estimate_end);
        $dateFormatEnd = $dateFormatEnd[0] . "/" . $dateFormatEnd[1] . "/" . $dateFormatEnd[2];

        $manager = Membermanagement::with(['member'])
            ->where('Board_id', '=', $id)
            ->get();

        return view('pages.board.edit')
            ->with('Board', $data)
            ->with('dateStart', $dateFormatStart)
            ->with('dateEnd', $dateFormatEnd)
            ->with('members', $manager);
    }

    public function editBoard()
    {

        if (!Auth::check()) return redirect("/");

        $dateEs = preg_split('[-]', \Input::get('date'));

        $edit = Board::find(\Input::get('id'));
        $edit->name = \Input::get('name');
        $edit->detail = \Input::get('detail');
        $edit->manager_id = \Input::get('manager');
        $edit->estimate_start = $dateEs[0];
        $edit->estimate_end = $dateEs[1];
        $edit->save();
        return redirect('/home');
    }

    public function formCreateBoard()
    {

        if (!Auth::check()) return redirect("/");

        $members = User::all();
        return view('pages.board.createBoard')
            ->with('members', $members);
    }

    //สร้าง Bord
    public function createBoard()
    {
        if (!Auth::check()) return redirect("/");

        $dateEs = preg_split('[-]', \Input::get('date'));

        $Board = new Board();
        $Board->name = \Input::get('name');
        $Board->detail = \Input::get('detail');
        $Board->estimate_start = $dateEs[0];
        $Board->estimate_end = $dateEs[1];
        $Board->manager_id = \Input::get('manager');
        $Board->save();


        $id = $Board['id'];
        $managerID = $Board['manager_id'];
        if (Auth::user()->id == $managerID) {
            $Manager = new Membermanagement();
            $Manager->Board_id = $id;
            $Manager->User_id = $managerID;
            $Manager->save();
        } else {
            $Manager = new Membermanagement();
            $Manager->Board_id = $id;
            $Manager->User_id = $managerID;
            $Manager->save();

            $Manager = new Membermanagement();
            $Manager->Board_id = $id;
            $Manager->User_id = Auth::user()->id;
            $Manager->save();
        }


        return redirect('/home');

    }

    //ลบ Baord
    public function deleteBoard($id)
    {

        if (!Auth::check()) return redirect("/");
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
        $board = Board::find($id);
        $board->board_hide = 1;
        $board->save();

        return redirect('/home');
    }

    public function restoreBoard($id)
    {
        if (!Auth::check()) return redirect("/");

        $board = Board::find($id);
        $board->board_hide = 0;
        $board->save();

        return redirect('/home');
    }

    public function getDataMember()
    {
        if (!Auth::check()) return redirect("/");
        $user = User::find(Auth::user()->id);
        $board = Board::with([])
            ->find(session()->get('Board'));

        $data['user'] = $user;
        $data['board'] = $board;
        return $data;

    }
}
