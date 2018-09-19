<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
class sys_metaBoImpl implements DBBll{
    //private daoImplObj;
    private $dev_date;
	function __construct(){
		$this->daoImplObj = new sys_metaDaoImpl();
        $this->dev_date = date('Y-m-d G:i:s', time());
	}
	/*
    @throws Exception
    */
	public function f_insert($obj){
        if (!($obj instanceof sys_meta)){
			throw new Exception(CONS_ERROR[1]);
		}
        $obj->__set("dev_date", $this->dev_date);
		return $this->daoImplObj->f_insert($obj);
	}
    /*
    @throws Exception
    */
    public function f_update($obj){
        if (!($obj instanceof sys_meta)){
			throw new Exception(CONS_ERROR[1]);
		}
        $obj->__set("dev_date", $this->dev_date);
		return $this->daoImplObj->f_update($obj);
	}
    /*
    @throws Exception
    */
    public function f_delete($id){
        if(!is_numeric($id)){
			throw new Exception(CONS_ERROR[0]);
		}
		return $this->daoImplObj->f_delete($id);
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
        return $this->daoImplObj->f_search($id);
	}
    /*
    @throws Exception
    */
    public function f_list(){
        return $this->daoImplObj->f_list();
	}
    /*
    @throws Exception
    */
    public function f_searcWithParams($params){
        return $this->daoImplObj->f_searcWithParams($params);
	}
    /*
    @throws Exception
    */
    public function f_query($varQuery, $param=null){
        return $this->daoImplObj->f_query($varQuery, $param);
    }
    /*
    @throws Exception
    */
    public function f_query1($param1=null){
        return $this->daoImplObj->f_query1($param1);
    }
	/*
    @throws Exception
    */
    public function manage_where_param_1($param1 = array(), $param2 = array(), $param3 = array()){
        return $this->daoImplObj->manage_where_param_1($param1, $param2, $param3);
    }
    /*
    @throws Exception
    */
    public function f_callFunction($param1=null){
        return $this->daoImplObj->f_callFunction($param1);
    }
}

?>