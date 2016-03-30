

    @include("layouts.header")
    @include("layouts.adminside")


<div class="content-wrapper">

    <section class="content">


        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Management</h2>


                        <a href="/createBoard">
                            <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"> Create
                                    Board</i></button>
                        </a>
                        
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>


                        @foreach($allBoards as $Board)

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
                                    <a href="/editBoard{{$Board->id}}">
                                        <button type="button" class="btn btn-default">Edit</button>
                                    </a>

                                        <button type="button" class="btn btn-danger" onclick="deleteBoard()" >Delete</button>
                                    <script>
                                        function deleteBoard() {

                                            if (confirm("Confirm Delete this Board!") == true) {
                                                document.location.href = "/deleteBoard/{{$Board->id}}";
                                            }
                                        }
                                    </script>
                                   </td>
                            </tr>

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