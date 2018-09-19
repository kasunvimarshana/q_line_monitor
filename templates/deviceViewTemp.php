<?php
require_once(VAR_BASE_DIR.DS."controller".DS."deviceViewController.php");
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
                  <h3 class="box-title">View</h3>
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
<div class="no-padding" style="overflow-x:auto;"><!-- text-center -->
<!-- -->
    <div class="post">
        <!-- div class="" -->
            <div class="">
                <!-- left -->
                <!-- div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="img-responsive" src="" alt=""/>
                        </div>
                    </div>
                </div -->
                <!-- right -->
                <div class="col-md-9">
                    <!-- + -->
                      <!-- nav-tabs-custom -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">+</a></li>
                        </ul>
                        <!-- tab-content -->
                        <div class="tab-content">
                          <!-- tab-pane 1 -->
                          <div class="tab-pane active" id="tab_1">
                              <d1 class="dl-horizontal">
                                  <dt>Id : </dt>
                                  <dd><?php echo $device->__get("id"); ?></dd>
                                  <dt>Device ID : </dt>
                                  <dd><?php echo $device->__get("device_id"); ?></dd>
                                  <dt>IP : </dt>
                                  <dd><?php echo $device->__get("ip"); ?></dd>
                                  <dt>Description : </dt>
                                  <dd><?php echo $device->__get("description"); ?></dd>
                              </d1>
                          </div>
                          <!-- /.tab-pane 1 -->
                        </div>
                        <!-- /.tab-content -->
                      </div>
                      <!-- /.nav-tabs-custom -->
                    <!-- + -->
                </div>
            </div>
        <!-- /div -->
    </div>
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
    
}
</script>

<script>
$(function () {
    init_Page();
});
</script>