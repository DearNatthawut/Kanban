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

    <section class="content" ng-controller="GanttCtrl as vm">

        <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>Gantt Chart
                            <small>( {{$Board->name}} )</small>
                        </h2>

                    </div>
                    <div>
                        <div gantt data=vm.data>

                            <gantt-table></gantt-table>
                            {{--<gantt-movable></gantt-movable>
                            <gantt-tooltips></gantt-tooltips>--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


</div>

</body>

@include('layouts.script')


<script type="text/javascript">

    var myApp = angular.module('kanban');

    myApp.controller('GanttCtrl', ['$scope', '$http', function ($scope, $http) {
        var self = this;

        $http({
            method: 'GET',
            url: '/current-board/cards'
        }).success(function (r) {
            console.log(r);
            var row = [];
            for (i = 0; i < r.length; i++) {
                var rownew = [];
                rownew.name = r[i].name;
                if (r[i].date_start != null) {
                    r[i].from = r[i].date_start
                } else {
                    r[i].from = r[i].estimate_start
                }
                if (r[i].date_end != null) {
                    r[i].to = r[i].date_end
                } else {
                    r[i].to = r[i].estimate_end
                }
                rownew.tasks = [r[i]];

                row.push(rownew)
            }
            self.data = row;

        })

    }]);

</script>

</html>
