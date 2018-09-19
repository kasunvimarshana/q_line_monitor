<?php ob_start();?>
<?php 
require_once( dirname(__DIR__).DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."main_Controller.php" );
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!-- html manifest="kv.appcache" -->
<html>
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
  <!-- DataTables -->
<!--
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
-->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/DataTables/datatables.min.css"/>
  <!-- DataTables Buttons -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/DataTables/Buttons-1.5.2/css/buttons.dataTables.min.css"/>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/select2/dist/css/select2.min.css"/>
  <!-- Pace style -->
  <!-- link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/plugins/pace/pace.min.css"/ -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-daterangepicker/daterangepicker.css"/>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"/>
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"/>
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/plugins/timepicker/bootstrap-timepicker.min.css"/>
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/plugins/iCheck/all.css"/>
  <!-- jquery-modal-master for modal -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-modal-master/jquery.modal.min.css"/>
  <!-- jquery-ui -->
  <!--
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css"/>
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css"/>
  -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/dist/css/AdminLTE.min.css"/>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/dist/css/skins/skin-blue.min.css"/>
  <!-- custom style -->
  <link rel="stylesheet" href="<?php echo VAR_BASE_URL;?>/view/dist/css/custom_style.css"/>
  <style>
  	/* table control start*/
	td.details-control {
		background: url("<?php echo VAR_BASE_URL;?>/view/dist/img/details_open.png") no-repeat center center;
		cursor: pointer;
		}
	tr.shown td.details-control {
			background: url("<?php echo VAR_BASE_URL;?>/view/dist/img/details_close.png") no-repeat center center;
		}
	/* table control end*/
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
    
