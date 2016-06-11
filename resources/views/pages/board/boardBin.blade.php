<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/16/2016
 * Time: 2:36 AM
 */?>


<table class="table table-striped table-hover">
    <tbody>

    @foreach($allBoards as $Board)
        @foreach($Board->members as $mem)
            @if(($mem->id == Auth::user()->id || Auth::user()->Level_id == 1) &&  $Board->board_hide == 1)

                <tr>
                    <td>
                        <span>Name board : {{$Board->name}} </span>
                        <br>
                        <span>Detail : {{$Board->detail}} </span>
                        <br>
                        <span>Manager :{{$Board->manager['name']}} </span>
                        <br>
                        <span>Member : {{count($Board->members)}}</span>
                    </td>
                    <td>
                        <a href="/board/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span
                                        class="glyphicon glyphicon-eye-open"></span>View
                            </button>
                        </a>
                        <a href="/member/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span>Member
                            </button>
                        </a>
                        <a href="/showGantt/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><i class="fa  fa-bar-chart"></i>Gantt Chart
                            </button>
                        </a>

                    @if(Auth::user()->Level_id == 1) <!--            เงื่อนไข แก้ไข และ ลบ -->

                        <a href="/editBoard/{{$Board->id}}">
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>Edit
                            </button>
                        </a>

                        <button type="button" class="btn btn-info"
                                onclick="restoreBoard(<?php echo(json_encode($Board->id)); ?>)">
                            Restore
                        </button>

                        <button type="button" class="btn btn-danger"
                                onclick="hardDeleteBoard(<?php echo(json_encode($Board->id)); ?>)">
                            <span class="glyphicon glyphicon-remove-circle"></span> Delete
                        </button>

                        @endif

                        <script>
                            function restoreBoard(id) {

                                if (confirm("Confirm Restore this Board!") == true) {
                                    document.location.href = "/restoreBoard/" + id;
                                }
                            }

                            function hardDeleteBoard(id) {

                                if (confirm("Confirm Delete this Board!") == true) {

                                    document.location.href = "/hardDeleteBoard/" + id;
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

