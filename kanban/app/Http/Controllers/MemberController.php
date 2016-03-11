<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;
use App\Models\Membermanagement;
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

        return view('pages.user.member')->with('members',$data);

    }

}
