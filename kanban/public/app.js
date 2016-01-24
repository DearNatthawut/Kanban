'use strict';

angular.module('kanban', [
        'ngRoute',
        'ui.sortable',
        'ui.bootstrap'
    ])
    .config(['$compileProvider', function ($compileProvider) {
        $compileProvider.debugInfoEnabled(false); // testing issue #144
    }]).
config(['$routeProvider', function ($routeProvider) {

    $routeProvider.when('/', {templateUrl: 'views/kanban.html'});

    $routeProvider.when('/kanban', {templateUrl: 'views/kanban.html', controller: 'KanbanController'});

    $routeProvider.otherwise({redirectTo: '/'});
}]);