<?php require_once('header.php'); ?>

<?php
  $idTeam = $_GET['id'];
?>
<!-- Content Wrapper. Contains page content -->
<div ng-app="i2cApp" ng-init="idTeam=<?= $idTeam ?>" class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      I2C
      <small>Trailer</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">I2C</li>
      <li class="active"><a href="/regsys-frontend/i2c-trailer.php">Trailer</a></li>
      <li class="active">View Participant</li>
    </ol>
  </section>

  <!-- Main content -->
  <section ng-controller="getCtrl" class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">View Participant</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="form-header">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th width="250px">Nama Tim</th>
                            <td>{{ dataTeam.name }}</td>
                          </tr>
                          <tr>
                            <th width="250px">Email</th>
                            <td>{{ dataTeam.email }}</td>
                          </tr>
                          <tr>
                            <th width="250px">No. Telp</th>
                            <td>{{ dataTeam.phone }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
              <div class="form-body">
                <div class="col-sm-8">
                <h3>Detail</h3>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Proposal</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="data in dataDocuments">
                        <td><a href="http://api.ifest-uajy.com/storage/media/{{ data.document_name }}" target="_blank">Lihat</a></td>
                        <td>
                          <span ng-if="data.payment_id != null">
                            <a href="http://api.ifest-uajy.com/storage/media/{{ data.payment_name }}" target="_blank">
                              <button class="btn btn-primary btn-xs">Lihat</button>
                            </a>
                          </span>
                          <span ng-show="data.payment_id == null" class="label label-warning">Tidak ada</span>
                        </td>
                        <td width="150px">
                          <span ng-show="data.status == 1">Diterima</span>
                          <span ng-show="data.status == 0">Ditolak</span>
                          <span ng-show="data.status == null">Menunggu verifikasi...</span>
                        </td>
                        <td>
                          <button type="button" ng-show="data.status == 0 || data.status == null" class="btn btn-primary btn-xs" ng-click="updateStatus(data.id,1);" title="Diterima">
                            <i class="fa fa-power-off"></i>
                          </button>
                          <button type="button" ng-show="data.status == 1 || data.status == null" class="btn btn-danger btn-xs" ng-click="updateStatus(data.id,0);" title="Ditolak">
                            <i class="fa fa-power-off"></i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-body">
                <div class="col-sm-8">
                  <h3>Anggota tim</h3>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Kartu Identitas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="data in dataMembers">
                        <td>{{ data.full_name }}</td>
                        <td width="150px" style="text-align: center;"><a href="http://api.ifest-uajy.com/storage/media/{{ data.media_name }}" target="_blank"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div><!-- /.col-md-12 -->
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
            <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Remove</button>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>