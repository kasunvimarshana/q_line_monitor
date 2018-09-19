<?php
require_once( dirname(__DIR__).DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."device_data_scanConfirmController.php" );
?>
<!-- template id="template_1" class="modal" -->
<div class="row col-sm-12 col-md-12 form-group m-0 no-margin no-padding">
	<div class="row col-sm-12 col-md-12 form-group m-0 no-margin no-padding">
		<!-- panel -->
		<div class="panel panel-success m-0 no-padding no-margin">
			<!-- panel head -->
			<div class="panel-heading text-center">
				<h1 class=""> Scan &rArr; Confirm </h1>
			</div>
			<!-- panel body -->
			<div class="panel-body text-center no-padding no-margin bg-success">
				<!-- form start -->
				<form method="POST" id="form_02" name="form_02" action="<?php echo VAR_BASE_URL."/controller/device_data_scanConfirmController.php";?>" enctype="multipart/form-data" autocomplete="off">
					<!-- form body -->
					<div class="row text-center no-padding no-margin">
						<!-- code -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="device_data_scan_var_state" class="col-sm-12 control-label">Code</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" name="device_data_scan_var_state" id="device_data_scan_var_state" class="form-control form-control-md" placeholder="Code" value="" readonly autofocus/>
								</div>
							</div>
						</div>
						<!-- state -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="var_state" class="col-sm-12 control-label">State</label>
								<div class="col-sm-12 col-md-12">
									<select id="var_state" name="var_state" class="form-control form-control-md select2" style="width: 100%;" required="required">
										<option value="3"> Process </option>
										<option value="4"> Pass </option>
										<option value="5"> Reject </option>
									</select>
								</div>
							</div>
						</div>
						<!-- description -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="description" class="col-sm-12 control-label">Description</label>
								<div class="col-sm-12 col-md-12">
									<textarea name="description" id="description" class="form-control form-control-md" rows="5"></textarea>
								</div>
							</div>
						</div>
						<!-- submit -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<div class="col-sm-6 col-md-6 pull-left">
									<button type="submit" id="submit_02" name="submit" class="btn btn-success btn-block btn-lg no-padding">Confirm</button>
								</div>
								<div class="col-sm-6 col-md-6 pull-right">
									<button type="button" id="close_02" name="close" class="btn btn-danger btn-block btn-lg no-padding">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /.form body -->
				</form>
				<!-- form end -->
			</div>
			<!-- panel footer -->
			<div class="panel-footer text-center no-padding no-margin bg-danger">
			</div>
		</div>
		<!-- /.panel -->
	</div>
</div>
<!-- /template -->
<script>
$(function () {
	var form = $("#device_data_scan_var_state").closest("form");
	var com_form_data = form.data("com_form_data");
	$("#device_data_scan_var_state").val(com_form_data.device_data_scan_code);
	$.page_timer_object.stop();
});
</script>
<script>
$(function () {
    $('#var_state').select2({
		placeholder	      : 'Search',
		multiple		  : false,
		closeOnSelect	  : true,
		allowClear		  : true,
	});
});
</script>
<script>
$(function() {
    // process the form
    $("#form_02").submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // get the form data
		var form = $(this);
		var form_id = $(this).attr('id');
		var com_form_data = form.data("com_form_data");
		var formdata = new FormData();
		var var_state = form.find("#var_state");
		var description = form.find("#description");
		formdata.append("var_state", var_state.val());
		formdata.append("description", description.val());
		formdata.append("device_data_scan", com_form_data.device_data_scan);
		formdata.append("submit", com_form_data.device_data_scan);
        // process the form
        $.ajax({
            type        : form.attr('method'), // define the type of HTTP verb we want to use (POST for our form)
            url         : form.attr('action'), // the url where we want to POST
            data        : formdata, // our data object
            //dataType    : 'json', // what type of data do we expect back from the server
			//encode      : true,
			processData : false,
            contentType : false
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
				$.modal.close();
				$.page_timer_object.start();
                $('#objList2').DataTable().ajax.reload( null, false );
            });
        // stop the form from submitting the normal way and refreshing the page
        //event.preventDefault();
		//close the modal
		//$.modal.close();
    });
});
</script>
<script>
$(function() {
	$( "#close_02" ).on( "click", function() {
	  	//close the modal
		$.modal.close();
		$.page_timer_object.start();
	});
});
</script>