<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/5/2016
 * Time: 12:48 AM
 */
      ?>
@include("layouts.header")
@include("layouts.aside")

<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Detail Card</h2>
                        <br>
                    </div>

                    <div>
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/editCard">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <!-- -------------------------------------------------------------------------------- Nav Menu -->
                            <div >
                                <ul class="nav nav-tabs"  id="myTab">
                                    <li role="presentation" class="active">
                                        <a href="#card-detail" data-toggle="tab">General</a>
                                    </li>

                                    <li role="presentation">
                                        <a href="#card-checklist" data-toggle="tab">Checklist</a>
                                    </li>
                                </ul>

                                <!-------------------------------------------------------------------------------- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="card-detail">

                                        @include("pages.card.detailGeneral")
                                    </div>

                                    <div class="tab-pane fade" id="card-checklist">
                                        @include("pages.card.detailChecklist")
                                    </div>

                                </div>
                            </div>
                            <!--     ---------------------------------------------------------------------------------- Foot -->
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

@include('layouts.script')



</html>
