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

class CardController extends Controller
{

// get ข้อมูลการ์ดทั้งหมด ของ Board
    public function getCard()
    {

        $board = Board::with(['members'])
            ->find(session()->get('Board'));

       /* $cards = $board->cards()->select('id as card_id', 'statuses_id', 'name as title', 'detail as details'
            , 'MemberManagements_id as managerCard')
            ->with('checkList')
            ->get();*/
        $cards = Card::with('checklist')
            ->get();

        $status = \App\Models\Status::all('id', 'name')
        ->sortBy('id')
            ->toArray();

//-- สร้างรูปแบบ ข้อมูล
        $kanban = [];
        $kanban['columns'] = [];

        $num = 1;
        foreach ($status as $s) {   // นำ card ใส่ status
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

    // form สร้างการ์ด
    public function formNewCard()
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

        $member = Membermanagement::with(['member'])
            ->where('Boards_id', '=', session()->get('Board'))
            ->get();


        return view('pages.card.createCard')
            ->with('color', $color)
            ->with('piority', $prior)
            ->with('member', $member)
            ->with('status', $status);
    }

// บันทึก card
public function createCard()
{

    $BoardId = session()->get('Board');
    $Card = new Card();
    $Card->name = \Input::get('name');
    $Card->detail = \Input::get('detail');
    $Card->priorities_id = 1;
    $Card->statuses_id = \Input::get('status');
    $Card->types_id = 1;
    $Card->color_id = \Input::get('color');
    $Card->Boards_id = session()->get('Board');
    $Card->MemberManagements_id = \Input::get('member');
    $Card->save();


    $getCard = Card::where('id', '=', $Card->id)
        ->select('id')
            ->get();

        if(\Input::get('sub') != null){
        $sub = \Input::get('sub');
        $check = \Input::get('checkL');
        foreach ($sub as $index => $s ) {

            $CheckL = new Checklist();
            $CheckL->Cards_id = $getCard[0]->id;;
            $CheckL->name = $s;
            $CheckL->status = $check[$index];
            $CheckL->save();

        }}


        return redirect("/board$BoardId");

    }

    // แก้ไข card
    public function editCard($id)
    {

       $card = Card::find($id);
        $id=$card->id;
        $member = $card->MemberManagements_id;

        $checklist = Checklist::where('Cards_id',$id)
        ->get();

        $mana = Membermanagement::where('id',$member)
        ->select('Members_id')
        ->get();
        
        return  view('pages.card.detailCard')
            ->with('card',$card)
            ->with('checklist',$checklist);

    }



    //ย้าย Card
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

    //  ลบ Card
    public function removeCard()
    {

        $cardId = Input::get('card');
        $check = Checklist::where('Cards_id', '=', $cardId);
        $check->delete();
        $reCard = Card::find($cardId);
        $reCard->delete();
        return $cardId;
    }

}