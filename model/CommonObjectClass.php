<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");

class CommonObjectClass{

    function __construct($attributes = Array()){
        // Apply provided attribute values
        foreach($attributes as $field=>$value){
          $this->$field = $value;
        }
    }
        
    public function __toString(){
        return get_class($this);
    }

    public function __set( $name, $value ){
        if( method_exists( $this, $name ) ){
            $this->$name( $value );
        }
        else{
          // Getter/Setter not defined so set as property of object
          $this->$name = $value;
        }
    }

    public function __get( $name ){
        if( method_exists( $this, $name ) ){
          return $this->$name();
        }
        elseif(property_exists( $this, $name )){
          // Getter/Setter not defined so return property if it exists
          return $this->$name;
        }
        return null;
    }
	
	public function getPublicVars(){
        return call_user_func('get_object_vars', $this);
    }

}

?>