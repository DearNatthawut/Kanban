

    @include("layouts.header")
    @include("layouts.adminside")


<div class="content-wrapper">

    <section class="content">


        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Management</h2>


                        <a href="/board">
                            <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"> Create
                                    Board</i></button>
                        </a>
                    </div>

                    <table class="table table-striped table-hover">
                        <tbody>


                        <tr>
                            <td style="width: 60%">
                                <span>Name board : Test </span><br><span>Manager : Suphisit Khaika</span><br><span>Member : 2</span>
                            </td>
                            <td style="width: 40%">
                                <a href="/board">
                                    <button type="button" class="btn btn-default">Board</button>
                                </a>
                                <a href="/member">
                                    <button type="button" class="btn btn-default">Member</button>
                                </a>
                                <a href="/showGantt">
                                    <button type="button" class="btn btn-default">Gantt Chart</button>
                                </a>
                                <a href="/setting">
                                    <button type="button" class="btn btn-default">Setting</button>
                                </a>
                                <a href="/board">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td style="width: 60%">
                                <span>Name board : DOTA</span><br><span>Manager : Pao </span><br><span>Team : 2</span>
                            </td>
                            <td style="width: 40%">
                                <a href="/board">
                                    <button type="button" class="btn btn-default">Board</button>
                                </a>
                                <a href="/member">
                                    <button type="button" class="btn btn-default">Member</button>
                                </a>
                                <a href="/gantt">
                                    <button type="button" class="btn btn-default">Gantt Chart</button>
                                </a>
                                <a href="/setting">
                                    <button type="button" class="btn btn-default">Setting</button>
                                </a>
                                <a href="/board">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a></td>
                        </tr>
                        <tr>
                            <td style="width: 60%">
                                <span>Name board : Kanban</span><br><span>Manager : Suphisit Khaika</span><br><span>Member : 2</span>
                            </td>
                            <td style="width: 40%">
                                <a href="/board">
                                    <button type="button" class="btn btn-default">Board</button>
                                </a>
                                <a href="/member">
                                    <button type="button" class="btn btn-default">Member</button>
                                </a>
                                <a href="/gantt">
                                    <button type="button" class="btn btn-default">Gantt Chart</button>
                                </a>
                                <a href="/setting">
                                    <button type="button" class="btn btn-default">Setting</button>
                                </a>
                                <a href="/board">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a></td>
                        </tr>


                        </tbody>
                    </table>
                    <hr>
                </div>

            </div>

        </div>


    </section>


</div>

</body>
@include('layouts.js')
</html>