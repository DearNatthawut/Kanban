<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 7:12 PM
 */
namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Board;
use App\Models\Card;
use App\Models\Membermanagement;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{
    public function showMember($id)
    {
        if (!Auth::check()) return redirect("/");
        $idBoard = $id;
        $data = DB::table('membermanagement')
            ->join('users', 'membermanagement.User_id', '=', 'users.id')
            ->join('level', 'users.Level_id', '=', 'level.id')
            ->select('users.*', 'users.name as member ', 'level.name as level', 'membermanagement.*', 'membermanagement.id as MM')
            ->where('membermanagement.Board_id', '=', $id)
            ->get();
        $id = [];
        foreach ($data as $Adata) {
            $id[] = $Adata->User_id;
        }

        $member = DB::table('users')
            ->whereNotIn('id', $id)->get();

        $Board = Board::all()
            ->find($idBoard);

        return view('pages.member.member')
            ->with('id', $idBoard)
            ->with('members', $data)
            ->with('addmembers', $member)
            ->with('Board', $Board);

    }

    public function addMember($id)
    {

        if (!Auth::check()) return redirect("/");
        if (\Input::get('member')) {
            $member = new Membermanagement();
            $member->User_id = \Input::get('member');
            $member->Board_id = $id;
            $member->save();
        }

        return redirect("member/$id");

    }

    public function delMember($id)
    {

        if (!Auth::check()) return redirect("/");
        $memberID = \Input::get('memberID');
        $member = Membermanagement::find($memberID);
        $member->active = 1;
        $member->save();


        $board = Board::find($id);
        $boardManager = $board->manager_id;

        $MemMa = Membermanagement::where('User_id', '=', $boardManager)
            ->where('Board_id', '=', $id)
            ->get();


        $cards = Card::
        where('MemberManagement_id', '=', $member->id)
            ->get();
        foreach ($cards as $card) {
            $card->MemberManagement_id = $MemMa[0]->id;
            $card->save();
        }

        return redirect("member/$id");

    }

    public function getBackMember($id)
    {
        if (!Auth::check()) return redirect("/");
        $memberID = \Input::get('memberID');
        $member = Membermanagement::find($memberID);
        $member->active = 0;
        $member->save();

        return redirect("member/$id");

    }

    public function viewPassword()
    {
        return view("auth.view-edit");
    }
    
    public function viewChangePassword()
    {
        return view("auth.changepassword");
    }

    public function changePassword( $id)
    {
        $password = \Input::get('password');
        $password_confirmation = \Input::get('password_confirmation');

        $newpassword = User::find($id);
        $newpassword->password = bcrypt($password);
        if ($password ==$password_confirmation){
            $newpassword->save();
        }else{
            return back()->withErrors('Password dose not  match');
        }
        return redirect("auth/logout");
    }
    
    public function viewName()
    {
        return view("auth.changename");
    }
    public function changeName ($id){
        $name = \Input::get('name');

        $newname = User::find($id);
        $newname->name = $name;
        $newname->save();
        return redirect("auth/logout");
    }
    public function viewEmail()
    {
        return view("auth.change-email");
    }
    public function changeEmail ($id){
        $email = \Input::get('email');

        $newemail = User::find($id);
        $newemail->email = $email;
        $newemail->save();
        return redirect("auth/logout");
    }

}