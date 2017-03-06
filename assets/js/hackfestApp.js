var hackfestApp = angular.module('hackfestApp', ['datatables']);

hackfestApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

hackfestApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder){
	

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

	$scope.confirmPayment = function (id) {

		$scope.dataDetail['confirmed'] = 1;

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

hackfestApp.controller('getCtrl', function($scope, $http) {
	
	$scope.dataTeam = {};
	$scope.dataDetail = {};
	$scope.dataStatus = {};

	$scope.index = function () {
		$http.get("http://127.0.0.1:8000/v1/hackfest/"+$scope.idTeam).then( function (response) {
			$scope.dataTeam = response.data.data;
		});
	}

	$scope.getMembers = function () {
		$http.get('http://127.0.0.1:8000/v1/hackfest/'+$scope.idTeam+'/members').then(function (response) {
			$scope.dataMember = response.data.data;
			angular.forEach($scope.dataMember, function (value, key) {
				$http.get('http://127.0.0.1:8000/v1/media/'+value.student_id_scan).then(function (response) {
					value.student_name = response.data.data.file_name;
				});
				$http.get('http://127.0.0.1:8000/v1/media/'+value.media_id).then(function (response) {
					value.media_name = response.data.data.file_name;
				});

			});
		});
	}

	$scope.getDocuments = function () {
		angular.forEach($scope.dataTeam, function (value, key) {
			$http.get('http://127.0.0.1:8000/v1/media/'+value.proposal).then(function (response) {
				value.proposal_name = response.data.data.file_name;
			});
			$http.get('http://127.0.0.1:8000/v1/media/'+value.receipt).then(function (response) {
				value.receipt_name = response.data.data.file_name;
			});
		});
	}

	


	$scope.updateStatus = function (status) {

		$scope.dataDetail['status'] = status;

		$http({
			method 	: 'PATCH',
			url		: 'http://127.0.0.1:8000/v1/hackfest/'+$scope.idTeam,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (data) {
			$scope.index();
		});
	}

	$scope.confirmPayment = function () {

		$scope.dataDetail['confirmed'] = 1;

		$http({
			method 	: 'PATCH',
			url		: 'http://127.0.0.1:8000/v1/hackfest/'+$scope.idTeam,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (data) {
			$scope.index();
		});
	}



	$scope.index();
	$scope.getMembers();
	$scope.getDocuments();

});

