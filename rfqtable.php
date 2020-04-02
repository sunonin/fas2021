<?php
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()
?>

<!DOCTYPE html>
<html>
<head>
  <title>Procurement</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    
    <div class="box">
  <div class="box-body">
            <h1 align="">Request For Quotation</h1>
            <div class="box-header">
            </div>
            <br>

            <!-- &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<li class="btn btn-success"><a href="CreatePR.php" style="color:white;text-decoration: none;">Create</a></li> -->

            <br>
            
   
            <!-- <h3 align="center"><b>Inspection Acceptance Report</b></h3> -->

            <table id="example1" class="table table-striped table-bordered" >
                <thead>
                    <tr style="background-color: white;color:blue;">
                      
                        <th>PR NO</th>
                        <th>PR DATE</th>
                        <th>OFFICE</th>
                        <th width="100">TYPE</th>
                        <th width="200">PURPOSE</th>
                        <th>TARGET DATE</th>
                        <th>RECEIVED PR</th>
                        <th>RFQ NO</th>
                        <th>RFQ DATE</th>
                      <!--   <th>RFQ</th> -->
                        <th width="100">SUPPLIER QOUTE</th>
                        <th>ABSTRACT</th>
                        <th>PURCHASE ORDER</th>
                      
                    </tr>
                </thead>

                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#example1 tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                    </script> -->
                <?php
 
                $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
                $view_query = mysqli_query($conn, "SELECT a.submitted_date,a.received_date,a.id,a.pr_no,a.pmo,a.purpose,a.pr_date,a.type,a.target_date,a.stat,b.rfq_no,b.rfq_date FROM pr as a left join rfq as b ON a.pr_no=b.pr_no Order by a.id DESC");
                // $view_query = mysqli_query($conn, "SELECT rfq.id, rfq.pr_no, pr.date,pr.pmo, pr.purpose, pr.target_date FROM rfq LEFT join pr ON rfq.pr_no = pr.pr_no  order by id desc ");
                while ($row = mysqli_fetch_assoc($view_query)) {
                   // $getID = $row["id"]; 
                    $id = $row["id"];
                    $pr_no = $row["pr_no"];  
                    $pmo = $row["pmo"];
                    $submitted_date = $row["submitted_date"];
                    $received_date1 = $row["received_date"];
                    $received_date = date('F d, Y', strtotime($received_date1));

                    $purpose = $row["purpose"];
                    $pr_date = $row["pr_date"];
                    $pr_date1 = date('F d, Y', strtotime($pr_date));
                    $type = $row["type"];
                    $target_date = $row["target_date"];
                    $target_date1 = date('F d, Y', strtotime($target_date));
                    
                    $stat = $row["stat"];
                    $rfq_no =  $row["rfq_no"];
                    $rfq_date =  $row["rfq_date"];
                    $rfq_date1 = date('F d, Y', strtotime($rfq_date));
                  
                    ?>
                    <tr>
                       
                        <td><a href="ViewPRv.php?id=<?php echo $id?>"><?php echo $pr_no;?></a></td>
                        <td><?php echo $pr_date1;?></td>
                        <td><?php echo $pmo;?></td>

                        <?php if ($type == "1"): ?>
                          <td><?php echo "Catering Services";?></td>
                        <?php endif?>
                        <?php if ($type == "2"): ?>
                          <td><?php echo "Meals, Venue and Accommodation";?></td>
                        <?php endif?>
                        <?php if ($type == "3"): ?>
                          <td><?php echo "Repair and Maintenance";?></td>
                        <?php endif?>
                        <?php if ($type == "4"): ?>
                          <td><?php echo "Supplies, Materials and Devices";?></td>
                        <?php endif?>
                        <?php if ($type == "5"): ?>
                          <td><?php echo "Other Services";?></td>
                        <?php endif?>
                        <?php if ($type == "6"): ?>
                          <td><?php echo "Reimbursement and Petty Cash";?></td>
                        <?php endif?>
                        <td><?php echo $purpose;?></td>
                        <td><?php echo $target_date1;?></td>

                        <?php if ($submitted_date == NULL): ?>
                          <td>DRAFT</td>
                          <?php else: ?>
                            <?php if ($submitted_date != NULL AND $received_date1 == NULL): ?>
                        <td>
                          <a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to Received this item?');" href='received_pr.php?id=<?php echo $id; ?>  ' title="Submit"> 
                          Receive </a>    
                        </td>
                           
                            <?php else: ?>
                              <td><?php echo $received_date?></td>
                            <?php endif ?>
                        <?php endif ?>

                        <td><!-- <a href="ViewPRv.php?id=<?php echo $id ?>"><?php echo $rfq_no;?></a> -->
                      
                        <?php if ($stat == "1"): ?>
                       <?php
                        $view_queryrfq = mysqli_query($conn, "SELECT * FROM rfq where pr_no = '$pr_no' ");
                        $rowrfq = mysqli_fetch_array($view_queryrfq);
                        $rfqid = $rowrfq['id'];
                       
                        ?>
                         <!-- &nbsp&nbsp&nbsp&nbsp&nbsp<a href='/pmis/frontend/web/rfq/view?id=<?php echo $rfqid; ?>'> <i style='font-size:20px' class='fa'>&#xf06e;</i> </a> -->
                        
                        <a class="" href='RFQdetails.php?id=<?php echo $rfqid; ?>'> 
                        <?php echo $rfq_no; ?>
                      
                      </a>
                        <?php endif?>

                        <?php if ($stat == "0"): ?>
                          <!-- <?php echo "For Encode";?> -->

                        <!-- &nbsp&nbsp&nbsp&nbsp&nbsp<a  href='CreateRFQ.php?prID=<?php echo $id;?>' title="View"> Create RFQ </a> -->
                        <a class="btn btn-success btn-xs" href='CreateRFQ.php?prID=<?php echo $id;?>' >Create</a>
                        <?php endif?>
                      
                      </td>
                        
                        <?php if ($rfq_date == ""): ?>
                          <td></td>
                        <?php endif?>  
                        <?php if ($rfq_date != ""): ?>
                          <td><?php echo $rfq_date1;?></td>
                        <?php endif?>
                        
                       <!--  <td>RFQ</td> -->
                        <td>

                        <?php if ($stat == "1"): ?>
                        <?php
                        $view_queryrfq = mysqli_query($conn, "SELECT * FROM rfq where pr_no = '$pr_no' ");
                        $rowrfq = mysqli_fetch_array($view_queryrfq);
                        $rfqid = $rowrfq['id'];

                        $query_2 = mysqli_query($conn,"SELECT id FROM rfq_items WHERE rfq_id = $rfqid ");
                        $row_2 = mysqli_fetch_array($query_2);
                        $rfq_items_id = $row_2['id'];

                        $selectABS = mysqli_query($conn,"SELECT * FROM abstract_of_quote WHERE rfq_id = '$rfqid' and abstract_no is not NULL");

                        
                        //echo "SELECT * FROM abstract_of_quote WHERE rfq_id = '$rfq_id'";
                       /*  if (mysqli_num_rows($selectABS) > 0 ) { */
                        $rowABS = mysqli_fetch_array($selectABS);
                        $supplier_id = $rowABS['supplier_id'];
                       // echo $supplier_id;

                        $select_sup = mysqli_query($conn,"SELECT supplier_title from supplier WHERE id = '$supplier_id'");
                        $rowSup = mysqli_fetch_array($select_sup);
                        $win_supplier = $rowSup['supplier_title'];

                       /*  echo $rfq_items_id;
                        exit(); */
                        
                        $query_3 = mysqli_query($conn,"SELECT * FROM supplier_quote WHERE rfq_item_id = '$rfq_items_id'");

                       
                        ?>

                        <?php if (mysqli_num_rows($query_3) == 0): ?>

                      
                          <a class="btn btn-success btn-xs"  href='CreateSupplierQuote.php?rfq_id=<?php echo $rfqid; ?>' title="View"> Create </a>


                        <?php else : ?>
                        

                          
                         <a class="" href='ViewSupplierItems.php?rfq_id=<?php echo $rfq_items_id; ?>' title="View"> <?php echo $win_supplier; ?> </a>
                        
                        <?php endif?>


                        <?php endif?>


                        <?php if ($stat == "0"): ?>
                        
                          <?php endif?> 
                         
                         <!--  /pmis/frontend/web/rfq/view?id= -->
                        </td>
                        
                        <td>
                        

                        <?php if ($stat == "1"): ?>
                        
                          <?php
                        $view_queryrfq = mysqli_query($conn, "SELECT * FROM rfq where pr_no = '$pr_no' ");
                        $rowrfq = mysqli_fetch_array($view_queryrfq);
                        $rfqid = $rowrfq['id'];

                        $query_2 = mysqli_query($conn,"SELECT id FROM rfq_items WHERE rfq_id = $rfqid ");
                        $row_2 = mysqli_fetch_array($query_2);
                        $rfq_items_id = $row_2['id'];

                       /*  echo $rfq_items_id;
                        exit(); */
                        
                        $query_3 = mysqli_query($conn,"SELECT * FROM  abstract_of_quote WHERE rfq_id = '$rfqid' and abstract_no is not NUll");
                       

                        $rowaoq = mysqli_fetch_array($query_3);
                        /* while(); */
                        $rowaoq_id = $rowaoq['abstract_no'];
                        $supplier_id = $rowaoq['supplier_id'];
                        $abstract_id = $rowaoq['id'];
                       
                      /*   echo "SELECT * FROM abstract_of_quote WHERE rfq_id = '$rfqid'";
                        exit(); */


                        ?>

                        <?php if (mysqli_num_rows($query_3) > 0): ?>
                        
                     
                         
                      
                            <?php
                            $query_aoq = mysqli_query($conn,"SELECT * FROM  aoq_data WHERE id = '$rowaoq_id'"); 
                            $aoq = mysqli_fetch_array($query_aoq);
                            $aoq_no =  $aoq['aoq_no'];


                              ?>
                            


                            <a class="" href='UpdateAoq.php?rfq_id=<?php echo $rfqid; ?>&supplier_id=<?php echo $supplier_id; ?>&abstract_id=<?php echo $abstract_id; ?>' title="View"><?php echo $aoq_no ; ?> </a>

                     
                        
                        
                        <?php else : ?>

                            
                          <a class="btn btn-success btn-xs"  href='CreateAoq.php?rfq_id=<?php echo $rfqid; ?> ' title="View"> Create </a>
                            
                        
                        <?php endif?> 
                  


                        <?php endif?>

                        <?php if ($stat == "0"): ?>
                        
                          <?php endif?>
                      
                        </td>
                        <td>
                        
                          
                        <?php if ($stat == "1"): ?>
                      

                          <?php
                        $view_queryrfq = mysqli_query($conn, "SELECT * FROM rfq where pr_no = '$pr_no' ");
                        $rowrfq = mysqli_fetch_array($view_queryrfq);
                        $rfqid = $rowrfq['id'];
/* 
                        $query_2 = mysqli_query($conn,"SELECT id FROM rfq_items WHERE rfq_id = $rfqid ");
                        $row_2 = mysqli_fetch_array($query_2);
                        $rfq_items_id = $row_2['id']; */

                       /*  echo $rfq_items_id; */
                       /*  exit(); */
                        
                   
                        $query_3 = mysqli_query($conn,"SELECT * FROM  selected_quote WHERE rfq_id = '$rfqid'");
                       
                        $rowpoid = mysqli_fetch_array($query_3);
                        $rowpo_id = $rowpoid['po_id'];

                   /*      echo $rowpo_id;
                        exit(); */
                     
                       
                        ?>

                        <?php if (mysqli_num_rows($query_3) > 0): ?>
                       
                             
                          <?php if ($rowpo_id==NULL): ?>



                           <a class="btn btn-success btn-xs"  href='CreatePO.php?rfq_id=<?php echo $rfqid; ?>&supplier_id=<?php echo $supplier_id; ?>' title="View"> Create </a>
                         
                          <?php else : ?>
                              <?php
                              $query_4 = mysqli_query($conn,"SELECT * FROM  po WHERE id = '$rowpo_id'");
                       
                              $po_id = mysqli_fetch_array($query_4);
                              $po_idget = $po_id['id'];
                              $po_no = $po_id['po_no'];
                              
                              ?>
                              


                           <a class="" href='ViewPO.php?rfq_id=<?php echo $rfqid; ?>&supplier_id=<?php echo $supplier_id; ?>' title="View"> <?php echo $po_no; ?></a>
                            

                     
                          <?php endif?> 
                        
                     

                        
                        
                        <?php endif?> 


                        <?php endif?>

                        <?php if ($stat == "0"): ?>
                        
                          <?php endif?>
                       
                        </td>
                      
                </tr>
            <?php } ?>

            
        </table>
    </div>
</div>

</div>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#exmaple1').DataTable();

    } );
</script>

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


