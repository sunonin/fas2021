<?php 
ob_start();
?>

<html>
<head>
  <title>Asset Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body style="background: lightgray;">
<div class="box">
        <div class="box-body"> 
      <br>
      
            <h1 align="">Update Requisition and Issue Slip</h1>
             <div class="box-header with-border">
    </div>
    <br>
      <li class="btn btn-success"><a href="ViewRIS.php" style="color:white;text-decoration: none;">Back</a></li>
      <br>
      <br>
      <p>&nbsp</p>
      <form method="POST" id="">
        <div  class="col-xs-3">
          <label>Division : </label>
          <?php
          $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
          $sq = mysqli_query($conn,"SELECT division from ris where id ='".$_GET['id']."' ");
          while ($row = mysqli_fetch_assoc($sq)) {
            echo '<input readonly type="text" class="form-control" style="height: 40px;"  placeholder="" name="division" id="sup" value="'.$row['division'].'" />';   
          }
          ?>
        </div>
        <form method="POST" id="">
          <div  class="col-xs-3">
            <label>PO No. : </label>
            <?php
            $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
            $sq = mysqli_query($conn,"SELECT po_no from ris where id ='".$_GET['id']."' ");
            while ($row = mysqli_fetch_assoc($sq)) {
              echo '<input readonly type="text" class="form-control" style="height: 40px;"  placeholder="" name="po_no" id="sup" value="'.$row['po_no'].'" />';   
            }
            ?>
          </div>
          <form method="POST" id="">
            <div  class="col-xs-3">
              <label>RIS No. : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT ris_no from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                echo '<input  type="text" class="form-control" style="height: 40px;"  placeholder="" name="ris_no" id="sup" value="'.$row['ris_no'].'" />';   
              }
              ?>
            </div>
            <div class="col-xs-3">
              <label>Remarks : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT remarks from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                $remarks = $row['remarks'];
                echo '<textarea type="text" class="form-control"  name="remarks" id="sup" >'.$row['remarks'].'</textarea>';   
              }
              ?>
            </div>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <div class="col-xs-3">
              <label>Requested By : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT request_by from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                $request_by = $row['request_by'];
                if ($request_by == 1) {
                  echo ' <select name="request_by" class="form-control">
                  <option value="1">ELOISA G. ROZUL</option>
                  <option value="2">JOHN M. CEREZO</option>
                  <option value="3">DR. CARINA S. CRUZ</option>
                  </select>';   
                }

                if ($request_by == 2) {
                  echo '<select name="request_by" class="form-control">
                  <option value="2">JOHN M. CEREZO</option>
                  <option value="1">ELOISA G. ROZUL</option>
                  <option value="3">DR. CARINA S. CRUZ</option>
                  </select>';   
                }

                if ($request_by == 3) {
                  echo '<select name="request_by" class="form-control">
                  <option value="3">DR. CARINA S. CRUZ</option>
                  <option value="2">JOHN M. CEREZO</option>
                  <option value="1">ELOISA G. ROZUL</option>
                  </select>';   
                }

              }
              ?>
            </div>

            <div class="col-xs-3">
              <label>Approved By: </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT approved_by from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                echo '<input readonly type="text" class="form-control" style="height: 40px;"  placeholder="" name="approved_by" id="sup" value="'.$row['approved_by'].'" />';   
              }
              ?>
            </div>
            <div  class="col-xs-3">
              <label>Issued By : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT issued_by from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                echo '<input readonly type="text" class="form-control" style="height: 40px;"  placeholder="" name="issued_by" id="sup" value="'.$row['issued_by'].'" />';   
              }
              ?>

            </div>
            
            <div class="col-xs-3">
              <label>Recieved by : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT recieved_by from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                echo '<input type="text" class="form-control" style="height: 40px;"  placeholder="" name="recieved_by" id="sup" value="'.$row['recieved_by'].'" />';   
              }
              ?>
            </div>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <div class="col-xs-3">
              <label>Purpose : </label>
              <?php
              $conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
              $sq = mysqli_query($conn,"SELECT purpose from ris where id ='".$_GET['id']."' ");
              while ($row = mysqli_fetch_assoc($sq)) {
                echo '<textarea type="text" class="form-control" style="width: 1000px;height: 100px;"  name="purpose" id="sup"  >'.$row['purpose'].'</textarea> ';   
              }
              ?>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div > 
          <input type="button" name="submit" class="btn btn-primary" value="Save" />
            </div>
<div class="box-header with-border">
        <div class="table-repsonsive">
          <table align="center"  style="background-color: white;width: 500px;border-width: medium;" class="table table-bordered" id="item_table" >
            <tr style="background-color: lightblue;">
             <th>Items</i></th>
             <th>Quantity</i></th>
             <th>Option</th>
             <th>&nbsp</th>
           </tr>
           <tr>
            <?php 
            $conn = new PDO('mysql:host=localhost;dbname=fascalab_2020;charset=utf8', 'fascalab_2020', 'w]zYV6X9{*BN');
            $con = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
            $selectRISno = mysqli_query($con,"SELECT ris_no FROM ris WHERE id = '".$_GET['id']."' ");
            $rowRIS = mysqli_fetch_array($selectRISno);
            $ris_noo = $rowRIS['ris_no'];
            $id2 = $_GET['id'];

            $sql_items = $conn->query("SELECT * FROM ris_stock WHERE ris_no = '$ris_noo'");
            while ($row = $sql_items->fetch()) {
              $id = $row['id'];
              $qty = $row['qty'];
              $procurement1 = $row['procurement'];
              $rfq_id1 = $row['rfq_id'];
              $app_id1 = $row['app_id'];
              $description1 = $row['description'];
              $unit_id1 = $row['unit_id'];
              $abc1 = $row['abc'];
              ?>
              <td hidden><?php echo $id; ?> </td>
              
              <td> <?php echo $procurement1; ?></label></td>
              <td> <?php echo $qty; ?></label></td>
              <td align="center"><?php echo '<a href="UpdateRISitems.php?id='.$id.'&id2='.$id2.'&ris_no='.$ris_noo.'">'?><i style='font-size:20px' class='fa'>&#xf044;</i></a></td>
              <td align="center"><a href="delete_ris_items.php?id=<?php echo $id?>"><i style="font-size:24px" class="fa fa-trash-o"></i></a></td>

            </tr>
          <?php } ?>
        </table>
       
      </div>
    </div>
      </form>
    </div>
  </div>
</body>
</html>
<?php
$conn = mysqli_connect("localhost", "fascalab_2020", "", "fascalab_2020");
if (isset($_POST['submit'])) 
{
  $division = $_POST['division'];
  $po_no = $_POST['po_no'];
  $remarks = $_POST['remarks'];
  $request_by = $_POST['request_by'];
  $approved_by = $_POST['approved_by'];
  $issued_by = $_POST['issued_by'];
  $recieved_by = $_POST['recieved_by'];
  $purpose = $_POST['purpose'];
  $id = $_GET['id'];


  $update_qty_from_ris = mysqli_query($conn,"UPDATE `ris` SET `division`='$division',`po_no`='$po_no',`remarks`='$remarks',`request_by`='$request_by',`approved_by`='$approved_by',`issued_by`='$issued_by',`recieved_by`='$recieved_by',`purpose`='$purpose' WHERE id = '$id'");
  
  if (!empty($update_qty_from_ris))
  {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('RIS Updated!')
      </SCRIPT>");
    header("Refresh:0");
  } else {
   echo "Error: " ;
 }
}
ob_end_flush();

?>


