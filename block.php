<?php 
$id = $_GET['id'];
$username = $_GET['username'];
$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$activate = mysqli_query($conn,"UPDATE tblemployee SET ACTIVATED = 'No', BLOCK='Y' WHERE EMP_N = $id");
if ($activate) {
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Account Blocked!')
    window.location.href='Accounts.php';
    </SCRIPT>");
}else{
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Error Occured!');
    window.location.href='Accounts.php';
    </SCRIPT>");
}
?>