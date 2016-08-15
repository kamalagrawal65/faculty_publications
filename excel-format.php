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
require_once ('PHPExcel/Classes/PHPExcel.php');



// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Mr. N S Bhandari")
							 ->setLastModifiedBy("Mr. N S Bhandari")
							 ->setTitle("Faculty Publication")
							 ->setSubject("Faculty Publication")
							 ->setDescription("Faculty Publication")
							 ->setKeywords("Faculty Publication")
							 ->setCategory("Result file");



$objPHPExcel->getActiveSheet()
    ->getStyle('A1:W1')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('FFFFA500');

$objPHPExcel->getActiveSheet()->getStyle('A1:W1')
    ->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$objPHPExcel->getActiveSheet()->getStyle("A1:W1")->applyFromArray($style);
// Add some data
function through($data,$startColumn='A',$startRow=1,$type=1){
	//for header
	$conn=$GLOBALS['connection'];
	if($type==1){
		for($row=1;$row<=count($data);$row++){
			$startCol=$startColumn;	
			for($col=1;$col<=count($data[$row-1]);$col++){
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.
				($startRow+$row-1), $data[$row-1][$col-1]);
				$startCol++;
			}
		}
		
	}
	
	
	//for data
	if($type==2){
		$row_var=$startRow;
		//echo $data;
		while($row=mysqli_fetch_row($data)){
			$startCol=$startColumn;
			$slno=$row[15];
			
			$author=NULL;
			$author_query="select aname from author_table where slno=$slno";
			$author_result=mysqli_query($conn,$author_query);
			$author_row=mysqli_fetch_row($author_result);
			$author=$author_row[0];
			while($author_row=mysqli_fetch_row($author_result)){
				$author.=",$author_row[0]";	
			}
			
			
			$keyword=NULL;
			$keyword_query="select keyword from key_table where slno=$slno";
			$keyword_result=mysqli_query($conn,$keyword_query);
			$keyword_row=mysqli_fetch_row($keyword_result);
			$keyword=$keyword_row[0];
			while($keyword_row=mysqli_fetch_row($keyword_result)){
				$keyword.=",$keyword_row[0]";	
			}
				
			$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $author);
			$startCol++;
				
			$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $keyword);
			$startCol++;
			
			for($col=1;$col<=18;$col++){
				if($col==16)
					continue;
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $row[$col-1]);
				$startCol++;
			}
			
			
			
			
			
			if($row[12]=='Conference Paper'){
				$conf_query="SELECT `conf_name`, `conf_date`, `conf_loc`, `con_detail` FROM `conference_table` WHERE slno=$slno";
				$conf_result=mysqli_query($conn,$conf_query);
				$conf_row=mysqli_fetch_row($conf_result);
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $conf_row[0]);
				$startCol++;
				
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $conf_row[1]);
				$startCol++;
				
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $conf_row[2]);
				$startCol++;
				
				$GLOBALS['objPHPExcel']->setActiveSheetIndex(0)->setCellValue($startCol.($row_var), $conf_row[3]);
				$startCol++;
			}
			
			
			
			
			
			$row_var++;
			
		}
		
	}
}

through($head);
through($result,'A',2,2);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Faculty Publication.xls"');
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