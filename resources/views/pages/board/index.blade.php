@include("layouts.header")
@include("layouts.adminside")

<div class="content-wrapper">

    <section class="content">


        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Project List
                            {{--<small> ( {{$countProject}} Projects )</small>--}}
                        </h2>

                        @if(Auth::user()->Level_id == 1)
                            <a href="/createBoard">
                                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus">
                                        Create
                                        Board</i></button>
                            </a>
                        @endif

                    </div>


                    <ul class="nav nav-tabs ">
                        <li role="presentation" class="active">
                            <a href="#board-gen" data-toggle="tab">Doing</a>
                    {{--    </li>
                        <li role="presentation">
                            <a href="#board-done" data-toggle="tab">Done</a>
                        </li>--}}
                        @if(Auth::user()->Level_id == 1)
                            <li role="presentation">
                                <a href="#board-bin" data-toggle="tab">Bin</a>
                            </li>
                        @endif
                    </ul>

                    <!-------------------------------------------------------------------------------- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="board-gen">
                            @include("pages.board.mainBoard")
                        </div>

                     {{--   <div class="tab-pane fade" id="board-done">
                            @include("pages.board.boardDone")
                        </div>--}}
                        @if(Auth::user()->Level_id == 1)
                            <div class="tab-pane fade" id="board-bin">
                                @include("pages.board.boardBin")
                            </div>
                        @endif

                    </div>


                    <hr>
                </div>

            </div>

        </div>


    </section>


</div>

</body>
@include('layouts.script')
</html>