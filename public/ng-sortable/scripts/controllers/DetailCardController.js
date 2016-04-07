/**
 * Created by DNOJ on 3/24/2016.
 */

'use strict';

angular.module('kanban').controller('DetailCardController', ['$scope', '$modalInstance', 'card', function ($scope, $modalInstance, card) {


    
    
    function initScope(card) {
        $scope.cardData = [];
        $scope.cardData = card;
       
            }

    $scope.detailCard = function () {
        var buffer = [];
        if (!this.newCardForm.$valid) {
            return false;
        }

       /* $modalInstance.close({title: this.title, column: card, details: this.details
            ,estimateStart: this.estimateStart,estimateEnd: this.estimateEnd});*/
    };



    $scope.close = function () {
        $modalInstance.close();
    };

    initScope(card);

}]);
