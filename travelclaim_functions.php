<?php
session_start();

function getCompleteName()
{
    include 'connection.php';
    $query = "SELECT * FROM tblemployeeinfo where tblemployeeinfo.UNAME  = '".$_SESSION['username']."' ";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo ucfirst(strtolower($row['FIRST_M'])).' '.ucfirst(strtolower($row['LAST_M']));
    }
}
function getPosition()
{
    include 'connection.php';
    $query = "SELECT POSITION_M FROM tblpersonneldivision 
              INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
              INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
              where tblemployeeinfo.UNAME = '".$_SESSION['username']."' ";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo $row['POSITION_M'];
    }
}
function getOffice()
{
    include 'connection.php';
    $query = "SELECT DIVISION_M FROM tblpersonneldivision 
              INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
              INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
              where tblemployeeinfo.UNAME = '".$_SESSION['username']."' ";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo $row['DIVISION_M'];
    }
}
function showData()
{
    include 'connection.php';
    $query = "SELECT * FROM tbltravel_claim_info2 limit 1";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo '<input 
        type = "text" 
        style = "width:89%;padding:5px;border:1px solid gray;"
        value = "'.$row['RO_TO_OB'].'"
        />';
    }
    
}
    

?>
