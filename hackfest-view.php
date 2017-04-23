<?php
  ob_start();
  session_start();
  if ($_SESSION['hackfest']['id']) {
?>

<?php require_once('header.php'); ?>

<?php
  $idTeam =  $_GET['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div ng-app="hackfestApp" ng-init="idTeam=<?= $idTeam ?>" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hackathon IFEST
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><a href="#">HackFest</a></li>
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
                          <th>Proposal</th>
                          <th>Pembayaran</th>
                          <th>Status Pembayaran</th>
                          <th>Status Proposal</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-show="dataTeam.proposal == null && dataTeam.confirmed == null && dataTeam.receipt == null">
                          <td colspan="3" style="text-align: center;">
                            <i style="font-size: 40px; color: #c0392b;" class="glyphicon glyphicon-remove-sign"></i>
                            <h3>Tidak Ada Dokumen</h3>
                          </td>
                        </tr>
                        <tr ng-show="dataTeam.proposal != null || dataTeam.receipt != null">
                          <td>
                            <a ng-show="dataTeam.proposal != null" href="http://api.ifest-uajy.com/storage/media/{{ dataTeam.proposal_name }}"><span class="label label-primary">Lihat</span>
                            <span ng-show="dataTeam.proposal == null" class="label label-primary">Menunggu Proposal</span>
                          </td>
                          <td>
                            <a ng-show="dataTeam.receipt != null && dataTeam.booth != 1" href="http://api.ifest-uajy.com/storage/media/{{ dataTeam.receipt_name }}"><span class="label label-primary">Lihat</span></a>
                            <span ng-show="dataTeam.receipt == null && dataTeam.booth != 1" class="label label-warning">Tidak Ada</span>
                            <span ng-show="dataTeam.booth == 1" class="label label-primary">Bayar diStand</span>
                          </td>
                          <td>
                            <span ng-show="dataTeam.receipt != null && dataTeam.confirmed == null" class="label label-danger">Menunggu Verifikasi</span>
                            <span ng-show="dataTeam.confirmed == 1" class="label label-success">Pembayaran Diterima</span>
                            <span ng-show="dataTeam.confirmed == 0" class="label label-danger">Pembayaran Ditolak</span>
                          </td>
                          <td>
                            <span ng-show="dataTeam.proposal != null && dataTeam.status == null" class="label label-danger">Menunggu Verifikasi</span>
                            <span ng-show="dataTeam.status == 1" class="label label-success">Proposal Diterima</span>
                            <span ng-show="dataTeam.status == 0" class="label label-danger">Proposal Ditolak</span>
                          </td>
                          <td>
                            <button ng-click="updateStatus(1)" ng-show="dataTeam.proposal != null && dataTeam.confirmed == 1 && dataTeam.status != 1" class="btn btn-xs btn-primary" title="Diterima"><i class="fa fa-power-off"></i></button>
                            <button ng-click="updateStatus(0)" ng-show="dataTeam.proposal != null && dataTeam.confirmed == 1 && dataTeam.status != 1" class="btn btn-xs btn-danger" title="Ditolak"><i class="fa fa-power-off"></i></button>

                            <button ng-click="confirmPayment(1)" ng-show="dataTeam.booth != 1  && dataTeam.receipt != null && dataTeam.confirmed != 1" class="btn btn-xs btn-info" title="Konfirmasi Pembayaran Diterima"><i class="glyphicon glyphicon-ok"></i></button>

                            <button ng-click="confirmPayment(0)" ng-show="dataTeam.booth != 1  && dataTeam.receipt != null && dataTeam.confirmed != 1" class="btn btn-xs btn-danger" title="Konfirmasi Pembayaran Ditolak"><i class="glyphicon glyphicon-ok"></i></button>

                            <button ng-click="paymentBooth()" ng-show="dataTeam.booth != 1  && dataTeam.receipt == null && dataTeam.confirmed != 1" class="btn btn-xs btn-info" title="Bayar diTempat"><i class="glyphicon glyphicon-ok"></i></button>
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
                        <th>Surat Keterangan </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-show="dataMember.length == 0">
                        <td colspan="2" style="text-align: center;">
                          <i style="font-size: 40px; color: #c0392b;" class="glyphicon glyphicon-remove-sign"></i>
                          <h3>Tidak Ada Anggota</h3>
                        </td>
                      </tr>
                      <tr ng-show="dataMember.length != 0" ng-repeat="data in dataMember">
                        <td>{{ data.name }}</td>
                        <td><a href="http://api.ifest-uajy.com/storage/media/{{ data.student_name }}"><span class="label label-primary">Lihat</span></a></td>
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
  }else{
    header("location: login.php");
  }
?>