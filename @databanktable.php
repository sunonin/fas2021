<?php
include('db.class.php'); // call db.class.php
?>


<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>FAS</title>

</head>
<body>
<div class="box">
  <div class="box-body">
          
          <h1 align="">Databank</h1>
          
          <br>
        
          <div class=""  style="overflow-x:auto;">
         
            <li class="btn btn-success"><a href="CreateDatabank.php" style="color:white;text-decoration: none;">Add</a></li>
         
              <br>
              <br>
              
            </div>

            <form method="POST" action='' enctype="multipart/form-data" >

            <table id="example1" class="table table-striped table-bordered" style="background-color: white;">
                <thead>
                    <tr style="background-color: white;color:blue; text-align:center ">
                 
                  <th width="200">CATEGORY</th>
                  <th width="400">TITLE</th>
                  <th width="100">OFFICE</th>
                  <th width="150">POSTING DETAILS</th>
                  <th width="200">ACTION</th>
                  
                </tr>
                </thead>
                <?php
            $servername = "localhost";
            $username = "fascalab_2020";
            $password = "w]zYV6X9{*BN";
            $database = "fascalab_2020";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password,$database);
            $view_query = mysqli_query($conn, "SELECT downloads.office,downloads.file, downloads.download_id ,downloads.category, downloads.title, downloads.dateposted, downloads.postedby, downloads_category.name from downloads left join downloads_category on downloads.category=downloads_category.id order by dateposted desc");

                while ($row = mysqli_fetch_assoc($view_query)) {
                  $id = $row["download_id"];
                  
                  $name = $row["name"];
                  $file = $row["file"];

                  $title  = $row["title"];
                  $office  = $row["office"];
                
                  $dateposted  = $row["dateposted"];
                   // $date_issued1 = date('F d, Y', strtotime($date1));
                  $postedby = $row["postedby"];
                 $location = "files/".$file;
                 //echo $location;

               ?>

                <tr align = ''>
            
                
              
                <td><?php echo $name?></td>
                <td><?php echo $title?></td>
                <td><?php echo $office?></td>
                <td><?php echo $dateposted."-".$postedby?></td>
                

                <td>
                <?php   
                            $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
                            $username = $_SESSION['username'];

                            //echo $username;
                            $select_user = mysqli_query($conn,"SELECT DIVISION_C FROM tblemployee WHERE UNAME = '$username'");
                            $rowdiv = mysqli_fetch_array($select_user);
                            $DIVISION_C = $rowdiv['DIVISION_C'];
                            //echo $DIVISION_C;
                            
                ?>

         
                            
                <a  href="<?php echo $location?>" title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> View</a> |
                <a href="UpdateDatabank.php?id=<?php echo $id; ?>"  class = "btn btn-primary btn-xs"> <i class='fa'>&#xf044;</i> Edit</a> | 
                <a onclick="return confirm('Are you sure you want to delete this record?');" name="del"  href="@Functions/databankdelete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
         
                </td>
                
               

                </tr>

            
            <?php }?>



             
            </table>
              </form>
                
                </div>
            </div>
                

    </body>

                <script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>
              
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
<script>

  $(document).ready(function(){
   table = document.getElementById("item_table");

   tr = table.getElementsByTagName("th");
   var td = document.getElementById("tdvalue");

   if(td <= 0){
    $('#finalizeButton').attr('disabled','disabled');
  } else {
    $('#finalizeButton').attr('enabled','enabled');
  }

  $('.link').click(function(){

    var f = $(this);
    var id = f.data('id');

    var pr_no = $('#pr_no').val();
    var pr_date = $('#pr_date').val();
    var pmo = $('#pmo').val();
    var purpose = $('#purpose').val();

    window.location = 
    'ViewPRdetails1.php?data='+id+'&pr_no='+pr_no+'&pr_date='+pr_date+'&pmo='+pmo+'&purpose='+purpose;
  });
}) ;
</script>



</body>
</html>


