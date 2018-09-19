<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class deviceDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
		if (!($obj instanceof device)){
			throw new Exception(CONS_ERROR[1]);
		}
        $id = $obj->__get("id");
        $device_id = $obj->__get("device_id");
        $var_ip = $obj->__get("var_ip");
        $var_state = $obj->__get("var_state");
        $description = $obj->__get("description");
        $var_line = $obj->__get("var_line");
        $sys_date = $obj->__get("sys_date");
        $sys_time = $obj->__get("sys_time");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "INSERT INTO device (device_id, var_ip, var_state, description, var_line, sys_date, sys_time, dev_date, sys_meta) VALUES (:device_id, :var_ip, :var_state, :description, :var_line, :sys_date, :sys_time, :dev_date, :sys_meta)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_id', $device_id);
		$stmt->bindParam(':var_ip', $var_ip);
		$stmt->bindParam(':var_state', $var_state);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':var_line', $var_line);
		$stmt->bindParam(':sys_date', $sys_date);
		$stmt->bindParam(':sys_time', $sys_time);
		$stmt->bindParam(':dev_date', $dev_date);
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
		if (!($obj instanceof device)){
			throw new Exception(CONS_ERROR[1]);
		}
		$id = $obj->__get("id");
        $device_id = $obj->__get("device_id");
        $var_ip = $obj->__get("var_ip");
        $var_state = $obj->__get("var_state");
        $description = $obj->__get("description");
        $var_line = $obj->__get("var_line");
        $sys_date = $obj->__get("sys_date");
        $sys_time = $obj->__get("sys_time");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "UPDATE device SET device_id = :device_id, var_ip = :var_ip, var_state = :var_state, description = :description, var_line = :var_line, sys_date = :sys_date, sys_time = :sys_time, sys_meta = :sys_meta WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device_id', $device_id);
		$stmt->bindParam(':var_ip', $var_ip);
		$stmt->bindParam(':var_state', $var_state);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':var_line', $var_line);
		$stmt->bindParam(':sys_date', $sys_date);
		$stmt->bindParam(':sys_time', $sys_time);
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
		$sql = "DELETE FROM device WHERE id = :id LIMIT 1";
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
		$sql = "SELECT * FROM device WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM device";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device');
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
		$sql = "SELECT * FROM device";
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
            $sql = "SELECT * FROM device WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>