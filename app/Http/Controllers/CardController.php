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
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Input;

use Validator;

date_default_timezone_set('Asia/Bangkok');

class CardController extends Controller
{
// get ข้อมูลการ์ดทั้งหมด ของ Board
    public function getCard()
    {
        $board = Board::with(['members'])
            ->find(session()->get('Board'));

        $cards = Card::with(['checklists', 'memberCard.member', 'comments.memberComment', 'color', 'preCards.preCard'])
            ->where('Boards_id', '=', session()->get('Board'))
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
                if ($card->status_id == $num) {
                    $s['cards'][] = $card;
                }
            }
            $kanban['columns'][] = $s;
            $num++;
        }
        return $kanban;
    }

    

// บันทึก card
    public function createCard()
    {

        //return \Input::get();
        $dateEscard = preg_split('[-]', \Input::get('date'));
        $BoardId = session()->get('Board');

        //$member_id = Membermanagement::find(\Input::get('member'));
        $Card = new Card();
        $Card->name = \Input::get('name');
        $Card->detail = \Input::get('detail');

        $Card->estimate_start = $dateEscard[0];
        $Card->estimate_end = $dateEscard[1];
        $Card->priority_id = 1;

        $Card->status_id = \Input::get('status');
        $Card->type_id = 1;
        $Card->color_id = \Input::get('color');
        $Card->Boards_id = session()->get('Board');
        $Card->MemberManagement_id = \Input::get('member');

        $Card->save();

        $getCard = Card::where('id', '=', $Card->id)
            ->select('id')
            ->get();

        if (\Input::get('sub') != null) {
            $sub = \Input::get('sub');
            $check = \Input::get('checkL');
            foreach ($sub as $index => $s) {
                $CheckL = new Checklist();
                $CheckL->Cards_id = $getCard[0]->id;
                $CheckL->name = $s;
                $CheckL->status = $check[$index];
                $CheckL->save();
            }
        }
        $BoardCheckStart = Board::all()
            ->find($BoardId);
        if ($BoardCheckStart->start_date == null) {
            $BoardCheckStart->start_date = date('Y-m-d');
            $BoardCheckStart->save();
        }
        return redirect("/board/$BoardId#/");
    }


    // form สร้างการ์ด
    public function formNewCard($id)
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
        $Board = Board::all()
            ->find($id);
        return view('pages.card.createCard')
            ->with('color', $color)
            ->with('piority', $prior)
            ->with('member', $member)
            ->with('status', $status)
            ->with('Board', $Board);
    }

    // แก้ไข card
    public function editFormCard($id, $card)
    {
        $Board = Board::all()
            ->find($id);

        $prior = Priority::all('id', 'name')
            ->sortBy('id')
            ->toArray();
        $color = Color::all('id', 'name')
            ->sortBy('id')
            ->toArray();
        $member = Membermanagement::with(['member'])
            ->where('Boards_id', '=', $id)
            ->get();

        $getcard = Card::with(['checklist', 'memberCard.member'])
            ->where('id', '=', $card)
            ->get();
//return dd($getcard[0]);
        return view('pages.card.editCard')
            ->with('Board', $Board)
            ->with('color', $color)
            ->with('piority', $prior)
            ->with('member', $member)
            ->with('Card', $getcard);
    }

    public function editCard($id)
    {
        /*$card = Card::find($id);*/
        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment', 'preCards.preCard'])
            ->find($id);
        $card->fill(Input::all());
        $card->save();


        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment', 'preCards.preCard'])
            ->find($id);

        return $card;

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
        $move->status_id = $column;
        if ($move->date_start == null) {
            $move->date_start = date('Y-m-d');
        }
        if ($move->date_end == null && $column == 4) {
            $move->date_end = date('Y-m-d');
        }
        $move->save();

        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment', 'preCards.preCard'])
            ->find($cardId);

        return $card;
    }

    public function getCardEditData()//---------------------For Detail Card controller*****************************
    {
        $prior = Priority::all('id', 'name');
        $color = Color::all('id', 'name');
        $member = Membermanagement::with(['member'])
            ->where('Boards_id', '=', session()->get('Board'))
            ->get();
        $user = User::find(Auth::user()->id);

        $boardManager = Board::find(session()->get('Board'));

        $data['priority'] = $prior;
        $data['color'] = $color;
        $data['manager'] = $member;
        $data['user'] = $user;
        $data['boardManager'] = $boardManager;
        return $data;
    }


    //  ลบ Card
    public function removeCard()
    {
        $cardId = Input::get('card');
        $check = Checklist::where('Cards_id', '=', $cardId);
        $check->delete();
        $com = Comment::where('Cards_id', '=', $cardId);
        $com->delete();
        $reCard = Card::find($cardId);
        $reCard->delete();
        return $cardId;
    }

    //  ลบ Card
    public function delCard($id)
    {

        $check = Checklist::where('Cards_id', '=', $id);
        $check->delete();
        $com = Comment::where('Cards_id', '=', $id);
        $com->delete();
        $reCard = Card::find($id);
        $reCard->delete();
        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment', 'preCards.preCard'])
            ->find($id);

        return $card;
    }

//-------------------------------------------------------------------Checklist
    public function changeCheckStatus($id)
    {
        $check = Checklist::find($id);
        $check->fill(Input::all());
        $check->save();
        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment'])
            ->find($check['Cards_id']);

        return $card;

    }

    public function addNewChecklist($id)
    {

        $newChecklist = new Checklist();
        $newChecklist->name = Input::get('name');
        $newChecklist->Cards_id = $id;
        $newChecklist->save();

        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment'])
            ->find($id);

        return $card;

    }

    public function removeChecklist($cardID, $checklistID)
    {

        $delChecklist = Checklist::where('id', '=', $checklistID);
        $delChecklist->delete();

        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment'])
            ->find($cardID);

        return $card;

    }

    //---------------------------------------------------------------------------------------------------Comment

    public function addNewComment($id)
    {

        $newComment = new Comment();
        $newComment->detail = Input::get('detail');
        $newComment->Cards_id = $id;
        $newComment->Members_id = Auth::user()->id;
        $newComment->save();

        $card = Card::with(['checklists', 'memberCard.member', 'color', 'comments.memberComment'])
            ->find($id);

        return $card;

    }
}