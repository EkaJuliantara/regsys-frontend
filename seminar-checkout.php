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

  <section ng-controller="indexCtrlout" class="content">

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
                   <th width="200px">Tgl Daftar</th>
                   <th width="200px">Actions</th>
                 </tr>
              </thead>
              <tbody>
                <tr ng-repeat='data in filteredData = (dataIndex | filter: isCheckIn)'>
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.phone }}</td>
                  <td>
                    <!--<span ng-show="data.status == null && data.media_id == null" class="label label-danger">Belum Melakukan Pembayaran</span>
                    <span ng-show="data.status == null && data.media_id != null" class="label label-warning">Menunggu Verifikasi</span>
                    <span ng-show="data.status == 1" class="label label-success">Diterima</span>
                    <span ng-show="data.status == 0" class="label label-danger">Ditolak</span> -->
                    <span ng-show="data.check_out == null" class="label label-danger">Belum Check Out</span>
                    <span ng-show="data.check_out == 1" class="label label-success">Sudah Check Out</span>
                  </td>
                  <td>{{ data.created_at }}</td>
                  <td>
                    <!--<a title="Lihat" href="seminar-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a>

                    <button ng-show="data.status != 1" title="Status:Diterima" ng-click="updateStatus( data.id, 1)" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-ok"></i></button>

                    <button ng-show="data.status != 1" title="Status:Ditolak" ng-click="updateStatus( data.id, 0)" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-ok"></i></button>

                    <button title="Bayar diStand" ng-show="data.status != 1 && data.media_id == null" ng-click="paymentBooth(data.id)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-ok"></i></button>

                    <button title="Hapus" confirmed-click="destroy(data.id)" ng-confirm-click="Apakah anda yakin menghapus ini?" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button> -->

                    <button title="Check Out" ng-show="data.check_out == null" ng-click="checkOut(data.id)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-ok"></i></button>
                    <button title="Cancel Check Out" ng-show="data.check_out == 1" ng-click="cancelCheckOut(data.id)" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>

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
