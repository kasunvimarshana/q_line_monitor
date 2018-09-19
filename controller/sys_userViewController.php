<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$sys_user = new sys_user();
$sys_userBoImpl = new sys_userBoImpl();
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
        $sys_user = $sys_userBoImpl->f_search( $REQUEST["id"] );
    }
    
}catch( Exception $e ){
    
}
?>