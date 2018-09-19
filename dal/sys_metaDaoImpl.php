<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class sys_metaDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
        $id = $obj->__get("id");
        $meta_key = $obj->__get("meta_key");
        $meta_value = $obj->__get("meta_value");
        $description = $obj->__get("description");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "INSERT INTO sys_meta (meta_key, meta_value, description, dev_date, sys_meta) VALUES (:meta_key, :meta_value, :description, :dev_date, :sys_meta)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':meta_key', $meta_key);
		$stmt->bindParam(':meta_value', $meta_value);
		$stmt->bindParam(':description', $description);
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
		$id = $obj->__get("id");
        $meta_key = $obj->__get("meta_key");
        $meta_value = $obj->__get("meta_value");
        $description = $obj->__get("description");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        
		$sql = "UPDATE sys_meta SET meta_key = :meta_key, meta_value = :meta_value, description = :description, sys_meta = :sys_meta WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':meta_key', $meta_key);
		$stmt->bindParam(':meta_value', $meta_value);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':sys_meta', $sys_meta);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		$sql = "DELETE FROM sys_meta WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		$sql = "SELECT * FROM sys_meta WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_meta');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM sys_meta";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_meta');
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
		$sql = "SELECT * FROM sys_meta";
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
            $sql = "SELECT * FROM sys_meta WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'sys_meta');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>