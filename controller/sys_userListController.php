<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$FILES;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$sys_users = array();
$sys_user = new sys_user();
$sys_userBoImpl = new sys_userBoImpl();
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
    if(isset($_GET["delete"])){
        $REQUEST["delete"] = $_GET["delete"];
        unset( $_GET["delete"] );
    }
    if(!empty($REQUEST["code"])){
        $sys_user->__set("code", $REQUEST["code"]);
        $searchParams["code"] = [$REQUEST["code"], "="];
    }
    if(!empty($REQUEST["name"])){
        $sys_user->__set("name", $REQUEST["name"]);
        $searchParams["name"] = [$REQUEST["name"], "="];
    }
    if(!empty($REQUEST["nic"])){
        $sys_user->__set("nic", $REQUEST["nic"]);
        $searchParams["nic"] = [$REQUEST["nic"], "="];
    }
    if(!empty($REQUEST["phone_1"])){
        $sys_user->__set("phone_1", $REQUEST["phone_1"]);
        $searchParams["phone_1"] = [$REQUEST["phone_1"], "="];
    }
    if(!empty($REQUEST["sysDateFrom"])){
        $commonObjectClass->__set("sysDateFrom", $REQUEST["sysDateFrom"]);
        $searchParams["sys_date"] = [$REQUEST["sysDateFrom"], ">="];
    }
    if(!empty($REQUEST["sysDateTo"])){
        $commonObjectClass->__set("sysDateTo", $REQUEST["sysDateTo"]);
        $searchParams["sys_date"] = [$REQUEST["sysDateTo"], "<="];
    }
    
}catch( Exception $e ){
    
}
?>
<?php
if(isset($REQUEST["delete"])){
    try{
        /* begin transaction */
        DB::beginTransaction();
        /* load data */
        $temp = $sys_userBoImpl->f_search( $REQUEST["delete"] );
        /* execute */
        f_deleteContent($temp->__get("image"));
        $sys_userBoImpl->f_delete( $REQUEST["delete"] );
        /* commit */
        DB::commit();
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
    }
}
?>
<?php
    /* select object list */
    try{
        $sys_users = $sys_userBoImpl->f_searcWithParams($searchParams);
    }catch(Exception $e){}
?>