<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
global $commonObjectClass;
global $com_sys_user;
global $com_var_plant;
global $com_var_line;
global $com_device;
global $com_sys_activities;
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$feedback_result = new CommonObjectClass();
$queryResults = array();
$set_value = array();
$queryParams = array();
$where_value = array();
$and_value = array();
$or_value = array();
$order_by = array();
$group_by = array();
//$recordsTotal = 0;
//$recordsFiltered = 0;
//$limit = 0;
//$offset = 0;
//$draw = 0;
$device_data_scan = new device_data_scan();
$device_data_scanBoImpl = new device_data_scanBoImpl();
?>
<?php
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
	/* value */
	if((isset($REQUEST["code"])) && (is_numeric($REQUEST["code"]))){
		$code = $REQUEST["code"];
		$var_qty = substr($code, -2);
        $device_data_scan->__set("code", $code);
        $device_data_scan->__set("var_qty", $var_qty);
    }
	/* value */
	if((MySession::isDataExist("com_sys_user_id")) && (is_numeric(MySession::getData("com_sys_user_id")))){
        $device_data_scan->__set("sys_user", MySession::getData("com_sys_user_id"));
    }
	/* value */
	if((MySession::isDataExist("com_var_line_id")) && (is_numeric(MySession::getData("com_var_line_id")))){
        $device_data_scan->__set("var_line", MySession::getData("com_var_line_id"));
    }
	/* value */
	if((isset($REQUEST["sys_date"])) && (!empty($REQUEST["sys_date"]))){
        $device_data_scan->__set("sys_date", $REQUEST["sys_date"]);
    }else{
		$sys_date = date('Y-m-d', time());
		$device_data_scan->__set("sys_date", $sys_date);
	}
	/* value */
	if((isset($REQUEST["sys_time"])) && (!empty($REQUEST["sys_time"]))){
        $device_data_scan->__set("sys_time", $REQUEST["sys_time"]);
    }else{
		$sys_time = date('G:i:s', time());
		$device_data_scan->__set("sys_time", $sys_time);
	}
}catch( Exception $e ){}
?>
<?php
if(isset($REQUEST["submit"])){
    try{
		/* begin transaction */
        DB::beginTransaction();
		if( (!is_a($device_data_scan, "device_data_scan")) || (!is_numeric($device_data_scan->__get("code"))) ){
			throw new Exception("error");
		}
        /* execute */
        $device_data_scanBoImpl->f_insert( $device_data_scan );
		$feedback_result->__set("action_done", 1);
		/* commit */
        DB::commit();
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
		//$e->getMessage();
		$feedback_result->__set("action_done", 0);
    }
}
?>
<?php
if(isset($REQUEST["submit"])){
	$feedback_result = json_encode($feedback_result);
	header("Content-Type: application/json; charset=UTF-8");
	echo $feedback_result;
}
?>