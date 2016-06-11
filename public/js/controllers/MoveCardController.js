/**
 * Created by DNOJ on 6/11/2016.
 */

'use strict';

angular.module('kanban').controller('MoveCardController',
    ['$scope', '$modalInstance', 'statusMove', '$http','$route', function ($scope, $modalInstance, statusMove, $http,$route) {

        function initScope(statusMove) {
            $scope.status = statusMove;
        }

        initScope(statusMove);
        


    }]);
