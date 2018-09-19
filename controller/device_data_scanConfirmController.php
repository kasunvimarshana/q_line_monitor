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
$queryParams["query_type"] = DBQ::UPDATE_Q;
$queryParams["query"] = "device_data_scan";
?>
<?php
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
	/* value */
	if( (isset($REQUEST["device_data_scan"])) && (is_numeric($REQUEST["device_data_scan"])) ) {
		$device_data_scan->__set("id", $REQUEST["device_data_scan"]);
		$temp = array();
		$temp["device_data_scan"] = array( 
			"key1"  => "id", 
			"key2"  => "id",
			"value" => $device_data_scan->__get("id"),
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value = array_merge( $and_value, $temp );
	}
	/* value */
	if( (isset($REQUEST["var_state"])) && (is_numeric($REQUEST["var_state"])) ) {
		$device_data_scan->__set("var_state", $REQUEST["var_state"]);
		$temp = array();
		$temp["var_state"] = array( 
			"key1"  => "var_state", 
			"key2"  => "var_state",
			"value" => $device_data_scan->__get("var_state"),
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$set_value = array_merge( $set_value, $temp );
	}
	/* value */
	if( (isset($REQUEST["description"])) && (!empty($REQUEST["description"])) ) {
		$device_data_scan->__set("description", $REQUEST["description"]);
		$temp = array();
		$temp["description"] = array( 
			"key1"  => "description", 
			"key2"  => "description",
			"value" => $device_data_scan->__get("description"),
			"key_dt"=> PDO_DT::PARAM_STR
		);
		$set_value = array_merge( $set_value, $temp );
	}
	/* set value */
	$queryParams["set_value"] = $set_value;
	/* set where value */
	$queryParams = $device_data_scanBoImpl->manage_where_param_1($queryParams, $and_value, $or_value);
}catch( Exception $e ){}
?>
<?php
if(isset($REQUEST["submit"])){
	/* begin transaction */
	DB::beginTransaction();
    try{
		$device_data_scan_id = $device_data_scan->__get("id");
		if(!is_numeric($device_data_scan_id)){
			throw new Exception("error");
		}
        /* execute */
		$queryParams = json_encode( $queryParams );
        $device_data_scanBoImpl->f_query1( $queryParams );
		$feedback_result->__set("action_done", 1);
		/* commit */
        DB::commit();
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
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