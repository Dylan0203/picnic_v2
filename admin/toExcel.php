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
$objPHPExcel->getActiveSheet(0)->setCellValue('B1','員工編號');
$objPHPExcel->getActiveSheet(0)->setCellValue('C1','員工姓名');
$objPHPExcel->getActiveSheet(0)->setCellValue('D1','電話');
$objPHPExcel->getActiveSheet(0)->setCellValue('E1','成人');
$objPHPExcel->getActiveSheet(0)->setCellValue('F1','小孩');

$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setWidth(15);

$objPHPExcel->getActiveSheet(0)->getStyle('A1:F1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet(0)->getStyle('A1:F1')->applyFromArray(
array('fill'     => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'CCCCCC')
		),
    )
);

$query = "select * from member order by no asc";
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
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $row->adult);
	$c++;	
	$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow($c, $r, $row->children);
	$c++;
	
	$r++;
}
$str = "A1:F".($r-1);
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


