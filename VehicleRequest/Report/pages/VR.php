<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");



$conn=mysqli_connect('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');


if(mysqli_connect_errno()){echo mysqli_connect_error();}  
$id = $_GET['id'];
$division = $_GET['division'];

/* echo $id;
echo '<br>';
echo $division;
exit(); */

$divchief="";
$divpos="";

if($division==1){

$divchief = 'NOEL R. BARTOLABAC';
$divpos="ASST. REGIONAL DIRECTOR";
   
}

else if($division==18){

$divchief = 'GILBERTO L. TUMAMAC';
$divpos="OIC - LGMED Chief";
}

else if($division==17){

$divchief = 'JAY-AR T. BELTRAN';
$divpos="OIC - LGCDD Chief";

}

else if($division==10){

$divchief = 'DR. CARINA S. CRUZ';
$divpos="Chief, FAD";
}
else{

$divchief = '';

}
    

$view_query = mysqli_query($conn, "SELECT * from vr where id = '$id'");


while ($row = mysqli_fetch_assoc($view_query)) {

$id=$row['id'];
$vrno=$row['vrno'];
$name=$row['name'];
$office=$row['office'];
$purpose=$row['purpose'];
$remarks=$row['remarks'];
$destination=$row['destination'];
$nop=$row['nop'];
// $vrdate=$row['vrdate'];

$vrdate = date('F d, Y',strtotime($row['vrdate']));



$status = $row['status'];
$stat="";

if($status=='cancelled'){
$stat='cancelled.png';
}
else{
$stat='';
}


$sign = "DR. CARINA S. CRUZ";
$pos = "Chief FAD";


$PHPJasperXML = new PHPJasperXML(); 

/* if($status=='cancelled'){ */
    $PHPJasperXML->arrayParameter=array("vrno"=>$vrno,
    "n"=>$name,
    "office"=>$office,
    "vrdate"=>$vrdate,
    "purpose"=>$purpose,
    "remarks"=>$remarks,
    "destination"=>$destination,
    "nop"=>$nop,
    "sign"=>$sign,
    "pos"=>$pos,
    "cancelled"=>$stat);
// }
/* else if ($uc=='no'){
    $PHPJasperXML->arrayParameter=array(
        "obno"=>$obno,"date"=>$date,
        "name"=>$name,"purpose"=>$purpose,
        "place"=>$place,"obdate"=>$obdate,
        "timefrom"=>$timefrom,"timeto"=>$timeto,"field"=>$divchief,"divpos"=>$divpos,"place1"=>$place1,"yes"=>'check1.png',"no"=>'correct.png',"cancelled"=>$stat);
} */
/* else{

    $PHPJasperXML->arrayParameter=array(
        "obno"=>$obno,"date"=>$date,
        "name"=>$name,"purpose"=>$purpose,
        "place"=>$place,"obdate"=>$obdate,
        "timefrom"=>$timefrom,"timeto"=>$timeto,"field"=>$divchief,"divpos"=>$divpos,"place1"=>$place1,"yes"=>'correct.png',"no"=>'check1.png',"cancelled"=>$stat);
}
 */
    
}

$PHPJasperXML->load_xml_file("report1.jrxml");
$PHPJasperXML->transferDBtoArray('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');
$PHPJasperXML->outpage("I");
//page output method I:standard output  D:Download file


?>
