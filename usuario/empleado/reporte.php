<?php

session_start();


 $r = $_SESSION["r"];
$tam = sizeof($r);
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel-1.8/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel(); // Create new PHPExcel object
$objPHPExcel->getProperties()->setCreator("Sigit prasetya n")
							 ->setLastModifiedBy("Sigit prasetya n")
							 ->setTitle("Creating file excel with php Test Document")
							 ->setSubject("Creating file excel with php Test Document")
							 ->setDescription("How to Create Excel file from PHP with PHPExcel 1.8.0 Classes by seegatesite.com.")
							 ->setKeywords("phpexcel")
							 ->setCategory("Test result file");
// create style
$default_border = array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
    'color' => array('rgb'=>'1006A3')
	
);
$style_header1 = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'f4ff00'),
    ),
    'font' => array(
        'bold' => true,
		'size' => 12,
    ),
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
);
$style_header = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'FFE699'),
    ),
    'font' => array(
        'bold' => true,
		'size' => 10,
    ),
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
);
$style_content = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
        
         'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    ),
    'font' => array(
		'size' => 10,
    )
);
// Create Header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('D1', 'Datos de base de tiempos')

          ->setCellValue('B2', 'ODT')
            ->setCellValue('C2', 'ODT REAL')
			 ->setCellValue('D2', 'No. de Empleado')
            ->setCellValue('E2', 'Nombre')
            ->setCellValue('F2', 'C.C')
            ->setCellValue('G2', 'MA')
            ->setCellValue('H2', 'Fecha')
            ->setCellValue('I2', 'Tiempo');
$objPHPExcel->getActiveSheet()->getStyle('B1:I1')->applyFromArray( $style_header1 ); // give style to header
$objPHPExcel->getActiveSheet()->getStyle('B2:I2')->applyFromArray( $style_header ); // give style to header2
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
// Create Data
$dataku=array(
			  array('000061C413.72008800301','3','10957481','juan'),
			  array('000061C413.72008800302','2','10957481','juan'),
			  array('000061C413.72008800303','3','10957481','juan'),
			  array('000061C413.72008800304','1','10957481','juan'));
$firststyle='B3';
for($i=0;$i<count($r);$i++)
{
	$urut=$i+3;
	$odt='B'.$urut;
	$real='C'.$urut;
	$no='D'.$urut;
	$nom='E'.$urut;
	 $cc ='F'.$urut;
	$ma='G'.$urut;
	$fecha='H'.$urut;
	$tiempo='I'.$urut;
       
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($odt, "000061-".$r[$i][0])
	        ->setCellValue($real, $r[$i][1])
			->setCellValue($no, $r[$i][2])
            ->setCellValue($nom, $r[$i][3])
            ->setCellValue($cc, $r[$i][4])
			 ->setCellValue($ma, $r[$i][5])
            ->setCellValue($fecha, $r[$i][6])
            ->setCellValue($tiempo, $r[$i][7]);
	$laststyle=$tiempo;
}
$objPHPExcel->getActiveSheet()->getStyle($firststyle.':'.$laststyle)->applyFromArray( $style_content ); // give style to header

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Product');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="listproduct.xls"'); // file name of excel
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
