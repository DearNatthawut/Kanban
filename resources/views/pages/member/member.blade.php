@include("layouts.header")
@include("layouts.aside")


<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Member Management   <small>( {{$Board->name}} )</small> </h2>


                        <br>
                        @if(Auth::user()->Level_id == 1) <!--    if  Add member -->
                        <div class="col-xs-5">

                            <form class="form-horizontal" method="post" action="/addMember{{$id}}">

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

                    <table class="table table-bordered " id="memberTable" >
                        <tbody>


                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th style="width: 20%">Status</th>
                            @if(Auth::user()->Level_id == 1)
                                <th style="width: 10px"></th>
                            @endif
                        </tr>
                        @foreach($members as $member)
                            <tr>
                                <td> {{$member->member}}</td>
                                <td> {{$member->email}}</td>
                                <td>{{$member->level}}</td>

                                @if(Auth::user()->Level_id == 1) <!--    if  remove member -->
                                <td>
                                    <button type="button" class="btn btn-default"><i
                                                class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @endforeach


                        </tbody>
                    </table>



            </div>

        </div>

    </section>


</div>

</body>
@include('layouts.script')
</html>