/*jshint undef: false, unused: false, indent: 2*/
/*global angular: false */

'use strict';

angular.module('kanban').service('BoardDataFactory', function () {

  return {
    kanban: {
     
      "columns": [
        {"name": "Backlog", "cards": [
         {"title": "Test Program"
           ,"details": "Test all unit"
           ,"run": "run1"
           ,"estimateStart":"1111"
         }

        ]},
        {"name": "Ready", "cards": [
          {"title": "Implement"
            ,"details": "เขียนโปรแกรม"
            ,"estimateStart":"dead"
          },
          {"title": "Requiment Analysis"
            ,"details": "วิเคราะห์ ความต้องการ"
            ,"estimateStart":"dead"
          }
         
        ]},
        {"name": "Doing", "cards": [
          {"title": "Requirement Gathering"
            ,"details": "เก็บความต้องการ"
            ,"estimateStart":"dead"
          }
        ]},
        {"name": "Done", "cards": [
        
        ]}
      ]
    }
  };
});


