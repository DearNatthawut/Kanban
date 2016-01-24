

    @include("layouts.header")
    @include("layouts.adminside")

<div class="content-wrapper">

    <section class="content">


        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Members Management</h2>

                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                            <h2>Guest</h2>
                            <select name="from" id="undo_redo" class="form-control" size="10" multiple="multiple">

                                <option >Aekkachai</option>
                                <option >Wanchalerm Kunthawong</option>
                                <option >Nattapon Koteputorn</option>

                            </select>
                        </div>
                        <div class="col-xs-2">
                           <br><br><br><br>
                            <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                            <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                        </div>

                        <div class="col-xs-5">
                            <h2>Member</h2>
                            <select name="to" id="undo_redo_to" class="form-control" size="10" multiple="multiple">
                                <option >Natthawut Jantapoon</option>
                            </select>

                        </div>
                    </div>


                    <hr>
                </div>

            </div>

        </div>


    </section>


</div>

</body>
@include('layouts.js')
</html>