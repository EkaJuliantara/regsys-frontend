<?php
  ob_start();
  session_start();
  // if ($_SESSION['dota']['id']) {
?>

<?php require_once('header.php'); ?>

<div ng-app="dotaApp" class="content-wrapper">

  <section class="content-header">
    <h1>
      Dota Competition
      <small>IFEST</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Dota</li>
    </ol>
  </section>

  <section ng-controller="indexCtrl" class="content">
    
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Participants</h3>
            <div class="box-tools pull-right">
              <span class="label label-primary">
                <b>{{ dataIndex.length }}</b> Participants
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
                   <th>Tgl Daftar</th>
                   <th width="200px">Actions</th>
                 </tr> 
              </thead>
              <tbody>
                <tr ng-repeat="data in dataIndex">
                  <td>{{ data.name }}</td>
                  <td>{{ data.email }}</td>
                  <td>{{ data.phone }}</td>
                  <td>{{ data.status }}</td>
                  <td>{{ data.created_at }}</td>
                  <td>
                    <a href="dota-view.php?id={{ data.id }}" title="View Detail"><button type="button" class="btn btn-xs bg-olive"><i class="fa fa-eye"></i></button></a> 
                    
                    <button ng-click="updateStatus( data.id, 1)" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-ok"></i></button>

                    <button ng-click="updateStatus( data.id, 0)" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-ok"></i></button>

                    <button ng-click="destroy(data.id);" class="btn btn-xs bg-orange"><i class="fa fa-trash"></i></button>

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
  // }else{
  //   header("location: login.php");
  // }
?>