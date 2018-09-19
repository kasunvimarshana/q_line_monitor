<?php
    //$baseDir = dirname(dirname(__FILE__));
    $baseDir = dirname(__DIR__);
    $common = array(
        "DB" => __DIR__.DIRECTORY_SEPARATOR."DB.php",
    );
    $model = include($baseDir.DS."model".DIRECTORY_SEPARATOR."ClassInclude.php");
    $dal = include($baseDir.DS."dal".DIRECTORY_SEPARATOR."ClassInclude.php");
    $bll = include($baseDir.DS."bll".DIRECTORY_SEPARATOR."ClassInclude.php");
    $temp = array_merge($common, $model, $dal, $bll);
    return $temp;
?>