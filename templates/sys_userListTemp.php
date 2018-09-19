<?php
require_once(VAR_BASE_DIR.DS."controller".DS."sys_userListController.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configuration
        <small>System User</small>
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
                  <h3 class="box-title">System User List</h3>
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
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_SYSUSER_LIST; ?>" enctype="multipart/form-data" autocomplete="off">
    <!-- form-control div -->
    <div class="form-group">
    <!-- form-group section -->
    <div class="">
    <!-- -->
        <!-- code -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="code" class="col-sm-12 control-label">Code</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="code" id="code" class="form-control" placeholder="Code" value="<?php echo $sys_user->__get("code"); ?>" autofocus/>
                </div>
            </div>
        </div>
        <!-- name -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Name</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $sys_user->__get("name"); ?>"/>
                </div>
            </div>
        </div>
        <!-- nic -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="nic" class="col-sm-12 control-label">Nic</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC" value="<?php echo $sys_user->__get("nic"); ?>"/>
                </div>
            </div>
        </div>
        <!-- contact number -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="phone_1" class="col-sm-12 control-label">Contact Number</label>
                <div class="col-sm-12 col-md-12">
                    <input type="tel" name="phone_1" id="phone_1" class="form-control" placeholder="Contact Number" value="<?php echo $sys_user->__get("phone_1"); ?>"/>
                </div>
            </div>
        </div>
        <!-- system date -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="sysDateFrom" class="col-sm-12 control-label">From</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="sysDateFrom" id="sysDateFrom" class="form-control datepicker" placeholder="Date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-clear-btn="true" data-date-today-btn="true" data-date-today-highlight="true" data-date-start-date="" data-date-end-date="" value="<?php echo $commonObjectClass->__get("sysDateFrom"); ?>"/>
                </div>
            </div>
        </div>
        <!-- system date -->
        <div class="col-sm-12 col-md-6 form-group">
            <div class="form-group">
                <label for="sysDateTo" class="col-sm-12 control-label">To</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="sysDateTo" id="sysDateTo" class="form-control datepicker" placeholder="Date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-clear-btn="true" data-date-today-btn="true" data-date-today-highlight="true" data-date-start-date="" data-date-end-date="" value="<?php echo $commonObjectClass->__get("sysDateTo"); ?>"/>
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
          <th> CODE </th>
          <th> NAME </th>
          <th> NIC </th>
          <th> PHONE </th>
          <th> VIEW </th>
          <th> EDIT </th>
          <th> DELETE </th>
        </tr>
    </thead>
    <tbody>
       <?php foreach($sys_users as $temp):?>
        <tr>
          <td><?php echo $temp->__get("code");?></td>
          <td><?php echo $temp->__get("name");?></td>
          <td><?php echo $temp->__get("nic");?></td>
          <td><?php echo $temp->__get("phone_1");?></td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_SYSUSER_VIEW."&id=".$temp->__get("id"); ?>" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>
              </div>
          </td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_SYSUSER_EDIT."&id=".$temp->__get("id"); ?>" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
              </div>
          </td>
          <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_SYSUSER_LIST."&delete=".$temp->__get("id"); ?>" onclick="if(!confirm('Are You Sure?')){ return false;}" class="btn btn-block btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
              </div>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <tfoot>
        <tr>
          <th> CODE </th>
          <th> NAME </th>
          <th> NIC </th>
          <th> PHONE </th>
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
    // Replace the <input class="datepicker"> with a datepicker
    $('.datepicker').datepicker(
        {
            format: 'yyyy-mm-dd'
        }
    );
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