<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."myCommonInclude.php");
?>
<?php
global $commonObjectClass;
global $com_sys_user;
global $com_var_plant;
global $com_var_line;
global $com_device;
global $com_sys_activities;
?>
<?php
$REQUEST = array();
$commonObjectClass = new CommonObjectClass();
$feedback_result = new CommonObjectClass();
$queryResults = array();
$set_value = array();
$queryParams = array();
$where_value = array();
$and_value = array();
$or_value = array();
$order_by = array();
$group_by = array();
$recordsTotal = 0;
$recordsFiltered = 0;
$limit = 0;
$offset = 0;
$draw = 0;
$device_data_scanBoImpl = new device_data_scanBoImpl();
$query1 = <<<EOT
SELECT
table_device_data_scan.sys_date AS device_data_scan_sys_date,
table_var_plant.code AS var_plant_code,
table_var_line.code AS var_line_code,
table_device_data_scan.code AS device_data_scan_code,
table_device_data_scan.var_qty AS device_data_scan_var_qty,
table_var_state.name AS var_state_name,
table_defect_type.code AS defect_type_code,
table_defect_type.name AS defect_type_name,
table_defect.code AS defect_code,
table_defect.name AS defect_name,
COUNT(table_device_data_defect.defect) AS defect_count
FROM device_data_scan AS table_device_data_scan
LEFT OUTER JOIN device_data_description AS table_device_data_description
ON table_device_data_description.device_data_scan = table_device_data_scan.id
LEFT OUTER JOIN var_state AS table_var_state
ON table_var_state.id = table_device_data_scan.var_state
LEFT OUTER JOIN var_line AS table_var_line
ON table_var_line.id = table_device_data_scan.var_line
LEFT OUTER JOIN var_plant AS table_var_plant
ON table_var_plant.id = table_var_line.var_plant
LEFT OUTER JOIN device_data_defect AS table_device_data_defect
ON table_device_data_defect.device_data_description = table_device_data_description.id
LEFT OUTER JOIN defect AS table_defect
ON table_defect.id = table_device_data_defect.defect
LEFT OUTER JOIN defect_type AS table_defect_type
ON table_defect_type.id = table_defect.defect_type
EOT;
$queryParams["query_type"] = DBQ::CUSTOM_Q;
?>
<?php
if(isset($_REQUEST)){
    $REQUEST = $_REQUEST;
    unset( $_REQUEST );
}
?>
<?php
try{
    /* value */
    if( (isset($REQUEST['sys_date_from'])) && (!empty($REQUEST['sys_date_from'])) ) {
        $temp = array();
        $temp["sys_date_from"] = array( 
            "key1"  => "table_device_data_scan.sys_date", 
            "key2"  => "table_device_data_scan_sys_date_from",
            "value" => $REQUEST['sys_date_from'], 
            "op"    => ">=",
            "key_dt"=> PDO_DT::PARAM_STR
        );
        $and_value = array_merge( $and_value, $temp );
    }
    /* value */
    if( (isset($REQUEST['sys_date_to'])) && (!empty($REQUEST['sys_date_to'])) ) {
        $temp = array();
        $temp["sys_date_to"] = array( 
            "key1"  => "table_device_data_scan.sys_date", 
            "key2"  => "table_device_data_scan_sys_date_to",
            "value" => $REQUEST['sys_date_to'], 
            "op"    => "<=",
            "key_dt"=> PDO_DT::PARAM_STR
        );
        $and_value = array_merge( $and_value, $temp );
    }
	/* set where value */
	$queryParams = $device_data_scanBoImpl->manage_where_param_1($queryParams, $and_value, $or_value);
    /* query group */
    $group_by[] = "table_device_data_scan.id";
    $group_by[] = "table_defect.id";
    $queryParams["group_by"] = $group_by;
    /* query order */
    $order_by["table_device_data_scan.id"] = array( 
        "column"  => "table_device_data_scan.id", 
        "order"   => "ASC"
    );  
    $queryParams["order_by"] = $order_by;
}catch( Exception $e ){}
?>
<?php
$REQUEST["submit"] = true;
if(isset($REQUEST["submit"])){
    try{
		/* begin transaction */
        DB::beginTransaction();
        /* select data */
        $queryParams["query"] = $query1;
        $temp_query = json_encode( $queryParams );
        /* get data */
        $result = $device_data_scanBoImpl->f_query1($temp_query);
        if( isset($result) ){
           $queryResults = $result->fetchAll(); 
        }
		$feedback_result->__set("action_done", 1);
		/* commit */
        DB::commit();
    }catch( Exception $e ){
        /* rollback */
        DB::rollBack();
		$feedback_result->__set("action_done", 0);
    }
}
?>
<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
if( (isset($queryResults)) && (is_array($queryResults)) ){
    $phpExcel = new PHPExcel;
    // Setting font to Arial Black
    //$phpExcel->getDefaultStyle()->getFont()->setName('Arial Black');
    // Setting font size
    $phpExcel->getDefaultStyle()->getFont()->setSize(14);
    //Setting description, creator and title
    $phpExcel ->getProperties()->setTitle("Q Line Monitor");
    $phpExcel ->getProperties()->setCreator("Brandix");
    $phpExcel ->getProperties()->setDescription("Excel SpreadSheet");
    // Creating PHPExcel spreadsheet writer object
    // We will create xlsx file (Excel 2007 and above)
    $writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
    // When creating the writer object, the first sheet is also created
    // We will get the already created sheet
    $sheet = $phpExcel ->getActiveSheet();
    // Setting title of the sheet
    $sheet->setTitle('Q Line Monitor SpreadSheet');
    // Creating spreadsheet header
    $sheet ->getCell('A1')->setValue('Date');
    $sheet ->getCell('B1')->setValue('Plant');
    $sheet ->getCell('C1')->setValue('Line');
    $sheet ->getCell('D1')->setValue('Scan');
    $sheet ->getCell('E1')->setValue('State');
    $sheet ->getCell('F1')->setValue('Defect Type');
    $sheet ->getCell('G1')->setValue('Defect Code');
    $sheet ->getCell('H1')->setValue('Defect Name');
    $sheet ->getCell('I1')->setValue('Qty');
    // Making headers text bold and larger
    $sheet->getStyle('A1:I1')->getFont()->setBold(true)->setSize(14);
    // Insert product data
    // Autosize the columns
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    $sheet->getColumnDimension('I')->setAutoSize(true);
    // Creating spreadsheet body
    foreach( $queryResults AS $key=>$value){
        $row = ($key + 2);
        $device_data_scan_sys_date = $value["device_data_scan_sys_date"];
        $var_plant_code = $value["var_plant_code"];
        $var_line_code = $value["var_line_code"];
        $device_data_scan_code = $value["device_data_scan_code"];
        $var_state_name = $value["var_state_name"];
        $defect_type_name = $value["defect_type_name"];
        $defect_code = $value["defect_code"];
        $defect_name = $value["defect_name"];
        $defect_count = $value["defect_count"];
        $sheet->setCellValueByColumnAndRow(0, $row, $device_data_scan_sys_date);
        $sheet->setCellValueByColumnAndRow(1, $row, $var_plant_code);
        $sheet->setCellValueByColumnAndRow(2, $row, $var_line_code);
        $sheet->setCellValueByColumnAndRow(3, $row, $device_data_scan_code);
        $sheet->setCellValueByColumnAndRow(4, $row, $var_state_name);
        $sheet->setCellValueByColumnAndRow(5, $row, $defect_type_name);
        $sheet->setCellValueByColumnAndRow(6, $row, $defect_code);
        $sheet->setCellValueByColumnAndRow(7, $row, $defect_name);
        $sheet->setCellValueByColumnAndRow(8, $row, $defect_count);
    }
    // Save the spreadsheet
    $writer->save('php://output');
}
?>