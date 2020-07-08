<?php
    function getCompleteName()
    {
        include 'connection.php';
        $query = "SELECT * FROM tblemployeeinfo where tblemployeeinfo.UNAME  = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $name = ucwords(strtoupper($row['FIRST_M'])).' '.ucfirst(strtoupper($row['LAST_M']));
            echo $name;
        }
    }
    function getContact()
    {
        include 'connection.php';
        $query = "SELECT MOBILEPHONE FROM tblemployeeinfo where tblemployeeinfo.UNAME  =  '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $no = $row['MOBILEPHONE'];
            echo $no;
        }
    }
    function getEmail()
    {
        include 'connection.php';
        $query = "SELECT EMAIL FROM tblemployeeinfo where tblemployeeinfo.UNAME  =  '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $email = $row['EMAIL'];
            echo $email;
        }
    }
    function getAddress()
    {
        include 'connection.php';
        $query = "SELECT c.province_id,m.city_title, c.province_title FROM tblemployeeinfo  a 
        LEFT JOIN tblprovinse c on c.province_id = a.PROVINCE_C 
        LEFT JOIN tblmunicipality m on a.CITYMUN_C = m.city_id AND m.province = c.province_id
        
        WHERE a.UNAME = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $address = $row['city_title'].','.$row['province_title'];
            echo $address;
        }
    }
    function calculateAge(){
        include 'connection.php';
        $query = "SELECT BIRTH_D FROM tblemployeeinfo WHERE UNAME = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            $birthDate = date('m/d/Y',strtotime($row['BIRTH_D']));


            //explode the date to get month, day and year
            $birthDate = explode("/", $birthDate);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
              ? ((date("Y") - $birthDate[2]) - 1)
              : (date("Y") - $birthDate[2]));
            echo $age;
        }
    }
    function getGender(){
        include 'connection.php';
        $query = "SELECT SEX_C FROM tblemployeeinfo WHERE UNAME = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo $row['SEX_C'];
        }
    }
    function getOffice()
    {
        include 'connection.php';
        $query = "SELECT * FROM tblemployeeinfo a 
                  LEFT JOIN tblpersonneldivision b on b.DIVISION_N = a.DIVISION_C 
                  LEFT JOIN tbldesignation c on c.DESIGNATION_ID = a.DESIGNATION 
                  LEFT JOIN tbldilgposition d on d.POSITION_ID = a.POSITION_C WHERE UNAME = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo $row['DIVISION_M'];
        }
    }
    

?>