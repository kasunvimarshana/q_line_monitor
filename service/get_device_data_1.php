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
$device_dataBoImpl = new device_dataBoImpl();
$query1 = <<<EOT
SELECT COUNT(DISTINCT table_device_data.id) AS data_count 

FROM device AS table_device
RIGHT OUTER JOIN device_data AS table_device_data
ON table_device_data.device = table_device.id
LEFT OUTER JOIN var_line AS table_var_line
ON table_var_line.id = table_device_data.var_line
LEFT OUTER JOIN var_plant AS table_var_plant
ON table_var_plant.id = table_var_line.var_plant
LEFT OUTER JOIN device_data_description AS table_device_data_description
ON table_device_data_description.device_data = table_device_data.id
LEFT OUTER JOIN device_data_scan AS table_device_data_scan
ON table_device_data_scan.id = table_device_data_description.device_data_scan
LEFT OUTER JOIN sys_user AS table_sys_user
ON table_sys_user.id = table_device_data_description.sys_user
LEFT OUTER JOIN var_state AS table_var_state
ON table_var_state.id = table_device_data.var_state
EOT;
//$query1 = json_encode(array("query_type" => DBQ::CUSTOM_Q, "query" => $query1));
$query2 = <<<EOT
SELECT
table_device.id AS device,
table_device_data.id AS device_data,
table_var_line.id AS var_line,
table_var_plant.id AS var_plant,
table_device_data_description.id AS device_data_description,
table_device_data_scan.id AS device_data_scan,
table_sys_user.id AS sys_user,
table_var_state.id AS var_state,
table_device_data.var_value AS device_data_var_value,
table_device_data.sys_date AS device_data_sys_date,
table_device_data.sys_time AS device_data_sys_time,
table_device_data_description.var_qty AS device_data_description_var_qty,
table_device_data_scan.code AS device_data_scan_code,
table_device_data_scan.var_state AS device_data_scan_var_state,
table_var_line.code AS var_line_code,
table_var_plant.code AS var_plant_code,
table_var_line.name AS var_line_name,
table_var_plant.name AS var_plant_name

