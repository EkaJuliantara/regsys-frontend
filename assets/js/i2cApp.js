var i2cApp = angular.module('i2cApp', ['datatables']);
var base_url = 'http://api.ifest-uajy.com/v1';
// var base_url = 'http://127.0.0.1:8000/v1';

i2cApp.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);

i2cApp.directive('ngConfirmClick', [
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

i2cApp.controller('indexCtrl', function($scope, $http, DTOptionsBuilder) {

  $scope.idTeam = "";
  $scope.idDetail = "";
  $scope.dataTeam = {};
  $scope.dataDocuments = [];
  $scope.dataDetail = {};

  $scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

  $scope.index = function () {
    $http.get(base_url+"/i2c?category="+$scope.category).then(function (response) {
      $scope.dataTeam = response.data.data;
      angular.forEach($scope.dataTeam, function(value,key) {
        $http.get(base_url+"/i2c/"+value.id+"/details").then(function (response) {
          value.detail = response.data.data;
          if (value.detail.length != 0) {
            var looping = true;
            for (var i = 0; i < value.detail.length && looping != false; i++) {
              if(value.detail[i].status != null) 
              {
                if (value.detail[i].status != 0) 
                {
                  if (value.detail[i].payment_id != null) {
                    value.colorStatus = "success";
                    value.statusIndex = "Transaksi Data Lengkap";
                  } else {
                    value.colorStatus = "info";
                    value.statusIndex = "Menunggu Pembayaran";
                    looping = false;
                  }
                } else {
                  value.colorStatus = "danger";
                  value.statusIndex = "Status Ditolak";
                  looping = false;
                }
              } else {
                value.colorStatus = "warning";
                value.statusIndex = "Menunggu Verifikasi";
                looping = false;
              }
            }
          } else {
            value.colorStatus = "danger";
            value.statusIndex = "Data Kosong";
          }
        });
      });
    });
  }

  // $scope.updateStatus = function (status) {

  //   $scope.dataDetail['status'] = status;
  //   $http({
  //     method : 'PATCH',
  //     url    : base_url+'/i2c/'+$scope.idTeam+'/detail/'+$scope.idDetail,
  //     data   : $.param($scope.dataDetail),
  //     headers: { 'Content-Type': 'i2cApplication/x-www-form-urlencoded' }
  //   }).then(function (data) {
  //     $scope.index();
  //   });
  // }

  $scope.updateStatus = function (id, detail, status) {

    $scope.dataDetail['status'] = status;
    $http({
      method  : 'PATCH',
      url     : base_url+'/i2c/'+id+'/detail/'+detail,
      data    : $.param($scope.dataDetail),
      headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then( function (data) {
      $scope.index();
    });
  }

  $scope.createStatus = function (id, status) {

    $scope.dataDetail['status'] = status;
    $http({
      method  : 'POST',
      url     : base_url+'/i2c/'+id+'/detail',
      data    : $.param($scope.dataDetail),
      headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then( function (data) {
      $scope.index();
    });
  }


  $scope.destroy = function(id) {

    //$scope.idTeam = $('#btn-destroy').attr('id-team');
    $http.delete(base_url+"/i2c/"+id).then(function (response) {
      $scope.index();
    });
  }

  $scope.index();

});

i2cApp.controller('getCtrl', function($scope, $http) {
  $scope.dataDetail = {};

  $scope.index = function () {
    $http.get(base_url+"/i2c/"+$scope.idTeam).then(function (response) {
      $scope.dataTeam = response.data.data;
    });
  }

  $scope.getMembers = function () {
    $http.get(base_url+"/i2c/"+$scope.idTeam+"/members").then(function (response) {
      $scope.dataMembers = response.data.data;

      angular.forEach($scope.dataMembers, function (value, key){
        $http.get(base_url+"/media/"+value.media_id).then(function (response) {
          value.media_name = response.data.data.file_name;
        });
      });
    });
  }

  $scope.getDocuments = function () {
    $http.get(base_url+"/i2c/"+$scope.idTeam+"/details").then(function (response) {
      $scope.dataDocuments = response.data.data;

      angular.forEach($scope.dataDocuments, function (value, key){
        $http.get(base_url+"/media/"+value.document_id).then(function (response) {
          value.document_name = response.data.data.file_name;
        });
      }); 
      angular.forEach($scope.dataDocuments, function (value, key){
        $http.get(base_url+"/media/"+value.payment_id).then(function (response) {
          value.payment_name = response.data.data.file_name;
        });
      }); 
    });
  }

  $scope.updateStatus = function (id, status) {

    $scope.dataDetail['status'] = status;

    $http({
      method  : 'PATCH',
      url   : base_url+'/i2c/'+$scope.idTeam+'/detail/'+id,
      data  : $.param($scope.dataDetail),
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then( function (response) {
      $scope.getDocuments();
    });
  }


  $scope.index();
  $scope.getMembers();
  $scope.getDocuments();
  

});

