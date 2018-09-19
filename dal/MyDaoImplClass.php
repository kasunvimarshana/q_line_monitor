<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class MyDaoImplClass{
	protected $dbCon;
	private $is_and_value;
	function __construct(){
		$this->dbCon =& DB::getConnection();
		$this->is_and_value = false;
	}
    public function __toString(){
		return get_class($this);
	}
    /*
    basic query function
    @param $param array
    @param $varQuery string
    @return statement
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
	/*.*/
    /*
    test method
    @throws Exception
    */
    public function f_callFunction($param1=null){
        
    }
	/*.*/
    /*
    @throws Exception
    */
    public function f_query1( $param = null ){
        /* check the param is a json object or not */
        if( !is_JSON( $param ) ){
           //return false; 
           throw new Exception(CONS_ERROR[1]);
        }
        $param = json_decode( $param );
        $query;
        $bind_value = array();
        /* get the query type from param json (CUSTOM_Q, SELECT_Q, UPDATE_Q, DELETE_Q) */
        if( $param->query_type == DBQ::SELECT_Q ){//select
           $query = "SELECT * FROM ".$param->query; 
        }else if( $param->query_type == DBQ::DELETE_Q ){//delete
           $query = "DELETE FROM ".$param->query; 
        }else if( $param->query_type == DBQ::UPDATE_Q ){//update
           $query = "UPDATE ".$param->query; 
        }else if( $param->query_type == DBQ::CUSTOM_Q ){//custom
           $query = $param->query; 
        }
        /* get the set_value property data from json object */
        /* the set_value is used to update table */
        if( isset( $param->set_value ) ){
            if( (isset($param->set_value)) ){
               $temp_query = array();
               foreach($param->set_value as $key=>$value){
                    if( is_object($value) ){
                        $val = $value->value;
                        $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                        $key2 = "KU";//key update
                        $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                        $temp_query[] = $key1." = :".$key2;
                        $aKey = ":".$key2;
                        if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                            $bind_value[$aKey][0] = $val;
                            $bind_value[$aKey][1] = $value->key_dt;
                        }else{
                            $bind_value[$aKey] = $val;
                        }
                    }
                }
                if(!empty($temp_query)){
                    $query = $query . " SET ".implode(" , ", $temp_query);
                }
            }
        }
        /* get the where_value property data from json object */
        /* the set_value is used in where clause */
        if( isset( $param->where_value ) ){
			if( (!empty( $param->where_value->and_value )) || (!empty( $param->where_value->or_value )) ){
				$query = $query . " WHERE ";
			}
            if( isset( $param->where_value->and_value ) ){//and
                if( (is_object($param->where_value->and_value)) ){
                   $temp_query = array();
                   foreach($param->where_value->and_value as $key=>$value){
                        if( is_object($value) ){
                            $val = $value->value;
                            $op = (isset( $value->op )) ? $value->op : "=";
                            $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                            $key2 = "KW";//key where
                            $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                            $temp_query[] = $key1." ".$op." :".$key2;
                            $aKey = ":".$key2;
                            if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                                $bind_value[$aKey][0] = $val;
                                $bind_value[$aKey][1] = $value->key_dt;
                            }else{
                                $bind_value[$aKey] = $val;  
                            }
                        }
                    }
                    if(!empty($temp_query)){
                        $query = $query . " ".implode(" AND ", $temp_query);
						$this->is_and_value = true;
                    }else{
						$this->is_and_value = false;
					}
                }   
            }
            if( isset( $param->where_value->or_value ) ){//or
                if( (is_object($param->where_value->or_value)) ){
                   $temp_query = array();
                   foreach($param->where_value->or_value as $key=>$value){
                        if( is_object($value) ){
                            $val = $value->value;
                            $op = (isset( $value->op )) ? $value->op : "=";
                            $key1 = (isset( $value->key1 )) ? $value->key1 : $key;
                            $key2 = "KW";//key where
                            $key2 = (isset( $value->key2 )) ? $value->key2 : $key2 . $key;
                            $temp_query[] = $key1." ".$op." :".$key2;
                            $aKey = ":".$key2;
                            if( (isset( $value->key_dt )) && (!empty( $value->key_dt )) ){
                                $bind_value[$aKey][0] = $val;
                                $bind_value[$aKey][1] = $value->key_dt;
                            }else{
                                $bind_value[$aKey] = $val;
                            }
                        }
                    }
                    if(!empty($temp_query)){
						if( $this->is_and_value ){
							$query = $query . " AND ( ".implode(" OR ", $temp_query)." ) ";
						}else{
							$query = $query . " ( ".implode(" OR ", $temp_query)." ) ";
						}
                    }
                }   
            }
        }
        /* get the group_by property data from json object */
        if( isset( $param->group_by ) ){
            if( (is_array($param->group_by)) ){
                if(!empty($param->group_by)){
                    $query = $query . " GROUP BY ".implode(" , ", $param->group_by);
                }
            }
        }
        /* get the order_by property data from json object */
        if( isset( $param->order_by ) ){
            if( (is_object($param->order_by)) ){
               $temp_query = array();
               foreach($param->order_by as $key=>$value){
                    if( is_object($value) ){
                        $column = (isset( $value->column )) ? $value->column : $key;
                        $order = (isset( $value->order )) ? $value->order : "DESC";
                        $temp_query[] = $column." ".$order;
                    }
                }
                if(!empty($temp_query)){
                    $query = $query . " ORDER BY ".implode(" , ", $temp_query);
                }
            }
        }
		/*
        The SQL query below says "return only 10 records, start on record 16 (OFFSET 15)":
        $sql = "SELECT * FROM table_name LIMIT 10 OFFSET 15";
        You could also use a shorter syntax to achieve the same result:
        $sql = "SELECT * FROM table_name LIMIT 15, 10";
        */
        /* get the limit property data from json object */
        if( isset( $param->limit ) ){
            $aKey = ":limit";   
            $query = $query . " LIMIT " . $aKey;   
            $bind_value[$aKey][0] = intval( $param->limit );
            $bind_value[$aKey][1] = PDO_DT::PARAM_INT;
        }
        /* get the offset property data from json object */
        if( isset( $param->offset ) ){
            $aKey = ":offset";
            $query = $query . " OFFSET " . $aKey;   
            $bind_value[$aKey][0] = intval( $param->offset );
            $bind_value[$aKey][1] = PDO_DT::PARAM_INT;
        }
        /* get the query_value property data from json object */
        /* the query_value is used to set custom query value */
        if( isset( $param->query_value ) ){
            if( (is_array($param->query_value)) ){
               foreach($param->query_value as $key=>$value){
                    $key = ":".$key;
                    if( is_object($value) ){
                       $bind_value[$key][0] = $value->value;//value 
                       $bind_value[$key][1] = $value->key_dt;//value's data type
                    }else{
                       $bind_value[$key] = $value; 
                    }  
               }
            }
        }
        /*execute the query*/
        if( !empty($query) ){
			$query = trim( $query );
            $stmt = $this->dbCon->prepare($query);
            foreach($bind_value as $key=>$value){
                if( is_array($value) ){
                   $temp_value = $value[0]; 
                   $temp_datatype = $value[1]; 
                   $stmt->bindValue($key, $temp_value, $temp_datatype);
                }else{
                   $stmt->bindValue($key, $value); 
                } 
            }
            $affected = $stmt->execute();
            return $stmt;
        }
        return null;   
    }
    /*.*/
	/*
    basic query function
    @param1 $param1 array array
    @param2 $param2 array and
    @param3 $param3 array or
    @return array
    @throws Exception
    */
	public function manage_where_param_1($param1 = array(), $param2 = array(), $param3 = array()){
		$where_value = array();
		if( (isset($param1["where_value"])) && (is_array($param1["where_value"])) ){
			$where_value = $param1["where_value"];
			//and values
			if( (isset($where_value["and_value"])) && (is_array($where_value["and_value"])) ){
				$temp = $where_value["and_value"];
				$param2 = array_merge( $temp, $param2 );
				$where_value["and_value"] = $param2;
			}else{
				$where_value["and_value"] = $param2;
			}
			//or values
			if( (isset($where_value["or_value"])) && (is_array($where_value["or_value"])) ){
				$temp = $where_value["or_value"];
				$param3 = array_merge( $temp, $param3 );
				$where_value["or_value"] = $param3;
			}else{
				$where_value["or_value"] = $param3;
			}
		}else{
			$where_value = array_merge( $where_value, array( "and_value" => $param2 ) );
			$where_value = array_merge( $where_value, array( "or_value" => $param3 ) );
		}
		$param1["where_value"] = $where_value;
		return $param1;
	}
	/*.*/
}

?>