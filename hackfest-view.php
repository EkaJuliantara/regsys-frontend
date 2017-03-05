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
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr ng-show="">
                          <td colspan="3" style="text-align: center;">
                            <i style="font-size: 40px; color: #c0392b;" class="glyphicon glyphicon-remove-sign"></i>
                            <h3>Tidak Ada Dokumen</h3>
                          </td>
                        </tr> -->
                        <tr ng-show="">
                          <td>
                            <a href=""><span class="label label-primary">Lihat</span></a>
                          </td>
                          <td>
                            <a href=""><span class="label label-primary">Lihat</span></a>
                            <span class="label label-warning">Tidak Ada</span>
                          </td>
                          <td>
                            <span class="label label-success">Diterima</span>
                            <span class="label label-danger">Ditolak</span>
                          </td>
                          <td>
                            <button class="btn btn-xs btn-success" title="Diterima"><i class="fa fa-power-off"></i></button>
                            <button class="btn btn-xs btn-danger" title="Ditolak"><i class="fa fa-power-off"></i></button>
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Kartu Identitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Col 1</td>
                        <td><a href=""><span class="label label-primary">Lihat</span></a></td>
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