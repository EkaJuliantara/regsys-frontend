<?php require_once('header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div ng-app="i2cApp" ng-init="category=2" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      I2C
      <small>Trailer</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">I2C</li>
      <li class="active">Trailer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section ng-controller="indexCtrl" class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Participants</h3>
              <div class="box-tools pull-right">
                <span class="label label-primary"><b>3</b> Participants</span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table datatable="ng" dt-options="dtOptions" class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Tim</th>
                  <th>Email</th>
                  <th>No. Telp</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in dataTeam">
                  <td>{{ data.name }}</th>
                  <td>{{ data.email }}</th>
                  <td style="width:150px;">{{ data.phone }}</th>
                  <td style="width:200px;">
                    <span class="label label-primary" ng-show="dataDocuments.status == 1">Diterima</span>
                    <span class="label label-danger" ng-show="dataDocuments.status == 0">Ditolak</span>
                    <span class="label label-warning" ng-show="dataDocuments.status == null">Transaksi Belum dilakukan</span>
                  </td>
                  <td>
                    <a href="i2c-trailer-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a> 
                    <button type="button" ng-show="data.status == 0 || data.status == null" class="btn btn-primary btn-xs" ng-click="updateStatus(data.id,1);" title="Diterima">
                      <i class="fa fa-power-off"></i>
                    </button>
                    <button type="button" ng-show="data.status == 1 || data.status == null" class="btn btn-danger btn-xs" ng-click="updateStatus(data.id,0);" title="Proposal Ditolak">
                      <i class="fa fa-power-off"></i>
                    </button>
                    <button confirmed-click="destroy()" ng-confirm-click="Apakah anda yakin menghapus ini?" id="btn-destroy" id-team="{{ data.id }}" type="button" class="btn btn-xs bg-orange"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table><!-- /.table -->
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div><!-- /.row -->

  <!-- Remove modal -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>