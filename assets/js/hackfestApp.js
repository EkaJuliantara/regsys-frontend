var hackfestApp = angular.module('hackfestApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';
// var base_url = 'http://127.0.0.1:8000/v1';

hackfestApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

hackfestApp.directive('ngConfirmClick', [
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

hackfestApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder) {


	$scope.dataIndex = {};
	$scope.dataDetail = {};
	$scope.dataStatus = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(25);

	$scope.index = function () {
		$http.get(base_url+"/hackfest").then( function(response) {
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
		}).then( function (response) {
			$scope.index();
		});
	}

	$scope.paymentBooth = function (id) {

		$scope.dataDetail['booth'] = 1;
		$scope.dataDetail['confirmed'] = 1;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/hackfest/'+id,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (response) {
			$scope.index();
		});
	}

	$scope.confirmPayment = function (id, status) {

		$scope.dataDetail['confirmed'] = status;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/hackfest/'+id,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (response) {
			$scope.index();
		});
	}

	$scope.destroy = function (id) {
		$http.delete(base_url+"/hackfest/"+id).then(function (response) {
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
			$scope.getDocuments($scope.dataTeam);
		});
	}

	$scope.getMembers = function () {
		$http.get(base_url+'/hackfest/'+$scope.idTeam+'/members').then(function (response) {
			$scope.dataMember = response.data.data;
			angular.forEach($scope.dataMember, function(value,key) {
				$http.get(base_url+'/media/'+value.student_id_scan).then(function (response) {
					value.student_name = response.data.data.file_name;
				});
			});
		});
	}

	$scope.getDocuments = function (value) {

		if (value.proposal) {
			$http.get(base_url+'/media/'+value.proposal).then(function (response) {
				value.proposal_name = response.data.data.file_name;
			});
		}

		if (value.receipt) {
			$http.get(base_url+'/media/'+value.receipt).then(function (response) {
				value.receipt_name = response.data.data.file_name;
			});
		}

	}

	// $scope.getDocumentMember = function (value)
	// {
	// 	if (value.student_id_scan) {
	// 		$http.get(base_url+'/media/'+value.student_id_scan).then(function (response) {
	// 			value.student_name = response.data.data.file_name;
	// 		});
	// 	}

	// }



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

	$scope.confirmPayment = function (status) {

		$scope.dataDetail['confirmed'] = status;

		$http({
			method 	: 'PATCH',
			url		: base_url+'/hackfest/'+$scope.idTeam,
			data 	: $.param($scope.dataDetail),
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function (data) {
			$scope.index();
		});
	}

	$scope.paymentBooth = function () {

		$scope.dataDetail['confirmed'] = 1;
		$scope.dataDetail['booth'] = 1;

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
	// $scope.getDocuments();

});
