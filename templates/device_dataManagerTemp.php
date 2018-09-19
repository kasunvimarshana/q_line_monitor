<?php
require_once(VAR_BASE_DIR.DS."controller".DS."device_dataManagerController.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Device Data
        <small>Manager</small>
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
            <div class="box box-solid">
                <!-- box-header -->
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">Device Data</h3>
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
                    <div class="row">
                        
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
<!-- col -->
<div class="col-lg-6 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?php echo number_format($commonObjectClass->__get("device_dataCount")); ?></h3>
      <p>Device Data</p>
    </div>
    <div class="icon">
      <i class="fa fa-user-secret"></i>
    </div>
    <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_2_2; ?>" class="small-box-footer">
      View <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- ./col -->
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