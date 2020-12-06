<?require_once 'engine/library/PHPExcel/PHPExcel.php';?>
<?require_once 'engine/library/PHPExcel/PHPExcel/Writer/Excel5.php';?>
<?require_once 'engine/library/PHPExcel/PHPExcel/IOFactory.php'?>
<?php
require_once 'connection.php';
?>
<?
ob_end_clean();
$title = 'Сети магазинов';
$array = array("№ п/п", "Название сети", "ИНН", "Адрес точки продажи", "Объём продаж", "Торговый баланс", "ФИО директора");
$xls = new PHPExcel();
$xls->getProperties()->setTitle($title);
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle($title);
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

$sheet->setCellValueExplicit('A1', $title, PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('ff9c78');
$sheet->mergeCells('A1:G1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
for($i = 0; $i < count($array); $i++){
    $sheet->setCellValueByColumnAndRow($i, 2, $array[$i]);
    $sheet->getStyleByColumnAndRow($i, 2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
}
$j=3;
$queryTab = "shop_pdf";
$query = "SELECT * FROM $database.$queryTab";
$result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
while ($row=mysqli_fetch_array($result)){
    for($i = 0; $i < count($row)/2; $i++){
        $text = $row[$i];
        $sheet->setCellValueByColumnAndRow($i, $j, $text);
        $sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);        
    }
$j++;
}
ob_end_clean();

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Сети магазинов.xls");
$xls->getActiveSheet()->getColumnDimension('A')->setWidth(7);
$xls->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$xls->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$xls->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$xls->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$xls->getActiveSheet()->getColumnDimension('F')->setWidth(17);
$xls->getActiveSheet()->getColumnDimension('G')->setWidth(27);
$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save('php://output');
ob_end_clean();
?>