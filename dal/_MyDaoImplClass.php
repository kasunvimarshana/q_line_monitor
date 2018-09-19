<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class MyDaoImplClass{
	protected $dbCon;  
	function __construct(){
		$this->dbCon =& DB::getConnection();
	}
    public function __toString(){
		return get_class($this);
	}
    /*
    @throws Exception
    */
    public function f_query($varQuery, $param=null){
		$stmt = $this->dbCon->prepare($varQuery);
        if(is_array($param)){
            foreach($param as $key=>$value){
               $stmt->bindValue($key, $value); 
            }
        }
		$affected = $stmt->execute();
		//return $affected;
        return $stmt;
	}
    /*
    @throws Exception
    */
    public function f_update1($param1, $param2=null, $param3=null, $param4=null){
        $tempQuery1 = array();
        $tempQuery2 = array();
        $tempValue = array();
        $varQuery;
        if( (is_array($param2)) ){
           foreach($param2 as $key=>$value){
                if(is_array($value)){
                    $val = $value["value"];
                    $key1 = (isset($value["key1"]))?$value["key1"]:$key;
                    $key2 = "p2";
                    $key2 .= (isset($value["key2"]))?$value["key2"]:$key;
                    $tempQuery1[] = $key1." = :".$key2;
                    $aKey = ":".$key2;
                    $tempValue[$aKey] = $val;
                }
            }
        }
        if( (is_array($param3)) ){
           foreach($param3 as $key=>$value){
                if(is_array($value)){
                    $val = $value["value"];
                    $op = (isset($value["op"]))?$value["op"]:"=";
                    $key1 = (isset($value["key1"]))?$value["key1"]:$key;
                    $key2 = "p3";
                    $key2 .= (isset($value["key2"]))?$value["key2"]:$key;
                    $tempQuery2[] = $key1." ".$op." :".$key2;
                    $aKey = ":".$key2;
                    $tempValue[$aKey] = $val;
                }
            }
        }
        if(!empty($tempQuery1)){
            $varQuery = "UPDATE {$param1} SET ".implode(" , ", $tempQuery1);
        }
        if( (!empty($varQuery)) && (!empty($tempQuery2)) ){
            $varQuery = "{$varQuery} WHERE ".implode(" AND ", $tempQuery2);
        }
        if(!empty($varQuery)){
            $stmt = $this->dbCon->prepare($varQuery);
            foreach($tempValue as $key=>$value){
                $stmt->bindValue($key, $value);
            }
            $affected = $stmt->execute();
            return $affected;
        }
        return false;
        //return $stmt;
    }
    /*
    @throws Exception
    */
    public function f_query1($varQuery, $param=null, $param1=null){
        if(!is_array($param)){
            throw new Exception(CONS_ERROR[1]);
        }
        $whereQ = array();
        $queryV = array();
        if( (is_array($param)) ){
            foreach($param as $key=>$value){
                if(is_array($value)){
                    $val = $value["value"];
                    $op = (isset($value["op"]))?$value["op"]:"=";
                    $key1 = (isset($value["key1"]))?$value["key1"]:$key;
                    $key2 = (isset($value["key2"]))?$value["key2"]:$key;
                    $whereQ[] = $key1." ".$op." :".$key2;
                    $aKey = ":".$key2;
                    $queryV[$aKey] = $val;
                }
            }
        }
        if( (!empty($varQuery)) && (!empty($whereQ)) ){
            $varQuery = "{$varQuery} WHERE ".implode(" AND ", $whereQ);
        }
        if( (!empty($varQuery)) && (!empty($param1)) ){
            $varQuery = "{$varQuery} {$param1}";
        }
        if(!empty($varQuery)){
            $stmt = $this->dbCon->prepare($varQuery);
            foreach($queryV as $key=>$value){
                $stmt->bindValue($key, $value);
            }
            $affected = $stmt->execute();
            return $stmt;
            /*$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'CommonObjectClass');
            $temp = $stmt->fetch();
            return $temp;*/
        }
        return false;
    }
    /*
    @throws Exception
    */
    public function f_delete1($param1, $param2=null, $param3=null){
        $tempQuery1 = array();
        $tempValue = array();
        $varQuery;
        if(!empty($param1)){
            $varQuery = "DELETE {$param1}";
        }
        if( (is_array($param2)) ){
           foreach($param2 as $key=>$value){
                if(is_array($value)){
                    $val = $value["value"];
                    $op = (isset($value["op"]))?$value["op"]:"=";
                    $key1 = (isset($value["key1"]))?$value["key1"]:$key;
                    $key2 = "p2";
                    $key2 .= (isset($value["key2"]))?$value["key2"]:$key;
                    $tempQuery1[] = $key1." ".$op." :".$key2;
                    $aKey = ":".$key2;
                    $tempValue[$aKey] = $val;
                }
            }
        }
        if(!empty($tempQuery1)){
            $varQuery = "{$varQuery} WHERE ".implode(" AND ", $tempQuery1);
        }
        if(!empty($varQuery)){
            $stmt = $this->dbCon->prepare($varQuery);
            foreach($tempValue as $key=>$value){
                $stmt->bindValue($key, $value);
            }
            $affected = $stmt->execute();
            return $affected;
        }
        return false;
        //return $stmt;
    }
    public function f_callFunction($param1=null){
        
    }
}

?>