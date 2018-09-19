<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class device_dataDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
        $id = $obj->__get("id");
        $device = $obj->__get("device");
        $var_line = $obj->__get("var_line");
        $var_ip = $obj->__get("var_ip");
        $var_value = $obj->__get("var_value");
        $sys_date = $obj->__get("sys_date");
        $sys_time = $obj->__get("sys_time");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_state = $obj->__get("var_state");
        
		$sql = "INSERT INTO device_data (device, var_line, var_ip, var_value, sys_date, sys_time, dev_date, sys_meta, var_state) VALUES (:device, :var_line, :var_ip, :var_value, :sys_date, :sys_time, :dev_date, :sys_meta, :var_state)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':device', $device);
		$stmt->bindParam(':var_line', $var_line);
		$stmt->bindParam(':var_ip', $var_ip);
		$stmt->bindParam(':var_value', $var_value);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':sys_time', $sys_time);
        $stmt->bindParam(':dev_date', $dev_date);
        $stmt->bindParam(':sys_meta', $sys_meta);
        $stmt->bindParam(':var_state', $var_state);
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
        $device = $obj->__get("device");
        $var_line = $obj->__get("var_line");
        $var_ip = $obj->__get("var_ip");
        $var_value = $obj->__get("var_value");
        $sys_date = $obj->__get("sys_date");
        $sys_time = $obj->__get("sys_time");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_state = $obj->__get("var_state");
        
		$sql = "UPDATE device_data SET device = :device, var_line = :var_line, var_ip,  = :var_ip, var_value = :var_value, sys_date = :sys_date, sys_time = :sys_time, sys_meta = :sys_meta, var_state = :var_state WHERE id = :id";
		$stmt->bindParam(':device', $device);
		$stmt->bindParam(':var_line', $var_line);
		$stmt->bindParam(':var_ip', $var_ip);
		$stmt->bindParam(':var_value', $var_value);
		$stmt->bindParam(':sys_date', $sys_date);
        $stmt->bindParam(':sys_time', $sys_time);
        $stmt->bindParam(':sys_meta', $sys_meta);
        $stmt->bindParam(':var_state', $var_state);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		$sql = "DELETE FROM device_data WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		$sql = "SELECT * FROM device_data WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM device_data";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data');
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
		$sql = "SELECT * FROM device_data";
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
            $sql = "SELECT * FROM device_data WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'device_data');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>