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
                                <th>Name</th>
                                <th>NameCard</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Card as $Card)
                                <tr>
                                    <td>{{$Card['memberCard']['member']->name}}</td>
                                    <td> {{$Card->name}}</td>
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

            { // data estimate
                var row = [];
                for (i = 0; i < r.length; i++) {
                    var rownew = [];
                    rownew.name = r[i].name;
                    if (r[i].estimate_start != null) {
                        r[i].from = r[i].estimate_start;
                        r[i].color = '#45607D'
                    }
                    if (r[i].estimate_end != null) {
                        r[i].to = r[i].estimate_end;
                        r[i].color = '#45607D'
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
            console.log(r);


            { // data actual
                var row = [];
                for (i = 0; i < r.length; i++) {
                    var rownewA = [];
                    rownewA.name = r[i].name;
                    if (r[i].date_start != null) {
                        r[i].from = r[i].date_start
                    } else {

                    }
                    if (r[i].date_end != null) {
                        r[i].to = r[i].date_end;
                        if (r[i].date_end > r[i].estimate_end){
                            r[i].color = '#FFA500'
                        }else  r[i].color = '#008000';

                    } else {

                        r[i].to = Date.now();
                        if (Date.now() > r[i].estimate_end){
                            r[i].color = '	#FF0000';
                        }else  r[i].color = '#4169E1';


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
