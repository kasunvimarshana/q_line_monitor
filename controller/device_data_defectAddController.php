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
$defect;
$device_data_description = new device_data_description();
$device_data_descriptionBoImpl = new device_data_descriptionBoImpl();
$device_data_defectBoImpl = new device_data_defectBoImpl();
?>
<?php
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
	/* value */
	if((isset($REQUEST["device_data"])) && (is_numeric($REQUEST["device_data"]))){
        $device_data_description->__set("device_data", $REQUEST["device_data"]);
    }
	/* value */
	if((isset($REQUEST["device_data_scan"])) && (is_numeric($REQUEST["device_data_scan"]))){
        $device_data_description->__set("device_data_scan", $REQUEST["device_data_scan"]);
    }
	/* value */
	if((isset($REQUEST["description"])) && (!empty($REQUEST["description"]))){
        $device_data_description->__set("description", $REQUEST["description"]);
    }
	/* value */
	if((MySession::isDataExist("com_sys_user_id")) && (is_numeric(MySession::getData("com_sys_user_id")))){
        $device_data_description->__set("sys_user", MySession::getData("com_sys_user_id"));
    }
	/* value */
	if((isset($REQUEST["sys_date"])) && (!empty($REQUEST["sys_date"]))){
        $device_data_description->__set("sys_date", $REQUEST["sys_date"]);
    }else{
		$sys_date = date('Y-m-d', time());
		$device_data_description->__set("sys_date", $sys_date);
	}
	/* value */
	if((isset($REQUEST["var_qty"])) && (is_numeric($REQUEST["var_qty"]))){
        $device_data_description->__set("var_qty", $REQUEST["var_qty"]);
    }else{
		$device_data_description->__set("var_qty", 1);
	}
	/* value */
	if((isset($REQUEST["defect"])) && (!empty($REQUEST["defect"]))){
        $defect = $REQUEST["defect"];
    }
	/* set where value */
	$queryParams = $device_data_descriptionBoImpl->manage_where_param_1($queryParams, $and_value, $or_value);
}catch( Exception $e ){}
?>
<?php
if(isset($REQUEST["submit"])){
    try{
		/* begin transaction */
        DB::beginTransaction();
		$device_data_id = $device_data_description->__get("device_data");
		if(!is_numeric($device_data_id)){
			throw new Exception("error");
		}
        /* execute */
        $device_data_description_id = $device_data_descriptionBoImpl->f_insert($device_data_description);
		if(!is_numeric($device_data_description_id)){
			throw new Exception("error");
		}
		if((is_array($defect))){
			foreach($defect as $key=>$value){
				$temp = new device_data_defect();
				$temp->__set("device_data_description", $device_data_description_id);
				$temp->__set("defect", $value);
				$temp->__set("sys_date", $device_data_description->__get("sys_date"));
				$temp->__set("sys_user", $device_data_description->__get("sys_user"));
				$device_data_defectBoImpl->f_insert($temp);
			}
		}else{
			$temp = new device_data_defect();
			$temp->__set("device_data_description", $device_data_description_id);
			$temp->__set("defect", $defect);
			$temp->__set("sys_date", $device_data_description->__get("sys_date"));
			$temp->__set("sys_user", $device_data_description->__get("sys_user"));
			$device_data_defectBoImpl->f_insert($temp);
		}
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