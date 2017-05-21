var seminarApp = angular.module('seminarApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';
//var base_url = 'http://127.0.0.1:8000/v1';

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

	$scope.isVege = function(data) {
	    return data.vegetarian == "1";
	};

	$scope.isNotPaid = function(data) {
	    return data.status != "1";
	};

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

seminarApp.controller('indexCtrlout', function($scope, $http, DTOptionsBuilder) {

	$scope.dataIndex = {};
	$scope.dataDetail = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.isCheckIn = function(data) {
	    return data.check_in == "1";
	};

    $scope.isCheckOut = function(data) {
        return data.check_out == "1";
    }

	$scope.index = function () {
		$http.get(base_url + "/seminar").then( function(response) {
			$scope.dataIndex = response.data.data;
		});
	}

	$scope.cancelCheckOut = function (id) {

	$scope.dataDetail['check_out'] = null;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}

	$scope.checkOut = function (id) {

	$scope.dataDetail['check_out'] = 1;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
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

seminarApp.controller('indexCtrlIn', function($scope, $http, DTOptionsBuilder) {

	$scope.dataIndex = {};
	$scope.dataDetail = {};

	$scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

	$scope.isPaid = function(data) {
	    return data.status == "1";
	};

	$scope.index = function () {
		$http.get(base_url + "/seminar").then( function(response) {
			$scope.dataIndex = response.data.data;
		});
	}

  $scope.cancelCheckIn = function (id) {

    $scope.dataDetail['check_in'] = null;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
  }

  $scope.checkIn = function (id) {

    $scope.dataDetail['check_in'] = 1;

		$http({
			method	: 	'PATCH',
			url 	: 	base_url + '/seminar/' + id,
			data 	: 	$.param($scope.dataDetail),
			headers :  	{ 'Content-Type': 'application/x-www-form-urlencoded' }
		}).then( function(data) {
			$scope.index();
		});
	}

	$scope.index();

});
