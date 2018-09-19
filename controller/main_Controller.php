<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$GLOBALS["commonObjectClass"] = new CommonObjectClass();
$GLOBALS["com_sys_user"] = new sys_user();
$GLOBALS["com_var_plant"] = new var_plant();
$GLOBALS["com_var_line"] = new var_line();
$GLOBALS["com_device"] = new device();
$GLOBALS["com_sys_activities"] = array();
//$sys_userBoImpl = new sys_userBoImpl();
//$var_plantBoImpl = new var_plantBoImpl();
//$var_lineBoImpl = new var_lineBoImpl();
//$user_role_sys_activityBoImpl = new user_role_sys_activityBoImpl();
$queryParams = array();
$REQUEST = array();
?>
<?php
if( isset($_GET) ){
	$REQUEST = array_merge( $REQUEST, $_GET );
	//unset( $_GET );
}
if( isset($_POST) ){
	$REQUEST = array_merge( $REQUEST, $_POST );
	//unset( $_POST );
}
?>
<?php
try{
	//get page argument
	if( isset($REQUEST[VAR_PAGE_ARG]) ){
		$commonObjectClass->__set( VAR_PAGE_ARG, $REQUEST[VAR_PAGE_ARG]);
		unset($REQUEST[VAR_PAGE_ARG]);
	}
	//logout
	if( isset($REQUEST[VAR_SIGN_OUT]) ){
		unset($REQUEST[VAR_SIGN_OUT]);
		/* create a log */
		$param = array();
		$param["action"] = "user log out";
		$param["user"] = unserialize(MySession::getData("com_sys_user"))->__get("id");
		$param["time"] = date('Y-m-d', time());
		f_createLog($param);
		MySession::removeData();
	}
	//check session data
	if( !(MySession::isDataExist("com_sys_user")) ){
		header('Location: '.VAR_LOGINPAGE_URL, true);
		exit();
	}else{
		$com_sys_user = unserialize(MySession::getData("com_sys_user"));
		$com_sys_activities = $com_sys_user->__get("sys_activity");
	}
	if( (MySession::isDataExist("com_var_plant")) ){
		$com_var_plant = unserialize(MySession::getData("com_var_plant"));
	}
	if( (MySession::isDataExist("com_var_line")) ){
		$com_var_line = unserialize(MySession::getData("com_var_line"));
	}
	if( (MySession::isDataExist("com_device")) ){
		$com_device = unserialize(MySession::getData("com_device"));
	}
}catch(Exception $e){
	
}
?>