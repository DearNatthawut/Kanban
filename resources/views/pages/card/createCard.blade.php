@include("layouts.header")
@include("layouts.aside")

<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Create Card <small>( {{$Board->name}} )</small></h2>
                        <br>
                    </div>

                    <div>
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/createCard">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                           {{-- <!-- -------------------------------------------------------------------------------- Nav Menu -->
                                    <div >
                                        <ul class="nav nav-tabs"  id="myTab">
                                            <li role="presentation" class="active">
                                                <a href="#card-detail" data-toggle="tab">General</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#card-date" data-toggle="tab">Date</a>
                                            </li>

                                            <li role="presentation">
                                                <a href="#card-checklist" data-toggle="tab">Checklist</a>
                                            </li>
                                        </ul>

                                        <!-------------------------------------------------------------------------------- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="card-detail">
                                                @include("pages.card.general")
                                            </div>

                                            <div class="tab-pane fade" id="card-date">
                                                @include("pages.card.cardDate")
                                            </div>

                                    <div class="tab-pane fade" id="card-checklist">
                                        @include("pages.card.checklist")
                                    </div>

                                </div>
                            </div>--}}
                            <!--     ---------------------------------------------------------------------------------- Foot -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="col-sm-2 control-label">Detail</label>
                                    <div class="col-sm-10">
                                        <textarea id="detail" name="detail" class="form-control" rows="5"
                                                  placeholder="Detail"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            @foreach($status as $status)
                                                <div class="col-sm-10">
                                                    <option value="{{$status['id']}}">{{$status['name']}}</option>
                                                </div>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-sm-2 control-label">Color</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="color">
                                            @foreach($color as $color)
                                                <div class="col-sm-10">
                                                    <option value="{{$color['id']}}">{{$color['name']}}</option>
                                                </div>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="member" class="col-sm-2 control-label">Responsible</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="member">
                                            <div class="col-sm-10">
                                            </div>
                                            @foreach($member as $member)
                                                <div class="col-sm-10">
                                                    <option value="{{$member->id}}">{{$member->member['name']}}</option>
                                                </div>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reservation" class="col-sm-2 control-label">Estimate Date</label>
                                    <div class="col-sm-10 ">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control " id="reservation" placeholder="Estimate Date"
                                                   required>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <a href="/board/{{session()->get('Board')}}#/">
                                    <button type="button" class="btn btn-default pull-right">Cancel</button>
                                </a>

                                <button type="submit" class="btn btn-primary pull-right">Submit</button>

                            </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /.box -->

                </div>

            </div>

        </div>

    </section>


</div>
</body>

@include('layouts.script')



</html>