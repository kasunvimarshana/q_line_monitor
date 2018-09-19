<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$searchParams = array();
$device_dataBoImpl = new device_dataBoImpl();
$draw = 0;
$recordsTotal = 0;
$recordsFiltered = 0;
$data = null;
$REQUEST;
$query = "SELECT * FROM device_data";
$searchParams["query_type"] = DBQ::CUSTOM_Q;
?>
<?php
    /* select object list */
    //try{
        if(isset($_GET)){
            $REQUEST = $_GET;
            unset( $_GET );
        }
        /* search value */
        if( (isset($REQUEST['search']['value'])) && (!empty($REQUEST['search']['value'])) ) {
            //$query = $query . " WHERE MATCH (id, var_line, var_ip, var_value, sys_date, sys_time) AGAINST (:param_1)";
            //$searchParams["query_value"] = array("param_1" => $REQUEST['search']['value']);
        }
        /* draw property value */
        if( (isset($REQUEST['draw'])) ) {
            $draw = intval($REQUEST['draw']);
        }
        /* limit value */
        if( (isset($REQUEST['length'])) && (!empty($REQUEST['length'])) ) {
            $limit = $REQUEST['length'];
        }
        /* offset value */
        if( (isset($REQUEST['start'])) && (!empty($REQUEST['start'])) ) {
            $offset = $REQUEST['start'];
        }
        /* select device_datas */
        $searchParams["query"] = $query;
        $temps = $device_dataBoImpl->f_searcWithParams($searchParams);
        /*foreach($temps as $temp){
            $device_datas[] = json_encode($temp);
            unset($device_data);
        }*/
    //}catch(Exception $e){}
    $device_datas = json_encode(
        array(
            'draw'           => $draw,
            'recordsTotal'   => 15,
            'recordsFiltered'=> 15,
            'data'           => $temps
        )
    );
    header("Content-Type: application/json; charset=UTF-8");
    echo $device_datas;
?>






