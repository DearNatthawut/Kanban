<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 7:12 PM
 */
namespace App\Http\Controllers;
use App\Models\Membermanagement;
use DB;
use App\Models\Member;

class MemberController extends Controller
{
    public function showMember($id)
    {
        $idMember = $id;
        $data = DB::table('membermanagements')
            ->join('members','membermanagements.Members_id','=','members.id')
            ->join('level','members.Level_id','=','level.id')
            ->select( 'members.*','members.name as member ','level.name as level')
            ->where('membermanagements.Boards_id','=',$id)
            ->get();


        $id=[];
        foreach($data as $Adata){
            $id[] = $Adata->id;
        }

        $member = DB::table('members')
            ->whereNotIn('id', $id)->get();

        return view('pages.member.member')
            ->with('id',$idMember)
            ->with('members',$data)
            ->with('addmembers',$member);

    }

    public function addMember($id){


        $member = new Membermanagement();
        $member->Members_id = \Input::get('member');
        $member->Boards_id = $id;
        $member->save();
        return redirect("member$id");

    }

}