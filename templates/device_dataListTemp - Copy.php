<?php
//require_once(VAR_BASE_DIR.DS."controller".DS."device_dataListController.php");
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
										<span id="var_line">0</span>
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
									<button id="device_button" name="device_button" type="button" class="btn btn-danger btn-block no-padding">
										<h3 class="no-margin">
											<span id="var_device">0</span>
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
									<h1 class="no-margin"> Total Scan </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin">
										<span id="var_line">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- quality pass -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin"> Quality Pass </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin">
										<span id="var_line">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- quality fail -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin"> Quality Fail </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin">
										<span id="var_line">0</span>
									</h1>
								</div>
							</div>
						</div>
						<!-- line efficiency -->
						<div class="col-sm-12 col-md-6 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h1 class="no-margin"> Line Efficiency </h1>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h1 class="no-margin">
										<span id="var_line">0</span>
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
										<span id="var_line">0</span>
									</h3>
								</div>
							</div>
						</div>
						<!-- Defect Type -->
						<div class="col-sm-12 col-md-4 form-group">
							<div class="panel panel-warning">
						  		<div class="panel-heading text-center no-padding">
									<h3 class="no-margin"> Material Defects </h3>
								</div>
							  	<div class="panel-body text-center no-padding bg-warning">
									<h3 class="no-margin">
										<span id="var_line">0</span>
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
										<span id="var_line">0</span>
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
												<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_DATA_LIST; ?>" enctype="multipart/form-data" autocomplete="off">
													<!-- form-control div -->
													<div class="row col-sm-12 col-md-6">
														<!-- code -->
														<div class="col-sm-9 col-md-9 form-group">
															<div class="form-group">
																<!-- label for="code" class="col-sm-12 control-label">Code</label -->
																<div class="col-sm-12 col-md-12">
																	<input type="text" name="code" id="code" class="form-control" placeholder="Code" value="" autocomplete="off" autofocus/>
																</div>
															</div>
														</div>
														<!-- submit -->
														<div class="col-sm-3 form-group">
															<div class="form-group">
																<div class="col-sm-12 col-md-12">
																	<button type="submit" name="search" value="search" class="btn btn-primary">Submit</button>
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
												  <th></th>
												  <th> CODE </th>
												  <th> QTY </th>
												  <th> DEFECT </th>
												  <th> DATE </th>
												  <th> TIME </th>
												  <th></th>
												</tr>
											</thead>
											<tbody> 
											</tbody>
											<tfoot>
												<tr>
												  <th></th>
												  <th> CODE </th>
												  <th> QTY </th>
												  <th> DEFECT </th>
												  <th> DATE </th>
												  <th> TIME </th>
												  <th></th>
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
												  <th></th>
												  <th> TAG </th>
												  <th> BARCODE </th>
												  <th> DATE </th>
												  <th> TIME </th>
												</tr>
											</thead>
											<tbody> 
											</tbody>
											<tfoot>
												<tr>
												  <th></th>
												  <th> TAG </th>
												  <th> BARCODE </th>
												  <th> DATE </th>
												  <th> TIME </th>
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
<div id="template_1" name="template_1" class="modal m-0 no-margin no-padding">
</div>
<script>
/* Formatting function for row details - modify as you need */
function format ( data ) {
    // `d` is the original data object for the row
    return '<table class="table table-bordered table-hover m-0 no-margin" cellpadding="5" cellspacing="0" border="0" style="width:100%;padding-left:50px;">'+
        '<tr>'+
            '<td>Device Id:</td>'+
            '<td>'+data.device_id+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Line:</td>'+
            '<td>'+data.var_line_code+'</td>'+
        '</tr>'+
		'<tr>'+
            '<td>Line:</td>'+
            '<td>'+data.var_line_code+'</td>'+
        '</tr>'+
		'<tr>'+
            '<td>Line:</td>'+
            '<td>'+data.var_line_code+'</td>'+
        '</tr>'+
		'<tr>'+
            '<td>Line:</td>'+
            '<td>'+data.var_line_code+'</td>'+
        '</tr>'+
		'<tr>'+
            '<td>Line:</td>'+
            '<td>'+data.var_line_code+'</td>'+
        '</tr>'+
    '</table>';
}
</script>
<script>
function init_Page(){
    //common data
    var isTableReload = true;
    //var data1 = $( ".datepicker" ).data( "date-format" );
    // Replace the <select class="select2"> with a select2
    $('.select2').select2();
    // Replace the <table> with a DataTable
    var table1 = $('#objList1').DataTable({
      'columns'     : [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { 
                            data  : "device_data_var_value",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data: "device_data_scan_code",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data: "device_data_sys_date",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        },
                        { 
                            data: "device_data_sys_time",
                            render: function ( data, type, row ) {
                                return data;
                            }
                        }
                      ],
	  'responsive'  : true,
      'paging'      : true,
      'lengthChange': true,
	  'lengthMenu'  : [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'processing'  : false,
      'serverSide'  : true,
      'jQueryUI'    : true,
      'ajax'        : {
                        "url"     : "<?php echo VAR_BASE_URL."/service/get_device_data.php";?>",
                        "dataSrc" : "data",
                        //"dataSrc" : function(data){ return data.data; },
                        "type"    : "GET",
                        "deferRender": true,
                        "data"    : function(data) {
                            //data.push( { "name": "first_variable", "value": "xxx" } );
							//data.from = $('#datepicker1').val();
						},
	                    "error"   : function(e){
                            console.log("error");
							//
							//open the modal
							$.ajax({
								url: "<?php echo VAR_BASE_URL;?>/templates/device_data_defectAddTemp.php",
								success: function( result, status, xhr ) {
								  //$(result).appendTo('body').modal();
								  var var_result = $( result );
								  var template_1_div = $( "#template_1" );
								  template_1_div.empty();
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
							//
                        }
                    },
	  'rowCallback' : function(row, data, displayNum, displayIndex, dataIndex) {
						if ( data.device_id == "1" ) {
						  //$('td:eq(1)', row).html( '<b>A</b>' );
						}
		  				$( row ).addClass('danger');
					}
    });
    //set interval
    setInterval( function () {
        if( isTableReload == true ){
            table1.ajax.reload( null, false ); // user paging is not reset on reload  
        }
    }, 1000 );
    //table's xhr event
    /*table1.on( 'xhr', function ( e, settings, json ) {
        //console.log( 'Ajax event occurred. Returned data: ', json );
        $('#var_date').text( json.var_date + " / " + json.var_time );
        $('#var_line').text( json.var_line );
        //open the modal
        $.ajax({
            url: "<?php echo VAR_BASE_URL;?>/templates/device_data_defectAddTemp.php",
            success: function( result, status, xhr ) {
              //$(result).appendTo('body').modal();
              var var_result = $( result );
              var template_1_div = $( "#template_1" );
              template_1_div.empty();
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
    } );*/
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
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
}
</script>

<script>
$(function () {
    init_Page();
});
</script>