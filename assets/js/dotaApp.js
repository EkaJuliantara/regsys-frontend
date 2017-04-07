var dotaApp = angular.module('dotaApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';

dotaApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

dotaApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder) {

	$scope.dataIndex = {};
	$scope.dataDetail = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.index = function () {
		$http.get(base_url + "/dota").then( function(response) {
			$scope.dataIndex = response.data.data;
		});
	}

	$scope.updateStatus =  function (id, status) {

		$scope.dataDetail['status'] = status;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/dota/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});

	}

	$scope.destroy = function (id) {
		$http.delete(base_url + "dota" + id).then( function(response) {
			$scope.index();
		});
	}

	$scope.index();

});

dotaApp.controller('getCtrl', function($scope, $http) {

	$scope.dataTeam = {};
	$scope.dataMembers = {};
	$scope.dataDetail = {};

	$scope.index = function() {
		$http.get(base_url + "/dota/" + $scope.idTeam).then( function(response) {
			$scope.dataTeam = response.data.data;
		});
	}

	$scope.getMembers = function () {
		$http.get(base_url + "/dota/" + $scope.idTeam + "/members").then( function(response) {
			$scope.dataMembers = response.data.data;
		});
	}

	$scope.getDocuments = function () {
		angular.forEach($scope.dataTeam, function (value, key) {
			$http.get(base_url+'/media/'+value.media_id).then(function (response) {
				value.media_name = response.data.data.file_name;
			});
		});

		angular.forEach($scope.dataMembers, function (value, key) {
			$http.get(base_url+'/media/'+value.media_id).then(function (response) {
				value.media_member = response.data.data.file_name;
			});
		});

	}

	$scope.updateStatus = function (status) {

		$scope.dataDetail['status'] = status;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/dota/'+$scope.idTeam,
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