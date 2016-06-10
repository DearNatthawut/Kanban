<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/19/2016
 * Time: 11:22 PM
 */ ?>

@include("layouts.header")
@include("layouts.adminside")


<div class="content-wrapper">

    <section class="content">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>
                            HELP
                        </h2>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><center><span class="glyphicon glyphicon-star" style="color: gold;"></span></center></td>
                                <td><label>Priority ลำดับความสำคัญของงาน</label></td>
                            </tr>
                        <tr>
                            <td><center> <span class="glyphicon glyphicon-edit"></span></center></td>
                            <td><label> Edit แก้ไขการ์ดการทำงานที่ต้องการย้อนกลับไปในขั้นตอนการทำงานก่อนหน้า</label></td>
                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
</div>

</body>

@include('layouts.script')

</html>
