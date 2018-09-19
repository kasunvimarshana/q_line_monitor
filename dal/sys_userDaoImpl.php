<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class sys_userDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
		if (!($obj instanceof sys_user)){
			throw new Exception(CONS_ERROR[1]);
		}
        $id = $obj->__get("id");
        $code = $obj->__get("code");
        $name = $obj->__get("name");
        $address = $obj->__get("address");
        $nic = $obj->__get("nic");
        $phone_1 = $obj->__get("phone_1");
        $var_image = $obj->__get("var_image");
        $user_name = $obj->__get("user_name");
        $user_password = $obj->__get("user_password");
        $user_role = $obj->__get("user_role");
        $description = $obj->__get("description");
        $display_name = $obj->__get("display_name");
        $sys_user = $obj->__get("sys_user");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
        $is_active = $obj->__get("is_active");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "INSERT INTO sys_user (code, name, address, nic, phone_1, var_image, user_name, user_password, user_role, description, display_name, sys_user, sys_date, dev_date, is_active, sys_meta) VALUES (:code, :name, :address, :nic, :phone_1, :var_image, :user_name, :user_password, :user_role, :description, :display_name, :sys_user, :sys_date, :dev_date, :is_active, :sys_meta)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':nic', $nic);
		$stmt->bindParam(':phone_1', $phone_1);
		$stmt->bindParam(':var_image', $var_image);
		$stmt->bindParam(':user_name', $user_name);
		$stmt->bindParam(':user_password', $user_password);
		$stmt->bindParam(':user_role', $user_role);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':display_name', $display_name);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':sys_date', $sys_date);
		$stmt->bindParam(':dev_date', $dev_date);
		$stmt->bindParam(':is_active', $is_active);
		$stmt->bindParam(':sys_meta', $sys_meta);
		$affected = $stmt->execute();
		$insertId;
		if($affected > 0){
			$insertId = $this->dbCon->lastInsertId();
		}
		return $insertId;
	}
    /*
    @throws Exception
    */
    public function f_update($obj){
		if (!($obj instanceof sys_user)){
			throw new Exception(CONS_ERROR[1]);
		}
		$id = $obj->__get("id");
        $code = $obj->__get("code");
        $name = $obj->__get("name");
        $address = $obj->__get("address");
        $nic = $obj->__get("nic");
        $phone_1 = $obj->__get("phone_1");
        $var_image = $obj->__get("var_image");
        $user_name = $obj->__get("user_name");
        $user_password = $obj->__get("user_password");
        $user_role = $obj->__get("user_role");
        $description = $obj->__get("description");
        $display_name = $obj->__get("display_name");
        $sys_user = $obj->__get("sys_user");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
        $is_active = $obj->__get("is_active");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "UPDATE sys_user SET code = :code, name = :name, address = :address, nic = :nic, phone_1 = :phone_1, var_image = :var_image, user_name = :user_name, user_password = :user_password, user_role = :user_role, description = :description, display_name = :display_name, sys_user = :sys_user, sys_date = :sys_date, dev_date = :dev_date, is_active = :is_active, sys_meta = :sys_meta WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':nic', $nic);
		$stmt->bindParam(':phone_1', $phone_1);
		$stmt->bindParam(':var_image', $var_image);
		$stmt->bindParam(':user_name', $user_name);
		$stmt->bindParam(':user_password', $user_password);
		$stmt->bindParam(':user_role', $user_role);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':display_name', $display_name);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':sys_date', $sys_date);
		$stmt->bindParam(':is_active', $is_active);
		$stmt->bindParam(':sys_meta', $sys_meta);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		if(!is_numeric($id)){
			throw new Exception(CONS_ERROR[0]);
		}
		$sql = "DELETE FROM sys_user WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		/*
        if(!is_numeric($id)){
			throw new Exception(CONS_ERROR[1]);
		}
        */
		$sql = "SELECT * FROM sys_user WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_user');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM sys_user";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_user');
        $temps = $stmt->fetchAll();
        return $temps;
	}
    /*
    @throws Exception
    */
    public function f_searcWithParams($params){
		if(!is_array($params)){
			throw new Exception(CONS_ERROR[1]);
		}
        $temps = array();
		$sql = "SELECT * FROM sys_user";
        $whereQ = array();
        $queryV = array();
        foreach($params as $key=>$value){
            if(is_array($value)){
                $val = $value[0];
                $op = ($value[1])?$value[1]:"=";
                $whereQ[] = $key." ".$op." :".$key;
                $aKey = ":".$key;
                $queryV[$aKey] = $val;
            }
        }
        if(!empty($whereQ)){
            $sql = "SELECT * FROM sys_user WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_user');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>