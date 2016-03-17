/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */
'use strict';
var test;
angular.module('kanban').controller('KanbanController', ['$scope', 'BoardService', 'BoardDataFactory', function ($scope, BoardService, BoardDataFactory,CSRF_TOKEN) {


    var self = this;



    console.log("test");

    self.xxx = function () {

        var $userData = {
            id: 10,
            name: "xxx",
           // '_token':CSRF_TOKEN
        };

        BoardService.newUsers($userData)
            .success(function (r) {
                console.log(r);
            })
    };

    BoardDataFactory.getKanban().success(function(r){
        console.log(r);
        self.kanbanBoard = BoardService.kanbanBoard(r);

    });



    self.kanbanSortOptions = {

        //restrict move across columns. move only within column.
        /*accept: function (sourceItemHandleScope, destSortableScope) {
         return sourceItemHandleScope.itemScope.sortableScope.$id !== destSortableScope.$id;
         },*/
        itemMoved: function (event) {
            //event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
            console.log(event.source.itemScope.modelValue.card_id);

            var $MoveEvent = {
                cardId: event.source.itemScope.modelValue.card_id,
                columnName: event.dest.sortableScope.$parent.column.name
            };

            BoardService.cardMove($MoveEvent)
                .success(function (r) {
                   // console.log(r);
                });

           /* $http({
                url : 'http://localhost:8000/moveCard',
                method : 'POST',
                data : $MoveEvent
            })*/

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

    self.showDetail = function (column, card) {
        BoardService.showDetail(self.kanbanBoard, column);
    };


}]);
