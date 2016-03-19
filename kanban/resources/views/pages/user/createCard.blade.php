@include("layouts.header")
@include("layouts.aside")


<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Create Card</h2>
                        <br>
                    </div>
                    <div>
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/createCard">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                                                    <option value="{{$member['id']}}">{{$member['name']}}</option>
                                                </div>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <a href="/board">
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
@include('layouts.js')
@yield('scripts')
@yield("javascript")

</html>