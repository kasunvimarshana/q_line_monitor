<?php
function xlsBOF() {
	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
}
function xlsEOF() {
	echo pack("ss", 0x0A, 0x00);
}
function xlsWriteNumber($Row, $Col, $Value) {
	echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
	echo pack("d", $Value);
}
function xlsWriteLabel($Row, $Col, $Value) {
	$L = strlen($Value);
	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
	echo $Value;
} 
// prepare headers information
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=\"export_".date("Y-m-d").".xls\"");
header("Content-Transfer-Encoding: binary");
header("Pragma: no-cache");
header("Expires: 0");
// start exporting
xlsBOF();
// first row 
xlsWriteLabel(0, 0, "id");
xlsWriteLabel(0, 1, "name");
xlsWriteLabel(0, 2, "email");
// second row 
xlsWriteNumber(1, 0, 1);
xlsWriteLabel(1, 1, "name 1");
xlsWriteLabel(1, 2, "mail 1");
// third row 
xlsWriteNumber(2, 0, 2);
xlsWriteLabel(2, 1, "name 2");
xlsWriteLabel(2, 2, "mail 2");
// end exporting
xlsEOF();
?>