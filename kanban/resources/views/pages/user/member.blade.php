
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

                        <div class="input-group ">
                            <input name="add" type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button">add</button>
                    </span>

                        </div><!-- /input-group -->
                        </div>
                     <br>

                    </div>

                    <table class="table table-bordered">
                        <tbody>


                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 10px"></th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td> Suphisit Khaika</td>
                            <td> Suphisit@hotmail.com</td>
                            <td>Manager</td>
                            <td>
                                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Natthawut Jantapoon</td>
                            <td>
                                davilbm_9@hotmail.com
                            </td>
                            <td> Member</td>
                            <td>
                                <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </td>
                        </tr>


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
@include('layouts.js')
@yield('scripts')


@yield("javascript")

</html>