<?php
require_once(VAR_BASE_DIR.DS."controller".DS."deviceAddController.php");
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
            <div class="box box-solid">
                <!-- box-header -->
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">Device Add</h3>
                  <div class="box-tools pull-right">
                    <!-- button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
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
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_ADD; ?>" enctype="multipart/form-data" autocomplete="off">
    <!-- form-control div -->
    <div class="form-group">
    <!-- form-group section -->
    <div class="">
    <!-- -->
        <!-- device id -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="device_id" class="col-sm-12 control-label">Device ID</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="device_id" id="device_id" class="form-control" placeholder="Device ID" value="<?php echo $device->__get("device_id"); ?>" autofocus required/>
                </div>
            </div>
        </div>
        <!-- description -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="description" class="col-sm-12 control-label">Description</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="<?php echo $device->__get("description"); ?>" />
                </div>
            </div>
        </div>
        <!-- submit -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <div class="col-sm-12 col-md-6">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
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
}
</script>

<script>
$(function () {
    init_Page();
});
</script>