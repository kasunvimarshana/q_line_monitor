<?php
/* ALTER TABLE device_data_description ADD CONSTRAINT CON_device_data_description_1 UNIQUE (device_data); */
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class device_data_descriptionDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
        $id = $obj->__get("id");
        $device_data = $obj->__get("device_data");
        $device_data_scan = $obj->__get("device_data_scan");
        $var_qty = $obj->__get("var_qty");
        $sys_user = $obj->__get("sys_user");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
		$sys_meta = $obj->__get("sys_meta");
		$description = $obj->__get("description");
        
		$sql = "INSERT INTO device_data_description (device_data, device_data_scan, var_qty, sys_user, sys_date, dev_date, sys_meta, description) VALUES (:device_data, :device_data_scan, :var_qty, :sys_user, :sys_date, :dev_date, :sys_meta, :description)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_data', $device_data);
		$stmt->bindParam(':device_data_scan', $device_data_scan);
		$stmt->bindParam(':var_qty', $var_qty);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':dev_date', $dev_date);
        $stmt->bindParam(':sys_meta', $sys_meta);
		$stmt->bindParam(':description', $description);
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
        $device_data = $obj->__get("device_data");
        $device_data_scan = $obj->__get("device_data_scan");
        $var_qty = $obj->__get("var_qty");
        $sys_user = $obj->__get("sys_user");
        $sys_date = $obj->__get("sys_date");
        $dev_date = $obj->__get("dev_date");
		$sys_meta = $obj->__get("sys_meta");
		$description = $obj->__get("description");
        
		$sql = "UPDATE device_data_description SET device_data = :device_data, device_data_scan = :device_data_scan, var_qty = :var_qty, sys_user = :sys_user, sys_date = :sys_date, sys_meta = :sys_meta, description = :description WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_data', $device_data);
		$stmt->bindParam(':device_data_scan', $device_data_scan);
		$stmt->bindParam(':var_qty', $var_qty);
		$stmt->bindParam(':sys_user', $sys_user);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':sys_meta', $sys_meta);
        $stmt->bindParam(':description', $description);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		$sql = "DELETE FROM device_data_description WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		$sql = "SELECT * FROM device_data_description WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_description');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM device_data_description";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_description');
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
		$sql = "SELECT * FROM device_data_description";
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
            $sql = "SELECT * FROM device_data_description WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data_description');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>