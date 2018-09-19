<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$devices = array();
$device = new device();
$deviceBoImpl = new deviceBoImpl();
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
    if(isset($_GET["delete"])){
        $REQUEST["delete"] = $_GET["delete"];
        unset( $_GET["delete"] );
    }
    if(!empty($REQUEST["device_id"])){
        $device->__set("device_id", $REQUEST["device_id"]);
        $searchParams["device_id"] = [$REQUEST["device_id"], "="];
    }
    if(!empty($REQUEST["ip"])){
        $device->__set("ip", $REQUEST["ip"]);
        $searchParams["ip"] = [$REQUEST["ip"], "="];
    }
    if(!empty($REQUEST["description"])){
        $device->__set("description", $REQUEST["description"]);
        $searchParams["description"] = [$REQUEST["description"], "="];
    }
    
}catch( Exception $e ){
    
}
?>
<?php
if(isset($REQUEST["delete"])){
    try{
        /* begin transaction */
        DB::beginTransaction();
        /* execute */
        $deviceBoImpl->f_delete( $REQUEST["delete"] );
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
        /* select devices */
        $devices = $deviceBoImpl->f_searcWithParams($searchParams);
    }catch(Exception $e){}
?>