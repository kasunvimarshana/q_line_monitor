<?php

    /*
        autoload function
        find the missing classes
        @param $classname string
        @return string
    */
    /*function __autoload($name){
        !defined('VAR_BASE_DIR') ? define('VAR_BASE_DIR', __DIR__) : null;
        $filename = $name.".php";
        $filename = strtolower($filename);
		//$files = new RecursiveDirectoryIterator("..");
        $files = new RecursiveDirectoryIterator(VAR_BASE_DIR);
		$files->setFlags(FileSystemIterator::SKIP_DOTS | FileSystemIterator::UNIX_PATHS);
		$files = new RecursiveIteratorIterator($files);
		foreach($files as $file){
            $filename_tmp = strtolower($file->getFilename());
			if($filename_tmp == $filename){
				include_once($file);
                return;
			}
		}
    }*/
    function __autoload($name){
		$classInclude = require(__DIR__.DIRECTORY_SEPARATOR."ClassInclude.php");
		foreach($classInclude as $key => $value){
			if($name == $key){
				include_once($value);
                return;
			}
		}
    }
    /*
    check valid date (database format)
    @param $date date
           format (Y-m-d)
    @return boolean
    @throws Exception
    */
    function isDateFormat1($date){
        $d = DateTime::createFromFormat("Y-m-d", $date);
        return $d && $d->format("Y-m-d") === $date;
    }
    /*
    check valid date (input field format)
    @param $date date
           format (m/d/Y)
    @return boolean
    @throws Exception
    */
    function isDateFormat2($date){
        $d = DateTime::createFromFormat("m/d/Y", $date);
        return $d && $d->format("m/d/Y") === $date;
    }
    /*
    check valid date
    @param $date date
           format (Y-m-d)
    @param $date date
           format (m/d/Y)
    @return boolean
    @throws Exception
    */
    function checkDateF($date){
        $r1 = isDateFormat1($date);
        $r2 = isDateFormat2($date);
        return $r1 || $r2;
    }
    /*
    get date range
    @param $beginDate date
           format (Y-m-d)
    @param $endDate date
           format (Y-m-d)
    @return boolean
    */
    function getDateRange($beginDate, $endDate){
        $dateRange = array();
        try{
            //$begin = new DateTime('Y-m-d');
            $begin = new DateTime($beginDate);
            $end = new DateTime($endDate);
            $end = $end->modify('+1 day');
            $interval = new DateInterval('P1D');
            $dateRange = new DatePeriod($begin, $interval, $end); 
        }catch(Exception $e){}
        return $dateRange;
    }
    /*create date
    @param $date date
           format (Y-m-d)
    @param $unit string
           (day, month, year)
    @param $number integer
    @param $operator char
           (+, -)
    @return date
    @throws Exception
    */
    function f_getDate($date=null, $unit=null, $number=null, $operator=null){
        $dayUnits = ["day"=>"day", "month"=>"month", "year"=>"year"];
        if(!isDateFormat1($date)){
            $date = date('Y-m-d', time());
        }
        $unit = array_key_exists($unit, $dayUnits) ? $dayUnits[$unit] : "day";
        $number = is_numeric($number) ? $number : 0;
        $rDate = new DateTime($date);
        switch($operator){
            case "+" :
                $un = "+".$number." ".$unit;
                $rDate->modify($un);
                break;
            case "-" :
                $un = "-".$number." ".$unit;
                $rDate->modify($un);
                break;
            default :
                break;
        }
        return $rDate;
    }
    /*redirect page
    @param $page constant
    @throws Exception
    */
    function redirectPageTo($pageArg = null){
        !defined('VAR_PAGE_ARG') ? define('VAR_PAGE_ARG', 'contentPage') : null;
        $page = "";
        if(is_array($pageArg)){
            foreach($pageArg as $key=>$value){
               $pageArgs[] =  $key."=".$value;
            }
            $page = $_SERVER["PHP_SELF"]."?".implode("&", $pageArgs);
		}else{
            $page = $_SERVER["PHP_SELF"]."?".VAR_PAGE_ARG."=".$pageArg;
        }
        //$page = rawurlencode($page);
        header('Location: '.$page);
    }
    /*
    get file extension
    @param $name string
    @return string
    @throws Exception
    */
    function getFileExtension($name){
        $extension = explode(".", $name);
        $extension = strtolower(end($extension));
        return $extension;
    }
    /*
        removeFile function
        remove given file or directory
        @param $name string
    */
    function f_deleteContent($name){
      try{
        if(is_file($name)){
            @unlink($name);
        }else{
            $iterator = new DirectoryIterator($name);
            foreach( $iterator as $fileinfo ){
              if($fileinfo->isDot()){
                  continue;
              }
              if($fileinfo->isDir()){
                if(f_deleteContent($fileinfo->getPathname())){
                    @rmdir($fileinfo->getPathname());
                } 
              }
              if($fileinfo->isFile()){
                @unlink($fileinfo->getPathname());
              }
            }
        }
      }catch( Exception $e ){
         // write log
         return false;
      }
      return true;
    }
    /*
        create log function
        create a log using given data
        @param $param array
    */
    function f_createLog($param, $file = null){
        !defined('VAR_SYSTEMLOG_DIR') ? define('VAR_SYSTEMLOG_DIR', __DIR__) : null;
        if( empty($file) ){
			$file = VAR_SYSTEMLOG_DIR.DIRECTORY_SEPARATOR."systemLog.json";
		}
        try{
            if(!is_array($param)){
               $param = array("log"=>$param); 
            }
            $param_json = json_encode($param, JSON_PRETTY_PRINT);
            file_put_contents($file, $param_json, FILE_APPEND | LOCK_EX);
        }catch(Exception $e){
            return false;
        }
        return true;
    }
    /*
        imageResize function
        resize given image
        @param $name string
        @param $output string
        @param $width double
        @param $height double
        @return string
    */
    function f_getImage($name, $width, $height, $output = null){
        $fileExtensions = array("png", "jpg", "jpeg", "gif");
        try{
            $image;
            $result;
            $fileExtension = getFileExtension($name);
            if( !(in_array($fileExtension, $fileExtensions)) ){
                return false;
            }
            if( empty($output) ){
                $output = time();
            }
            switch( $fileExtension ){
                case "png":
                    $image = imagecreatefrompng($name);
                    $result = imagescale($image, $width, $height);
                    $output = ( $fileExtension == getFileExtension($output) ) ? $output : $output.".png";
                    imagepng($result, $output);
                    break;
                case "jpg":
                    $image = imagecreatefromjpeg($name);
                    $result = imagescale($image, $width, $height);
                    $output = ( $fileExtension == getFileExtension($output) ) ? $output : $output.".jpg";
                    imagejpeg($result, $output);
                    break;
                case "jpeg":
                    $image = imagecreatefromjpeg($name);
                    $result = imagescale($image, $width, $height);
                    $output = ( $fileExtension == getFileExtension($output) ) ? $output : $output.".jpeg";
                    imagejpeg($result, $output);
                    break;
                case "gif":
                    $image = imagecreatefromgif($name);
                    $result = imagescale($image, $width, $height);
                    $output = ( $fileExtension == getFileExtension($output) ) ? $output : $output.".gif";
                    imagegif($result, $output);
                    break;
            }
            imagedestroy($image);
            imagedestroy($result);
        }catch(Exception $e){
           $output = false; 
        }
        return $output;
    }
