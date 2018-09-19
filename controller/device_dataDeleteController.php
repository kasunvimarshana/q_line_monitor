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
$device_data = new device_data();
$device_dataBoImpl = new device_dataBoImpl();
$device_data_descriptionBoImpl = new device_data_descriptionBoImpl();
$device_data_defectBoImpl = new device_data_defectBoImpl();
?>
<?php
try{
    if(isset($_REQUEST)){
        $REQUEST = $_REQUEST;
        unset( $_REQUEST );
    }
	/* value */
    if((isset($REQUEST["device_data"])) && (is_numeric($REQUEST["device_data"]))){
        $device_data->__set("id", $REQUEST["device_data"]);
    }
}catch( Exception $e ){}
?>
<?php
if(isset($REQUEST["submit"])){	
    try{
		/* begin transaction */
        DB::beginTransaction();
		if( (!is_a($device_data, "device_data")) || (!is_numeric($device_data->__get("id"))) ){
			throw new Exception("error");
		}
        /* execute */
		if((is_a($device_data, "device_data")) && (is_numeric($device_data->__get("id")))){
			$temp = array();
			$temp["device_data"] = [$device_data->__get("id"), "="];
			$device_data_description = $device_data_descriptionBoImpl->f_searcWithParams( $temp );
			if( isset($device_data_description) && (is_array($device_data_description)) ){
				foreach($device_data_description as $key=>$value){
					//delete device data defect
					$queryParams["query_type"] = DBQ::DELETE_Q;
					$queryParams["query"] = "device_data_defect";
					$temp = array();
					$temp["device_data_description"] = array( 
						"key1"  => "device_data_description", 
						"key2"  => "device_data_description",
						"value" => $value->__get("id"),
						"op"    => "=",
						"key_dt"=> PDO_DT::PARAM_INT
					);
					$and_value = array_merge( $temp, $and_value );
					$where_value = array_merge( $where_value, array( "and_value" => $and_value ) );
					$queryParams["where_value"] = $where_value;
					$queryParams = json_encode( $queryParams );
					$device_data_defectBoImpl->f_query1($queryParams);
					//delete device data description
					$device_data_descriptionBoImpl->f_delete($value->__get("id"));
					$and_value = array();
					$where_value = array();
					$queryParams = array();
				}
			}
			//delete device data
			$device_dataBoImpl->f_delete($device_data->__get("id"));
		}
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