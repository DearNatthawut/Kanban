<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/29/2016
 * Time: 7:12 PM
 */
namespace App\Http\Controllers;
use DB;

class MemberController extends Controller
{
    public function showMember($id)
    {
        $data = DB::table('membermanagements')
            ->join('members','membermanagements.Members_id','=','members.id')
            ->join('level','members.Level_id','=','level.id')
            ->select( 'members.*','members.name as member ','level.name as level')
            ->where('membermanagements.Boards_id','=',$id)
            ->get();

        return view('pages.member.member')->with('members',$data);

    }

}