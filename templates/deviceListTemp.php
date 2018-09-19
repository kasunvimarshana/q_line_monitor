<?php
require_once(VAR_BASE_DIR.DS."controller".DS."deviceListController.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configuration
        <small>Device</small>
      </h1>
      <!-- ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- content -->
      <section class="content">
        <!-- content row -->
        <div class="row">
            <!-- box -->
            <div class="box box-solid collapsed-box">
                <!-- box-header -->
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">Device List</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <!-- button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button -->
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- box-body -->
                <div class="box-body">
                    <!-- row body -->
                    <div class="row">
                        
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
<!-- div form row -->
<div class="row"><!-- text-center -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_LIST; ?>" enctype="multipart/form-data" autocomplete="off">
    <!-- form-control div -->
    <div class="form-group">
    <!-- form-group section -->
    <div class="">
    <!-- -->
        <!-- device id -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="device_id" class="col-sm-12 control-label">Device ID</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="device_id" id="device_id" class="form-control" placeholder="Device ID" value="<?php echo $device->__get("device_id"); ?>" autofocus/>
                </div>
            </div>
        </div>
        <!-- ip -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="ip" class="col-sm-12 control-label">IP</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="ip" id="ip" class="form-control" placeholder="IP" value="<?php echo $device->__get("ip"); ?>"/>
                </div>
            </div>
        </div>
        <!-- description -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="description" class="col-sm-12 control-label">Description</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="<?php echo $device->__get("description"); ?>"/>
                </div>
            </div>
        </div>
        <!-- submit -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <div class="col-sm-12 col-md-6">
                    <button type="submit" name="search" value="search" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>   
    <!-- -->    
    </div>
    <!-- /.form-group section -->
    </div>
    <!-- /.form-control div -->
</form>
</div>
<!-- /.div form row -->
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
                        
                    </div>
                    <!-- /.row body -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.content row -->
        <!-- content row -->
        <div class="row">
            <!-- box -->
            <div class="box box-solid">
                <!-- box-header -->
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">List</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <!-- button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button -->
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- box-body -->
                <div class="box-body">
                    <!-- row body -->
                    <div class="">
                        
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
<!-- div form row -->
<div class="table-responsive no-padding" style="overflow-x:auto;"><!-- text-center -->
<!-- -->
<table id="objList" class="table table-bordered table-striped" cellspacing="0">
    <thead>
        <tr>
          <th> ID </th>
          <th> DEVICE ID </th>
          <th> IP </th>
          <th> DESCRIPTION </th>
          <th> VIEW </th>
          <th> EDIT </th>
          <th> DELETE </th>
        </tr>
    </thead>
    <tbody>
       <?php foreach($devices as $temp):?>
        <tr>
          <td><?php echo $temp->__get("id");?></td>
          <td><?php echo $temp->__get("device_id");?></td>
          <td><?php echo $temp->__get("ip");?></td>
          <td><?php echo $temp->__get("description");?></td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_VIEW."&id=".$temp->__get("id"); ?>" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
              </div>
          </td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_EDIT."&id=".$temp->__get("id"); ?>" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
              </div>
          </td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_LIST."&delete=".$temp->__get("id"); ?>" onclick="if(!confirm('Are You Sure?')){ return false;}" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
              </div>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <tfoot>
        <tr>
          <th> ID </th>
          <th> DEVICE ID </th>
          <th> IP </th>
          <th> DESCRIPTION </th>
          <th> VIEW </th>
          <th> EDIT </th>
          <th> DELETE </th>
        </tr>
    </tfoot>
</table>
<!-- -->
</div>
<!-- /.div form row -->
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
                        
                    </div>
                    <!-- /.row body -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.content row -->
      </section>
      <!-- /.content -->
    </section>
    <!-- /.Main content -->
 </div>

<!-- page script -->
<script>
function init_Page(){
    //var data1 = $( ".datepicker" ).data( "date-format" );
    // Replace the <select class="select2"> with a select2
    $('.select2').select2();
    // Replace the <table> with a DataTable
    $('table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
}
</script>

<script>
$(function () {
    init_Page();
});
</script>