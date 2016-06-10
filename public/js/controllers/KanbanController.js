/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */
'use strict';

angular.module('kanban').controller('KanbanController', ['$scope', 'BoardService', 'BoardDataFactory', '$http',

    function ($scope, BoardService, BoardDataFactory, $http) {


        var self = this;
        self.date = new Date();
        console.log(self.date);

        self.isOvertime = function(x,y){
            var dx = new Date(x);
            return dx < y;
        }

        function getDataMember() {
            $http({
                method: 'GET',
                url: "http://localhost:8000/getDataMember",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}

            }).success(function (r) {
                self.DataMember = r;
                // console.log(self.DataMember);
            })
        }

        getDataMember();


        BoardDataFactory.getKanban().success(function (r) {  //------
            // console.log(r);
            self.kanbanBoard = BoardService.kanbanBoard(r);
            console.log(self.kanbanBoard)

        });


        self.kanbanSortOptions = {

            //restrict move across columns. move only within column.
            /*accept: function (sourceItemHandleScope, destSortableScope) {
             return sourceItemHandleScope.itemScope.sortableScope.$id !== destSortableScope.$id;
             },*/
            itemMoved: function (event) {
                //event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;

                var AfterID;
                var BeforeID = event.source.itemScope.modelValue.status_id;


                if (event.dest.sortableScope.$parent.column.name == "Backlog") {
                    AfterID = 1;
                } else if (event.dest.sortableScope.$parent.column.name == "Ready") {
                    AfterID = 2 ;
                } else if (event.dest.sortableScope.$parent.column.name == "Doing") {
                    AfterID = 3;
                } else if (event.dest.sortableScope.$parent.column.name == "Done"){
                    AfterID =4;
                }


                var $MoveEvent = {
                    cardId: event.source.itemScope.modelValue.id,
                    columnName: event.dest.sortableScope.$parent.column.name
                };

                BoardService.cardMove($MoveEvent)
                    .success(function (r) {
                        BoardDataFactory.getKanban().success(function (r) {  //------
                            // console.log(r);
                            self.kanbanBoard = BoardService.kanbanBoard(r);
                            // console.log(self.kanbanBoard)
                           
                            if (BeforeID - AfterID < 0){           //----------------------- After Moved
                                BoardService.afterMove();
                            }else {
                                BoardService.afterMoveBack(event.source.itemScope.modelValue.id)
                            }


                        });
                    });
            },
            accept: function (event) {
                //console.log(event.itemScope.$parent.card.pre_card);
                if (event.itemScope.$parent.card.pre_card != null) {
                    var check = (event.itemScope.$parent.card.pre_card.status_id == 4);
                } else var check = true;
                return check;

            },

            orderChanged: function (event) {
                console.log(event.source.itemScope.modelValue.status_id)
            },
            dragStart: function (event) {
                //console.log(event)

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
