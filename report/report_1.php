<?php
//require_once(VAR_BASE_DIR.DS."controller".DS."*.php");
?>
<div class="content-wrapper mx-auto">
    <!-- Content Header (Page header) -->
    <!-- section class="content-header">
      <h1>
        Page Header
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section -->

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- content -->
      <section class="content">
        <!-- content row -->
        <div class="row">
            <!-- box -->
            <div class="box box-solid"><!-- class="collapsed-box" -->
                <!-- box-header -->
                <div class="box-header bg-success">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">Report 1</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <!-- button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button -->
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- box-body -->
                <div class="box-body bg-warning">
                    <!-- row body -->
                    <div class="row m-0 no-margin">
                        
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
<!-- div form row -->
<!-- text-center -->
<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
	<!-- top -->
	<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
		<!-- sec start -->
		<div class="col-sm-12 col-md-12">
			<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
				<!-- temp start -->
				<!-- temp end -->
			</div>
			<div class="row col-sm-12 col-md-12 form-group m-0 no-margin container">
				<!-- temp start -->
				<form method="POST" action="<?php echo VAR_BASE_URL."/controller/report_1Controller.php";?>" enctype="multipart/form-data" autocomplete="off" target="_blank">
					<!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
                        <!-- input -->
                        <div class="col-sm-12 col-md-6 form-group no-padding">
                            <div class="form-group">
                                <label for="sys_date_from" class="col-sm-12 control-label">Date From</label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" name="sys_date_from" id="sys_date_from" class="form-control datepicker" placeholder="Date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-clear-btn="true" data-date-today-btn="true" data-date-today-highlight="true" data-date-start-date="" data-date-end-date="" value=""/>
                                </div>
                            </div>
                        </div>
                        <!-- /.input -->
                        <!-- input -->
                        <div class="col-sm-12 col-md-6 form-group no-padding">
                            <div class="form-group">
                                <label for="sys_date_to" class="col-sm-12 control-label">Date To</label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" name="sys_date_to" id="sys_date_to" class="form-control datepicker" placeholder="Date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-date-clear-btn="true" data-date-today-btn="true" data-date-today-highlight="true" data-date-start-date="" data-date-end-date="" value=""/>
                                </div>
                            </div>
                        </div>
                        <!-- /.input -->
					</div>
					<!-- /.form-control div -->
                    <!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-6 form-group">
                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
					</div>
					<!-- /.form-control div -->
					<!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
					</div>
					<!-- /.form-control div -->
				</form>
				<!-- temp end -->
			</div>
		</div>  
		<!-- sec end -->
	</div>
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
<!-- Modal HTML embedded directly into document -->
<div id="template_1" name="template_1" class="modal no-padding">
</div>
<script>
$(function($){
    $('.datepicker').datepicker(
        {
            dateFormat: 'yy-mm-dd'
        }
    );
});
</script>