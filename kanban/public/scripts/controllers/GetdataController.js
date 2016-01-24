
angular.module('kanban').controller('getdata',  ['$scope' ,function ($scope,$http) {


getData();  

  function getData(){

      $http.get("bower_components/database/config.php").success(function(data){

        $scope.data = "data"; 

 });

};


}]);


 