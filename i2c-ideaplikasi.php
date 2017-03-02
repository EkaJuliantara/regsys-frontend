<?php require_once('header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div ng-app="i2cApp" ng-init="category=1" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      I2C
      <small>Ide Aplikasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">I2C</li>
      <li class="active">Ide Aplikasi</li>
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
                  <th>Asal Sekolah</th>
                  <th>No. Telp</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in dataTeam">
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.origin }}</td>
                  <td style="width:150px;">{{ data.phone }}</td>
                  <td style="width:150px;">
                    <span class="label label-{{ data.colorStatus }}">{{ data.statusIndex }}</span>
                  </td>
                  <td>
                    <a href="i2c-ideaplikasi-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a> 

                    <button title="Remove" confirmed-click="destroy(data.id)" ng-confirm-click="Apakah anda yakin menghapus ini?" id="btn-destroy" id-team="{{ data.id }}" type="button" class="btn btn-xs bg-orange"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade bs-remove-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Warning!</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure to remove this item?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-reply"></i> Cancel</button>
            <button ng-click="destroy()" type="button" class="btn btn-danger"><i class="fa fa-times"></i> Remove</button>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>