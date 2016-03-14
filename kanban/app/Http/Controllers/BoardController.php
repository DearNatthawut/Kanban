<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;
use App\Models\Membermanagement;
use App\Models\Card;
use App\Models\Status;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;


class BoardController extends Controller
{
    public function showAllBoard()
    {
        $data = DB::table('boards')
            ->join('members', 'boards.manager_id', '=', 'members.id')
            ->select('members.*', 'members.name as manager ', 'boards.*')
            ->get();

        return view('pages.index')->with('allBoards', $data);
    }

    public function showBoard($id)
    {
        $data = Board::find($id);

        session::put("Board",$id);  //--------------------------------------- CreateSession
        session::put("Manager",$data->manager_id);

        return view('pages.user.board')->with('Board', $data);
    }

    public function getEditBoard($id)
    {
        $data = Board::find($id);
        return view('pages.user.edit')->with('getEdit', $data);
    }

    public function editBoard()
    {
        $edit = Board::find(\Input::get('id'));
        $edit->name = \Input::get('name');
        $edit->detail = \Input::get('detail');
        $edit->save();
        return redirect('/index');
    }

    public function createBoard()
    {
        $Board = new Board();
        $Board->name = \Input::get('name');
        $Board->detail = \Input::get('detail');
        $Board->save();
        return redirect('/index');
    }


    public function deleteBoard($id)
    {

        $membermana = Membermanagement::where('Boards_id', '=', $id)
            ->delete();

        $board = \App\Models\Board::find($id);
        $board->delete();
        return redirect('/index');
    }


    public function getCard()
    {
        /*
                $status = Status::all();
                $card =  DB::table('statuses')
                    ->join('cards','statuses.id','=','cards.statuses_id')
                    ->select('statuses.name','cards.name as title','cards.detail')
                    ->get();

                $card = (new Collection($card));
                $columns = [];
                $kanban['columns'] = [];
                foreach ($card as $key => $value) {
                    //return $key;
                    $column = [];
                    $column['name'] = $key;
                    $column['cards'] = $value;
                    $kanban['columns'][] = $column;
                }
                return $kanban;
            }
        */
        $board = Board::with(['members', 'cards'])->find(session()->get('Board'));
        $cards = $board->cards()->select('statuses_id','name as title','detail as details')->get();
        $status = \App\Models\Status::all('id','name')->toArray();
        $kanban = [];
        $kanban['columns'] = [];

        $num = 1;
        foreach ($status as $s) {
            $s['cards'] = [];

            foreach ($cards as $card) {

                if ($card->statuses_id == $num) {
                    $s['cards'][] = $card;
                }
            }
            $kanban['columns'][] = $s;
            $num++;
        }

        return $kanban;
    }

    public function createCard()
    {
        $BoardId = session()->get('Board');
       $Card = new Card();
        $Card->name = \Input::get('name');
        $Card->detail = \Input::get('detail');
        $Card->priorities_id = 1;
        $Card->statuses_id = 1;
        $Card->types_id = 1;
        $Card->color_id = 1;
        $Card->Boards_id = session()->get('Board');
        $Card->MemberManagements_id	 = session()->get('Manager');
        $Card->save();


        return redirect("/board$BoardId");

    }

}
