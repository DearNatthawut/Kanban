<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Member;

class BoardController extends Controller
{
    public function showAllBoard()
    {
        $data = Board::all();

        return view('pages.index')->with('allBoards',$data);
    }

    public function getEditBoard($id)
    {
        $data = Board::find($id);
        return view('pages.user.edit')->with('getEdit',$data);
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
        $board =\App\Models\Board::find($id);
        $board -> delete();
        return redirect('/index');
    }



}
