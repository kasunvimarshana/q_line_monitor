<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$commonObjectClass = new CommonObjectClass();
$device_dataBoImpl = new device_dataBoImpl();
try{
   $query = "SELECT count(id) as device_dataCount FROM device_data";
   $query = json_encode(array("query_type" => DBQ::CUSTOM_Q, "query" => $query));
   $result = $device_dataBoImpl->f_query1($query);
   if($result){
       $temp = $result->fetch();
       $commonObjectClass->__set("device_dataCount", $temp["device_dataCount"]);
   }
}catch( Exception $e ){
    
}
?>