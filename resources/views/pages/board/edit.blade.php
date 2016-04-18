
    @include("layouts.header")
    @include("layouts.aside")

<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Setting <small>( {{$Board->name}} )</small></h2>
                        <br>


                    </div>
                    <div >
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/editBoard">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$Board->id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$Board->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="col-sm-2 control-label">Detail</label>
                                    <div class="col-sm-10">
                                        <textarea id="detail" name="detail" class="form-control" rows="5" placeholder="Detail">{{$Board->detail}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reservation" class="col-sm-2 control-label">Estimate Date</label>
                                    <div class="col-sm-10 ">
                                        <input type="text" name="date" class="form-control " id="reservation" placeholder="Estimate Date" value="{{$dateStart}} - {{$dateEnd}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="manager" class="col-sm-2 control-label">Manager</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="manager" name="manager" class="form-control" placeholder="manager name">
                                    </div>
                                </div>



                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <a href="/home">
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