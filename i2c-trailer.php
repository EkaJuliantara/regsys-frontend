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
                <span class="label label-primary"><b>{{ dataTeam.length }}</b>  Participants</span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table datatable="ng" dt-options="dtOptions" class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Tim</th>
                  <th>Email</th>
                  <th style="width:150px;">No. Telp</th>
                  <th style="width:150px;">Status</th>
                  <th>Tgl Daftar</th>
                  <th style="width:120px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in dataTeam">
                  <td>{{ data.name }}</th>
                  <td>{{ data.email }}</th>
                  <td>{{ data.phone }}</th>
                  <td>
                    <span class="label label-{{ data.colorStatus }}">{{ data.statusIndex }} </span>
                  </td>
                  <td>{{ data.created_at }}</td>
                  <td>
                    <a href="i2c-trailer-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a> 


                    <button title="Status : Diterima" ng-show="data.detail[0].payment_id != null && data.detail[0].status != 1 && data.detail.length > 0" ng-click="updateStatus(1);" id="btn-update" type="button" id-team="{{ data.id }}" id-detail="{{ data.detail[0].id }}" class="btn btn-xs bg-olive"><i class="fa fa-power-off"></i></button>

                    <button title="Status : Ditolak" ng-show="data.detail[0].status != 0 && data.detail.length > 0" ng-click="updateStatus(0);" id="btn-update" type="button" id-team="{{ data.id }}" id-detail="{{ data.detail[0].id }}" class="btn btn-xs btn-danger"><i class="fa fa-power-off"></i></button>
       
  

                    <button confirmed-click="destroy();" ng-confirm-click="Apakah anda yakin menghapus ini?" id="btn-destroy" id-team="{{ data.id }}" type="button" class="btn btn-xs bg-orange"><i class="fa fa-trash"></i></button>
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