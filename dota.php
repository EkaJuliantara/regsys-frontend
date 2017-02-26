<?php require_once('header.php'); ?>

<div class="content-wrapper">
				<section class="content-header">
								<h1> Dota 2 Competition</h1>
								<ol class="breadcrumb">
												<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
												<li class="active">Dota 2 Competition</li>
								</ol>
				</section>

				<section class="content">
								
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
									                  <th>Email</th>
									                  <th>Team Name</th>
									                  <th>Date/Time Register</th>
									                  <th>Status</th>
									                  <th>Membership File</th>
									                  <th>Action</th>
									                </tr>
									              </thead>
									              <tbody>
									                <tr>
									                  <td>ottobimahp.9F28@yahoo.com</td>
									                  <td>Knight</td>
									                  <td class="sorting_1">2016-04-18 04:43:21</td>
									                  <td>
									                    <span class="label label-success">Active</span>
									                  </td>
									                  <td>
									                      <span class="label label-default">File not found</span>
									                  </td>
									                  <td class="action">
									                    <a href="dota-view.php" class="btn btn-info btn-xs" title="View Detail"><i class="fa fa-eye"></i></a>
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
																</div>
												</div>
								</div>

				</section>
</div>

<?php require_once('footer.php'); ?>