FROM device AS table_device
RIGHT OUTER JOIN device_data AS table_device_data
ON table_device_data.device = table_device.id
LEFT OUTER JOIN var_line AS table_var_line
ON table_var_line.id = table_device_data.var_line
LEFT OUTER JOIN var_plant AS table_var_plant
ON table_var_plant.id = table_var_line.var_plant
LEFT OUTER JOIN device_data_description AS table_device_data_description
ON table_device_data_description.device_data = table_device_data.id
LEFT OUTER JOIN device_data_scan AS table_device_data_scan
ON table_device_data_scan.id = table_device_data_description.device_data_scan
LEFT OUTER JOIN sys_user AS table_sys_user
ON table_sys_user.id = table_device_data_description.sys_user
LEFT OUTER JOIN var_state AS table_var_state
ON table_var_state.id = table_device_data.var_state    
EOT;
$queryParams["query_type"] = DBQ::CUSTOM_Q;
?>
<?php
    /* select object list */
    try{
        if(isset($_REQUEST)){
            $REQUEST = $_REQUEST;
            unset( $_REQUEST );
        }
		/* search value */
        if( (isset($REQUEST['search'])) && (!empty($REQUEST['search'])) ) {
			$search = $REQUEST['search'];
			if( (isset($search['value'])) && (!empty($search['value'])) ) {
				$search = $search['value'];	
			}
			if( (is_array($search)) || (is_object($search)) ) {
				$search = null;	
			}
			$temp = array();
			$temp["table_device_data.var_value"] = array( 
                "key1"  => "table_device_data.var_value", 
                "key2"  => "table_device_data_var_value", 
                "value" => "%". $search ."%", 
                "op"    => "LIKE",
                "key_dt"=> PDO_DT::PARAM_INT
            );
            $temp["table_device_data_scan.code"] = array( 
                "key1"  => "table_device_data_scan.code", 
                "key2"  => "table_device_data_scan_code", 
                "value" => "%". $search ."%", 
                "op"    => "LIKE",
                "key_dt"=> PDO_DT::PARAM_STR
            );
			$or_value = array_merge( $or_value, $temp );
            //$queryParams["where_value"] = array( "or_value" => $temp );
        }
		/* search value */
        if( (isset($REQUEST['var_line'])) && (!empty($REQUEST['var_line'])) ) {
			$temp = array();
			$var_line = $REQUEST['var_line'];
			if( is_array($var_line) ){
				foreach($var_line as $key=>$value){
					$temp["table_var_line.id{$key}"] = array( 
						"key1"  => "table_var_line.id", 
						"key2"  => "table_var_line_id{$key}",
						"value" => $value, 
						"op"    => "LIKE",
						"key_dt"=> PDO_DT::PARAM_INT
					);
				}
			}else{
				$temp["table_var_line.id"] = array( 
					"key1"  => "table_var_line.id", 
					"key2"  => "table_var_line_id",
					"value" => $var_line, 
					"op"    => "LIKE",
					"key_dt"=> PDO_DT::PARAM_INT
				);
			}
			$and_value = array_merge( $and_value, $temp );
		}
        /* search value */
        if( (isset($REQUEST['sys_date_from'])) && (!empty($REQUEST['sys_date_from'])) ) {
			$temp = array();
			$temp["sys_date_from"] = array( 
				"key1"  => "table_device_data.sys_date", 
				"key2"  => "table_device_data_sys_date_from",
				"value" => $REQUEST['sys_date_from'], 
				"op"    => ">=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value = array_merge( $and_value, $temp );
		}
		/* search value */
        if( (isset($REQUEST['sys_date_to'])) && (!empty($REQUEST['sys_date_to'])) ) {
			$temp = array();
			$temp["sys_date_to"] = array( 
				"key1"  => "table_device_data.sys_date", 
				"key2"  => "table_device_data_sys_date_to",
				"value" => $REQUEST['sys_date_to'], 
				"op"    => "<=",
				"key_dt"=> PDO_DT::PARAM_STR
			);
			$and_value = array_merge( $and_value, $temp );
		}
		/* set where value */
		$queryParams = $device_dataBoImpl->manage_where_param_1($queryParams, $and_value, $or_value);
        /* limit value */
        if( (isset($REQUEST['length'])) && (!empty($REQUEST['length'])) ) {
            $limit = intval( $REQUEST['length'] );
            $limit = abs( $limit );
            $queryParams["limit"] = $limit;
        }
        /* offset value */
		if( (isset($REQUEST['start'])) && (!empty($REQUEST['start'])) ) {
            $offset = intval( $REQUEST['start'] );
			$offset = abs( $offset );
            $queryParams["offset"] = $offset;
        }
		if( (isset($REQUEST['page'])) && (!empty($REQUEST['page'])) ) {
            $offset = intval( $REQUEST['page'] );
            $offset = abs( ( ( $offset - 1 ) * $limit ) );
            $queryParams["offset"] = $offset;
        }
		/* draw property value */
        if( (isset($REQUEST['draw'])) && (!empty($REQUEST['draw'])) ) {
            $draw = intval( $REQUEST['draw'] );
        }
		/* query order */
        $order_by["table_device_data.id"] = array( 
            "column"  => "table_device_data.id", 
            "order"   => "DESC"
        );
        /*$order_by["table_device_data_scan.id"] = array( 
            "column"  => "table_device_data_scan.id", 
            "order"   => "DESC"
        );*/
        $queryParams["order_by"] = $order_by;
    }catch(Exception $e){}
	try{
		/* begin transaction */
        DB::beginTransaction();
		/* select data */
        $queryParams["query"] = $query2;
        $query2 = json_encode( $queryParams );
        /* get data */
        $result = $device_dataBoImpl->f_query1($query2);
        if( isset($result) ){
           $queryResults = $result->fetchAll();
           $recordsFiltered = intval( count($queryResults, 0) );//0 = Does not count all elements of multidimensional arrays 
        }
		/* get data count */
		$to_remove = array("query", "order_by", "limit", "offset", "group_by");
		$queryParams1 = new ArrayObject( $queryParams );
		$queryParams1 = $queryParams1->getArrayCopy();
		$queryParams1 = array_diff_key($queryParams1, array_flip($to_remove));
		$queryParams1["query"] = $query1;
		$query1 = json_encode( $queryParams1 );
        $result = $device_dataBoImpl->f_query1($query1);
        if( isset($result) ){
           $temp = $result->fetch();
           $recordsTotal = intval( $temp["data_count"] );
        }
		$feedback_result->__set("action_done", 1);
		/* commit */
        DB::commit();
	}catch(Exception $e){
		/* rollback */
        DB::rollBack();
		$queryResults = null;
		$recordsTotal = 0;
		$recordsFiltered = 0;
		$feedback_result->__set("action_done", 0);
	}
?>
<?php
$result_datas = json_encode(
	array(
		'recordsTotal'   => $recordsTotal,
		'recordsFiltered'=> $recordsTotal,
		'data'           => $queryResults,
		'length'         => $limit,
		'draw'           => $draw,
		'feedback_result'=> $feedback_result,
		'var_date'       => date('Y-m-d', time()),
		'var_time'       => date('G:i:s', time()),
		'dev_date'		 => time()
	)
);
header("Content-Type: application/json; charset=UTF-8");
echo $result_datas;
?>