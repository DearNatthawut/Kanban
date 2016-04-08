/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */
'use strict';

angular.module('kanban').controller('KanbanController', ['$scope', 'BoardService', 'BoardDataFactory', function ($scope, BoardService, BoardDataFactory, CSRF_TOKEN) {


    var self = this;

    BoardDataFactory.getKanban().success(function (r) {  //------
       // console.log(r);
        self.kanbanBoard = BoardService.kanbanBoard(r);

    });


    self.kanbanSortOptions = {

        //restrict move across columns. move only within column.
        /*accept: function (sourceItemHandleScope, destSortableScope) {
         return sourceItemHandleScope.itemScope.sortableScope.$id !== destSortableScope.$id;
         },*/
        itemMoved: function (event) {
            //event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
           // console.log(event.source.itemScope.modelValue.card_id);

            var $MoveEvent = {
                cardId: event.source.itemScope.modelValue.id,
                columnName: event.dest.sortableScope.$parent.column.name
            };

            BoardService.cardMove($MoveEvent)
                .success(function (r) {
                    // console.log(r);
                });

        },
        orderChanged: function (event) {
        },
        dragStart: function (event) {
            //  console.log(event)
        },
        containment: '#board'
    };

    self.removeCard = function (column, card) {
        BoardService.removeCard(self.kanbanBoard, column, card);
    };

    self.addNewCard = function (column) {
        BoardService.addNewCard(self.kanbanBoard, column);
    };

    self.detailCard = function (card) {
        BoardService.detailCard(card);
    };


}]);
