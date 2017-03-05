var app = angular.module('hackfestApp', ['datatables']);

app.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

app.controller('indexCtrl', function($scope, $http, DTOptionsBuilder){
	

	$scope.dataIndex = {};
	$scope.dataDetail = {};
	$scope.dataStatus = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.index = function () {
		$http.get("http://127.0.0.1:8000/v1/hackfest?category="+$scope.category).then( function (response) {
			$scope.dataIndex = response.data.data;
		});
	}

	$scope.updateStatus = function (id, status) {

		$scope.dataDetail['status'] = status;

		$http({
			method 	: 'PATCH',
			url		: 'http://127.0.0.1:8000/v1/hackfest/'+id,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (data) {
			$scope.index();
		});
	}

	$scope.destroy = function (id) {
		$http.delete("http://127.0.0.1:8000/v1/hackfest/"+id).then( function(response) {
			$scope.index();
		});
	}


	$scope.index();

});

app.controller('getCtrl', function($scope, $http) {
	
	$scope.dataTeam = {};
	$scope.dataDetail = {};
	$scope.dataStatus = {};

	$scope.index = function () {
		$http.get("http://127.0.0.1:8000/v1/hackfest/"+$scope.idTeam).then( function (response) {
			$scope.dataTeam = response.data.data;
		});
	}

	$scope.update = function () {

	}

	$scope.destroy = function () {

	}


	$scope.index();

});

