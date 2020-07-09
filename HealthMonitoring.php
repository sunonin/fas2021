<?php 
include 'health_monitoring_functions.php';
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$division = $_GET['division'];
$DEPT_ID = $_SESSION['DEPT_ID'];
$OFFICE_STATION = $_SESSION['OFFICE_STATION'];

}
?>
<!DOCTYPE html>
<html>
<title>FAS | Heath Monitoring</title>
<head>
<link rel="stylesheet" href="_includes/sweetalert.css">
  <link href="_includes/sweetalert2.min.css" rel="stylesheet"/>

 



  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="_includes/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
    
 
    <style>

  </style>
</head>

<div class="modal fade" id="welcome-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" style = "background-color:#B0BEC5;">
        <h5 class="modal-title" id="exampleModalLabel" style = "font-weight:bold;text-align:center;font-size:30px;">HEALTH DECLARATION FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method = "POST" action = "health_monitoring_functions.php?action=add">
      <div class="modal-body"  style = "max-height: calc(100vh - 210px);
    overflow-y: auto;">
      <div>

      <table border =1 style = "width:100%;">
        <tbody>
          <tr>
            <td style = "background-color:#B0BEC5;">Name:</td>
            <td> 
            <input style = "border: none;" type ="text" class = "form-control" value = "<?php getLast();?>"  name = "lastname" readonly/> 
              
            </td>
            <td> 
              <input style = "border: none;" type ="text" class = "form-control" value = "<?php getFirst();?>"  name = "firstname" readonly/> 
            </td>
            <td> 
              <input style = "border: none;" type ="text" class = "form-control" value = "<?php getMiddle();?>"  name = "middlename" readonly/> 
            </td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;">Mobile Number:</td>
            <td> <input style = "border: none;" type ="text" class = "form-control" value = "<?php getContact();?>"  name = "contact_number" readonly/> </td>
            <td style = "background-color:#B0BEC5;"> Body Temp. </td> 
            <!-- id = "temp" oninput="temperatureConverter(this.value)" onchange="temperatureConverter(this.value) -->
            <td> <input type ="number"  class = "form-control" required/> 

            </td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;">Email Address:</td>
            <td> <input type ="text" style = " border: none;" class = "form-control" value = "<?php getEmail();?>"  name = "email" readonly/> </td>
            <td style = "background-color:#B0BEC5;"> Nationality: </td>
            <td> <input type ="text" style = " border: none;" class = "form-control" value = "Filipino" name = "nationality" readonly/> </td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;" rowspan = 2>Current Residential Address:</td>
            <td rowspan = 2><textarea   cols = 25 rows=3  style = "resize:none; border: none;" name = "address"><?php getAddress();?></textarea></td>
            <td style = "background-color:#B0BEC5;" rowspan = 2>Sex:<br><br>Age</td>
            <td> <input type ="text" style = " border: none;" class = "form-control" name = "gender" value = "<?php getGender(); ?>" readonly /> </td>
          </tr>
          <tr>
          <td><input type ="text" style = " border: none;" class = "form-control" name = "age" VALUE = "<?php calculateAge();?>" name = "age" readonly/> </td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;">Office/Unit:</td>
            <td> <input type ="text" style = " border: none;" class = "form-control" value = "<?php getOffice()?>" name= "office" readonly/> </td>
            <td style = "background-color:#B0BEC5;">Reporting Dates/ Days at Regional Office:</td>
            <td> 
                <select required class="form-control" style="width: 100%;" name="work_arrangement" id="sched" >
                    <option value="" selected></option>
                    <option value="SWF" >Skeletal Work Force</option>
                    <option value="AWA" >Alternate Work Arrangement</option>
                </select>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name = "sched" required>
                </div>
            </td>

          </tr>
         
          <tr>
            <td style = "background-color:#B0BEC5;">Did you have any of the following in the last 14 days: fever, cough, colds, sore throat, diarrhea or difficulty in breathing?</td>
            <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox1" id="cb1" name = "ans1" value = "YES">
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox1" id="cb2"  name = "ans1" value = "NO" checked>
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td colspan = 2>Please provide details:<textarea  required cols = 56 rows=5  style = "resize:none;" id = "txt1" name = "ans1_details"></textarea></td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;">Have you worked, visited or travelled to any foreign countries in the past 14 days?</td>
            <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox2" id="cb3" name = "ans2" value = "YES">
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox2" id="cb4" name = "ans2" value = "NO" checked>
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td colspan = 2 rowspan = 2>Please provide specific details on the name of places and date of visit: (i.e. June 2- Mc Donald’s, Panay Ave, SM Hypermarket – Centris)<textarea required name = "ans2_details" cols = 56 rows=6 style = "resize:none;" id = "txt2"></textarea></td>
          </tr>
          <tr>
            <td style = "background-color:#B0BEC5;">Have you worked, visited or travelled to other places in the Philippines in the past 7 days?</td>
            <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox3" id="cb5" name = "ans3" value = "YES">
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox3" id="cb6" name = "ans3" value = "NO" checked>
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
          </tr>
          <tr>
          <td style = "background-color:#B0BEC5;">Have you been in close contact with farm animals or exposed to wild animals in the past 14 days?</td>
            <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox4" id="cb7" name = "ans4" value = "YES">
              <label class="form-check-label" for="exampleCheck1 checkbox4">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox4" id="cb8" name = "ans4" value = "NO" checked>
              <label class="form-check-label" for="exampleCheck1 checkbox4">No</label>
            </div>
            </td>
            <td colspan = 2>Please provide details:<textarea required name = "ans3_details" cols = 56 rows=5  style = "resize:none;" id = "txt3"></textarea></td>
          </tr>
          <tr>
          <td style = "background-color:#B0BEC5;">Have you been exposed to a person with COVID-19 or person under investigation for COVID-19?</td>
            <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox5" id="cb9" name = "ans5" value = "YES">
              <label class="form-check-label" for="exampleCheck1">Yes</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input checkbox5" id="cb10" name = "ans5" value = "NO" checked>
              <label class="form-check-label" for="exampleCheck1">No</label>
            </div>
            </td>
            <td colspan = 2>Please provide details:<textarea required name = "ans4_details" cols = 56 rows=5  style = "resize:none;" id = "txt4"></textarea></td>
          </tr>
          <tr>
          <td colspan = 4><b>FOR WOMEN:</b><br> When was your last menstruation period? <input name = "monthly_period" style = "width:20%;"type = "text" class = "form-control datepicker1" id = "datepicker1" value = "<?php echo date('F d, Y');?>" name = "date_of_travel"/></td>
          </tr>
          <tr>
          <td style = "text-align:justify;" colspan = 4>Declaration:<br><br>
            The information I have given herein is true, correct and complete, I understand that failure to answer any question or any falsified response may have serious consequences. (Article 171 and 172 of the revised Penal Code of the Philippines).
            <br><br><span class = "pull-right" STYLE = "margin-left:50px;"> 
                <br><u STYLE  = "font-weight:bold;"><?php echo date('F d, Y');?></u><br>
                <input type = "hidden" value="<?php echo date('F d, Y');?>" name = "date_today" />
                <center>DATE</center>
            </span>                                            
            <span class = "pull-right" > <br><u STYLE  = "font-weight:bold;"><?php echo $_SESSION['complete_name'];?></u><br>NAME AND SIGNATURE </span>                                            
          </td>
          </tr>

        </tbody>
      </table>
      </div>
      </div >
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ============================== Health Monitoring ======================= -->

        





