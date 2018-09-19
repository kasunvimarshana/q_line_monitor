<?php

class MySession{
	
	public function __construct($attributes = Array()){
		self::initMySession();
		foreach($attributes as $field=>$value){
		  self::setData($field, $value);
        }
	}
	public static function initMySession(){
		if( !isset($_SESSION) ){
			session_start();
		}
	}
	public function __toString(){
		return get_class($this);
	}
	//check session
	public static function isDataExist( $name ){
		if( isset($_SESSION[$name]) ){
			return true;
		}
		else{
			return false;
		}
	}
	//remove session
	public static function removeData( $name = null ){
		if( !empty($name) ){
            if( isset($_SESSION[$name]) ){
                unset( $_SESSION[$name] );
            }
		}
		else{
			//unset($_SESSION);
			session_unset();
			//session_destroy();
		}
	}
	//get session data
	public static function getData( $name ){
        if( (isset($_SESSION[$name])) ){
			return $_SESSION[$name];
		}
        return null;
	}
	//set session data
	public static function setData( $name , $value ){
        //$type = gettype($value);
		$_SESSION[$name] = $value;
	}
	
}

/*if(!defined('MySession')){
   MySession::initMySession();
   define('MySession', null);
}*/
MySession::initMySession();

?>