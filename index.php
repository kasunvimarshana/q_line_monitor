<?php ob_start();?>
<?php 
require_once( (__DIR__).DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."login_Controller.php" );
?>
<!DOCTYPE html>
<html manifest="kv.appcache">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <title>bc</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
  <!-- favicon -->
  <link rel="icon" type="image/png" sizes="" href="<?php echo VAR_BASE_URL;?>/view/dist/img/_favicon.png"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/font-awesome/css/font-awesome.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/Ionicons/css/ionicons.min.css"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/plugins/iCheck/square/blue.css"/>
  <!-- jquery-modal-master for modal -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-modal-master/jquery.modal.min.css"/>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/select2/dist/css/select2.min.css"/>
  <!-- jquery-ui -->
  <!--
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css"/>
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css"/>
  -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/dist/css/AdminLTE.min.css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
  <!-- custom styles -->
  <style>
      body, .login-page{
          background-image: url("<?php echo VAR_BASE_URL;?>/view/dist/img/_background.png");
          -webkit-background-size: contain;
          -moz-background-size: contain;
          -o-background-size: contain;
          background-size: contain;
          background-repeat: no-repeat;
          object-fit: contain;
          width: 100%;
          height: auto;
      }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $_SERVER["PHP_SELF"];?>"><b>Q</b> Line Monitor</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Name" name="user_name" value="<?php echo $com_sys_user->__get("user_name");?>" autocomplete="off"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password" value="" autocomplete="off"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
		  <label for="var_plant" class="col-sm-12 control-label">Plant</label>
		  <div class="col-sm-12 col-md-12 form-group no-padding">
			  <select id="var_plant" name="var_plant" class="form-control form-control-md select2" style="width: 100%;" required="required">
				  <!-- option> option </option -->
			  </select>
		  </div>
	  </div>
	  <div class="form-group has-feedback">
		  <label for="var_line" class="col-sm-12 control-label">Line</label>
		  <div class="col-sm-12 col-md-12 form-group no-padding">
			  <select id="var_line" name="var_line" class="form-control form-control-md select2" style="width: 100%;" required="required">
				  <!-- option> option </option -->
			  </select>
		  </div>
	  </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <!-- a href="#">I forgot my password</a --><br>
    <!-- a href="register.html" class="text-center">Register a new membership</a -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo VAR_BASE_URL;?>/view/plugins/iCheck/icheck.min.js"></script>
<!-- jquery-modal-master -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-modal-master/jquery.modal.min.js"></script>
<!-- Select2 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- jquery-ui-->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
$(function () {
    $('#var_plant').select2({
		ajax          : {
			url: '<?php echo VAR_BASE_URL."/Controller/get_var_plantController.php";?>',
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
							text: obj.code || obj.name, 
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
		multiple		  : false,
		allowClear		  : true,
		escapeMarkup      : function (markup) { return markup; }
	});
	$('#var_plant').on('select2:unselecting', function (e) {
    	var var_line = $("#var_line");
		var_line.val( null ).trigger('change');
	});
	$('#var_plant').on('select2:opening', function(e) {
		var var_line = $("#var_line");
		var_line.val( null ).trigger('change');
	});
});
</script>
<script>
$(function () {
    $('#var_line').select2({
		ajax          : {
			url: '<?php echo VAR_BASE_URL."/Controller/get_var_lineController.php";?>',
			data: function (params) {
			  var query = {
				search			: params.term,
				var_plant		: $('#var_plant').val(),
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
							text: obj.code || obj.name, 
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
		multiple		  : false,
		escapeMarkup      : function (markup) { return markup; }
	});
	$('#var_line').on('select2:opening', function(e) {
		var var_plant = $("#var_plant");
		var var_plant_value = var_plant.val();
		if( $.isEmptyObject(var_plant_value) ){
			e.preventDefault();
		}
	});
});
</script>
</body>
</html>
<?php ob_end_flush();?>