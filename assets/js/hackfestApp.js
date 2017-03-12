var hackfestApp = angular.module('hackfestApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';
// var base_url = 'http://127.0.0.1:8000/v1';

hackfestApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

hackfestApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder){
	

	$scope.dataIndex = {};
	$scope.dataDetail = {};
	$scope.dataStatus = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.index = function () {
		$http.get(base_url+"/hackfest").then( function (response) {
			$scope.dataIndex = response.data.data;
		});
	}

	$scope.updateStatus = function (id, status) {

		$scope.dataDetail['status'] = status;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/hackfest/'+id,
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
			url		: base_url+'/hackfest/'+id,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (data) {
			$scope.index();
		});
	}

	$scope.destroy = function (id) {
		$http.delete(base_url+"/hackfest/"+id).then( function(response) {
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
		$http.get(base_url+"/hackfest/"+$scope.idTeam).then( function (response) {
			$scope.dataTeam = response.data.data;
		});
	}

	$scope.getMembers = function () {
		$http.get(base_url+'/hackfest/'+$scope.idTeam+'/members').then(function (response) {
			$scope.dataMember = response.data.data;
			angular.forEach($scope.dataMember, function (value, key) {
				$http.get(base_url+'/media/'+value.student_id_scan).then(function (response) {
					value.student_name = response.data.data.file_name;
				});
				$http.get(base_url+'/media/'+value.media_id).then(function (response) {
					value.media_name = response.data.data.file_name;
				});

			});
		});
	}

	$scope.getDocuments = function () {
		angular.forEach($scope.dataTeam, function (value, key) {
			$http.get(base_url+'/media/'+value.proposal).then(function (response) {
				value.proposal_name = response.data.data.file_name;
			});
			$http.get(base_url+'/media/'+value.receipt).then(function (response) {
				value.receipt_name = response.data.data.file_name;
			});
		});
	}

	


	$scope.updateStatus = function (status) {

		$scope.dataDetail['status'] = status;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/hackfest/'+$scope.idTeam,
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
			url		: base_url+'/hackfest/'+$scope.idTeam,
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

