/**
 * Created by DNOJ on 6/11/2016.
 */
'use strict';

angular.module('kanban').controller('BoardCompleteController',
    ['$scope', '$modalInstance', '$http','$route', function ($scope, $modalInstance, $http,$route) {



        $scope.close = function () {
            $modalInstance.close();

        };

        $scope.boardComplete = function () {
            
            return $http({
                method: 'POST',
                url: '/boardComplete'
            }).success(function (t) {
                $modalInstance.close();
            })
        }


    }]);
