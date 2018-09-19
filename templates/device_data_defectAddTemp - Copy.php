<?php
require_once( dirname(__DIR__).DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."device_data_defectAddController.php" );
?>
<!-- template id="template_1" class="modal" -->
<div class="row col-sm-12 col-md-12 form-group m-0 no-margin no-padding">
	<div class="row col-sm-12 col-md-12 form-group m-0 no-margin no-padding">
		<!-- panel -->
		<div class="panel panel-danger m-0 no-padding no-margin">
			<!-- panel head -->
			<div class="panel-heading text-center">
				<h1 class=""> Defect Type &rArr; Defect </h1>
			</div>
			<!-- panel body -->
			<div class="panel-body text-center no-padding no-margin bg-danger">
				<!-- form start -->
				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".VAR_CON_DEVICE_DATA_LIST; ?>" enctype="multipart/form-data" autocomplete="off">
					<!-- form body -->
					<div class="row text-center no-padding no-margin">
						<!-- code -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="var_value" class="col-sm-12 control-label">Code</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" name="var_value" id="var_value" class="form-control form-control-md" placeholder="Code" value="" readonly disabled="disabled" autofocus/>
								</div>
							</div>
						</div>
						<!-- defect type -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="defect_type" class="col-sm-12 control-label">Defect Type</label>
								<div class="col-sm-12 col-md-12">
									<select id="defect_type" name="defect_type[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple" required="required">
										<option> option </option>
										<option value="0"> option </option>
									</select>
								</div>
							</div>
						</div>
						<!-- defect -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="defect" class="col-sm-12 control-label">Defect</label>
								<div class="col-sm-12 col-md-12">
									<select id="defect" name="defect[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple" required="required">
										<option value="0"> option </option>
									</select>
								</div>
							</div>
						</div>
						<!-- scan -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="device_data_scan" class="col-sm-12 control-label">Scan</label>
								<div class="col-sm-12 col-md-12">
									<select id="device_data_scan" name="device_data_scan" class="form-control form-control-md select2" style="width: 100%;">
										<option value="0"> option </option>
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
								<div class="col-sm-12 col-md-12">
									<button type="submit" id="submit_01" name="submit" class="btn btn-danger btn-block btn-lg no-padding">Submit</button>
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
    $('.select2').select2({
		placeholder: "Select"
	});
});
</script>
<script>
$(function () {
    $('#defect_type').select2({
		placeholder: "Select"
	});
	$('#defect_type').on('select2:select', function (e) {
    	var data = e.params.data;
    	console.log(data);
	});
	$('#defect_type').on('select2:opening', function (e) {
    	// Create a DOM Option and pre-select by default
		var data = $('#defect_type').val();
		var data1 = {
			id: 1,
			text: 'Barn owl'
		};
		arr = jQuery.grep(arr, function( value, key ) {
		  return ( value !== 5 && key > 4 );
		});
		//data.push( data1 );
		if( $.isArray( data ) ){
			$.each(data, function( key, value ) {
			    /**/
			    // Set the value, creating a new option if necessary
				if ( ($('#defect_type').find("option[value='" + value.id + "']").length) && ($.inArray( value.id, [ "8", "9", "10", 10 + "" ] )) ) {
					$('#defect_type').val(value.id).trigger('change');
				} else { 
					// Create a DOM Option and pre-select by default
					//Option(text, id, enable, select)
					var newOption = new Option(value.text, value.id, false, false);
					// Append it to the select
					$('#defect_type').append(newOption).trigger('change');
				}
			    /**/
			});
		}
	});
	$('#defect_type').on('select2:unselecting', function (e) {
    	if( confirm("Are You Sure!") ){
			
		}else{
			e.preventDefault();
		}
	});
});
</script>
<script>
// magic.js
$(function() {
    // process the form
    $('form').submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // get the form data
		var form = $(this);
		var formdata = new FormData();
		var defect_type = $('#defect_type');
		var defect = $('#defect');
		var device_data_scan = $('#device_data_scan');
		var description = $('#description');
		/*
		var formData = {
            'defect_type'      	: $('input[name=defect_type]').val(),
            'defect'            : $('input[name=defect]').val(),
            'device_data_scan'  : $('input[name=device_data_scan]').val(),
            'description'    	: $('input[name=description]').val()
        };
		*/
		formdata.append("defect_type", defect_type.val());
		formdata.append("defect", defect.val());
		formdata.append("device_data_scan", device_data_scan.val());
		formdata.append("description", description.val());
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
                //console.log(data); 
                // here we will handle errors and validation messages
            });
        // stop the form from submitting the normal way and refreshing the page
        //event.preventDefault();
		//close the modal
		$.modal.close();
    });
});
</script>