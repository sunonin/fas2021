<div class="row">
<button class="pull-right btn btn-success" style = "margin-left:10px;"><a style = "color:#fff;" href = "calAddEvents.php" href="library/export_calendar.php?date=<?php echo $currentDate;?>&division=<?php echo $_SESSION['division'];?>" >Export</a></button>
    <button class="pull-right btn btn-success" style = "margin-left:10px;"><a href ="ManageCalendar.php" style ="color:#fff;decoration:none;">Manage All Events</a></button>
        <button class="pull-right btn btn-success"  ><a style = "color:#fff;" href = "calAddEvents.php"> Add Events</a></button>

            <div class="col-md-2" id = "selectMonth" >
                </div>
                <div class="col-md-2">
                    <select class="form-control " id="selectYear" style="width: 100%;">
                        <?php 
                        for($i= 2020; $i < 2031; $i++)
                        {
                        echo '<option value='.$i.'>'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                                  <div class="col-md-2">
                                      <?php 
                                      $currentDate = '2020-04-06';
                                      require_once 'connection.php';
                                      echo '<select class="form-control division_dropdown " id="selectDivision" style="width: 100%;">';
                                          $sql = mysqli_query($conn, "SELECT DIVISION_N,DIVISION_M FROM `tblpersonneldivision` ORDER BY DIVISION_N ASC");
                                          if (mysqli_num_rows($sql)>0) {
                                              while($row = mysqli_fetch_assoc($sql) )
                                              {
                                                  $selectedOpt = ($row['DIVISION_N'] == $_SESSION['division'])?'selected':''; 

                                                  echo '<option text="text" value="'.$row["DIVISION_N"].'" '.$selectedOpt.' >'.$row["DIVISION_M"].'</option>';
                                              }
                                          }
                                      echo '</select>';
                                      
                                      
                                      ?>
                                  </div>
                                
                                  
                              </div>