<!-- javascripts -->
<!-- jQuery 3 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<!--
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
-->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/DataTables/datatables.min.js"></script>
<!-- DataTables Buttons -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/DataTables/Buttons-1.5.2/js/dataTables.buttons.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/fastclick/lib/fastclick.js"></script>
<!-- PACE -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/PACE/pace.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/ckeditor/ckeditor.js"></script>
<!-- date-range-picker -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo VAR_BASE_URL;?>/view/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck -->
<script src="<?php echo VAR_BASE_URL;?>/view/plugins/iCheck/icheck.min.js"></script>
<!-- jquery-modal-master -->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-modal-master/jquery.modal.min.js"></script>
<!-- jquery-ui-->
<script src="<?php echo VAR_BASE_URL;?>/view/bower_components/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo VAR_BASE_URL;?>/view/dist/js/adminlte.min.js"></script>
<!-- custom script -->
<script src="<?php echo VAR_BASE_URL;?>/view/dist/js/custom_script.js"></script>
<!-- javascripts -->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini"><!-- style="overflow-x:auto;" -->
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $_SERVER["PHP_SELF"];?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q Line Monitor</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Q</b> Line Monitor</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo VAR_BASE_URL;?>/view/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="height: auto;">
                <img src="<?php echo VAR_BASE_URL;?>/view/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  Q Line Monitor
                  <!-- small>Branch : </small -->
                  <small><strong>User</strong>&emsp;<?php echo $com_sys_user->__get("code"); ?></small>
				  <small><strong>Plant</strong>&emsp;<?php echo $com_var_plant->__get("code"); ?></small>
				  <small><strong>Line</strong>&emsp;<?php echo $com_var_line->__get("code"); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div -->
                <div class="pull-right">
                  <a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_SIGN_OUT."=true";?>" class="btn btn-default btn-flat" onclick="if(!confirm('Are You Sure?')){ return false;}">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo VAR_BASE_URL;?>/view/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
  
        <!-- test -->
        <!-- configuration -->
        <li class="header">Configuration</li>
        <li class="treeview <?php echo (in_array($commonObjectClass->__get(VAR_PAGE_ARG), VAR_CON_ACTION_1)) ? "active" : null; ?>">
          <a href="#">
            <i class="fa fa-link"></i>
            <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (($commonObjectClass->__get(VAR_PAGE_ARG)) == ACTION_1_1) ? "active" : null; ?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_1_1; ?>"><i class="fa fa-circle-o"></i> <span>System User</span></a></li>
            <li class="<?php echo (($commonObjectClass->__get(VAR_PAGE_ARG)) == ACTION_1_6) ? "active" : null; ?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_1_6; ?>"><i class="fa fa-circle-o"></i> <span>Device</span></a></li>
          </ul>
        </li>
        <!-- device data -->
        <li class="header">Device Data</li>
        <li class="treeview <?php echo (in_array($commonObjectClass->__get(VAR_PAGE_ARG), VAR_CON_ACTION_2)) ? "active" : null; ?>">
          <a href="#">
            <i class="fa fa-link"></i>
            <span>Device Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (($commonObjectClass->__get(VAR_PAGE_ARG)) == ACTION_2_1) ? "active" : null; ?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_2_1; ?>"><i class="fa fa-circle-o"></i> <span>Device Data</span></a></li>
          </ul>
        </li>
        <!-- report -->
        <li class="header">Report</li>
        <li class="treeview <?php echo (in_array($commonObjectClass->__get(VAR_PAGE_ARG), $VAR_CON_ACTION_3)) ? "active" : null; ?>">
          <a href="#">
            <i class="fa fa-link"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (($commonObjectClass->__get(VAR_PAGE_ARG)) == ACTION_3_1) ? "active" : null; ?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_3_1; ?>"><i class="fa fa-circle-o"></i> <span>Report 01</span></a></li>
            <li class="<?php echo (($commonObjectClass->__get(VAR_PAGE_ARG)) == ACTION_3_2) ? "active" : null; ?>"><a href="<?php echo $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".ACTION_3_2; ?>"><i class="fa fa-circle-o"></i> <span>Report 02</span></a></li>
          </ul>
        </li>
        <!-- test -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    
  <?php
    
    switch( $commonObjectClass->__get(VAR_PAGE_ARG) ){
        /* action 1 */
        /* configuration */
        case ACTION_1_1:
        include_once(VAR_BASE_DIR.DS."templates".DS."sys_userManagerTemp.php");
            break;
        case ACTION_1_6:
        include_once(VAR_BASE_DIR.DS."templates".DS."deviceManagerTemp.php");
            break;
        /* sys user */
        case ACTION_1_2:
        include_once(VAR_BASE_DIR.DS."templates".DS."sys_userAddTemp.php");
            break;
        case ACTION_1_3:
        include_once(VAR_BASE_DIR.DS."templates".DS."sys_userEditTemp.php");
            break;
        case ACTION_1_4:
        include_once(VAR_BASE_DIR.DS."templates".DS."sys_userListTemp.php");
            break;
        case ACTION_1_5:
        include_once(VAR_BASE_DIR.DS."templates".DS."sys_userViewTemp.php");
            break;
        /* device */
        case ACTION_1_7:
        include_once(VAR_BASE_DIR.DS."templates".DS."deviceAddTemp.php");
            break;
        case ACTION_1_8:
        include_once(VAR_BASE_DIR.DS."templates".DS."deviceEditTemp.php");
            break;
        case ACTION_1_9:
        include_once(VAR_BASE_DIR.DS."templates".DS."deviceListTemp.php");
            break;
        case ACTION_1_10:
        include_once(VAR_BASE_DIR.DS."templates".DS."deviceViewTemp.php");
            break;
        /* action 2 */
        /* device data */
        case ACTION_2_1:
        include_once(VAR_BASE_DIR.DS."templates".DS."device_dataManagerTemp.php");
            break;
        case ACTION_2_2:
        include_once(VAR_BASE_DIR.DS."templates".DS."device_dataListTemp.php");
            break;
        /* action 3 */
        /* report */
        case ACTION_3_1:
        include_once(VAR_BASE_DIR.DS."report".DS."report_1.php");
            break;
        case ACTION_3_2:
        include_once(VAR_BASE_DIR.DS."report".DS."report_2.php");
            break;
        /* default */
        default :
        //include_once("../templates/404.php");
        include_once(VAR_BASE_DIR.DS."templates".DS."device_dataListTemp.php");
    }
    
  ?>
    
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y', time()); ?> <a href="<?php echo $_SERVER["PHP_SELF"];?>">brandix</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
    
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
  // To make Pace works on Ajax calls
  /*$(document).ajaxStart(function () {
    Pace.restart()
  });*/
</script>
<script type="text/javascript">
$(function() {
	/* disable right click */
	$(document).on("contextmenu",function(e){
    	return false;
    });
	/*$(this).bind("contextmenu", function(e) {
		e.preventDefault();
		alert("right click is disabled!");
	});*/
	/* disable ctrl + left mouse click */
	$('a').click(function (e){  
		if (e.ctrlKey) {
			return false;
		}
	});
});
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<?php ob_end_flush();?>