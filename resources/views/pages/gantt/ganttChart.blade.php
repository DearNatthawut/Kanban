<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/19/2016
 * Time: 11:22 PM
 */ ?>
@include("layouts.header")
@include("layouts.aside")

<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Gantt Chart
                            <small>( {{$Board->name}} )</small>
                        </h2>
                    </div>

                </div>

            </div>

        </div>

    </section>


</div>

</body>

@include('layouts.script')


</html>
