<?php require_once('header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Hackathon IFEST
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">HackFest</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Participants</h3>
            <div class="box-tools pull-right">
              <span class="label label-primary"><b>3</b> Participants</span>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="peserta" class="table table-striped">
              <thead>
                <tr>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>College</th>
                  <th>Team Name</th>
                  <th>Date/Time Register</th>
                  <th>Status</th>
                  <th>Membership File</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>085792658145</td>
                  <td>ottobimahp.9F28@yahoo.com</td>
                  <td>Universitas Atma Jaya Yogyakarta</td>
                  <td>Knight</td>
                  <td class="sorting_1">2016-04-18 04:43:21</td>
                  <td>
                    <span class="label label-success">Active</span>
                  </td>
                  <td>
                      <span class="label label-default">File not found</span>
                  </td>
                  <td class="action">
                    <a href="hackfest-view.php" class="btn btn-info btn-xs" title="View Detail"><i class="fa fa-eye"></i></a>
                    <!--<a href="#" class="btn btn-success btn-xs" title="Make status becomes active">Active</a>-->
                    <a href="#" class="btn btn-warning btn-xs" title="Make status becomes non-active">Non-active</a>
                    <a href="#" class="btn btn-success btn-xs" title="Membership file has been valid">Valid</a>
                    <!--<a href="#" class="btn btn-warning btn-xs" title="Membership file has been non-valid">Nonvalid</a>-->
                    <a href="#" class="btn btn-danger btn-xs" title="Remove" data-toggle="modal" data-target=".bs-remove-modal-sm"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table><!-- /.table -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
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