<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$feedback_result = new CommonObjectClass();
$queryResults = array();
//$set_value = array();
$queryParams = array();
$where_value = array();
$and_value = array();
$or_value = array();
$order_by = array();
$group_by = array();
$recordsTotal = 0;
$recordsFiltered = 0;
$limit = 0;
$offset = 0;
$draw = 0;
$device_data_scan_count = 0;
$device_data_scan_var_qty_sum = 0;
$device_data_scan_var_qty_sum_4 = 0;
$device_data_scan_var_qty_sum_5 = 0;
$device_data_defect_count = 0;
$defect_type_count_1 = 0;
$defect_type_count_2 = 0;
$defect_type_count_3 = 0;
$queryParams1 = array();
$queryParams2 = array();
$and_value1 = array();
$or_value1 = array();
$and_value2 = array();
$or_value2 = array();
$device_data_scanBoImpl = new device_data_scanBoImpl();
$device_dataBoImpl = new device_dataBoImpl();
//$query1 = json_encode(array("query_type" => DBQ::CUSTOM_Q, "query" => $query1));
$query1 = "SELECT COUNT(DISTINCT id) AS device_data_scan_count FROM device_data_scan";
$query2 = "SELECT SUM(var_qty) AS device_data_scan_var_qty_sum FROM device_data_scan";//4:pass, 5:reject
$query3 = <<<EOT
SELECT
COUNT(DISTINCT table_device_data_defect.id) AS device_data_defect_count
FROM device_data AS table_device_data
RIGHT OUTER JOIN device_data_description AS table_device_data_description
ON table_device_data_description.device_data = table_device_data.id
LEFT OUTER JOIN device_data_defect AS table_device_data_defect
ON table_device_data_defect.device_data_description = table_device_data_description.id
LEFT OUTER JOIN defect AS table_defect
ON table_defect.id = table_device_data_defect.defect
LEFT OUTER JOIN defect_type AS table_defect_type
ON table_defect_type.id = table_defect.defect_type    
EOT;
$query4 = <<<EOT
SELECT
COUNT(table_defect_type.id) AS defect_type_count
FROM device_data AS table_device_data
RIGHT OUTER JOIN device_data_description AS table_device_data_description
ON table_device_data_description.device_data = table_device_data.id
LEFT OUTER JOIN device_data_defect AS table_device_data_defect
ON table_device_data_defect.device_data_description = table_device_data_description.id
LEFT OUTER JOIN defect AS table_defect
ON table_defect.id = table_device_data_defect.defect
LEFT OUTER JOIN defect_type AS table_defect_type
ON table_defect_type.id = table_defect.defect_type    
EOT;
$queryParams1["query_type"] = DBQ::CUSTOM_Q;
$queryParams2["query_type"] = DBQ::CUSTOM_Q;
?>
<?php
    /* select object list */
    try{
        if(isset($_REQUEST)){
            $REQUEST = $_REQUEST;
            unset( $_REQUEST );
        }
		/* search value */
        if( (isset($REQUEST['var_line'])) && (!empty($REQUEST['var_line'])) ) {
			$var_line = $REQUEST['var_line'];
			// 1st
			$temp = array();
			if( is_array($var_line) ){
				foreach($var_line as $key=>$value){
					$temp["var_line{$key}"] = array( 
						"key1"  => "var_line", 
						"key2"  => "var_line{$key}",
						"value" => $value, 
						"op"    => "=",
						"key_dt"=> PDO_DT::PARAM_INT
					);
				}
			}else{
				$temp["var_line"] = array( 
					"key1"  => "var_line", 
					"key2"  => "var_line",
					"value" => $var_line, 
					"op"    => "=",
					"key_dt"=> PDO_DT::PARAM_INT
				);
			}
			$or_value1 = array_merge( $or_value1, $temp );
			// 2nd
			$temp = array();
			if( is_array($var_line) ){
				foreach($var_line as $key=>$value){
					$temp["table_device_data.var_line{$key}"] = array( 
						"key1"  => "table_device_data.var_line", 
						"key2"  => "table_device_data_var_line{$key}",
						"value" => $value, 
						"op"    => "=",
						"key_dt"=> PDO_DT::PARAM_INT
					);
				}
			}else{
				$temp["table_device_data.var_line"] = array( 
					"key1"  => "table_device_data.var_line", 
					"key2"  => "table_device_data_var_line",
					"value" => $var_line, 
					"op"    => "=",
					"key_dt"=> PDO_DT::PARAM_INT
				);
			}
			$or_value2 = array_merge( $or_value2, $temp );
		}
		/* search value */
        if( (isset($REQUEST['sys_date_from'])) && (!empty($REQUEST['sys_date_from'])) ) {
			// 1st
			$temp = array();
			$temp["sys_date_from"] = array( 
				"key1"  => "sys_date", 
				"key2"  => "sys_date_from",
				"value" => $REQUEST['sys_date_from'], 
				"op"    => ">=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value1 = array_merge( $and_value1, $temp );
			// 2nd
			$temp = array();
			$temp["sys_date_from"] = array( 
				"key1"  => "table_device_data.sys_date", 
				"key2"  => "table_device_data_sys_date_from",
				"value" => $REQUEST['sys_date_from'], 
				"op"    => ">=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value2 = array_merge( $and_value2, $temp );
		}
		/* search value */
        if( (isset($REQUEST['sys_date_to'])) && (!empty($REQUEST['sys_date_to'])) ) {
			// 1st
			$temp = array();
			$temp["sys_date_to"] = array( 
				"key1"  => "sys_date", 
				"key2"  => "sys_date_to",
				"value" => $REQUEST['sys_date_to'], 
				"op"    => "<=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value1 = array_merge( $and_value1, $temp );
			// 2nd
			$temp = array();
			$temp["sys_date_to"] = array( 
				"key1"  => "table_device_data.sys_date", 
				"key2"  => "table_device_data_sys_date_to",
				"value" => $REQUEST['sys_date_to'], 
				"op"    => "<=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value2 = array_merge( $and_value2, $temp );
		}
		$queryParams1 = $device_data_scanBoImpl->manage_where_param_1($queryParams1, $and_value1, $or_value1);
		$queryParams2 = $device_dataBoImpl->manage_where_param_1($queryParams2, $and_value2, $or_value2);
    }catch(Exception $e){}
	try{
		/* begin transaction */
        DB::beginTransaction();
		/* select data | device_data_scan_count */
        $queryParams1["query"] = $query1;
        $temp_query = json_encode( $queryParams1 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $device_data_scan_count = intval( $temp["device_data_scan_count"] );
        }
		/* select data | device_data_scan_var_qty_sum */
		$and_value_temp = array();
		if((isset($queryParams1["where_value"])) && (isset($queryParams1["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams1["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$queryParams1["where_value"]["and_value"] = $and_value_temp;
		$queryParams1["query"] = $query2;
        $temp_query = json_encode( $queryParams1 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $device_data_scan_var_qty_sum = intval( $temp["device_data_scan_var_qty_sum"] );
        }
		/* select data | device_data_scan_var_qty_sum_4 */
		$and_value_temp = array();
		if((isset($queryParams1["where_value"])) && (isset($queryParams1["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams1["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$temp = array();
		$temp["var_state"] = array( 
			"key1"  => "var_state", 
			"key2"  => "var_state",
			"value" => 4, 
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value_temp = array_merge($and_value_temp, $temp);
		$queryParams1["where_value"]["and_value"] = $and_value_temp;
		$queryParams1["query"] = $query2;
        $temp_query = json_encode( $queryParams1 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $device_data_scan_var_qty_sum_4 = intval( $temp["device_data_scan_var_qty_sum"] );
        }
		/* select data | device_data_scan_var_qty_sum_5 */
		$and_value_temp = array();
		if((isset($queryParams1["where_value"])) && (isset($queryParams1["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams1["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$temp = array();
		$temp["var_state"] = array( 
			"key1"  => "var_state", 
			"key2"  => "var_state",
			"value" => 5, 
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value_temp = array_merge($and_value_temp, $temp);
		$queryParams1["where_value"]["and_value"] = $and_value_temp;
		$queryParams1["query"] = $query2;
        $temp_query = json_encode( $queryParams1 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $device_data_scan_var_qty_sum_5 = intval( $temp["device_data_scan_var_qty_sum"] );
        }
		/* select data | device_data_defect_count */
        $queryParams2["query"] = $query3;
        $temp_query = json_encode( $queryParams2 );
        $result = $device_dataBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $device_data_defect_count = intval( $temp["device_data_defect_count"] );
        }
		/* select data | defect_type_count_1 */
        $and_value_temp = array();
		if((isset($queryParams2["where_value"])) && (isset($queryParams2["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams2["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$temp = array();
		$temp["table_defect_type.id"] = array( 
			"key1"  => "table_defect_type.id", 
			"key2"  => "table_defect_type_id",
			"value" => 1, 
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value_temp = array_merge($and_value_temp, $temp);
		$queryParams2["where_value"]["and_value"] = $and_value_temp;
		$queryParams2["query"] = $query4;
        $temp_query = json_encode( $queryParams2 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $defect_type_count_1 = intval( $temp["defect_type_count"] );
        }
		/* select data | defect_type_count_2 */
        $and_value_temp = array();
		if((isset($queryParams2["where_value"])) && (isset($queryParams2["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams2["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$temp = array();
		$temp["table_defect_type.id"] = array( 
			"key1"  => "table_defect_type.id", 
			"key2"  => "table_defect_type_id",
			"value" => 2, 
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value_temp = array_merge($and_value_temp, $temp);
		$queryParams2["where_value"]["and_value"] = $and_value_temp;
		$queryParams2["query"] = $query4;
        $temp_query = json_encode( $queryParams2 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $defect_type_count_2 = intval( $temp["defect_type_count"] );
        }
		/* select data | defect_type_count_3 */
        $and_value_temp = array();
		if((isset($queryParams2["where_value"])) && (isset($queryParams2["where_value"]["and_value"]))){
			$to_remove = array("var_state");
			$and_value_temp = new ArrayObject($queryParams2["where_value"]["and_value"]);
			$and_value_temp = $and_value_temp->getArrayCopy();
			$and_value_temp = array_diff_key($and_value_temp, array_flip($to_remove));
		}
		$temp = array();
		$temp["table_defect_type.id"] = array( 
			"key1"  => "table_defect_type.id", 
			"key2"  => "table_defect_type_id",
			"value" => 3, 
			"op"    => "=",
			"key_dt"=> PDO_DT::PARAM_INT
		);
		$and_value_temp = array_merge($and_value_temp, $temp);
		$queryParams2["where_value"]["and_value"] = $and_value_temp;
		$queryParams2["query"] = $query4;
        $temp_query = json_encode( $queryParams2 );
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
		   $temp = $result->fetch();
           $defect_type_count_3 = intval( $temp["defect_type_count"] );
        }
		$feedback_result->__set("action_done", 1);
		/* commit */
        DB::commit();
	}catch(Exception $e){
		/* rollback */
        DB::rollBack();
		$feedback_result->__set("action_done", 0);
	}
?>
<?php
$result_datas = json_encode(
	array(
		'data'           => array(
			'device_data_scan_count'=>$device_data_scan_count,
			'device_data_scan_var_qty_sum'=>$device_data_scan_var_qty_sum,
			'device_data_scan_var_qty_sum_4'=>$device_data_scan_var_qty_sum_4,
			'device_data_scan_var_qty_sum_5'=>$device_data_scan_var_qty_sum_5,
			'device_data_defect_count'=>$device_data_defect_count,
			'defect_type_count_1'=>$defect_type_count_1,
			'defect_type_count_2'=>$defect_type_count_2,
			'defect_type_count_3'=>$defect_type_count_3
		),
		'feedback_result'=> $feedback_result,
		'var_date'       => date('Y-m-d', time()),
		'var_time'       => date('G:i:s', time()),
		'dev_date'		 => time()
	)
);
header("Content-Type: application/json; charset=UTF-8");
echo $result_datas;
?>