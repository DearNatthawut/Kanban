/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */

'use strict';

angular.module('kanban').service('BoardService', ['$modal', 'BoardManipulator', '$http', function ($modal, BoardManipulator, $http, $scope, CSRF_TOKEN) {

    return {

        cardMove: function ($MoveEvent) {

            return $http({
                //crossDomain : true,
                method: 'POST',
                url: '/moveCard',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param($MoveEvent)
            }).success(function (r) {

            });
        },

        removeCard: function (board, column, card) {
            if (confirm('Are You sure to Delete?')) {
                var $DeCard = {
                    card : card.id
                };
                BoardManipulator.removeCardFromColumn(board, column, card);
                return $http({
                    method: 'POST',
                    url: '/removeCard',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param($DeCard)
                }).success(function (data, status, headers, config) {
                          //console.log(data);
                });
            }
        },

        addNewCard: function (board, column) {
            var modalInstance = $modal.open({
                templateUrl: '/ng-sortable/views/partials/newCard.html',
                controller: 'NewCardController',
                backdrop: 'static',
                resolve: {
                    column: function () {
                        return column;
                    }
                }
            });
            modalInstance.result.then(function (cardDetails) {
                if (cardDetails) {

                    BoardManipulator.addCardToColumn(board, cardDetails.column, cardDetails);

                    /*$http.post("http://localhost:8000/insertCard",cardDetails).success(function(data, status, headers, config){
                     console.log("inserted Successfully");
                     });*/

                }
            });
        },
        
        detailCard: function (card) {
            var show = $modal.open({
                templateUrl: '/ng-sortable/views/partials/detailCard.html',
                controller: 'DetailCardController',
                backdrop: 'static',
                resolve: {
                    card: function () {
                        //console.log(card);
                        return card;
                    }
                }
            });
        },

        kanbanBoard: function (board) {
            var kanbanBoard = new Board(board.name, board.numberOfColumns);
            angular.forEach(board.columns, function (column) {
                BoardManipulator.addColumn(kanbanBoard, column.name);
                angular.forEach(column.cards, function (card) {
                    BoardManipulator.addCardToColumn(kanbanBoard, column, card );
                    //console.log(card)
                });
            });
            return kanbanBoard;
        }
    };
}]);