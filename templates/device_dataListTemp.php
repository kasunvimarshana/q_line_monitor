<?php
require_once(VAR_BASE_DIR.DS."controller".DS."device_dataListController.php");
?>
<div class="content-wrapper mx-auto">
    <!-- Content Header (Page header) -->
    <!-- section class="content-header">
      <h1>
        Device Data
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
                  <h3 class="box-title">Summary</h3>
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
				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_DATA_LIST; ?>" enctype="multipart/form-data" autocomplete="off">
					<!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
						<!-- date -->
						<div class="col-sm-12 col-md-3 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Date </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="var_date">0</span>
									</h3>
								</div>
							</div>
						</div>
						<!-- time -->
						<div class="col-sm-12 col-md-3 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Time </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="var_time">0</span>
									</h3>
								</div>
							</div>
						</div>
						<!-- line -->
						<div class="col-sm-12 col-md-3 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Line </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="var_line"><?php echo $com_var_line->__get("code"); ?></span>
									</h3>
								</div>
							</div>
						</div>
						<!-- device -->
						<div class="col-sm-12 col-md-3 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Device </h3>	
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<button id="device_button" name="device_button" type="button" class="btn btn-warning btn-block no-padding">
										<h3 class="no-margin">
											<span id="var_device"><?php echo $com_device->__get("id"); ?></span>
										</h3>
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /.form-control div -->
					<!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
						<!-- total scan -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin text-primary"> Total Scan </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin text-primary">
										<span id="total_scan">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- quality pass -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin text-success"> Quality Pass </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin text-success">
										<span id="quality_pass">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- quality fail -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin text-danger"> Quality Fail </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin text-danger">
										<span id="quality_fail">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- line efficiency -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin text-primary"> Line Efficiency </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin text-primary">
										<span id="line_efficiency">0</span>
										<span> &#37; </span>
									</h1>
								</div>
							</div>
						</div>
					</div>
					<!-- /.form-control div -->
					<!-- form-control div -->
					<div class="row col-sm-12 col-md-12">
						<!-- Defect Type -->
						<div class="col-sm-12 col-md-4 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Sewing Defect </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="sewing_defect">0</span>
									</h3>
								</div>
							</div>
						</div>
						<!-- Defect Type -->
						<div class="col-sm-12 col-md-4 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Material Defect </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="material_defect">0</span>
									</h3>
								</div>
							</div>
						</div>
						<!-- Defect Type -->
						<div class="col-sm-12 col-md-4 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Construction Defect </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="construction_defect">0</span>
									</h3>
								</div>
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
        <!-- content row -->
        <div class="row">
            <!-- box -->
            <div class="box box-solid collapsed-box">
                <!-- box-header -->
                <div class="box-header bg-danger">
                  <i class="fa fa-globe"></i>
                  <h3 class="box-title">Data</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <!-- button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button -->
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- box-body -->
                <div class="box-body bg-warning m-0 no-margin no-padding">
                    <!-- row body -->
                    <div class="row col-sm-12 col-md-12 form-group m-0 no-margin no-padding">
                        
                        <!--------------------------
                        | Your Page Content Here |
                        -------------------------->
                        <!-- tab pane -->
                        <div class="row col-sm-12 col-md-12 form-group m-0 no-margin nav-tabs-custom">
							<!-- nav-tabs start -->
							<ul class="nav nav-tabs pull-right">
							  <li class="pull-left header"><i class="fa fa-th"></i> Select </li>
							  <li><a href="#tab_1_2" data-toggle="tab"> Defect Data </a></li>
							  <li class="active"><a href="#tab_1_1" data-toggle="tab"> Scan Data </a></li>
							</ul>
							<!-- nav-tabs end -->
                            <!-- tab-content start -->
                            <div class="row col-sm-12 col-md-12 form-group m-0 no-margin tab-content">
								<!-- tab-content (1) -->
								<div class="row col-sm-12 col-md-12 form-group m-0 no-margin tab-pane active" id="tab_1_1" name="tab_1_1">

									<!--------------------------
									| tab-content (1) Here |
									-------------------------->
									<!-- top -->
									<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
										<!-- sec start -->
										<div class="col-sm-12 col-md-12">
											<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
												<!-- temp start -->
												<form method="POST" id="form_01_m" name="form_01_m" action="<?php echo VAR_BASE_URL."/controller/device_data_scanAddController.php";?>" enctype="multipart/form-data" autocomplete="off">
													<!-- form-control div -->
													<div class="row col-sm-12 col-md-6">
														<!-- code -->
														<div class="col-sm-9 col-md-9 form-group">
															<div class="form-group">
																<!-- label for="code" class="col-sm-12 control-label">Code</label -->
																<div class="col-sm-12 col-md-12">
																	<input type="number" name="code" id="code" class="form-control" placeholder="Code" autocomplete="off" required="required" autofocus/>
																</div>
															</div>
														</div>
														<!-- submit -->
														<div class="col-sm-3 form-group">
															<div class="form-group">
																<div class="col-sm-12 col-md-12">
																	<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
																</div>
															</div>
														</div> 
													</div>
													<!-- /.form-control div -->
												</form>
												<!-- temp end -->
											</div>
											<!-- div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
												<div class="col-sm-6 col-md-6 form-group no-padding">
													<div class="form-group text-left">
														<h3 class="m-0 no-margin">
															<label for="device_data_scan" class="label control-label label-danger pull-left display-1">
															<strong class=""> Total Scan : </strong>
															<span id="device_data_scan" class="badge badge-pill badge-success">0</span>
															</label>
														</h3>
													</div>
												</div>
											</div -->
										</div>  
										<!-- sec end -->
									</div>
									<!-- bottom -->
									<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
										<!-- div form row -->
										<div class="table-responsive no-padding m-0 no-margin" style="overflow-x:auto;"><!-- text-center -->
										<!-- -->
										<table id="objList2" name="objList2" class="table table-bordered table-hover table-condensed dt-responsive nowrap m-0 no-margin" cellspacing="0" style="width:100%">
											<thead>
												<tr>
												  <th class="text-center"></th>
												  <th class="text-center"> CODE </th>
												  <th class="text-center"> QTY </th>
												  <th class="text-center"> DEFECT </th>
												  <th class="text-center"> DATE </th>
												  <th class="text-center"> TIME </th>
												  <th class="text-center"></th>
												  <th class="text-center"></th>
												</tr>
											</thead>
											<tbody> 
											</tbody>
											<tfoot>
												<tr>
												  <th class="text-center"></th>
												  <th class="text-center"> CODE </th>
												  <th class="text-center"> QTY </th>
												  <th class="text-center"> DEFECT </th>
												  <th class="text-center"> DATE </th>
												  <th class="text-center"> TIME </th>
												  <th class="text-center"></th>
												  <th class="text-center"></th>
												</tr>
											</tfoot>
										</table>
										<!-- -->
										</div>
										<!-- /.div form row -->
									</div>
									<!--------------------------
									| tab-content (1) Here |
									-------------------------->

								</div>
								<!-- /.tab-content (1) -->
								<!-- tab-content (2) -->
								<div class="row col-sm-12 col-md-12 form-group m-0 no-margin tab-pane" id="tab_1_2" name="tab_1_2">

									<!--------------------------
									| tab-content (2) Here |
									-------------------------->
									<!-- top -->
									<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
										<!-- sec start -->
										<div class="col-sm-12 col-md-12">
											<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
												<!-- temp start -->
												<!-- temp end -->

											</div>
										</div>  
										<!-- sec end -->
									</div>
									<!-- bottom -->
									<div class="row col-sm-12 col-md-12 form-group m-0 no-margin">
										<!-- div form row -->
										<div class="table-responsive no-padding m-0 no-margin" style="overflow-x:auto;"><!-- text-center -->
										<!-- -->
										<table id="objList1" name="objList1" class="table table-bordered table-hover table-condensed dt-responsive nowrap m-0 no-margin" cellspacing="0" style="width:100%">
											<thead>
												<tr>
												  <th class="text-center"></th>
												  <th class="text-center"> TAG CODE </th>
												  <th class="text-center"> BARCODE </th>
												  <th class="text-center"> DATE </th>
												  <th class="text-center"> TIME </th>
												  <th class="text-center"></th>
												  <th class="text-center"></th>
												</tr>
											</thead>
											<tbody> 
											</tbody>
											<tfoot>
												<tr>
												  <th class="text-center"></th>
												  <th class="text-center"> TAG CODE </th>
												  <th class="text-center"> BARCODE </th>
												  <th class="text-center"> DATE </th>
												  <th class="text-center"> TIME </th>
												  <th class="text-center"></th>
												  <th class="text-center"></th>
												</tr>
											</tfoot>
										</table>
										<!-- -->
										</div>
										<!-- /.div form row -->
									</div>
									<!--------------------------
									| tab-content (2) Here |
									-------------------------->

								</div>
								<!-- /.tab-content (2) -->
							</div>
                            <!-- tab-content end -->
                        </div>
						<!-- /.tab pane -->
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
(function($) {
	$.extend({
		open_modal1 : function( data ){
			$.ajax({
				url: "<?php echo VAR_BASE_URL;?>/templates/device_data_defectAddTemp.php",
				success: function( result, status, xhr ) {
				  //$(result).appendTo('body').modal();
				  var var_result = $( result );
				  var template_1_div = $( "#template_1" );
				  template_1_div.empty();
				  //var_result.find( "form" ).data("com_form_data", data);
				  var var_result_form = var_result.find( "form" );
				  var_result_form.data("com_form_data", data);
				  //var_result_form.attr("name","form");
				  template_1_div.append( var_result );
				  var temp = template_1_div.modal({
					  escapeClose: false,
					  clickClose: false,
					  showClose: false
				  });
				},
				error: function( xhr, status, error ) {
				  // Handle AJAX errors
				}
				// More AJAX customization goes here.
			});
		}
	});
})($);
</script>
<script>
(function($) {
	$.extend({
		open_modal2 : function( data ){
			$.ajax({
				url: "<?php echo VAR_BASE_URL;?>/templates/device_data_scanConfirmTemp.php",
				success: function( result, status, xhr ) {
				  //$(result).appendTo('body').modal();
				  var var_result = $( result );
				  var template_1_div = $( "#template_1" );
				  template_1_div.empty();
				  //var_result.find( "form" ).data("com_form_data", data);
				  var var_result_form = var_result.find( "form" );
				  var_result_form.data("com_form_data", data);
				  //var_result_form.attr("name","form");
				  template_1_div.append( var_result );
				  var temp = template_1_div.modal({
					  escapeClose: false,
					  clickClose: false,
					  showClose: false
				  });
				},
				error: function( xhr, status, error ) {
				  // Handle AJAX errors
				}
				// More AJAX customization goes here.
			});
		}
	});
})($);
</script>
<script>
/* Formatting function for row details - modify as you need */
(function($) {
	$.extend({
		f_format_dt : function( data ){
			// `data` is the original data object for the row
			return '<table class="table table-bordered table-hover m-0 no-margin" cellpadding="5" cellspacing="0" border="0" style="width:100%;padding-left:50px;">'+
				'<tr>'+
					'<td>Plant</td>'+
					'<td>'+data.var_plant_code+'</td>'+
				'</tr>'+
				'<tr>'+
					'<td>Line</td>'+
					'<td>'+data.var_line_code+'</td>'+
				'</tr>'+
			'</table>';
		}
	});
})($);
</script>
<script>
(function($) {
	$.extend({
		get_datetime : function( data ){
			// Assign handlers immediately after making the request,
			// and remember the jqXHR object for this request
			/*var jqxhr1 = $.ajax({
				method	: "GET",
				url		: "<?php echo VAR_BASE_URL."/controller/get_datetimeController.php";?>",
				data	: {},
				success	: function(data) {
					$("#var_date").text(data.var_date);
					$("#var_time").text(data.var_time);
				}
			});*/
			//jqxhr1.done(function() {});
			var var_date = moment().format("YYYY-MM-DD");
			var var_time = moment().format("h:mm:ss a");
			$("#var_date").text(var_date);
			$("#var_time").text(var_time);
		}
	});
})($);
</script>
<script>
(function($) {
	$.extend({
		get_data_1 : function( data ){
			// Assign handlers immediately after making the request,
			// and remember the jqXHR object for this request
			var jqxhr1 = $.ajax({
				method	: "GET",
				url		: "<?php echo VAR_BASE_URL."/controller/get_data_1Controller.php";?>",
				data	: {},
				success	: function(data) {
					var temp = data.data;
					var device_data_scan_count = Number(temp.device_data_scan_count);
					var device_data_scan_var_qty_sum = Number(temp.device_data_scan_var_qty_sum);
					var device_data_scan_var_qty_sum_4 = Number(temp.device_data_scan_var_qty_sum_4);
					var device_data_scan_var_qty_sum_5 = Number(temp.device_data_scan_var_qty_sum_5);
					var device_data_defect_count = Number(temp.device_data_defect_count);
					var defect_type_count_1 = Number(temp.defect_type_count_1);
					var defect_type_count_2 = Number(temp.defect_type_count_2);
					var defect_type_count_3 = Number(temp.defect_type_count_3);
					var line_efficiency = 0;
					if( (device_data_scan_count > 0) ){
						line_efficiency = ((device_data_scan_var_qty_sum_4 / device_data_scan_var_qty_sum) * 100);
						line_efficiency = line_efficiency.toFixed(2);
					}
					$("#total_scan").text(device_data_scan_count);
					$("#quality_pass").text(device_data_scan_var_qty_sum_4);
					$("#quality_fail").text(device_data_scan_var_qty_sum_5);
					$("#line_efficiency").text(line_efficiency);
					$("#sewing_defect").text(defect_type_count_1);
					$("#material_defect").text(defect_type_count_2);
					$("#construction_defect").text(defect_type_count_3);
				}
			});
			//jqxhr1.done(function() {});
		}
	});
})($);
</script>
<script>
$(function($) {
	// Replace the <table> with a DataTable
	/* table2 */
	var table2 = $("#objList2").DataTable({
	  'dom'         : 'Bfrtip',
	  'buttons'     : {
		  				'buttons' : [
							'pageLength',
							{
								name  : "listen",
								className  : "btn btn-default",
								visibility  : true,
								text  : "<span class='glyphicon glyphicon-eye-open'/>",
								titleAttr: 'listen',
								init: function(api, node, config) {
								   //$(node).removeClass('btn-default');
                                    var dt = this.table();
									var table_obj = $(dt.node());
									var timer = table_obj.data("ajax_reload_timer_id");
									var timer = parseInt(timer);
									if((dt.ajax_reload_timer().isEnable())){
										$(node).html("<span class='glyphicon glyphicon-eye-open'/>");
									}else{
										$(node).html("<span class='glyphicon glyphicon-eye-close'/>");
									}
								},
								action: function ( e, dt, node, config ) {
									//dt.buttons( 'btn01:name' ).disable();
									var table_obj = $(this.table().node());
									var timer = table_obj.data("ajax_reload_timer_id");
									var timer = parseInt(timer);
									if((dt.ajax_reload_timer().isEnable())){
										$(node).html("<span class='glyphicon glyphicon-eye-close'/>");
										dt.ajax_reload_timer().disable();
									}else{
										$(node).html("<span class='glyphicon glyphicon-eye-open'/>");
										dt.ajax_reload_timer().enable();
									}
								}
							},
							{
								name  : "refresh",
								className : "btn btn-default",
								visibility  : true,
								text  : "<span class='glyphicon glyphicon-refresh'/>",
								titleAttr: 'refresh',
								action: function ( e, dt, node, config ) {
									dt.ajax.reload();
								}
							}
						]
					  },	
      'columns'     : [
                        {
							//title         : "",
                            className     : "details-control",
                            orderable     : false,
                            data          : null,
                            defaultContent: ""
                        },
                        { 
                            data  : "device_data_scan_code",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_scan_var_qty",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_description_var_qty_sum",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_scan_sys_date",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
  						{ 
                            data  : "device_data_scan_sys_time",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "var_state",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
		  				{ 
                            data  : "var_state",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        }
                      ],
	  'responsive'  : true,
      'paging'      : true,
      'lengthChange': true,
	  'lengthMenu'  : [[5, 10, 25, 50, 100], [5, 10, 25, 50, "All"]],
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'processing'  : false,
      'serverSide'  : true,
      'jQueryUI'    : false,
      'ajax'        : {
                        "url"     : "<?php echo VAR_BASE_URL."/controller/get_device_data_scan_1Controller.php";?>",
                        "dataSrc" : "data",
                        "type"    : "GET",
                        "deferRender": true,
                        "data"    : function(data) {
                            //data.push( { "name": "first_variable", "value": "xxx" } );
							//data.from = $('#input1').val();
						},
	                    "error"   : function(e){
                            console.log("error");
                        }
                    },
	  'rowCallback' : function(row, data, displayNum, displayIndex, dataIndex) {
						//$('td:eq(1)', row).html( '<b>A</b>' );
					},
	   'createdRow' : function( row, data, dataIndex ) {
		   				var row1 = $(row);
		   				row1.addClass("text-center");
		   				var checkArray = $.makeArray([4, 5]);
						var var_state_id = parseInt(data.var_state);
						if ( ($.isNumeric(var_state_id)) && ($.inArray(var_state_id, checkArray) > -1) ) {
					  		$(row).removeClass("danger");
						}else{
							$(row).addClass("danger");
						}
					},
	   'columnDefs' : [ {
						"targets": 6,
						"createdCell": function (td, cellData, rowData, row, col) {
							var td1 = $(td);
							td1.empty();
							var checkArray = $.makeArray([4, 5]);
							var var_state_id = parseInt(rowData.var_state);
							if ( ($.isNumeric(var_state_id)) && ($.inArray(var_state_id, checkArray) > -1) ) {
								var span1 = $("<span></span>");
								span1.text(rowData.var_state_name);
								td1.append(span1);
							}else{
								var table = this.api();
								var button1 = $('<button></button>');
								var span1 = $("<span class='glyphicon glyphicon-save'></span>");
								button1.addClass("btn btn-success btn-block");
								button1.append(span1);
								button1.bind("click", function(){
									$.open_modal2( rowData );
								});
								button1.appendTo(td1);
							}
						}
					  },
					  {
						"targets": 7,
						"createdCell": function (td, cellData, rowData, row, col) {
							var td1 = $(td);
							td1.empty();
							var checkArray = $.makeArray([4, 5]);
							var var_state_id = parseInt(rowData.var_state);
							if ( ($.isNumeric(var_state_id)) && ($.inArray(var_state_id, checkArray) > -1) ) {
								//pass or reject state
							}else{
								var table = this.api();
								var button1 = $('<button></button>');
								var span1 = $("<span class='fa fa-trash'></span>");
								button1.addClass("btn btn-danger btn-block");
								button1.append(span1);
								button1.bind("click", function(){
									var obj = $("<div></div>");
									obj.dialog({
									  classes : {
										  "ui-dialog"           : "modal-content text-center",
										  "ui-dialog-titlebar"  : "modal-header text-center",
									  },
									  title: 'Confirm',
									  resizable: false,
									  height: "auto",
									  width: 400,
									  modal: true,
									  buttons: {
										"Delete": function() {
										  var formdata = new FormData();
										  formdata.append("device_data_scan", rowData.device_data_scan);
										  formdata.append("submit", rowData.device_data_scan);
										  $.ajax({
										  type        : "POST",
										  url         : "<?php echo VAR_BASE_URL."/controller/device_data_scanDeleteController.php";?>",
										  data        : formdata,
										  //dataType    : 'json',
										  //encode      : true,
										  processData : false,
										  contentType : false
										  }).done(function(data) {
											  if(data.action_done == 1){
												  var alertObj = $.alert("Confirm", "Confirm Success");
												  setTimeout(function(){
													  alertObj.dialog( "close" );
												  }, 1500);
											  }else{
												  var alertObj = $.alert("Confirm", "Confirm Error");
												  setTimeout(function(){
													  alertObj.dialog( "close" );
												  }, 1500);
											  }
											  table.ajax.reload();
										  });
										  $( this ).dialog( "close" );
										},
										Cancel: function() {
										  $( this ).dialog( "close" );
										}
									  }
									});
								});
								button1.appendTo(td1);
							}
						}
					  }]
    });
	table2.ajax_reload_timer().start((1000 * 60 * 5));
});
</script>
<script>
$(function($) {
	// Replace the <table> with a DataTable
	/* table1 */
    var table1 = $("#objList1").DataTable({
	  'dom'         : 'Bfrtip',
	  'buttons'     : {
		  				'buttons' : [
							'pageLength',
							{
								name  : "listen",
								className  : "btn btn-default",
								visibility  : true,
								text  : "<span class='glyphicon glyphicon-eye-open'/>",
								titleAttr: 'listen',
								init: function(api, node, config) {
								   //$(node).removeClass('btn-default');
                                    var dt = this.table();
									var table_obj = $(dt.node());
									var timer = table_obj.data("ajax_reload_timer_id");
									var timer = parseInt(timer);
									if((dt.ajax_reload_timer().isEnable())){
										$(node).html("<span class='glyphicon glyphicon-eye-open'/>");
									}else{
										$(node).html("<span class='glyphicon glyphicon-eye-close'/>");
									}
								},
								action: function ( e, dt, node, config ) {
									//dt.buttons( 'btn01:name' ).disable();
									var table_obj = $(this.table().node());
									var timer = table_obj.data("ajax_reload_timer_id");
									var timer = parseInt(timer);
									if((dt.ajax_reload_timer().isEnable())){
										$(node).html("<span class='glyphicon glyphicon-eye-close'/>");
										dt.ajax_reload_timer().disable();
									}else{
										$(node).html("<span class='glyphicon glyphicon-eye-open'/>");
										dt.ajax_reload_timer().enable();
									}
								}
							},
							{
								name  : "refresh",
								className : "btn btn-default",
								visibility  : true,
								text  : "<span class='glyphicon glyphicon-refresh'/>",
								titleAttr: 'refresh',
								action: function ( e, dt, node, config ) {
									dt.ajax.reload();
								}
							},
							{
								name  : "add",
								className : "btn btn-default",
								visibility  : true,
								text  : "<span class='glyphicon glyphicon-plus'/>",
								titleAttr: 'add',
								action: function ( e, dt, node, config ) {
									var var_value = prompt("Please Enter Code");
									if (var_value != null && var_value != "") {
										var formdata = new FormData();
										var var_line = parseInt(<?php echo MySession::getData("com_var_line_id");?>);
										formdata.append("var_value", var_value);
										formdata.append("var_line", var_line);
										formdata.append("action", var_line);
										//formdata.append("submit", var_line);
										// process the form
										$.ajax({
											type        : "POST",
											url         : "<?php echo VAR_BASE_URL."/controller/device_data_handle_controller.php";?>",
											data        : formdata,
											//dataType    : 'json',
											//encode      : true,
											processData : false,
											contentType : false
										}).done(function(data) {
											if(data.action_done == 1){
												var alertObj = $.alert("Confirm", "Confirm Success");
												setTimeout(function(){
													alertObj.dialog( "close" );
												}, 1500);
											}else{
												var alertObj = $.alert("Confirm", "Confirm Error");
												setTimeout(function(){
													alertObj.dialog( "close" );
												}, 1500);
											}
											dt.ajax.reload();
										});
									}
								}
							}
						]
					  },
      'columns'     : [
                        {
							//title         : "",
                            className     : "details-control",
                            orderable     : false,
                            data          : null,
                            defaultContent: ""
                        },
                        { 
                            data  : "device_data_var_value",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_scan_code",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_sys_date",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data  : "device_data_sys_time",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
  						{ 
                            data  : "device_data_description",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
		  				{ 
                            data  : "device_data_description",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        }
                      ],
	  'responsive'  : true,
      'paging'      : true,
      'lengthChange': true,
	  'lengthMenu'  : [[5, 10, 25, 50, 100], [5, 10, 25, 50, "All"]],
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'processing'  : false,
      'serverSide'  : true,
      'jQueryUI'    : false,
      'ajax'        : {
                        "url"     : "<?php echo VAR_BASE_URL."/controller/get_device_data_1Controller.php";?>",
                        "dataSrc" : "data",
                        "type"    : "GET",
                        "deferRender": true,
                        "data"    : function(data) {
                            //data.push( { "name": "first_variable", "value": "xxx" } );
							//data.from = $('#input1').val();
						},
	                    "error"   : function(e){
                            console.log("error");
                        }
                    },
	  'rowCallback' : function(row, data, displayNum, displayIndex, dataIndex) {
						//$('td:eq(1)', row).html( '<b>A</b>' );
					},
	   'createdRow' : function( row, data, dataIndex ) {
		   				var row1 = $(row);
		   				row1.addClass("text-center");
		   				var device_data_description_id = parseInt(data.device_data_description);
						if ( (!$.isNumeric(device_data_description_id)) ) {
					  		$(row).addClass("danger");
						}else{
							$(row).removeClass("danger");
						}
					},
	   'columnDefs' : [ {
						"targets": 5,
						"createdCell": function (td, cellData, rowData, row, col) {
							var td1 = $(td);
							td1.empty();
							var device_data_description_id = parseInt(rowData.device_data_description);
							if ( (!$.isNumeric(device_data_description_id)) ) {
								var table = this.api();
								var button1 = $('<button></button>');
								var span1 = $("<span class='glyphicon glyphicon-save'></span>");
								button1.addClass("btn btn-danger btn-block");
								button1.append(span1);
								button1.bind("click", function(){
									$.open_modal1( rowData );
								});
								button1.appendTo(td1);
							}else{
								var span1 = $("<span class='glyphicon glyphicon-saved'></span>");
								td1.append(span1);
							}
						}
					  },
					  {
						"targets": 6,
						"createdCell": function (td, cellData, rowData, row, col) {
							var td1 = $(td);
							td1.empty();
							var device_data_description_id = parseInt(rowData.device_data_description);
							if ( (!$.isNumeric(device_data_description_id)) ) {
								var table = this.api();
								var button1 = $('<button></button>');
								var span1 = $("<span class='fa fa-trash'></span>");
								button1.addClass("btn btn-danger btn-block");
								button1.append(span1);
								button1.bind("click", function(){
									var obj = $("<div></div>");
									obj.dialog({
									  classes : {
										  "ui-dialog"           : "modal-content text-center",
										  "ui-dialog-titlebar"  : "modal-header text-center",
									  },
									  title: 'Confirm',
									  resizable: false,
									  height: "auto",
									  width: 400,
									  modal: true,
									  buttons: {
										"Delete": function() {
										  var formdata = new FormData();
										  formdata.append("device_data", rowData.device_data);
										  formdata.append("submit", rowData.device_data);
										  $.ajax({
										  type        : "POST",
										  url         : "<?php echo VAR_BASE_URL."/controller/device_dataDeleteController.php";?>",
										  data        : formdata,
										  //dataType    : 'json',
										  //encode      : true,
										  processData : false,
										  contentType : false
										  }).done(function(data) {
											  if(data.action_done == 1){
												  var alertObj = $.alert("Confirm", "Confirm Success");
												  setTimeout(function(){
													  alertObj.dialog( "close" );
												  }, 1500);
											  }else{
												  var alertObj = $.alert("Confirm", "Confirm Error");
												  setTimeout(function(){
													  alertObj.dialog( "close" );
												  }, 1500);
											  }
											  table.ajax.reload();
										  });
										  $( this ).dialog( "close" );
										},
										Cancel: function() {
										  $( this ).dialog( "close" );
										}
									  }
									});
								});
								button1.appendTo(td1);
							}
						}
					  }],
	 'drawCallback' : function( settings ) {
		 			  	//console.log( 'DataTables has redrawn the table' );
		 				var api = this.api();
		 				var row_data = api.rows().data();
		 				$.each( row_data, function( key, value ) {
							var device_data_description_id = parseInt(value.device_data_description);
							if ( (!$.isNumeric(device_data_description_id)) && (api.ajax_reload_timer().isEnable()) ) {
								$.open_modal1( value );
								return false;
							}
						});
					  }
    });
	//set interval
    /*setInterval( function () {
		table1.ajax.reload( null, false ); // user paging is not reset on reload
    }, 1000 );*/
	table1.ajax_reload_timer().start("1000");
	// Add event listener for opening and closing details
    $('#objList1 tbody').on( 'click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table1.row( tr );
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( $.f_format_dt(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
});
</script>
<script>
(function($) {
	$.extend({
		page_timer_object : {
			start : function( data ){
				$('#objList1').DataTable().ajax_reload_timer().start();
				$('#objList2').DataTable().ajax_reload_timer().start();
				$.get_data_1();
			},
			stop : function ( data ) {
				$('#objList1').DataTable().ajax_reload_timer().stop();
				$('#objList2').DataTable().ajax_reload_timer().stop();
			}
		}
	});
})($);
</script>
<script>
$(function($) {
	//$.page_timer_object.start();
	setInterval( $.get_datetime, 1000 );
	setInterval( $.get_data_1, 60000 );
});
</script>
<script>
$(function($) {
	$.get_data_1();
	var device_button = $("#device_button");
	device_button.on("click", function(){
		$.get_data_1();
	});
});
</script>
<script>
$(function() {
    // process the form
    $('#form_01_m').submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // get the form data
		var form = $(this);
		var form_id = $(this).attr('id');
		var formdata = new FormData();
		var code = form.find('#code');
		formdata.append("code", code.val());
		formdata.append("submit", code.val());
        // process the form
        $.ajax({
            type        : form.attr('method'), // define the type of HTTP verb we want to use (POST for our form)
            url         : form.attr('action'), // the url where we want to POST
            data        : formdata, // our data object
            //dataType    : 'json', // what type of data do we expect back from the server
			//encode      : true,
			processData : false,
            contentType : false,
            beforeSend  : function( xhr ) {
                code.val(null);
            }
        })
            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see
				// here we will handle errors and validation messages
				if(data.action_done == 1){
					var alertObj = $.alert("Confirm", "Confirm Success");
					setTimeout(function(){
						alertObj.dialog( "close" );
					}, 1500);
				}else{
					var alertObj = $.alert("Confirm", "Confirm Error");
					setTimeout(function(){
						alertObj.dialog( "close" );
					}, 1500);
				}
				code.focus();
				$("#objList2").DataTable().ajax.reload( null, false );
				$.get_data_1();
            });
        // stop the form from submitting the normal way and refreshing the page
        //event.preventDefault();
    });
});
</script>