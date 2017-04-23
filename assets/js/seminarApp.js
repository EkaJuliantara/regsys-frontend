var seminarApp = angular.module('seminarApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';

seminarApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

seminarApp.directive('ngConfirmClick', [
  function(){
    return {
        link: function (scope, element, attr) {
          var msg = attr.ngConfirmClick;
          var clickAction = attr.confirmedClick;
          element.bind('click',function (event) {
              if ( window.confirm(msg) ) {
                  scope.$eval(clickAction)
              }
          });
        }
    };
}])

seminarApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder) {

	$scope.dataIndex = {};
	$scope.dataDetail = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.index = function () {
		$http.get(base_url + "/seminar").then( function(response) {
			$scope.dataIndex = response.data.data;
		});
	}

	$scope.paymentBooth = function (id) {

		$scope.dataDetail['booth'] = 1;
		$scope.dataDetail['status'] = 1;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}

	$scope.updateStatus =  function (id, status) {

		$scope.dataDetail['status'] = status;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}

	$scope.destroy = function (id) {
		$http.delete(base_url + "/seminar/" + id).then( function(data) {
			$scope.index();
		});
	}

	$scope.index();

});

seminarApp.controller('getCtrl', function($scope, $http) {

	$scope.dataPeserta = {};
	$scope.dataDetail = {};

	$scope.index = function() {
		$http.get(base_url + "/seminar/" + $scope.idTeam).then( function(response) {
			$scope.dataPeserta = response.data.data;

			$http.get(base_url+'/media/'+$scope.dataPeserta.media_id).then(function (response) {
				$scope.dataPeserta.media_name = response.data.data.file_name;
			});

		});
	}

	$scope.updateStatus =  function (status) {

		$scope.dataDetail['status'] = status;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + $scope.idTeam,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}

	$scope.paymentBooth = function () {

		$scope.dataDetail['booth'] = true;
		$scope.dataDetail['status'] = true;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + $scope.idTeam,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}


	$scope.index();

});