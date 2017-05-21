<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFEST Registration System | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-blue-light.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/s/bs/jq-2.1.4,dt-1.10.10/datatables.min.css"/>
    <!-- Custom style -->
    <link rel="stylesheet" href="dist/css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>RS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>IFEST</b>RegSys</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">Panitia IFEST #5</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Panitia IFEST #5
                      <small>Administrator</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!--<div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Edit profile</a>
                    </div>-->
                    <div class="text-center">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menus</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            <li><a href="hackfest.php"><i class="fa fa-circle-o"></i> <span>HackFEST</span></a></li>
            <li class="treeview active">
              <a href="#"><i class="fa fa-circle-o"></i> <span>I2C</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="i2c-trailer.php">Trailer</a></li>
                <li><a href="i2c-ideaplikasi.php">Ide Aplikasi</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#" title="Informatics Information Contest"><i class="fa fa-circle-o"></i> <span>Seminar</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="seminar.php">All</a></li>
                <li><a href="seminar-checkin.php">Check-In (Already paid)</a></li>
                <li><a href="seminar-checkout.php">Check-Out (Already check-in)</a></li>
                <li><a href="seminar-vegetarians.php">Vegetarians</a></li>
                <li><a href="seminar-notpaid.php">Not yet paid</a></li>
                <li><a href="seminar-alreadycheckout.php">Already Check-Out</a></li>
              </ul>
            </li>
            <!-- <li><a href="upc.php" title="UAJY Programming Contest"><i class="fa fa-circle-o"></i> <span>Seminar Nasional</span></a></li> -->
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
