<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/16/2016
 * Time: 2:36 AM
 */

?>

<table class="table table-striped table-hover">
    <tbody>

    @foreach($allBoards as $Board)
        @foreach($Board->members as $memManager => $mem  )
            @if(($mem->id == Auth::user()->id || Auth::user()->Level_id == 1 ) &&  $Board->membersManager[$memManager]->active == 0
            && $Board->status_complete == 0 && $Board->board_hide == 0)

                <tr>
                    <td >
                        <span>Name board : {{$Board->name}} </span>
                        <br>
                        <span>Detail : {{$Board->detail}} </span>
                        <br>
                        <span>Manager : {{$Board->manager['name']}} </span>
                        <br>
                        <span>Member : {{count($Board->members)}}</span>
                    </td>
                    <td >
                        <a href="/board/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> View</button>
                        </a>
                        <a href="/member/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Member</button>
                        </a>
                        <a href="/showGantt/{{$Board->id}}">
                            <button type="button" class="btn btn-default"> <i class="fa  fa-bar-chart"> Gantt Chart</i></button>
                        </a>

                        @if(Auth::user()->Level_id == 1) <!--            เงื่อนไข แก้ไข และ ลบ -->

                        <a href="/editBoard/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                        </a>

                        <button type="button" class="btn btn-danger" onclick="deleteBoard(<?php echo(json_encode($Board->id)); ?>)">
                            <span class="glyphicon glyphicon-trash"></span>  Delete
                        </button>

                        @endif

                        <script>
                            function deleteBoard(id) {

                                if (confirm("Confirm Delete this Board!") == true) {

                                    document.location.href = "/deleteBoard/" + id;
                                }
                            }
                        </script>
                    </td>
                </tr>

                @break
            @endif
        @endforeach
    @endforeach


    </tbody>
</table>

