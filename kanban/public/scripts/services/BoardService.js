/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */

'use strict';

angular.module('kanban').service('BoardService', ['$modal', 'BoardManipulator','$http', function ($modal, BoardManipulator,$http,$scope,CSRF_TOKEN) {

    return {
        cardMove : function ($MoveEvent) {
            return $http({
                //crossDomain : true,
                method : 'POST',
                url : 'moveCard',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
                data : $.param($MoveEvent)
            }).
            success(function(data, status, headers, config) {

            });
        },
        newUsers : function ($user_data) {
            return $http({
                url : '/api/newUser',
                method : 'POST',
                data : $user_data
            });
        },
        removeCard: function (board, column, card) {
            if (confirm('Are You sure to Delete?')) {
                BoardManipulator.removeCardFromColumn(board, column, card);
            }
        },

        addNewCard: function (board, column) {
            var modalInstance = $modal.open({
                templateUrl: 'views/partials/newCard.html',
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


                   BoardManipulator.addCardToColumn(board, cardDetails.column, cardDetails.title, cardDetails.details,cardDetails.card_id
                        ,cardDetails.estimateStart);

                    /*$http.post("http://localhost:8000/insertCard",cardDetails).success(function(data, status, headers, config){
                        console.log("inserted Successfully");
                    });*/

                }
            });
        },
        showDetail: function(column, card){
            var show = $modal.open({
                templateUrl: 'views/partials/showdetail.html',
                controller: 'KanbanController',
                backdrop: 'static'

            });
        },

        kanbanBoard: function (board) {
            var kanbanBoard = new Board(board.name, board.numberOfColumns);
            angular.forEach(board.columns, function (column) {
                BoardManipulator.addColumn(kanbanBoard, column.name);
                angular.forEach(column.cards, function (card) {
                    BoardManipulator.addCardToColumn(kanbanBoard, column, card.title,card.details,card.card_id,card.estimateStart);
                });
            });
            return kanbanBoard;
        }
    };
}]);