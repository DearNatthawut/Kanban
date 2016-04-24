/**
 * Created by DNOJ on 3/24/2016.
 */

'use strict';

angular.module('kanban').controller('DetailCardController',
    ['$scope', '$modalInstance', 'card', '$http', function ($scope, $modalInstance, card, $http) {

        /* กำหนดค่า */
        function initScope(card) {
            $scope.cardData = [];
            $scope.cardData = card;

        }

        function getDataCard(){
            $http({
                method: 'GET',
                url : "http://localhost:8000/getCardEditData",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            }).success(function (r) {

                $scope.DataEdit = r;

            })
        }

        $scope.detailCard = function () {
            var buffer = [];
            if (!this.newCardForm.$valid) {
                return false;
            }

            /* $modalInstance.close({title: this.title, column: card, details: this.details
             ,estimateStart: this.estimateStart,estimateEnd: this.estimateEnd});*/
        };


       /* edit card */
        $scope.saveEditCard = function (cardData) {
            $http({
                method: 'POST',
                url: '/editCard/' + cardData.id,
                data : cardData
            }).success(function (r) {
                console.log(r);

                if(r.status_id == 1){
                    r.status = "Backlog"
                }else if(r.status_id == 2){
                    r.status = "Ready"
                }else if(r.status_id == 3){
                    r.status = "Doing"
                }else if(r.status_id == 4){
                    r.status = "Done"
                }
                $scope.cardData = r;
            })
        };

        /* ---------------------------------------------------------------------- Checklist */

        $scope.addChecklist = function (addchecklist,cardID) {

            var $addCheck = {
                name : addchecklist
            };
            $http({
                method: 'POST',
                url: '/addNewChecklist/'+ cardID,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data : $.param($addCheck)
            }).success(function (r) {
                // console.log(r);
                if(r.status_id == 1){
                    r.status = "Backlog"
                }else if(r.status_id == 2){
                    r.status = "Ready"
                }else if(r.status_id == 3){
                    r.status = "Doing"
                }else if(r.status_id == 4){
                    r.status = "Done"
                }
                $scope.cardData = r;
                $scope.newChecklist = "";
            });

        };

        $scope.changeCheckStatus = function (checklist) {
            //console.log(checklist);
            $http({
                method: 'POST',
                url: '/changeCheckStatus/' + checklist.id,
                data : checklist
            }).success(function (r) {

                if(r.status_id == 1){
                    r.status = "Backlog"
                }else if(r.status_id == 2){
                    r.status = "Ready"
                }else if(r.status_id == 3){
                    r.status = "Doing"
                }else if(r.status_id == 4){
                    r.status = "Done"
                }
                $scope.cardData = r;

            });

        };

        $scope.removeChecklist = function (cardID,checklistID) {
           
            $http({
                method: 'POST',
                url: '/removeChecklist/' + cardID + '/' + checklistID
                
            }).success(function (r) {
                
                if(r.status_id == 1){
                    r.status = "Backlog"
                }else if(r.status_id == 2){
                    r.status = "Ready"
                }else if(r.status_id == 3){
                    r.status = "Doing"
                }else if(r.status_id == 4){
                    r.status = "Done"
                }
                $scope.cardData = r;

            });

        };


        $scope.close = function () {
            $modalInstance.close();
        };

        initScope(card);
        getDataCard();

    }]);
