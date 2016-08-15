<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';



// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Mr. N S Bhandari")
							 ->setLastModifiedBy("Mr. N S Bhandari")
							 ->setTitle("Uses Data ".$sel_year)
							 ->setSubject("Uses Data")
							 ->setDescription("Journals Uses Data")
							 ->setKeywords("Uses Data")
							 ->setCategory("Result file");



$objPHPExcel->getActiveSheet()
    ->getStyle('A1:U1')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('FFFFA500');

$objPHPExcel->getActiveSheet()->getStyle('A1:U1')
    ->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("A1:U1")->applyFromArray($style);
// Add some data
function through($data,$startColumn='A',$startRow=1){
	if(gettype($data)=='array'){
		for($row=1;$row<=count($data);$row++){
			$startCol=$startColumn;
			
			
			
			for($col=1;$col<=count($data[$row-1]);$col++){
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.
				($startRow+$row-1), $data[$row-1][$col-1]);
				$startCol++;
			}
			
			
			
			
			
		}
		return ($startRow+$row-1);
	}
	if(gettype($data)=='object'){
		$nRows = mysqli_num_rows($data);
		
		for($row=1;$r = mysqli_fetch_row($data);$row++){
			$startCol=$startColumn;
			for($col=1;$col<=count($r);$col++){
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($startRow+$row-1), $r[$col-1]);
				$startCol++;
			}
		}
		return ($startRow+$nRows-1);
	}
}

through($head);
through($result,'A',2);

// $conn = mysqli_connect('localhost','root','','journals_data');
// $q = "select p.pname,j.jname,j.subject,j.school,d.jan,d.feb,d.march,d.april,d.may,d.june,d.july,d.aug,d.sept,d.oct,d.nov,d.december,d.total_downloads from journal j, publisher p, data2016 d where p.pid=j.pid and j.issn=d.issn";
// $r = mysqli_query($conn,$q);
// through($r,'A',1);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Publication Details.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save(str_replace('.php', '.xls', __FILE__));
$objWriter->save('php://output');
exit;