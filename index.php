<?php
  ob_start();
  session_start();
  if ($_SESSION['hackfest']['id']) {
?>

<?php require_once('header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>See how the number of participants at each event.</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-solid box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Hackathon IFEST</h3>
            <div class="box-tools pull-right">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Participants</span>
                    <span class="info-box-number">93,139</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <a class="btn btn-primary" href="upc.html" role="button"><i class="fa fa-eye"></i> View Detail</a>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col-md-6 -->
      <div class="col-md-6">
        <div class="box box-solid box-info">
          <div class="box-header with-border">
            <h3 class="box-title">DOTA 2 Competition</h3>
            <div class="box-tools pull-right">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Participants</span>
                    <span class="info-box-number">93,139</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <a class="btn btn-primary" href="upc.html" role="button"><i class="fa fa-eye"></i> View Detail</a>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col-md-6 -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <div class="box box-solid box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Information Informatics Contest</h3>
            <div class="box-tools pull-right">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <p class="subtitle">XXXXXXXX <a href="#" class="pull-right"><i class="fa fa-eye"></i> View Detail</a></p>
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Participants</span>
                    <span class="info-box-number">93,139</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <p class="subtitle">Trailer <a href="#" class="pull-right"><i class="fa fa-eye"></i> View Detail</a></p>
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Participants</span>
                    <span class="info-box-number">93,139</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col-md-6 -->
      <div class="col-md-6">
        <div class="box box-solid box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Seminar Nasional</h3>
            <div class="box-tools pull-right">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icon to color it -->
                  <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Participants</span>
                    <span class="info-box-number">93,139</span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <a class="btn btn-primary" href="upc.html" role="button"><i class="fa fa-eye"></i> View Detail</a>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col-md-6 -->
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('footer.php'); ?>

<?php
  }else{
    header("location: login.php");
  }
?>