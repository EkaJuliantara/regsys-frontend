<?php
  error_reporting(0);
  ob_start();
  session_start();
  if (!$_SESSION['hackfest']['id']) {
?>
<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IFEST RegSys | Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style type="text/css"></style></head>
<body class="hold-transition login-page">
<div ng-app="loginApp" ng-controller="loginCtrl" class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>IFEST</b>RegSys</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai</p>

    <form ng-submit="loginSubmit()">
      <div class="form-group has-feedback">
        <input ng-model="formData.name" type="text" class="form-control" placeholder="Username" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input ng-model="formData.password" type="password" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" ng-disabled="button == 'MASUK...'">{{ button }}</button>
        </div>
        <!-- /.col -->
      </div>
      <br>
      <span ng-show="errors">{{ errors }}</span>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- AngularJS -->
<script src="bower_components/angular/angular.min.js"></script>

<script>

var loginApp = angular.module("loginApp", []);
loginApp.controller("loginCtrl", function($scope, $http, $window) {

  $scope.formData = {};
  $scope.errors = "";

  $scope.button = "MASUK";

  $scope.loginSubmit = function () {

    $scope.errors = "";

    $scope.button = "MASUK...";

    $http({
      method  : 'POST',
      url     : 'http://api.ifest-uajy.com/v1/user/login',
      data    : $.param($scope.formData),
      headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
     })
    .then(function(data) {
      if (data.data.status == 200) {

        $scope.button = "MASUK...";

        $http({
          method  : 'POST',
          url     : 'proses-login.php',
          data    : $.param({ id: data.data.data.id }),
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function(data) {
          $window.location.href = 'index.php';
        });

      }else{
        $scope.errors = data.data.errors;
        $scope.button = "MASUK";
      }
    });
  }
});

</script>


</body></html>

<?php
  }else{
    header("location: index.php");
  }
?>