      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <!-- Anything you want -->
          App by <strong>SISTEM INFORMASI IFEST #5</strong></a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="http://ifest-uajy.com/" target="_blank">IFEST UAJY</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/s/bs/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>
    <script>
      /*$(document).ready(function(){
          $('#peserta').DataTable();
      });*/
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- AngularJS -->
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-datatables/angular-datatables.min.js"></script>

    <script>
      var app = angular.module('i2cApp', ['datatables']);

      app.config(['$qProvider', function ($qProvider) {
          $qProvider.errorOnUnhandledRejections(false);
      }]);

      app.directive('ngConfirmClick', [
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

      app.controller('indexCtrl', function($scope, $http, DTOptionsBuilder) {

        $scope.idTeam = "";
        $scope.idDetail = "";
        $scope.dataTeam = {};
        $scope.dataDocuments = [];
        $scope.dataDetail = {};

        $scope.dtOptions = DTOptionsBuilder.newOptions().withDisplayLength(10);

        $scope.index = function () {
          $http.get("http://api.ifest-uajy.com/v1/i2c?category="+$scope.category).then(function (response) {
            $scope.dataTeam = response.data.data;
            angular.forEach($scope.dataTeam, function(value,key) {
              $http.get("http://api.ifest-uajy.com/v1/i2c/"+value.id+"/details").then(function (response) {
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
                        value.statusIndex = "Proposal Ditolak";
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

        $scope.updateStatus = function (status) {

          $scope.dataDetail['status'] = status;
          $scope.idTeam = $('#btn-update').attr('id-team');
          $scope.idDetail = $('#btn-update').attr('id-detail');
          $http({
            method : 'PATCH',
            url    : 'http://api.ifest-uajy.com/v1/i2c/'+$scope.idTeam+'/detail/'+$scope.idDetail,
            data   : $.param($scope.dataDetail),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
          }).then(function (data) {
            $scope.index();
          });
        }

        $scope.destroy = function() {

          $scope.idTeam = $('#btn-destroy').attr('id-team');

          $http.delete("http://api.ifest-uajy.com/v1/i2c/"+$scope.idTeam).then(function (response) {
            $scope.index();
          });
        }

        $scope.index();
    
      });

      app.controller('getCtrl', function($scope, $http) {
        $scope.dataDetail = {};

        $scope.index = function () {
          $http.get("http://api.ifest-uajy.com/v1/i2c/"+$scope.idTeam).then(function (response) {
            $scope.dataTeam = response.data.data;
          });
        }

        $scope.getMembers = function () {
          $http.get("http://api.ifest-uajy.com/v1/i2c/"+$scope.idTeam+"/members").then(function (response) {
            $scope.dataMembers = response.data.data;

            angular.forEach($scope.dataMembers, function (value, key){
              $http.get("http://api.ifest-uajy.com/v1/media/"+value.media_id).then(function (response) {
                value.media_name = response.data.data.file_name;
              });
            });
          });
        }

        $scope.getDocuments = function () {
          $http.get("http://api.ifest-uajy.com/v1/i2c/"+$scope.idTeam+"/details").then(function (response) {
            $scope.dataDocuments = response.data.data;

            angular.forEach($scope.dataDocuments, function (value, key){
              $http.get("http://api.ifest-uajy.com/v1/media/"+value.document_id).then(function (response) {
                value.document_name = response.data.data.file_name;
              });
            }); 
            angular.forEach($scope.dataDocuments, function (value, key){
              $http.get("http://api.ifest-uajy.com/v1/media/"+value.payment_id).then(function (response) {
                value.payment_name = response.data.data.file_name;
              });
            }); 
 

            

          });
        }

        $scope.updateStatus = function (id, status) {

          $scope.dataDetail['status'] = status;

          $http({
            method : 'PATCH',
            url    : 'http://api.ifest-uajy.com/v1/i2c/'+$scope.idTeam+'/detail/'+id,
            data   : $.param($scope.dataDetail),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
          }).then(function (data) {
            $scope.getDocuments();
          });

        }


        $scope.index();
        $scope.getMembers();
        $scope.getDocuments();
        

      });

    </script>

  </body>
</html>