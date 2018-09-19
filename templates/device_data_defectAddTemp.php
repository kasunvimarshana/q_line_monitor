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
                <button id="form_01_btn_01" class="btn btn-danger btn-block btn-sm"><span class='glyphicon glyphicon-eye-open'/></button>
                <h1 class=""> Defect Type &rArr; Defect </h1>
			</div>
			<!-- panel body -->
			<div class="panel-body text-center no-padding no-margin bg-danger">
				<!-- form start -->
				<form method="POST" id="form_01" name="form_01" action="<?php echo VAR_BASE_URL."/controller/device_data_defectAddController.php";?>" enctype="multipart/form-data" autocomplete="off">
					<!-- form body -->
					<div class="row text-center no-padding no-margin">
						<!-- code -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="device_data_var_value" class="col-sm-12 control-label">Code</label>
								<div class="col-sm-12 col-md-12">
									<input type="text" name="device_data_var_value" id="device_data_var_value" class="form-control form-control-md" placeholder="Code" value="" readonly autofocus/>
								</div>
							</div>
						</div>
						<!-- defect type -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="defect_type" class="col-sm-12 control-label">Defect Type</label>
								<div class="col-sm-12 col-md-12">
									<select id="defect_type" name="defect_type[]" class="form-control form-control-md select2" style="width: 100%;" multiple="multiple" required="required">
										<!-- option> option </option -->
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
										<!-- option> option </option -->
									</select>
								</div>
							</div>
						</div>
						<!-- scan -->
						<div class="col-sm-12 form-group">
							<div class="form-group">
								<label for="device_data_scan" class="col-sm-12 control-label">Scan</label>
								<div class="col-sm-12 col-md-12">
									<select id="device_data_scan" name="device_data_scan" class="form-control form-control-md select2" style="width: 100%;" required="required">
										<!-- option> option </option -->
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
									<button type="submit" id="submit_01" name="submit" class="btn btn-success btn-block btn-lg no-padding">Confirm</button>
								</div>
								<div class="col-sm-6 col-md-6 pull-right">
									<button type="button" id="close_01" name="close" class="btn btn-danger btn-block btn-lg no-padding">Close</button>
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
	var form = $("#device_data_var_value").closest("form");
	var com_form_data = form.data("com_form_data");
	$("#device_data_var_value").val(com_form_data.device_data_var_value);
	$.page_timer_object.stop();
});
</script>
<script>
$(function () {
    $('#defect_type').select2({
		ajax          : {
			url: '<?php echo VAR_BASE_URL."/controller/get_defect_typeController.php";?>',
			data: function (params) {
			  var query = {
				search: params.term,
				page  : params.page || 1,
				length: 10
			  }
			  return query;
			},
			processResults: function (data, params) {
				params.page = params.page || 1;
				return {
					results: $.map(data.data, function (obj) {
						return { 
							id  : obj.id, 
							text: obj.name || obj.code, 
							data: obj 
						};
					}),
					pagination: {
					  more: (params.page * data.length) < Number(data.recordsTotal)
					}
				};
			},
			cache: true
		},
		placeholder	      : 'Search',
		/*templateResult	  : function(repo) {
			if (repo.loading) return repo.text;
		    return repo.name || repo.code;
		},
		templateSelection : function(repo) {
			return repo.name || repo.code;
		}*/
	    //minimumInputLength: 1,
		multiple		  : true,
		closeOnSelect	  : true,
		escapeMarkup      : function (markup) { return markup; }
	});
	$('#defect_type').on('select2:unselecting', function (e) {
    	if( confirm("Are You Sure!") ){
			var defect = $("#defect");
			var defect_data = defect.select2('data');
			//var defect_data_value = new Array();
			var defect_data_value = $.makeArray();
			var defect_type = Number( e.params.args.data.id );
			$.each(defect_data, function( key, value ) {
				if( Number( value.data.defect_type ) != defect_type ){
					defect_data_value.push( value.id );
				}
			});
			defect.val( defect_data_value ).trigger('change');
		}else{
			e.preventDefault();
		}
	});
});
</script>
<script>
$(function () {
    $('#defect').select2({
		ajax          : {
			url: '<?php echo VAR_BASE_URL."/controller/get_defectController.php";?>',
			data: function (params) {
			  var query = {
				search			: params.term,
				defect_type		: $('#defect_type').val(),
				page  			: params.page || 1,
				length			: 10
			  }
			  return query;
			},
			processResults: function (data, params) {
				params.page = params.page || 1;
				return {
					results: $.map(data.data, function (obj) {
						return { 
							id  : obj.id, 
							text: obj.name || obj.code, 
							data: obj 
						};
					}),
					pagination: {
					  more: (params.page * data.length) < Number(data.recordsTotal)
					}
				};
			},
			cache: true
		},
		placeholder	      : 'Search',
	    //minimumInputLength: 1,
		multiple		  : true,
		closeOnSelect	  : true,
		escapeMarkup      : function (markup) { return markup; }
	});
	$('#defect').on('select2:unselecting', function (e) {
    	if( confirm("Are You Sure!") ){
			
		}else{
			e.preventDefault();
		}
	});
	$('#defect').on('select2:opening', function(e) {
		var defect_type = $("#defect_type");
		var defect_type_value = defect_type.val();
		if( $.isEmptyObject(defect_type_value) ){
			e.preventDefault();
		}
	});
});
</script>
<script>
$(function () {
    $('#device_data_scan').select2({
		ajax          : {
			url: '<?php echo VAR_BASE_URL."/controller/get_device_data_scanController.php";?>',
			data: function (params) {
			  var query = {
				search			: params.term,
				page  			: params.page || 1,
				length			: 10
			  }
			  return query;
			},
			processResults: function (data, params) {
				params.page = params.page || 1;
				return {
					results: $.map(data.data, function (obj) {
						return { 
							id  : obj.id, 
							text: obj.name || obj.code, 
							data: obj 
						};
					}),
					pagination: {
					  more: (params.page * data.length) < Number(data.recordsTotal)
					}
				};
			},
			cache: true
		},
		placeholder	      : 'Search',
		allowClear		  : true,
	    //minimumInputLength: 1,
		escapeMarkup      : function (markup) { return markup; }
	});
	$('#device_data_scan').on('select2:unselecting', function (e) {
    	if( confirm("Are You Sure!") ){
			
		}else{
			e.preventDefault();
		}
	});
});
</script>
<script>
$(function() {
    // process the form
    $('#form_01').submit(function(event) {
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
        // get the form data
		var form = $(this);
		var form_id = $(this).attr('id');
		var com_form_data = form.data("com_form_data");
		var formdata = new FormData();
		var defect_type = form.find('#defect_type');
		var defect = form.find('#defect');
		var device_data_scan = form.find('#device_data_scan');
		var description = form.find('#description');
		/*
		var formData = {
            'defect_type'      	: $('input[name=defect_type]').val(),
            'defect'            : $('input[name=defect]').val(),
            'device_data_scan'  : $('input[name=device_data_scan]').val(),
            'description'    	: $('input[name=description]').val()
        };
		*/
		//var defect_val = $.makeArray();
		var defect_val = defect.val();
		if(($.isArray(defect_val))){
			$.each(defect_val, function( key, value ){
				formdata.append("defect[]", value);
			});
		}else{
			formdata.append("defect", defect_val);
		}
		formdata.append("defect_type", defect_type.val());
		formdata.append("device_data_scan", device_data_scan.val());
		formdata.append("description", description.val());
		formdata.append("device_data", com_form_data.device_data);
		formdata.append("submit", com_form_data.device_data);
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
				$('#objList1').DataTable().ajax.reload( null, false );
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
	$( "#close_01" ).on( "click", function() {
	  	//close the modal
		$.modal.close();
		$.page_timer_object.start();
	});
});
</script>
<script>
$(function() {
    chaneButtonIcon();
	$( "#form_01_btn_01" ).on( "click", function() {
        var table = $('#objList1').DataTable().table();
        var button = table.button('listen:name').node();
        button.trigger("click");
        chaneButtonIcon();
	});
});
</script>
<script>
function chaneButtonIcon( data ){
    var table = $('#objList1').DataTable().table();
    var button = table.button('listen:name').node();
    var button_html = button.html();
    $( "#form_01_btn_01" ).html(button_html);
}
</script>