<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
            
        
            var action = '';
            var table = $('#example').DataTable( {
      
              'scrollX'     : true,
              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : true,   aLengthMenu: [ [10, 10, 20, -1], [10, 10, 20, "All"] ],
              "bPaginate": false,
              "bLengthChange": false,
              "bFilter": true,
              "bInfo": false,
              "bAutoWidth": false,
                "processing": true,
                "serverSide": false,
                "ajax": "DATATABLE/health_monitoring.php"
                // "columnDefs": [ {
                //     "targets":10,
                //     "render": function (data, type, row, meta ) {  
                //     action = "<button class = 'btn btn-md btn-success' id = 'view'><i class = 'fa fa-eye'></i>View</button>&nbsp;<button class = 'btn btn-md btn-primary'><i class = 'fa fa-edit'></i>Edit</button>&nbsp;<button class = 'btn btn-md btn-danger'><i class = 'fa fa-trash'></i> Delete</button>";
                //     return action;
                //     }
                // }]
              

            } );

            
            $('#example tbody').on( 'click', '#view', function () {
              var data = table.row( $(this).parents('tr') ).data();
              window.location="ViewTravelClaim.php?&ro="+data[2];
            } );
        });


$(document).ready(function() 
{
  $.ajax({
  type: "POST",
  url: "health_monitoring_ajax.php",
  data:{
    username:'<?php echo $username;?>'
  },
  success: function(data) {
 if(data ==1)
 {
  $('#welcome-modal').modal('hide');
 }else{
  $('#welcome-modal').modal({
          backdrop: 'static',
          keyboard: false
        });
 }
    }
});
      //   $(':input[type="number"]').change(function(){
      //      this.value = parseFloat(this.value).toFixed(2);
      // });
      
          $("#reservation").prop('disabled', true);

            $('#sched').on('change',function(e){
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                if(valueSelected == 'SWF')
                {
                    $("#reservation").prop('disabled', true);

                }else{
                $("#reservation").prop('disabled', false);
                }
            })
          $("#txt1").prop('disabled', true);
          $("#txt2").prop('disabled', true);
          $("#txt3").prop('disabled', true);
          $("#txt4").prop('disabled', true);


       
      //   checkbox
        $('.checkbox1').on('change', function() { 
            $('.checkbox1').not(this).prop('checked', false);  
        });
        $('.checkbox2').on('change', function() { 
            $('.checkbox2').not(this).prop('checked', false);  
        });
        $('.checkbox3').on('change', function() { 
            $('.checkbox3').not(this).prop('checked', false);  
        });
        $('.checkbox4').on('change', function() { 
            $('.checkbox4').not(this).prop('checked', false);  
        });
        $('.checkbox5').on('change', function() { 
            $('.checkbox5').not(this).prop('checked', false);  
        });
      //   =================================
          $('#cb1').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt1").prop('disabled', false);
              }else{
                  $("#txt1").prop('disabled', true);
              }
          });
          $('#cb2').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt1").prop('disabled', true);
              }else{
                  $("#txt1").prop('disabled', false);
              }
          });
      // ========================================
      //   =================================
          $('#cb3').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt2").prop('disabled', false);
              }else{
                  $("#txt2").prop('disabled', true);
              }
          });
          $('#cb4').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt2").prop('disabled', true);
              }else{
                  $("#txt2").prop('disabled', false);
              }
          });
      // ========================================
          $('#cb5').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt2").prop('disabled', false);
              }else{
                  $("#txt2").prop('disabled', true);
              }
          });
          $('#cb6').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt2").prop('disabled', true);
              }else{
                  $("#txt2").prop('disabled', false);
              }
          });
          // ===================================
          $('#cb7').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt3").prop('disabled', false);
              }else{
                  $("#txt3").prop('disabled', true);
              }
          });
          $('#cb8').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt3").prop('disabled', true);
              }else{
                  $("#txt3").prop('disabled', false);
              }
          });
          // ===================================
          $('#cb9').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt4").prop('disabled', false);
              }else{
                  $("#txt4").prop('disabled', true);
              }
          });
          $('#cb10').click(function(){
              if($(this).prop("checked") == true){
                  $("#txt4").prop('disabled', true);
              }else{
                  $("#txt4").prop('disabled', false);
              }
          });

});
</script>
<?php 
  if ($username == 'charlesodi' || $username == 'mmmonteiro' || $username == 'cvferrer' || $username == 'masacluti' || $username == 'seolivar' ) { include('test1.php'); 
}else{ 

     if ($OFFICE_STATION == 1) {
  include('sidebar2.php');
           
        }else{
  include('sidebar3.php');
         
        } 
}
 ?>
  <div class="content-wrapper">
    <section class="content-header"><br>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Personnel</li>
      <li class="active">Health Monitoring</li>
      </ol><br>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="panel panel-defasult">
            <div class="box-body"> 
          
            <div>
                <h1>Monitoring of Travel Claim Request</h1><br>
                
            </div>
            
            <table id="example" class="table table-striped table-bordered table-responsive" style="width:;background-color: white;text-align:center;">
              <thead>
              <th>NO</th>
              <th>DATE</th>
              <th>NAME</th>
              <th>OFFICE STATION</th>
              <th>POSITION</th>
              <th>OFFICE/DIVISION</th>
              <th>WORK ARRANGEMENT</th>
              <th>REPORTING DATES</th>
              </thead>
            </table>
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
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>





<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->

<!-- Page script -->
<script>

$(document).ready(function(){
  $('#datepicker1').datepicker({
      autoclose: true
    })
});
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

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

    //Date picker
    $('#datepicker').datepicker({
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
   
  
  
