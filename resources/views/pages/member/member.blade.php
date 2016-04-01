@include("layouts.header")
@include("layouts.aside")


<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Member Management</h2>
                        <br>
                        <div class="col-xs-5">

                            <form class="form-horizontal" method="post" action="/addMember{{$id}}">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="input-group ">
                                    <select class="form-control" name="member">
                                        @foreach($addmembers as $add)
                                            <div class="col-sm-10">
                                                <option value="{{$add->id}}">{{$add->name}} ( {{$add->email}} )</option>
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

                    </div>

                    <table class="table table-bordered">
                        <tbody>


                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 10px"></th>
                        </tr>
                        @foreach($members as $member)
                            <tr>
                                <td> {{$member->member}}</td>
                                <td> {{$member->email}}</td>
                                <td>{{$member->level}}</td>
                                <td>
                                    <button type="button" class="btn btn-default"><i
                                                class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section>


</div>

</body>
@include('layouts.script')
</html>