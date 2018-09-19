<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$com_sys_user = new sys_user();
$com_var_plant = new var_plant();
$com_var_line = new var_line();
$com_device = new device();
$sys_userBoImpl = new sys_userBoImpl();
$var_plantBoImpl = new var_plantBoImpl();
$var_lineBoImpl = new var_lineBoImpl();
$deviceBoImpl = new deviceBoImpl();
$user_role_sys_activityBoImpl = new user_role_sys_activityBoImpl();
$queryParams = array();
$REQUEST = array();
?>
<?php
if( isset($_POST) ){
	$REQUEST = array_merge( $REQUEST, $_POST );
	//unset( $_POST );
}
?>
<?php
if( (isset($REQUEST)) && (!empty($REQUEST)) ){
    try{
        $user_name = isset($REQUEST["user_name"])?$REQUEST["user_name"]:null;
        $user_password = isset($REQUEST["user_password"])?$REQUEST["user_password"]:null;
        $var_plant = isset($REQUEST["var_plant"])?$REQUEST["var_plant"]:null;
        $var_plant = intval($var_plant);
        $var_line = isset($REQUEST["var_line"])?$REQUEST["var_line"]:null;
        $var_line = intval($var_line);
        $com_sys_user->__set("user_name", $user_name);
        $com_sys_user->__set("user_password", $user_password);
        $queryParams["user_name"] = [$com_sys_user->__get("user_name"), "="];
        $queryParams["user_password"] = [$com_sys_user->__get("user_password"), "="];
        $result = $sys_userBoImpl->f_searcWithParams($queryParams);
        if( $result && (is_array($result)) ){
            //$com_sys_user = array_shift($result);
            $com_sys_user = end($result);
        }
        if( (is_a($com_sys_user, "sys_user")) && (!empty($com_sys_user->__get("id"))) ){
			$temp = array();
			$temp["user_role"] = [$com_sys_user->__get("user_role"), "="];
			$result = $user_role_sys_activityBoImpl->f_searcWithParams( $temp );
			if( (is_array($result)) && (!empty($result)) ){
				$sys_activities = array_column($result, 'sys_activity');
				$com_sys_user->__set("sys_activity", $sys_activities);
			}
			MySession::setData("com_sys_user", serialize($com_sys_user));
			MySession::setData("com_sys_user_id", $com_sys_user->__get("id"));
            /* create a log */
            $param = array();
            $param["action"] = "user login";
            $param["user"] = $com_sys_user->__get("id");
            $param["time"] = date('Y-m-d', time());
            f_createLog($param);
        }
		$com_var_plant = $var_plantBoImpl->f_search($var_plant);
        if( (is_a($com_var_plant, "var_plant")) && (!empty($com_var_plant->__get("id"))) ){
			MySession::setData("com_var_plant", serialize($com_var_plant));
			MySession::setData("com_var_plant_id", $com_var_plant->__get("id"));
        }
		$com_var_line = $var_lineBoImpl->f_search($var_line);
        if( (is_a($com_var_line, "var_line")) && (!empty($com_var_line->__get("id"))) ){
			$temp = array();
			$temp["var_line"] = [$com_var_line->__get("id"), "="];
			$com_device = $deviceBoImpl->f_searcWithParams( $temp );
			if( $com_device && (is_array($com_device)) ){
				$com_device = end($com_device);
			}
			if( (is_a($com_device, "device")) && (!empty($com_device->__get("id"))) ){
				MySession::setData("com_device", serialize($com_device));
				MySession::setData("com_device_id", $com_device->__get("id"));
			}
			MySession::setData("com_var_line", serialize($com_var_line));
			MySession::setData("com_var_line_id", $com_var_line->__get("id"));
        }
    }catch( Exception $e ){
        MySession::removeData();
    }
}
?>
<?php
if(MySession::isDataExist("com_sys_user")){
    header('Location: '.VAR_MAINPAGE_URL, true);
    exit();
}
?>