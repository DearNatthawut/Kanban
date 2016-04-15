@include("layouts.header")
@include("layouts.adminside")


<div class="content-wrapper">

    <section class="content">


        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Management
                            {{--<small> ( {{count($allBoards)}} Projects )</small>--}}
                        </h2>

                        @if(Auth::user()->Level_id == 1)
                            <a href="/createBoard">
                                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus">
                                        Create
                                        Board</i></button>
                            </a>
                        @endif

                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>


                        @foreach($allBoards as $Board)
                            @foreach($Board->members as $mem)
                                @if($mem->id == Auth::user()->id || Auth::user()->Level_id == 1)

                                    <tr>
                                        <td style="width: 60%">
                                            <span>Name board : {{$Board->name}} </span>
                                            <br>
                                            <span>Detail : {{$Board->detail}} </span>
                                            <br>
                                            <span>Manager :{{$Board->manager['name']}} </span>
                                            <br>
                                            <span>Member : {{count($Board->members)}}</span>
                                        </td>
                                        <td style="width: 40%">
                                            <a href="/board{{$Board->id}}">
                                                <button type="button" class="btn btn-default">Board</button>
                                            </a>
                                            <a href="/member{{$Board->id}}">
                                                <button type="button" class="btn btn-default">Member</button>
                                            </a>
                                            <a href="/showGantt/{{$Board->id}}">
                                                <button type="button" class="btn btn-default">Gantt Chart</button>
                                            </a>

                                            @if(Auth::user()->Level_id == 1) <!--            เงื่อนไข แก้ไข และ ลบ -->

                                            <a href="/editBoard{{$Board->id}}">
                                                <button type="button" class="btn btn-default">Edit</button>
                                            </a>

                                            <button type="button" class="btn btn-danger" onclick="deleteBoard()">
                                                Delete
                                            </button>

                                            @endif

                                            <script>
                                                function deleteBoard() {

                                                    if (confirm("Confirm Delete this Board!") == true) {
                                                        document.location.href = "/deleteBoard/{{$Board->id}}";
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
                    <hr>
                </div>

            </div>

        </div>


    </section>


</div>

</body>
@include('layouts.script')
</html>