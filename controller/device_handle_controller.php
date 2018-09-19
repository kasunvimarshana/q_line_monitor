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
$deviceBoImpl = new deviceBoImpl();
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
        /* execute */
        $deviceBoImpl->f_update( $device );
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