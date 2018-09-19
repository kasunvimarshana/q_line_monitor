<?php
/* ALTER TABLE device_data_defect ADD CONSTRAINT CON_device_data_defect_1 UNIQUE (device_data_description ,defect); */
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class device_data_defectDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
        $id = $obj->__get("id");
        $device_data_description = $obj->__get("device_data_description");
        $defect = $obj->__get("defect");
        $sys_user = $obj->__get("sys_user");
        $description = $obj->__get("description");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_qty = $obj->__get("var_qty");
        
		$sql = "INSERT INTO device_data_defect (device_data_description, defect, sys_user, description, sys_date, dev_date, sys_meta, var_qty) VALUES (:device_data_description, :defect, :sys_user, :description, :sys_date, :dev_date, :sys_meta, :var_qty)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_data_description', $device_data_description);
		$stmt->bindParam(':defect', $defect);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':dev_date', $dev_date);
        $stmt->bindParam(':sys_meta', $sys_meta);
        $stmt->bindParam(':var_qty', $var_qty);
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
		$id = $obj->__get("id");
        $device_data_description = $obj->__get("device_data_description");
        $defect = $obj->__get("defect");
        $sys_user = $obj->__get("sys_user");
        $description = $obj->__get("description");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_qty = $obj->__get("var_qty");
        
		$sql = "UPDATE device_data_defect SET device_data_description = :device_data_description, defect = :defect, sys_user = :sys_user, description = :description, sys_date = :sys_date, var_qty = :var_qty WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_data_description', $device_data_description);
		$stmt->bindParam(':defect', $defect);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':sys_meta', $sys_meta);
        $stmt->bindParam(':var_qty', $var_qty);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		$sql = "DELETE FROM device_data_defect WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		$sql = "SELECT * FROM device_data_defect WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_defect');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM device_data_defect";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_defect');
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
		$sql = "SELECT * FROM device_data_defect";
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
            $sql = "SELECT * FROM device_data_defect WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_defect');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>