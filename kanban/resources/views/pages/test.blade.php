<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 2/10/2016
 * Time: 11:53 PM
 */
 use App\Models\Board;
 use App\Models\Member;


$data = DB::table('boards')
        ->join('members', 'boards.manager_id', '=', 'members.id')
        ->get();

