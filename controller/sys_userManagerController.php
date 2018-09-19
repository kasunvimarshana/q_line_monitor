<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$commonObjectClass = new CommonObjectClass();
$sys_userBoImpl = new sys_userBoImpl();
try{
   $query = "SELECT count(id) as sysUserCount FROM sys_user";
   $query = json_encode(array("query_type" => DBQ::CUSTOM_Q, "query" => $query));
   $result = $sys_userBoImpl->f_query1($query);
   if($result){
       $temp = $result->fetch();
       $commonObjectClass->__set("sysUserCount", $temp["sysUserCount"]);
   }
}catch( Exception $e ){
    
}
?>