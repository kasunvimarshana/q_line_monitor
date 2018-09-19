<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$device = new device();
$device_data = new device_data();
$deviceBoImpl = new deviceBoImpl();
$device_dataBoImpl = new device_dataBoImpl();
$DATE = date('Y-m-d', time());
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
    $device->__set("dev_date", $DATE);
    $device_data->__set("dev_date", $DATE);
    if(isset($REQUEST["id"])){
        $device->__set("id", $REQUEST["id"]);
    }
    if(isset($REQUEST["device_id"])){
        $device->__set("device_id", $REQUEST["device_id"]);
        $device_data->__set("device_id", $REQUEST["device_id"]);
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
        $deviceBoImpl->f_insert( $device );
        $device_dataBoImpl->f_insert( $device_data );
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