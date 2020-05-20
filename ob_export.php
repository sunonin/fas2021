<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("library/ob_export.xlsx");

$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

$id = $_GET['id'];
$user = $_GET['user'];
$division = $_GET['division'];

/* echo  $id.'<br>';
echo  $user.'<br>';
echo  $division.'<br>';
exit(); */

$sql = mysqli_query($conn, "SELECT obno,date,name,purpose,place,obdate,timefrom,timeto,uc  FROM ob WHERE id = '$id' ");
$excelrow = mysqli_fetch_array($sql);
$obno = $excelrow['obno'];
$date1 = $excelrow['date'];
$date = date('F d, Y', strtotime($date1));
$office = $excelrow['office'];
$name = $excelrow['name'];
$purpose = $excelrow['purpose'];
$place = $excelrow['place'];
$obdate1 = $excelrow['obdate'];
$obdate = date('F d, Y', strtotime($obdate1));
$timefrom1 = $excelrow['timefrom'];
$timefrom=  date("g:h A",strtotime($timefrom1));




$timeto1 = $excelrow['timeto'];
$timeto=  date("g:h A",strtotime($timeto1));
$uc = $excelrow['uc'];

/* Personnel copy */
$objPHPExcel->setActiveSheetIndex()->setCellValue('J12',$obno);
$objPHPExcel->setActiveSheetIndex()->setCellValue('J13',$date);
$objPHPExcel->setActiveSheetIndex()->setCellValue('E16',$name);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B17',$purpose);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D19',$place);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D21',$obdate);
$objPHPExcel->setActiveSheetIndex()->setCellValue('K19',$timefrom);
$objPHPExcel->setActiveSheetIndex()->setCellValue('K21',$timeto);



//$objPHPExcel->setActiveSheetIndex()->setCellValue('I26',$name);

if($division==1){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I33','Noel R. Bartolabac');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I34','ASST. REGIONAL DIRECTOR');
}

else if($division==18){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I33','Gilberto L. Tumamac');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I34','OIC - LGMED Chief');
}

else if($division==17){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I33','Jay-ar T. Beltran');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I34','OIC - LGCDD Chief');
}

else if($division==10){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I33','Dr. Carina S. Cruz');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I34','Chief, FAD');
}
else{

$objPHPExcel->setActiveSheetIndex()->setCellValue('I33','');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I34','');
}

// "--------------------------------------------------------------------"

/* Employees copy */

$objPHPExcel->setActiveSheetIndex()->setCellValue('J49',$obno);
$objPHPExcel->setActiveSheetIndex()->setCellValue('J50',$date);

$objPHPExcel->setActiveSheetIndex()->setCellValue('E53',$name);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B54',$purpose);


$objPHPExcel->setActiveSheetIndex()->setCellValue('D56',$place);
$objPHPExcel->setActiveSheetIndex()->setCellValue('D58',$obdate);


$objPHPExcel->setActiveSheetIndex()->setCellValue('K56',$timefrom);

$objPHPExcel->setActiveSheetIndex()->setCellValue('K58',$timeto);



//$objPHPExcel->setActiveSheetIndex()->setCellValue('I63',$name);

if($division==1){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I70','Noel R. Bartolabac');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I71','ASST. REGIONAL DIRECTOR');
}

else if($division==18){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I70','Gilberto L. Tumamac');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I71','OIC - LGMED Chief');
}

else if($division==17){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I70','Jay-ar T. Beltran');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I71','OIC - LGCDD Chief');
}

else if($division==10){

$objPHPExcel->setActiveSheetIndex()->setCellValue('I70','Dr. Carina S. Cruz');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I71','Chief, FAD');
}
else{

$objPHPExcel->setActiveSheetIndex()->setCellValue('I70','');
$objPHPExcel->setActiveSheetIndex()->setCellValue('I71','');
}




$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('_includes/check.jpg');
$objDrawing->setCoordinates('B30');
//setOffsetX works properly
$objDrawing->setOffsetX(15); 
$objDrawing->setOffsetY(0);
//set width, height
$objDrawing->setWidth(30.5); 
$objDrawing->setHeight(30.5);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 



$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('_includes/check.jpg');
$objDrawing->setCoordinates('D30');
//setOffsetX works properly
$objDrawing->setOffsetX(15); 
$objDrawing->setOffsetY(0);
//set width, height
$objDrawing->setWidth(30.5); 
$objDrawing->setHeight(30.5);$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('_includes/check.jpg');
$objDrawing->setCoordinates('B67');
//setOffsetX works properly
$objDrawing->setOffsetX(15); 
$objDrawing->setOffsetY(0);
//set width, height
$objDrawing->setWidth(30.5); 
$objDrawing->setHeight(30.5);$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('_includes/check.jpg');
$objDrawing->setCoordinates('D67');
//setOffsetX works properly
$objDrawing->setOffsetX(15); 
$objDrawing->setOffsetY(0);
//set width, height
$objDrawing->setWidth(30.5); 
$objDrawing->setHeight(30.5);$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); 


//Set Password
$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
$objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
$objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
$objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

$objPHPExcel->getActiveSheet()->getProtection()->setPassword('fas2020');


 


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
header('location: ob_export.xlsx');

?>