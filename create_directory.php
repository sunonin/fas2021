<?php
$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

if (isset($_POST['submit'])) {
  $group =$_POST['group'];
  $agency =$_POST['agency'];
  $head_director =$_POST['head_director'];
  $contact =$_POST['contact'];
  $email =$_POST['email'];
  $address =$_POST['address'];

  $INSERT = mysqli_query($conn,"INSERT INTO `phone_directory`(`group`, `agency`, `head_director`, `contact_no`, `email`, `address`) VALUES ('$group','$agency','$head_director','$contact','$email','$address')");

  if ($INSERT) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfuly Added!')
        window.location.href='Directory.php';
        </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error Occured!')
        </SCRIPT>");

  }

}

?>
<div class="box">
  <div class="box-body">
    <h1 align="">&nbspAdd Phone Directory</h1>
    <br>
    &nbsp &nbsp &nbsp   <li class="btn btn-success"><a href="ViewPR.php" style="color:white;text-decoration: none;">Back</a></li>
    <br>
    <br>
    <form method="POST" >
      <div class="box-body">
        <div class="well">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Group <label style="color: Red;" >*</label></label>
                <select class="form-control select2"  name="group" >
                  <option disabled selected></option>
                  <option value="Local Government Units">Local Government Units</option>
                  <option value="League of Mayors">League of Mayors</option>
                  <option value="Private Sector Representatives">Private Sector Representatives</option>
                  <option value="Regional Line Agencies">Regional Line Agencies</option>
                  <option value="NON-VOTING RLAs">NON-VOTING RLAs</option>
                  <option value="States, Universities and Colleges">States, Universities and Colleges </option>
                  <option value="REGULAR GUESTS">REGULAR GUESTS </option>
                </select>
              </div>
              <div class="form-group">
                <label>Agency <label style="color: Red;" >*</label></label>
                <input type="text" class="form-control"  name="agency"  >
              </div>
              <div class="form-group">
                <label>Head/Director <label style="color: Red;" >*</label></label>
                <input  class="form-control" name="head_director" type="text" >
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label>Contact No. <label style="color: Red;" >*</label></label>
              <input  class="form-control" name="contact" type="text" >
            </div>
            <div class="form-group">
              <label>Email <label style="color: Red;" >*</label></label>
              <input  class="form-control" name="email" type="text" >
            </div>
            <div class="form-group">
              <label>Address <label style="color: Red;" >*</label></label>
              <input  class="form-control" name="address" type="text" >
            </div>
          </div>
        </div>
      </div>
            <button class="btn btn-success" name="submit">Save</button>
    </form>
  </body>
