<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$OFFICE_STATION = $_SESSION['OFFICE_STATION'];

}

$query = "SELECT OFFICE_STATION   from tblemployeeinfo where UNAME = '".$_SESSION['username']."' ";

// PHP FUNCTIONS
  
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
      if(mysqli_connect_errno()){echo mysqli_connect_error();}  
      $query = "SELECT DIVISION_M FROM tblpersonneldivision 
      INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
      INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
      where tblemployeeinfo.UNAME  = '".$_SESSION['username']."' ";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))
      {
          echo $row['DIVISION_M'];
      }
      }
      function getNo()
      {
        include 'connection.php';
        if(mysqli_connect_errno()){echo mysqli_connect_error();}  
        $query = "SELECT MOBILEPHONE, UNAME FROM  tblemployeeinfo WHERE UNAME  = '".$_SESSION['username']."' ";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo $row['MOBILEPHONE'];
        }
      }
   
?>
<!DOCTYPE html>
<html>


<title>FAS | Process Request</title>
<head>
  

  <link rel="shortcut icon" type="image/png" href="dilg.png">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.js">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="bower_components/chart.js/Chart.js"></script>


  
  
<style>
        pre { margin: 20px 0; padding: 20px; background: #fafafa; } .round { border-radius: 50%;vertical-align: }

        .tdTitle{
          background-color: #B0BEC5;
          font-family: 'Cambria';
          font-weight: bold;
        }
     

      .table{
        border: 1px solid black;
      }
      .th, td{
        padding: 5px;

      }
</style>
</head>

<body class="hold-transition skin-red-light fixed sidebar-mini">
<div class="wrapper">
<?php 
  if ($username == 'charlesodi' || $username == 'mmmonteiro' || $username == 'cvferrer' || $username == 'masacluti' || $username == 'magonzales' || $username == 'seolivar' || $username == 'jamonteiro' || $username == 'ctronquillo' || $username == 'sglee') { include('test1.php'); 
  }else{ 
  
       if ($OFFICE_STATION == 1) {
    include('sidebar2.php');
             
          }else{
    include('sidebar3.php');
           
          } 
  }
?>
<div class="content-wrapper">
  <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class = "active"><a href="#">Website Posting Request Form</a></li>
      </ol>
      <br>
      <br>
      <div class="row">
        <div class="col-md-9">
            <div>
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-body">      
                        <!-- <div> <h1>Website Posting Request</h1><br> </div> -->
                        <!-- Small boxes (Stat box) -->
                          <!-- <form method = "POST">

                          <input size="100px" type="text" id="get">
                          <span onclick="cutlink()">SUBMIT</span>
                          <p id="res"></p>

                          <script>
                          function cutlink(){
                          var strcut = document.getElementById("get").value;
                          var cut = strcut.split("/view?usp=sharing").join("");
                          document.getElementById("res").innerHTML = cut;
                          EXIT();
                          }
                          </script> -->


                            <div class = "row">
                                <div class = "col-lg-12" style = "padding:2%;"> 
                                    <div class = "col-lg-12">
                                      <table border =1 style = "table-layout: fixed; width:100%;border-width:medium;border-style:solid black;" id = "table_name" >
                                        <tbody>
                                          <tr> 
                                            <td class = "box-title" colspan = 8 style = "color:black;font-size:20px;font-weight:bold;background-color:#90A4AE">A. REQUEST FOR WEBSITE POSTING (To be Accomplished by Requesting Office)</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Requested Date:</td>
                                            <td>
                                              <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" class="form-control pull-right" id="datepicker">
                                              </div>
                                            </td>
                                            <td class = "tdTitle">Requested Time:</td>
                                            <td><input type="time" class="form-control timepicker"> </td>
                                            <td class = "tdTitle" rowspan = 3 style = "text-align:center;">Category</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "News"> News</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Banner"> Banner</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Transparency"> Transparency</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Requested By:</td>
                                            <td>
                                            <input type="hidden" name = "requested_by" value = "<?php echo $_SESSION['complete_name'];?>" />
                                            <?php echo $_SESSION['complete_name'];?>
                                            </td>
                                            <td class = "tdTitle">Office:</td>
                                            <td>
                                            <input type="hidden" name = "office" value = "<?php echo getOffice();?>" />
                                            <?php echo getOffice();?>
                                            </td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "LGUs"> LGUs</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Procurement" checked> Procurement</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Vacancies"> Vacancies</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Position:</td>
                                            <td>
                                            <input type="hidden" name = "position" value = "<?php echo getPosition();?>" />
                                            <?php echo getPosition();?>
                                            </td>
                                            <td class = "tdTitle">Mobile No:</td>
                                            <td>
                                            <input type="hidden" name = "office" value = "<?php echo getNo();?>" />
                                            <?php echo getNo();?>
                                            </td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Photo"> Photo</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Video"> Video</td>
                                            <td style = "font-family:'Cambria';font-weight:bold;"><input type="checkbox" class = "checkbox_group" value = "Forms"> Forms</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Purpose:</td>
                                            <td colspan = 3 class = "tdTitle"></td>
                                            <td class = "tdTitle" rowspan =2>Files/<BR>Attachments:</td>
                                            <td colspan = 3 rowspan = 2 >d</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Signature:</td>
                                            <td colspan = "3"></td>
                                          </tr>
                                          <tr>
                                            <td colspan = 8 style = "border:3px solid black;"></td>
                                          </tr>
                                          <tr>
                                            <td colspan = 4 style = "text-align:center;" class = "tdTitle">B. APPROVAL</td>
                                            <td colspan = 4 style = "text-align:center;" class = "tdTitle">C. WEBSITE POSTING<br> (To be Accomplished by RICTU)</td>
                                          </tr>
                                          <tr>
                                            <td colspan = 2 style = "font-family:'Cambria';font-weight:bold;"> <input type="checkbox" class = "chk_approval"/>APPROVED</td>
                                            <td colspan = 2 style = "font-family:'Cambria';font-weight:bold;"> <input type="checkbox" class = "chk_approval"/>DISAPPROVED</td>
                                            <td class = "tdTitle">Received Date:</td>
                                            <td >
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" disabled class="form-control pull-right" id="datepicker_received">
                                              </div>

                                            </td>
                                            <td class = "tdTitle">Received Time:</td>
                                            <td>

                                            <input type="time" disabled class="form-control timepicker_received">
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan = 4 rowspan=3 style = "font-weight:bold;text-align:center;font-family:Cambria">
                                            __________________________________________ <br>
                                            <?php echo $_SESSION['complete_name'];?></td>
                                            <td class = "tdTitle">Posted Date:</td>
                                            <td>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" disabled class="form-control pull-right" id="datepicker_posted">
                                              </div>
                                            </td>
                                            <td class = "tdTitle">Posted Time:</td>
                                            <td>
                                              <input type="time" disabled class="form-control timepicker-posted">
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Posted By:</td>
                                            <td></td>
                                            <td class = "tdTitle">Signature:</td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Remarks::</td>
                                            <td colspan = 3>
                                              <textarea disabled style = "resize:none;" cols=68>POSTED WITH NO ERROR</textarea>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan = 8 style = "border:3px solid black;"></td>
                                          </tr>
                                          <tr>
                                            <td colspan = 8 class = "tdTitle" style = "text-align:center;">D. CONFIRMATION OF REQUESTING OFFICE</td>
                                          </tr>
                                          <tr>
                                            <td class = "tdTitle">Confirmed Date:</td>
                                            <td>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" disabled class="form-control pull-right" id="datepicker_confirmed">
                                              </div>
                                            </td>
                                            <td class = "tdTitle">Confirmed Time:</td>
                                            <td>
                                            <input type="time" disabled class="form-control timepicker_confirmed">
                                            </td>
                                            <td class = "tdTitle">Confirmed By:</td>
                                            <td style = "text-align:center;font-weight:bold;font-family:'Cambria'">
                                              <?php echo $_SESSION['username'];?>
                                            </td>
                                            <td class = "tdTitle">Signature:</td>
                                            <td></td>

                                          </tr>
                                        
                                        

                                      
                                          
                                        
                                          
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                            </div>




                                 
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>


        
                
                
                               
                      
    </section>
</div>
  <footer class="main-footer">
    <br>
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved .</strong>
      
    </footer>
    <br>
 
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>





<script src="_includes/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
<script src="_includes/sweetalert2.min.js" type="text/javascript"></script>


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

<
</body>
</html>

<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#datepicker_received').datepicker({
      autoclose: true
    })
    $('#datepicker_posted').datepicker({
      autoclose: true
    })
    $('#datepicker_confirmed').datepicker({
      autoclose: true
    })

     //Timepicker
     $('.timepicker').timepicker({
      showInputs: false
    })
    $('.timepicker_received').timepicker({
      showInputs: false
    })
    $('.timepicker_posted').timepicker({
      showInputs: false
    })
    $('.timepicker_confirmed').timepicker({
      showInputs: false
    })
  });
</script>
<script>
$('document').ready(function()
{
 

  $('.checkbox_group').on('change', function() {
      $('.checkbox_group').not(this).prop('checked', false);  
  });

  $('.chk_approval').on('change', function() {
      $('.chk_approval').not(this).prop('checked', false);  
  });

})
  </script>

