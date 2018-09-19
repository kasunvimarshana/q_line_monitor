<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
    $result_datas = json_encode(
        array(
            'var_date'       => date('Y-m-d', time()),
            'var_time'       => date('G:i:s', time()),
			'dev_date'		 => time()
        )
    );
    header("Content-Type: application/json; charset=UTF-8");
    echo $result_datas;
?>