<!-- <?php

  include('Geocoding.php');
  use myPHPnotes\Geocoding;
  $geo = new Geocoding("AIzaSyDhwrxbj4AWSCel1yCqpujxUxr72g4WzgY");
  $address = $geo->getAddress(48.858195,2.294432);
  var_dump($address);
?> -->

 <?php 
 $id = $_GET['id'];
 $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
 $query = mysqli_query($conn,"SELECT ACCESSTYPE,DEPT_ID,TIN_N,ORD,APPROVEDBY,CONCAT(FIRST_M, ' ', MIDDLE_M, ' ', LAST_M) AS fullname FROM tblemployeeinfo WHERE EMP_N = $id");
 $row = mysqli_fetch_array($query);
 $role = $row['APPROVEDBY'];
 $ACCESSTYPE = $row['ACCESSTYPE'];
 $TIN_N = $row['TIN_N'];
 $ORD = $row['ORD'];
 $fullname = $row['fullname'];
 $DEPT_ID = $row['DEPT_ID'];

 if (isset($_POST['submit'])) {
  $UROLE = $_POST['UROLE'];
  $HR = $_POST['HR'];
  $TIN_N = $_POST['TIN_N'];
  $ORD = $_POST['ORD'];
  $DEPT_ID = $_POST['DEPT_ID'];
  $updateQ = mysqli_query($conn,"UPDATE tblemployeeinfo SET APPROVEDBY = '$UROLE', ACCESSTYPE = '$HR',TIN_N = '$TIN_N',ORD = '$ORD',DEPT_ID = '$DEPT_ID' WHERE EMP_N = $id");
  if ($updateQ) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Assigned!')
      window.location.href='Accounts.php';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Error Occured!');
      </SCRIPT>");

  }
}

?>
<div class="box box-success">
  <div class="box-header with-border">
   <h1 align="center" style="font-family: Cambria;">User Role</h1>
   <br>
   <br>
   <form method="POST">
    <legend><?php echo $fullname?></legend>
    <div class="col-md-10" >

      <div class="form-group">
        <label>Bac Staff </label>
        <select class="form-control select2" name="DEPT_ID">
          <?php if ($DEPT_ID == 1): ?>
           <option value="1">Yes</option>
           <option value="NULL">No</option>
           <?php else: ?>
             <option value="NULL">No</option>
             <option value="1">Yes</option>
           <?php endif ?>

         </select>
       </div>
       <div class="form-group">
        <label>Human Resource </label>
        <select class="form-control select2" name="HR">
          <?php if ($ACCESSTYPE == 'user'): ?>
           <option value="user">User</option>
           <option value="admin">Admin</option>
           <?php else: ?>
             <option value="admin">Admin</option>
             <option value="user">User</option>
           <?php endif ?>

         </select>
       </div>
       <div class="form-group">
        <label>DTR Printing </label>
        <select class="form-control select2" name="TIN_N">
          <?php if ($TIN_N == '0' || $TIN_N == NULL): ?>
           <option value="0">No</option>
           <option value="1">Yes</option>
           <?php else: ?>
             <option value="1">Yes</option>
             <option value="0">No</option>
           <?php endif ?>

         </select>
       </div>

       <div class="form-group">
        <label>Asset Management </label>
        <select class="form-control select2" name="ORD">
          <?php if ($ORD == NULL || $ORD == '0'): ?>
           <option value="0">No</option>
           <option value="1">Yes</option>
           <?php else: ?>
             <option value="1">Yes</option>
             <option value="0">No</option>
           <?php endif ?>

         </select>
       </div>

       <br>
       <br>
       <button class="btn btn-primary" type="submit" name="submit">Submit</button>
     </div>
   </div>
 </form>
</div>  
</div>  


