@include("layouts.header")
@include("layouts.aside")


<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Member Management
                            <small>( {{$Board->name}} )</small>
                        </h2>


                        <br>
                        @if(Auth::user()->Level_id == 1) <!--    if  Add member -->
                        <div class="col-xs-5">

                            <form class="form-horizontal" method="post" action="/addMember/{{$id}}">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="input-group ">
                                    <select class="form-control" name="member">
                                        @foreach($addmembers as $add)
                                            <div class="col-sm-10">
                                                <option value="{{$add->id}}">{{$add->name}} ( {{$add->email}})
                                                </option>
                                            </div>
                                        @endforeach
                                    </select>

                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="submit">add</button>
                    </span>

                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <br>
                        @endif


                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Position</th>
                                @if(Auth::user()->Level_id == 1)
                                    <th style="width: 10px"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($members as $member)

                                @if(Auth::user()->Level_id == 1 ||  $member->active == 1)

                                <tr>
                                    <td> {{$member->member}}</td>
                                    <td> {{$member->email}}</td>
                                    <td>{{$member->level}}</td>

                                    @if(Auth::user()->Level_id == 1) <!--    if  remove member -->
                                    <td>
                                        @if($member->Level_id != 1 )
                                            @if($member->active == 1 )
                                                <form class="form-horizontal" method="post" action="/getBackMember/{{$id}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="memberID" value="{{$member->MM}}">
                                                    <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You sure to active?')">
                                                        <i class="glyphicon glyphicon glyphicon-plus"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if($member->active == 0 )
                                                <form class="form-horizontal" method="post" action="/delMember/{{$id}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="memberID" value="{{$member->MM}}">
                                                    <button type="submit" class="btn btn-info"
                                                            onclick="return confirm('Are You sure to Delete?')">
                                                        <i class="glyphicon glyphicon-minus"></i>
                                                    </button>
                                                </form>
                                            @endif

                                        @endif
                                    </td>
                                    @endif
                                </tr>

                                @endif
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Position</th>
                                @if(Auth::user()->Level_id == 1)
                                    <th style="width: 10px"></th>
                                @endif

                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->


                </div>

            </div>
        </div>

    </section>


</div>

</body>
@include('layouts.script')
</html>