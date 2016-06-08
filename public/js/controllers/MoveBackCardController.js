/**
 * Created by DNOJ on 6/8/2016.
 */
'use strict';

angular.module('kanban').controller('MoveBackCardController',
    ['$scope', '$modalInstance', 'card', '$http', function ($scope, $modalInstance, card, $http) {

        function initScope(card) {
            $scope.cardID = card;
        }

        initScope(card);
        
        
        $scope.commentMoveBack = function (comment) {
            var $addCom = {
                detail : comment
            };
            $http({
                method: 'POST',
                url: '/commentMoveBack/' + $scope.cardID,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data : $.param($addCom)
                
            }).success(function (r) {
                
                $modalInstance.close();
            })
        };

        
    }]);