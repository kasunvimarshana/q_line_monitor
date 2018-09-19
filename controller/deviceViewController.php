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
}catch( Exception $e ){
    
}
?>