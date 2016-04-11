<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
include_once 'PHPExcel.php';
include_once '../setting.inc';
session_start();
if(!(isset($_SESSION["id"]) && $_SESSION["id"] == $adminid)){
	header("Location:admin.php");		
	exit;
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0); // 選擇sheet
$objPHPExcel->getActiveSheet()->setTitle("參加員工資料"); // 將sheet命名
$string_type = PHPExcel_Cell_DataType::TYPE_STRING;
	
$objPHPExcel->getActiveSheet(0)->setCellValue('A1','編號');
$objPHPExcel->getActiveSheet(0)->setCellValue('B1','組長 - 員工編號');
$objPHPExcel->getActiveSheet(0)->setCellValue('C1','組長 - 姓名');
$objPHPExcel->getActiveSheet(0)->setCellValue('D1','組長 - 電話');
$objPHPExcel->getActiveSheet(0)->setCellValue('E1','組長 - 部門');
$objPHPExcel->getActiveSheet(0)->setCellValue('F1','組員');
$objPHPExcel->getActiveSheet(0)->setCellValue('G1','組員');
$objPHPExcel->getActiveSheet(0)->setCellValue('H1','組員');
$objPHPExcel->getActiveSheet(0)->setCellValue('I1','組員');
$objPHPExcel->getActiveSheet(0)->setCellValue('J1','組員');
$objPHPExcel->getActiveSheet(0)->setCellValue('K1','佈置達人');

$objPHPExcel->getActiveSheet(0)->getColumnDimension('E')->setWidth(18);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setWidth(15);

$objPHPExcel->getActiveSheet(0)->getStyle('A1:K1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet(0)->getStyle('A1:K1')->applyFromArray(
array('fill'     => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'CCCCCC')
		),
    )
);

$query = "SELECT * FROM member WHERE register = 1 and mem_no IN(SELECT DISTINCT team FROM member where register = 1)";
$result = mysql_query($query);
$count = mysql_num_rows($result);

$r = 2;
if($count)
while($row = mysql_fetch_object($result)) {
	$c = 0;
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $row->no);
	$c++;
	$objPHPExcel->getActiveSheet(0)->getCellByColumnAndRow($c, $r)->setValueExplicit($row->mem_no, $string_type);
	$c++;	
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $row->name);
	$c++;	
	$objPHPExcel->getActiveSheet(0)->getCellByColumnAndRow($c, $r)->setValueExplicit($row->tel, $string_type);
	$c++;	
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $row->dept);
	$c++;	
	
	$query2 = "SELECT mem_no, name FROM member WHERE team = ".$row->mem_no." and mem_no != ".$row->mem_no;
	$result2 = mysql_query($query2);
	for ( $i=0; $i< 5; $i++ ){
		list($mem,$name) = mysql_fetch_row($result2);
		$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $mem." ".$name);
		$c++;	
	}
	
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, (($row->pro)?"Yes":""));
	$c++;
	
	$r++;
}
$str = "A1:K".($r-1);
$objPHPExcel->getActiveSheet(0)->getStyle($str)->getBorders()->getAllborders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet(0)->getStyle($str)->getAlignment()->setWrapText(true);

$objPHPExcel->setActiveSheetIndex(0);
$file_name = date("Y").date("m").date("d")."_picnic.xls";

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel;charset=UTF-8');
header('Content-Disposition: attachment;filename='.$file_name);
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
?>


