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

                        <h2>Plan</h2>

                    </div>
                    <div  ng-controller="GanttCtrlEstimate as vmEstimate">
                        <div gantt data=vmEstimate.dataEstimate>

                            <gantt-table></gantt-table>
                            {{--<gantt-movable></gantt-movable>
                            <gantt-tooltips></gantt-tooltips>--}}
                        </div>

                    </div>

                </div>
            </div>

        </div><div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2>Actual</h2>
                    <div  ng-controller="GanttCtrlActual as vmActual">
                        <div gantt data=vmActual.dataActual>
                            <gantt-table></gantt-table>
                            {{--<gantt-movable></gantt-movable>
                            <gantt-tooltips></gantt-tooltips>--}}
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Work activities</th>
                                <th>Owner</th>
                                <th>Plan Start-End</th>
                                <th>Actual Start-End</th>
                                <th>Times editor</th>
                                <th>Complete Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Card as $Card)
                                  <?php $count = 0 ; ?>
                                @foreach($Card['comments'] as $Comments)
                                    @if($Comments->edit_status == 1)
                                        <?php $count++ ; ?>
                                    @endif
                                @endforeach
                                <tr>
                                    <td> {{$Card->name}}</td>
                                    <td>{{$Card['memberCard']['member']->name}}</td>
                                    <td> {{$Card->estimate_start}}---{{$Card->estimate_end}}</td>
                                    <td> {{$Card->date_start}}---{{$Card->date_end}}</td>
                                    <td><center>{{$count}}</center></td>
                                    @if($Card->status_complete == 1)
                                        <td><center><span class="glyphicon glyphicon-ok"></span></center> </td>
                                        @else
                                        <td><center><span class="glyphicon glyphicon-remove"></span></center></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

</body>

@include('layouts.script')


<script type="text/javascript">
    // dataEstimate
    var myApp = angular.module('kanban');
    myApp.controller('GanttCtrlEstimate', ['$scope', '$http', function ($scope, $http) {
        var self = this;

        $http({
            method: 'GET',
            url: '/current-board/cards'
        }).success(function (r) {
            console.log(r);

            { // dataEstimate
                var row = [];
                for (i = 0; i < r.length; i++) {
                    var rownew = [];
                    rownew.name = r[i].name;
                    if (r[i].estimate_start != null) {           //-----plan start
                        r[i].from = r[i].estimate_start;
                        r[i].color = '#2196F3'
                    }
                    if (r[i].estimate_end != null) {
                        r[i].to = r[i].estimate_end;             //-----plan end
                        r[i].color = '#2196F3'
                    }
                    rownew.tasks = [r[i]];

                    row.push(rownew)
                }

                self.dataEstimate = row;
            }


        })

    }]);
    //dataActual
    myApp.controller('GanttCtrlActual', ['$scope', '$http', function ($scope, $http) {
        var self = this;

        $http({
            method: 'GET',
            url: '/current-board/cards'
        }).success(function (r) {
            //console.log(r);

            { // data actual
                var row = [];
                for (i = 0; i < r.length; i++) {

                    var rownewA = [];
                    rownewA.name = r[i].name;

                    if (r[i].date_start != null) { //---- งานเริ่มไปแล้ว ?
                        r[i].from = r[i].date_start
                    }

                    if (r[i].date_end != null && r[i].status_complete == 1) { //------ งานเสร็จแล้ว?

                        r[i].to = r[i].date_end;

                        if (r[i].date_end > r[i].estimate_end){ //date_end เกิน estimate_end
                            r[i].color = '#FFA500';       // เสร็จแล้วแต่เวลาเกิน  //--สีเป็นสีส้ม
                        }else  r[i].color = '#008000';    //เสร็จตามเวลาที่กำหนด //--เป็นสีเขียว

                    } else {

                        r[i].to = Date.now();

                        if (Date.now() > r[i].estimate_end){ // -------------งานที่ยังไม่เสร็จและเวลาเกิน

                            r[i].color = '#FF0000'; //งานยังไม่เสร็จและเกินเวลา สีแดง

                        }else  r[i].color = '#00CCFF'; //งานยังไม่เสร็จและเวลาเกินกำหนดแต่ยังทำต่อ สีนาวี่


                    }
                    rownewA.tasks = [r[i]];
                    row.push(rownewA)
                }
                self.dataActual = row;
            }
        })

    }]);

</script>





</html>
