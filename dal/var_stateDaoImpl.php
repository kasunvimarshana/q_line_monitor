<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class var_lineDaoImpl extends MyDaoImplClass implements DBDal{
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    /*
    @throws Exception
    */
	public function f_insert($obj){
        $id = $obj->__get("id");
        $code = $obj->__get("code");
        $name = $obj->__get("name");
        $description = $obj->__get("description");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_plant = $obj->__get("var_plant");
        
		$sql = "INSERT INTO var_line (code, name, description, dev_date, sys_meta, var_plant) VALUES (:code, :name, :description, :dev_date, :sys_meta, :var_plant)";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':dev_date', $dev_date);
		$stmt->bindParam(':sys_meta', $sys_meta);
		$stmt->bindParam(':var_plant', $var_plant);
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
        $code = $obj->__get("code");
        $name = $obj->__get("name");
        $description = $obj->__get("description");
        $dev_date = $obj->__get("dev_date");
        $sys_meta = $obj->__get("sys_meta");
        $var_plant = $obj->__get("var_plant");
        
		$sql = "UPDATE var_line SET code = :code, name = :name, description = :description, sys_meta = :sys_meta, var_plant = :var_plant WHERE id = :id";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':sys_meta', $sys_meta);
		$stmt->bindParam(':var_plant', $var_plant);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
		$sql = "DELETE FROM var_line WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$affected = $stmt->execute();
		return $affected;
	}
    /*
    @throws Exception
    */
    public function f_search($id){
		$sql = "SELECT * FROM var_line WHERE id = :id LIMIT 1";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'var_line');
		$temp = $stmt->fetch();
        return $temp;
	}
    /*
    @throws Exception
    */
    public function f_list(){
        $temps = array();
		$sql = "SELECT * FROM var_line";
		$stmt = $this->dbCon->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'var_line');
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
		$sql = "SELECT * FROM var_line";
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
            $sql = "SELECT * FROM var_line WHERE ".implode(" AND ", $whereQ);
        }
		$stmt = $this->dbCon->prepare($sql);
        foreach($queryV as $key=>$value){
            $stmt->bindValue($key, $value);
        }
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'var_line');
        $temps = $stmt->fetchAll();
        return $temps;
	}
}

?>