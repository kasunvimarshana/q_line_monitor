<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
$REQUEST;
$FILES;
$commonObjectClass = new CommonObjectClass();
$searchParams = array();
$sys_user = new sys_user();
$sys_userBoImpl = new sys_userBoImpl();
$dev_date = date('Y-m-d', time());
try{
    if(isset($_POST)){
        $REQUEST = $_POST;
        unset( $_POST );
    }
    if(isset($_FILES)){
        $FILES = $_FILES;
        unset( $_FILES );
    }
    $sys_user->__set("dev_date", $dev_date);
    if(isset($REQUEST["id"])){
        $sys_user->__set("id", $REQUEST["id"]);
    }
    if(isset($REQUEST["code"])){
        $sys_user->__set("code", $REQUEST["code"]);
    }
    if(isset($REQUEST["name"])){
        $sys_user->__set("name", $REQUEST["name"]);
    }
    if(isset($REQUEST["nic"])){
        $sys_user->__set("nic", $REQUEST["nic"]);
    }
    if(isset($REQUEST["address"])){
        $sys_user->__set("address", $REQUEST["address"]);
    }
    if(isset($REQUEST["phone_1"])){
        $sys_user->__set("phone_1", $REQUEST["phone_1"]);
    }
    /*
    if(isset($REQUEST["image"])){
        $sys_user->__set("image", $REQUEST["image"]);
    }
    */
    if(isset($REQUEST["user_name"])){
        $sys_user->__set("user_name", $REQUEST["user_name"]);
    }
    if(isset($REQUEST["user_password"])){
        $sys_user->__set("user_password", $REQUEST["user_password"]);
    }
    if(isset($REQUEST["sys_date"]) && isDateFormat1($REQUEST["sys_date"])){
        $sys_user->__set("sys_date", $REQUEST["sys_date"]);
    }
    if(isset($REQUEST["description"])){
        $sys_user->__set("description", $REQUEST["description"]);
    }
    
}catch( Exception $e ){
    
}
?>
<?php
if(isset($REQUEST["submit"])){
    try{
        /* begin transaction */
        DB::beginTransaction();
        /* upload file */
        if( (isset($FILES["image"])) && (!empty($FILES['image']["tmp_name"])) ){
           $image = $FILES["image"];
           $imageName = $image["name"];
           $imageTmpName = $image["tmp_name"];
           $key = md5(uniqid());
           $extension = getFileExtension($imageName);
           $tmpFileName = "{$key}.{$extension}";
           $dirName = VAR_BASE_DIR.DS."commons".DS."img".DS."sysUser";
           $imagePath = $dirName.DS.$tmpFileName;
           @move_uploaded_file($imageTmpName, $imagePath);
           $sys_user->__set("image", $imagePath); 
        }
        /* execute */
        $sys_userBoImpl->f_insert( $sys_user );
        /* commit */
        DB::commit();
        /* page redirect */
        redirectPageTo( VAR_CON_SYSUSER );
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
    }
}
?>