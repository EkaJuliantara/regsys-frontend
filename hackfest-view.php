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
      <li class="active"><a href="#">HackFest</a></li>
      <li class="active">View Participant</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid box-success">
          <div class="box-header with-border">
            <h3 class="box-title">View Participant</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <tr>
                <th style="width: 15%;">Status</th>
                <td><span class="label label-success">Active</span></td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>085792658145</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>ottobimahp.9F28@yahoo.com</td>
              </tr>
              <tr>
                <th>College</th>
                <td>SMK Negeri 1 Denpasar</td>
              </tr>
              <tr>
                <th>Date/Time Register</th>
                <td>2016-04-18 04:43:21</td>
              </tr>
              <tr>
                <th>Team Name</th>
                <td>Knight</td>
              </tr>
              <tr>
                <th>Membership File</th>
                <td><span class="label label-default">File not found</span></td>
              </tr>
              <!--<tr>
                <th></th>
                <td>
                  <div class="btn-action">
                    <a class="btn btn-danger" href="#" role="button" data-toggle="modal" data-target=".bs-remove-modal-sm"><i class="fa fa-times"></i> Remove</a>
                    <a class="btn btn-warning" href="upc.html" role="button"><i class="fa fa-reply"></i> Cancel</a>
                  </div>
                </td>
              </tr>-->
            </table><!-- /.table -->
            <h3 class="title">Member</h3>
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>NPM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Telpon/HP</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td>140707863</td>
                  <td>Christian Angel Eman</td>
                  <td>082396720321</td>
                </tr>
                <tr>
                  <td>140707860</td>
                  <td>Robertus Tri Uji. P. Atmaja</td>
                  <td>085647923825</td>
                </tr>
                <tr>
                  <td>140707923</td>
                  <td>Pieter Madyo Atmojo</td>
                  <td>085338829797</td>
                </tr>
              </tbody>
            </table>
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