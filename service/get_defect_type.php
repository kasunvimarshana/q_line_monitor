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
$defect_typeBoImpl = new defect_typeBoImpl();
$query1 = "SELECT COUNT(DISTINCT id) AS data_count FROM defect_type";
//$query1 = json_encode(array("query_type" => DBQ::CUSTOM_Q, "query" => $query1));
$query2 = "SELECT * FROM defect_type";
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
            $temp["name"] = array( 
                "value" => "%". $search ."%", 
                "op"    => "LIKE",
                "key_dt"=> PDO_DT::PARAM_STR
            );
            $temp["code"] = array( 
                "value" => "%". $search ."%", 
                "op"    => "LIKE",
                "key_dt"=> PDO_DT::PARAM_STR
            );
			$temp["description"] = array( 
                "value" => "%". $search ."%", 
                "op"    => "LIKE",
                "key_dt"=> PDO_DT::PARAM_STR
            );
			$or_value = array_merge( $or_value, $temp );
            //$queryParams["where_value"] = array( "or_value" => $temp );
        }
		/* set where value */
		$queryParams = $defect_typeBoImpl->manage_where_param_1($queryParams, $and_value, $or_value);
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
        $order_by["id"] = array( 
            "column"  => "id", 
            "order"   => "DESC"
        );  
        $queryParams["order_by"] = $order_by;
    }catch(Exception $e){}
	try{
		/* begin transaction */
        DB::beginTransaction();
		/* select data */
        $queryParams["query"] = $query2;
        $query2 = json_encode( $queryParams );
        /* get data */
        $result = $defect_typeBoImpl->f_query1($query2);
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
        $result = $defect_typeBoImpl->f_query1($query1);
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