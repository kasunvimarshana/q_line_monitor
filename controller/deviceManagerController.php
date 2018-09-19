<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$commonObjectClass = new CommonObjectClass();
$deviceBoImpl = new deviceBoImpl();
try{
   $query = "SELECT count(id) as deviceCount FROM device";
   $result = $deviceBoImpl->f_query($query);
   if($result){
       $temp = $result->fetch();
       $commonObjectClass->__set("deviceCount", $temp["deviceCount"]);
   }
}catch( Exception $e ){
    
}
?>