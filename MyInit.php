<?php
    /*set time zone*/
    date_default_timezone_set("Asia/Colombo");
    /*Directory Seperator*/
    !defined('DS') ? define('DS', DIRECTORY_SEPARATOR) : null;
    /*Base Path*/
    //!defined('VAR_BASE_DIR') ? define( 'VAR_BASE_DIR', dirname(__FILE__) ) : null;
    !defined('VAR_BASE_DIR') ? define( 'VAR_BASE_DIR', __DIR__ ) : null;
    /*check protocol http or https*/
    $baseUrlProtocol;
    if ( (isset($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off') ) {
        $baseUrlProtocol  = "https";
    }else{
        $baseUrlProtocol  = "http";
    }
    !defined('VAR_BASE_URLPROTOCOL') ? define('VAR_BASE_URLPROTOCOL', $baseUrlProtocol) : null;
    /*system log dir path*/
    $systemLogDir = VAR_BASE_DIR.DS."logs";
    !defined('VAR_SYSTEMLOG_DIR') ? define('VAR_SYSTEMLOG_DIR', $systemLogDir) : null;
    !defined('VAR_PAGE_ARG') ? define('VAR_PAGE_ARG', 'contentPage') : null;
    /*define base url*/
    $baseUrl = VAR_BASE_URLPROTOCOL."://".$_SERVER['HTTP_HOST']."/site";
    !defined('VAR_BASE_URL') ? define('VAR_BASE_URL', $baseUrl) : null;
    /*main page url*/
    $mainPageUrl = VAR_BASE_URL."/view/mainpage.php";
    !defined('VAR_MAINPAGE_URL') ? define('VAR_MAINPAGE_URL', $mainPageUrl) : null;
    /*loging page url*/
    $loginPageUrl = VAR_BASE_URLPROTOCOL."://".$_SERVER['HTTP_HOST']."/site/index.php";
    !defined('VAR_LOGINPAGE_URL') ? define('VAR_LOGINPAGE_URL', $loginPageUrl) : null;
    /*include common files*/
    require_once(__DIR__.DS."util".DS."ErrorConstant.php");
    require_once(__DIR__.DS."util".DS."CommonFunction.php");
    require_once(__DIR__.DS."util".DS."PageConstant.php");
    require_once(__DIR__.DS."php_lib".DS."fpdf".DS."fpdf.php");
    require_once(__DIR__.DS."php_lib".DS."PHPExcel".DS."Classes".DS."PHPExcel.php");
?>