/*
imageResize function
resize given image
@param $param array
    $param["file"] = url
    $param["width"] = double
    $param["height"] = double
    $param["action"] = action
    $param["quality"] = double
@return image
@throws Exception
*/
function f_getImage1( $param = array() ){
    
    if(isset($param['file']) && !empty($param['file'])){

        $image_path = $param['file'];
        if(file_exists($image_path)){
            $Image = new pjImage();

            $size = @getimagesize($image_path);
            $src_width = $size[0];
            $src_height = $size[1];

            if(isset($param['action']) && $param['action'] == 'resize'){
                if(isset($param['width']) && (int) $param['width'] > 0 && isset($param['height']) && (int) $param['height'] > 0){
                    $Image->loadImage($image_path);
                    $resp = $Image->isConvertPossible();
                    if ($resp['status'] === true){
                        $Image->resize($param['width'], $param['height']);
                    }
                }
            }else if(isset($param['action']) && $param['action'] == 'crop'){

                if(isset($param['width']) && (int) $param['width'] > 0 & (int) $param['width'] < $src_width && isset($param['height']) && (int) $param['height'] > 0 && (int) $param['height'] < $src_height){
                    if(isset($param['crop_pos']) && !empty($param['crop_pos'])){
                        $crop_position = $param['crop_pos'];
                        $x = 0;
                        $y = 0;
                        $w = (int) $param['width'];
                        $h  = (int) $param['height'];
                        switch ($crop_position) {
                            case 'center':
                                $x = round($src_width / 2) - round((int) $param['width'] / 2);
                                $y = round($src_height / 2) - round((int) $param['height'] / 2);
                            ;
                            break;

                            case 'top':
                                $x = round($src_width / 2) - round((int) $param['width'] / 2);
                            ;
                            break;
                            case 'bottom':
                                $x = round($src_width / 2) - round((int) $param['width'] / 2);
                                $y = $src_height - (int) $param['height'];
                            ;
                            break;
                            case 'left':
                                $y = round($src_height / 2) - round((int) $param['height'] / 2);
                            ;
                            break;
                            case 'right':
                                $x = $src_width - (int) $param['width'];
                                $y = round($src_height / 2) - round((int) $param['height'] / 2);
                            ;
                            break;
                        }
                        $Image->loadImage($image_path);
                        $Image->crop($x, $y, $w, $h, $w, $h);
                    }
                }
            }
            if(isset($param['watermark']) && !empty($param['watermark'])){
                $watermarkPosition = isset($param['watermark_pos']) ? $param['watermark_pos'] : 'cc';

                if(isset($param['color'])){
                    $color_arr = explode(",", $param['color']);
                    $valid_color = true;
                    if(count($color_arr) == 3){
                        if((int)$color_arr[0] < 0 || (int)$color_arr[0] > 255 || (int)$color_arr[1] < 0 || (int)$color_arr[1] > 255 || (int)$color_arr[2] < 0 || (int)$color_arr[2] > 255){
                            $valid_color = false;
                        }
                    }else{
                        $valid_color = false;
                    }
                    if($valid_color == true){
                        $Image->setColor($color_arr);
                    }
                }

                $Image->setFontSize(18)->setFont('fonts/arialbd.ttf');
                $Image->setWatermark($param['watermark'], $watermarkPosition);
            }
            $quality = 100;
            if(isset($param['quality']) && (int) $param['quality'] > 0 && (int) $param['quality'] <= 100){
                $quality = $param['quality'];
            }

            $Image->output($quality);		
        }
    }
    
}
/*
check the string is valid json or not
@param $string json
@return boolean
@throws Exception
*/
function is_JSON( $string ){
   return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
/*
convert object to array
@param $data stdClass Object
@return array
@throws Exception
*/
function objectToArray( $data ) {
	if (is_object( $data )) {
		// Gets the properties of the given object
		// with get_object_vars function
		$data = get_object_vars( $data );
	}
	if (is_array( $data )) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $data);
	}
	else {
		// Return array
		return $data;
	}
}
/*
convert array to object
@param $data array
@return stdClass Object
@throws Exception
*/
function arrayToObject( $data ) {
	if (is_array( $data )) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return (object) array_map(__FUNCTION__, $data);
	}
	else {
		// Return object
		return $data;
	}
}

?>
<?php
/*
if(!is_dir('examples')){
    mkdir('examples');
}
*/
?>