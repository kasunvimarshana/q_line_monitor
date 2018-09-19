<?php
require_once(VAR_BASE_DIR.DS."controller".DS."sys_userEditController.php");
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
            <div class="box box-solid">
                <!-- box-header -->
                <div class="box-header">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">System User Edit</h3>
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
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_SYSUSER_EDIT; ?>" enctype="multipart/form-data" autocomplete="off">
    <!-- form-control div -->
    <div class="form-group">
    <!-- form-group section -->
    <div class="">
    <!-- -->
        <!-- id -->
        <input type="hidden" name="id" id="id" value="<?php echo $sys_user->__get("id"); ?>" required/>
        <!-- code -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="code" class="col-sm-12 control-label">Code</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="code" id="code" class="form-control" placeholder="Code" value="<?php echo $sys_user->__get("code"); ?>" autofocus/>
                </div>
            </div>
        </div>
        <!-- name -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="name" class="col-sm-12 control-label">Name</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo $sys_user->__get("name"); ?>" required/>
                </div>
            </div>
        </div>
        <!-- nic -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="nic" class="col-sm-12 control-label">Nic</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="nic" id="nic" class="form-control" placeholder="NIC" value="<?php echo $sys_user->__get("nic"); ?>"/>
                </div>
            </div>
        </div>
        <!-- address -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="address" class="col-sm-12 control-label">Address</label>
                <div class="col-sm-12 col-md-12">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo $sys_user->__get("address"); ?>"/>
                </div>
            </div>
        </div>
        <!-- contact number -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="phone_1" class="col-sm-12 control-label">Contact Number</label>
                <div class="col-sm-12 col-md-6">
                    <input type="tel" name="phone_1" id="phone_1" class="form-control" placeholder="Contact Number" value="<?php echo $sys_user->__get("phone_1"); ?>"/>
                </div>
            </div>
        </div>
        <!-- image -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="image" class="col-sm-12 control-label">Image</label>
                <div class="col-sm-12 col-md-3">
                    <input type="file" name="image" id="image" class="form-control" placeholder="Image" value="<?php //echo $sys_user->__get("image"); ?>"/>
                </div>
            </div>
        </div>
        <!-- image delete -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <!-- label for="imageDelete" class="col-sm-12 control-label">Delete Image</label -->
                <div class="col-sm-12 col-md-3 checkbox icheck">
                    <label>
                        <input type="checkbox" name="imageDelete" id="imageDelete" value="imageDelete" <?php echo ($commonObjectClass->__get("imageDelete") != null)?"checked":null; ?>/>
                        Delete Image
                    </label>
                </div>
            </div>
        </div>
        <!-- user name -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="user_name" class="col-sm-12 control-label">User Name</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="<?php echo $sys_user->__get("user_name"); ?>" required/>
                </div>
            </div>
        </div>
        <!-- user password -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="user_password" class="col-sm-12 control-label">User Password</label>
                <div class="col-sm-12 col-md-6">
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="User Password" value="<?php echo $sys_user->__get("user_password"); ?>" required/>
                </div>
            </div>
        </div>
        <!-- system date -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="sys_date" class="col-sm-12 control-label">Date</label>
                <div class="col-sm-12 col-md-6">
                    <input type="text" name="sys_date" id="sys_date" class="form-control datepicker" placeholder="Date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-clear-btn="true" data-date-today-btn="true" data-date-today-highlight="true" data-date-start-date="" data-date-end-date="" value="<?php echo $sys_user->__get("sys_date"); ?>"/>
                </div>
            </div>
        </div>
        <!-- description -->
        <div class="col-sm-12 form-group">
            <div class="form-group">
                <label for="description" class="col-sm-12 control-label">Description</label>
                <div class="col-sm-12 col-md-6">
                    <textarea name="description" id="description" class="form-control" rows="10" cols="80"><?php echo $sys_user->__get("description"); ?></textarea>
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
    // Replace the <input class="datepicker"> with a datepicker
    $('.datepicker').datepicker(
        {
            format: 'yyyy-mm-dd'
        }
    );
    // Replace the <textarea id="description"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description');
    // Replace the <checkbox>,<radio> with a iCheck
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_minimal-red',
      increaseArea: '20%' // optional
    });
}
</script>

<script>
$(function () {
    init_Page();
});
</script>