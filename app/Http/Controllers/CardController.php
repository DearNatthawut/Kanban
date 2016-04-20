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
date_default_timezone_set('Asia/Bangkok');

class CardController extends Controller
{
// get ข้อมูลการ์ดทั้งหมด ของ Board
    public function getCard()
    {
        $board = Board::with(['members'])
            ->find(session()->get('Board'));

        $cards = Card::with(['checklist','memberCard.member'])
            ->where('Boards_id','=',session()->get('Board'))
            ->get();
       /* $cards = DB::table('cards')
            ->join('membermanagement','cards.MemberManagement_id','=','membermanagement.id')
            ->join('users','membermanagement.Members_id','=','users.id')
            ->join('checklists','cards.id','=','checklists.Cards_id')
            ->where('cards.Boards_id','=',session()->get('Board'))
            ->get();*/

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
        
        if(\Input::get('sub') != null){
            $sub = \Input::get('sub');
            $check = \Input::get('checkL');
            foreach ($sub as $index => $s ) {
                $CheckL = new Checklist();
                $CheckL->Cards_id = $getCard[0]->id;
                $CheckL->name = $s;
                $CheckL->status = $check[$index];
                $CheckL->save();
            }}
        $BoardCheckStart = Board::all()
            ->find($BoardId);
        if ($BoardCheckStart->start_date == null){
            $BoardCheckStart->start_date = date('Y-m-d');
            $BoardCheckStart->save();
        }
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
        $move->status_id = $column;
        if ($move->date_start == null){
            $move->date_start = date('Y-m-d');
        }
        if ($move->date_end == null && $column == 4){
            $move->date_end = date('Y-m-d');
        }
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