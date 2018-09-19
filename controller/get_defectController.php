<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
global $commonObjectClass;
global $com_sys_user;
global $com_var_plant;
global $com_var_line;
global $com_device;
global $com_sys_activities;
?>
<?php
$REQUEST = array();
//$commonObjectClass = new CommonObjectClass();
//$feedback_result = new CommonObjectClass();
//$queryResults = array();
//$set_value = array();
//$queryParams = array();
//$where_value = array();
//$and_value = array();
//$or_value = array();
//$order_by = array();
//$group_by = array();
//$recordsTotal = 0;
//$recordsFiltered = 0;
//$limit = 0;
//$offset = 0;
//$draw = 0;
?>
<?php
if(isset($_REQUEST)){
    $REQUEST = $_REQUEST;
    unset( $_REQUEST );
}
?>
<?php
// Prepare new cURL resource
$url = VAR_BASE_URL."/service/get_defect.php";
$REQUEST = urldecode( http_build_query($REQUEST) );
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLINFO_HEADER_OUT, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $REQUEST);
// Set HTTP Header for POST request 
/*curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: multipart/form-data'
    )
);*/
// Submit the POST request
$result = curl_exec($curl);
// Close cURL session handle
curl_close($curl);
?>
<?php
header("Content-Type: application/json; charset=UTF-8");
echo $result;
?>