<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$device = new device();
$deviceBoImpl = new deviceBoImpl();
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
    if(isset($_GET["id"])){
        $REQUEST["id"] = $_GET["id"];
        unset( $_GET["id"] );
    }
    if(isset($REQUEST["id"])){
        $device = $deviceBoImpl->f_search( $REQUEST["id"] );
    }
    if(isset($REQUEST["device_id"])){
        $device->__set("device_id", $REQUEST["device_id"]);
    }
    if(isset($REQUEST["ip"])){
        $device->__set("ip", $REQUEST["ip"]);
    }
    if(isset($REQUEST["sys_date"])){
        $device->__set("sys_date", $REQUEST["sys_date"]);
    }
    if(isset($REQUEST["sys_time"])){
        $device->__set("sys_time", $REQUEST["sys_time"]);
    }
    if(isset($REQUEST["description"])){
        $device->__set("description", $REQUEST["description"]);
    }
    if(isset($REQUEST["is_active"])){
        $device->__set("is_active", $REQUEST["is_active"]);
    }
    
}catch( Exception $e ){
    
}
?>
<?php
if(isset($REQUEST["submit"])){
    try{
        /* begin transaction */
        DB::beginTransaction();
        /* execute */
        $deviceBoImpl->f_update( $device );
        /* commit */
        DB::commit();
        /* page redirect */
        redirectPageTo( VAR_CON_DEVICE );
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
    }
}
?>