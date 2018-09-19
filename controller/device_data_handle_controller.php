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
$device = new device();
$device_data = new device_data();
$deviceBoImpl = new deviceBoImpl();
$device_dataBoImpl = new device_dataBoImpl();
?>
<?php
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
	/* value */
    if((isset($REQUEST["device_id"])) && (!empty($REQUEST["device_id"]))){
        $temp = array();
		$temp["device_id"] = [$REQUEST["device_id"], "="];
		$device = $deviceBoImpl->f_searcWithParams( $temp );
		if( isset($device) && (is_array($device)) ){
			$device = end($device);
		}
    }else if((isset($REQUEST["var_line"])) && (is_numeric($REQUEST["var_line"]))){
        $temp = array();
		$temp["var_line"] = [$REQUEST["var_line"], "="];
		$device = $deviceBoImpl->f_searcWithParams( $temp );
		if( isset($device) && (is_array($device)) ){
			$device = end($device);
		}
    }
	/* value */
	if((isset($REQUEST["var_value"])) && (!empty($REQUEST["var_value"]))){
        $device_data->__set("var_value", $REQUEST["var_value"]);
    }
}catch( Exception $e ){}
?>
<?php
if(isset($REQUEST["action"])){
    try{
		/* begin transaction */
        DB::beginTransaction();
		if( (!is_a($device, "device")) || (!is_numeric($device->__get("id"))) ){
			throw new Exception("error");
		}
		/* set other data */
		$var_ip = getenv("REMOTE_ADDR");
		$sys_date = date('Y-m-d', time());
		$sys_time = date('G:i:s', time());
		$device->__set("var_ip", $var_ip);
		$device->__set("sys_date", $sys_date);
		$device->__set("sys_time", $sys_time);
		$device_data->__set("device", $device->__get("id"));
		$device_data->__set("var_line", $device->__get("var_line"));
		$device_data->__set("sys_date", $sys_date);
		$device_data->__set("sys_time", $sys_time);
		$device_data->__set("var_ip", $var_ip);
        /* execute */
        $deviceBoImpl->f_update( $device );
        $device_dataBoImpl->f_insert( $device_data );
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
if(isset($REQUEST["action"])){
	$feedback_result = json_encode($feedback_result);
	header("Content-Type: application/json; charset=UTF-8");
	echo $feedback_result;
}
?>