<?php
session_start();
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()

function countSubmitted()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_sub' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Submitted' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_sub'];
  }
}
function countReceived()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_rec' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Received' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_rec'];
  }
}
function countForAction()
{
  include 'connection.php'; 
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_fa' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'For action' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_fa'];
  }
}
function countCompleted()
{
  include 'connection.php';
  $a = ucwords(strtoupper($_SESSION['complete_name3']));
  $query = "SELECT count(*) as 'count_com' FROM tbltechnical_assistance 
  where `STATUS_REQUEST` = 'Completed' and `REQ_BY` = '".$a."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    echo $row['count_com'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Procurement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


<style>
th{
  color:blue;
  text-align:center;
}
/* .dataTables_wrapper .dataTables_paginate {
    float: left;
} */

</style>
</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel panel-defasult">
          <div class="box-body"> 
          
            <div>
                <h1>Customer Satisfaction Survey</h1><br>
                <?php 
                ?>
                
            </div>
            
     
            
        
              <table id="example" class="table table-striped table-bordered table-responsive" style="width:;background-color: white;">
                    <thead>
                        <th style="text-align:left;">CONTROL NO.</th>
                        <th style="text-align:left;">OFFICE</th>
                        <th style="text-align:left;">SERVICE PROVIDED</th>
                        <th style="text-align:left;">ACTION OFFICER</th>
                        <th style="text-align:left;">END USER</th>
                        <th style="text-align:left;">CONTACT NO</th>
                        <th style="text-align:left;">DATE ACCOMPLISHED</th>
                        <th style = "text-align:center;max-width:20%;">ACTION</th>
                    </thead>
                        
                        


                </table>
      


      <!-- jQuery 3 -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Select2 -->
      <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
      <!-- InputMask -->
      <script src="plugins/input-mask/jquery.inputmask.js"></script>
      <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
      <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
      <!-- date-range-picker -->
      <script src="bower_components/moment/min/moment.min.js"></script>
      <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- bootstrap datepicker -->
      <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- bootstrap color picker -->
      <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
      <!-- bootstrap time picker -->
      <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
      <!-- SlimScroll -->
      <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- iCheck 1.0.1 -->
      <script src="plugins/iCheck/icheck.min.js"></script>
      <!-- FastClick -->
      <script src="bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- Page script -->
      <script>
     
        $(function () {
    //Initialize Select2 Elements

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker,
    $('#datepicker1').datepicker({
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#datepicker3').datepicker({
      autoclose: true
    })
    $('#datepicker4').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


</div>
</div>


<div class="panel-footer"></div>
</div>
</div>

</body>
</html>
