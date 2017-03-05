<?php
  ob_start();
  session_start();
  if ($_SESSION['hackfest']['id']) {
?>

<?php require_once('header.php'); ?>

<div ng-app="hackfestApp" ng-init="category=1" class="content-wrapper">

  <section class="content-header">
    <h1>
      Hackathon
      <small>IFEST</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">I2C</li>
      <li class="active">Trailer</li>
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
                <b>{{ dataIndex.length }}</b> Participants
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
                   <th>Tgl Daftar</th>
                   <th width="200px">Actions</th>
                 </tr> 
              </thead>
              <tbody>
                <tr ng-repeat="data in dataIndex">
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.phone }}</td>
                  <td>
                    <span ng-show="data.status == 1" class="label label-primary">Aktif</span>
                    <span ng-show="data.status == 0" class="label label-danger">Ditolak</span>
                    <span ng-show="data.status == null" class="label label-warning">Menunggu Verifikasi..</span>
                  </td>
                  <td>{{ data.created_at }}</td>
                  <td>
                    <a href="hackfest-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a> 
                    
                    <button title="Status:Diterima" ng-show="data.status != 1" ng-click="updateStatus(data.id, 1);" class="btn btn-xs btn-info"><i class="fa fa-power-off"></i></button>

                    <button title="Status:Ditolak" ng-show="data.status == 1" ng-click="updateStatus(data.id, 0);" class="btn btn-xs btn-warning"><i class="fa fa-power-off"></i></button>

                    <button ng-click="destroy(data.id);" class="btn btn-xs bg-orange"><i class="fa fa-trash"></i></button>

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