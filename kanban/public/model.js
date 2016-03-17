/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */

'use strict';
function Board(name, numberOfColumns) {
  return {
    name: name,
    numberOfColumns: numberOfColumns,
    columns: [],
    backlogs: []
  };
}

function Column(name) {
  return {
    name: name,
    cards: []
  };
}

function Backlog(name) {
  return {
    name: name,
    phases: []
  };
}

function Phase(name) {
  return {
    name: name,
    cards: []
  };
}

function Card(title, status, details,card_id,estimateStart) {
  this.title = title;
  this.status = status;
  this.details = details;
  this.card_id = card_id;
  this.estimateStart = estimateStart;
  return this;
}
