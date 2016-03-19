<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Color;
use App\Models\Member;
use App\Models\Membermanagement;
use App\Models\Card;
use App\Models\Priority;
use App\Models\Status;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Input;
use Validator;


class BoardController extends Controller
{
    public function testData()
    {
        $id = Board::where('name', '=', "จัดติว")
            ->select('id')
            ->get();
        $getID = $id->id;
        return $getID;
    }

    public function showAllBoard()
    {
        /* $data = DB::table('boards')
             ->join('members', 'boards.manager_id', '=', 'members.id')
             ->select('members.*', 'members.name as manager ', 'boards.*')
             ->get();*/

        $data = Board::with(['members', 'manager'])
            ->select('boards.*')
            ->get();


        return view('pages.index')->with('allBoards', $data);
    }

    public function showBoard($id)
    {
        $data = Board::find($id);

        session::put("Board", $id);  //--------------------------------------- CreateSession
        session::put("Manager", $data->manager_id);

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

        $id = Board::find('name', '=', \Input::get('name'))
            ->select('id')
            ->get();

        $manager = new Membermanagement();


        return redirect('/index');
    }


    public function deleteBoard($id)
    {

        $membermana = Membermanagement::where('Boards_id', '=', $id);
        $membermana->delete();

        $board = \App\Models\Board::find($id);
        $board->delete();
        return redirect('/index');
    }

//---------------------------------------------------------------------------------------------------------Card
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
        $cards = $board->cards()->select('id as card_id', 'statuses_id', 'name as title', 'detail as details')->get();
        $status = \App\Models\Status::all('id', 'name')
            ->sortBy('id')
            ->toArray();

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

    public function createNewCard()
    {
        $status = Status::all('id', 'name')
            ->sortBy('id')
            ->toArray();
        $prior = Priority::all('id', 'name')
            ->sortBy('id')
            ->toArray();
        $color = Color::all('id', 'name')
            ->sortBy('id')
            ->toArray();
        $member = Member::all('id', 'name')
            ->sortBy('id')
            ->toArray();

        return view('pages.user.createCard')
            ->with('color', $color)
            ->with('piority', $prior)
            ->with('member', $member)
            ->with('status', $status);
    }

    public function createCard()
    {
        $BoardId = session()->get('Board');
        $Card = new Card();
        $Card->name = \Input::get('name');
        $Card->detail = \Input::get('detail');
        $Card->priorities_id = 1;
        $Card->statuses_id = \Input::get('status');
        $Card->types_id = 1;
        $Card->color_id = 1;
        $Card->Boards_id = session()->get('Board');
        $Card->MemberManagements_id = session()->get('Manager');
        $Card->save();


        return redirect("/board$BoardId");

    }

    public function moveCard()
    {

        $cardId = Input::get('cardId');
        $columnName = Input::get('columnName');
        if (strcmp($columnName, "Backlog") == 0) $column = 1;
        else if (strcmp($columnName, "Ready") == 0) $column = 2;
        else if (strcmp($columnName, "Doing") == 0) $column = 3;
        else if (strcmp($columnName, "Done") == 0) $column = 4;

        $move = Card::find($cardId);
        $move->statuses_id = $column;
        $move->save();

        return $column;
    }

}
