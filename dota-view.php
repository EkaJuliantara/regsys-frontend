<?php
  ob_start();
  session_start();
  // if ($_SESSION['dota']['id']) {
?>

<?php require_once('header.php'); ?>

<?php
  $idTeam =  $_GET['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div ng-app="dotaApp" ng-init="idTeam=<?= $idTeam ?>" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dota Competition
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><a href="#">Dota</a></li>
      <li class="active">View Participant</li>
    </ol>
  </section>

  <!-- Main content -->
  <section ng-controller="getCtrl" class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Participants</h3>
          </div>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-8">
                  <div class="row">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Nama Tim</th>
                          <td>{{ dataTeam.name }}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{ dataTeam.email }}</td>
                        </tr>
                        <tr>
                          <th>No. Telp</th>
                          <td>{{ dataTeam.phone }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-8">
                  <div class="row">
                    <h3>Detail</h3>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Pembayaran</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-show="dataTeam.media_id == null">
                          <td colspan="3" style="text-align: center;">
                            <i style="font-size: 40px; color: #c0392b;" class="glyphicon glyphicon-remove-sign"></i>
                            <h3>Tidak Ada Dokumen</h3>
                          </td>
                        </tr>
                        <tr ng-show="dataTeam.proposal != null">
                          <td>
                            <a href="http://api.ifest-uajy.com/storage/media/{{ dataTeam.media_name }}"><span class="label label-primary">Lihat</span></a>
                          </td>
                          <td>
                            <span ng-show="dataTeam.status == 1" class="label label-success">Diterima</span>
                            <span ng-show="dataTeam.status != 1" class="label label-danger">Ditolak</span>
                          </td>
                          <td>
                            <button ng-click="updateStatus(1)" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-ok"></i></button>

                            <button ng-click="updateStatus(0)" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-ok"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-8">
                  <div class="row">
                  <h3>Anggota</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>ID Steam</th>
                        <th>Kartu Identitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-show="dataMembers.length == 0">
                        <td colspan="2" style="text-align: center;">
                          <i style="font-size: 40px; color: #c0392b;" class="glyphicon glyphicon-remove-sign"></i>
                          <h3>Tidak Ada Anggota</h3>
                        </td>
                      </tr>
                      <tr ng-show="dataMembers.length != 0" ng-repeat="data in dataMembers">
                        <td>{{ data.full_name }}</td>
                        <td>{{ data.steam_id }}</td>
                        <td>{{ data.media_id }}</td>
                        <td><a href="http://api.ifest-uajy.com/storage/media/{{ data.media_member }}"><span class="label label-primary">Lihat</span></a></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>

<?php
  // }else{
  //   header("location: login.php");
  // }
?>