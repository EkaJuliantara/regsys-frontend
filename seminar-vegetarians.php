<?php
  ob_start();
  session_start();
  if ($_SESSION['hackfest']['id']) {
?>

<?php require_once('header.php'); ?>

<div ng-app="seminarApp" class="content-wrapper">

  <section class="content-header">
    <h1>
      Seminar
      <small>IFEST</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Seminar</li>
    </ol>
  </section>

  <section ng-controller="indexCtrl" class="content">
    
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Participants</h3>
            <div class="box-tools pull-right">
              <span class="label label-primary">
                <b>{{ filteredData.length }}</b> Participants
              </span>
            </div>
          </div>
          <div class="box-body">
            <table datatable="ng" dt-options="dtOptions" class="table table-striped">
              <thead>
                <tr>
                   <th>Nama Tim</th>
                   <th>Email</th>
                   <th>No.Telp</th>
                   <th>Status</th>
                   <th>Vegetarian</th>
                 </tr> 
              </thead>
              <tbody>
                <tr ng-repeat="data in filteredData = (dataIndex | filter: isVege)">
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.phone }}</td>
                  <td>
                    <span ng-show="data.status == null && data.media_id == null" class="label label-danger">Belum Melakukan Pembayaran</span>
                    <span ng-show="data.status == null && data.media_id != null" class="label label-warning">Menunggu Verifikasi</span>
                    <span ng-show="data.status == 1" class="label label-success">Diterima</span>
                    <span ng-show="data.status == 0" class="label label-danger">Ditolak</span>
                  </td>
                  <td>
                    <span ng-show="data.vegetarian == 1" class="label label-success">Iya</span>
                    <span ng-show="data.vegetarian == 0" class="label label-danger">Tidak</span>
                  </td>                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>

<?php require_once('footer.php'); ?>

<?php
  }else{
   header("location: login.php");
  }
?>