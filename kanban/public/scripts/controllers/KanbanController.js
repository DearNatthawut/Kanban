/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */
'use strict';

angular.module('kanban').controller('KanbanController', ['$scope', 'BoardService', 'BoardDataFactory', function ($scope, BoardService, BoardDataFactory) {

    var self = this;
    console.log("test");

    self.xxx = function(){

        var $userData = {
            id : 10,
            name : "xxx"
        };

        BoardService.newUsers($userData)
            .success(function(r){
                console.log(r);
            })
    }

    self.kanbanBoard = BoardService.kanbanBoard(BoardDataFactory.kanban);

    self.kanbanSortOptions = {

        //restrict move across columns. move only within column.
        /*accept: function (sourceItemHandleScope, destSortableScope) {
         return sourceItemHandleScope.itemScope.sortableScope.$id !== destSortableScope.$id;
         },*/
        itemMoved: function (event) {
            event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
        },
        orderChanged: function (event) {
        },
        containment: '#board'
    };

    self.removeCard = function (column, card) {
        BoardService.removeCard(self.kanbanBoard, column, card);
    }

    self.addNewCard = function (column) {
        BoardService.addNewCard(self.kanbanBoard, column);
    }

    self.showDetail = function(column, card){
        BoardService.showDetail(self.kanbanBoard, column);
    }



}]);
