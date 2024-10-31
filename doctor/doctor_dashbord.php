<?php include('../db_config.php')?>
<?php  include('./doctor_header.php') ?>
<?php include('./isWork.php') ?>
<div class="mt-4 position-relative">
      <div class="d-flex justify-content-around align-items-center">
      <p class="display-6 text-center">APPOINTMENTS</p>
      <div class="d-flex  gap-3">
        <p>Pick A Date</p>
        <form action="" method="POST" >
        <select name="select-date" id="select-date" onchange="this.form.submit()">
          <?php 
            $today =new DateTime();
            $selected_date = isset($_POST['select-date']) ? $_POST['select-date'] : "";
            ?><option value="today" <?php echo ($selected_date == "") ? "selected" : ""; ?>><?php  echo "Today" ?></option><?php
              $size = 6;
              for($i=1; $i<=$size; $i++) {
                $next_day = clone $today;
                $next_day->modify("+$i day");
                if($next_day->format("w") == 0 || $next_day->format("w") == 6) {
                  $size++;
                }else {
                  $date_value = $next_day->format('Y-m-d');
                  ?>   
                    <option value="<?php echo $next_day->format('Y-m-d'); ?>" <?php echo ($selected_date == $date_value)? "selected" : "";?>><?php  echo $next_day->format("D,j M")?></option>
                  <?php
                }
            }  
          ?>
          </select>
        </form>
      </div>
      </div>
      
      <div class="btn-group d-flex flex-wrap justify-content-start w-75 mx-auto" role="group" aria-label="Basic radio toggle button group">

      <?php 
      $booked = array();
      $marked = array();
      if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['select-date'])){
        $selected = $_POST['select-date'];
        if($selected === "today") {
          $date = new DateTime();
          $selected = $date->format('Y-m-d'); 
        }
    
        
      }else {
        $date = new DateTime();
        $selected = $date->format('Y-m-d'); 
      }
      $sel_query = "SELECT * FROM `bookings` WHERE `date` = '$selected'";
      $result = mysqli_query($conn, $sel_query);
    
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          array_push($booked, $row['number']);
          if($row['marked'] == 1) {
            array_push($marked, $row['number']);
          }
        }
      }
      for($i=1; $i<=100; $i++) {
        ?>

        <div class="p-2" style="max-width: calc(10% - 10px)">
          <?php 
          if(in_array($i, $booked)){
            if(in_array($i, $marked)){
              ?>
              <input type="radio" class="btn-check" name="" id=<?php echo "btnradio".$i ?> autocomplete="off" checked>
              <label class="btn btn-outline-success custom-btn-size" onclick="showModal(<?php echo $i; ?>)"  for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
              <?php
            }else{
            ?>
              <input type="radio" class="btn-check" name="" id=<?php echo "btnradio".$i ?> autocomplete="off" checked>
              <label class="btn btn-outline-danger custom-btn-size" onclick="showModal(<?php echo $i; ?>)"  for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
            <?php

            }

          }
          else {
            ?>
              <input type="radio" class="btn-check" name="btnchecked" disabled id=<?php echo "btnradio".$i ?>  autocomplete="off" onclick="setSheet(<?php echo $i ?>)">
              <label class="btn btn-outline-primary custom-btn-size" for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
            <?php
          }
          ?>
        </div>
      
        <?php
      }
      ?>
      
    </div>

    <?php 
  if (isset($_GET['sheet']) && isset($_GET['date'])) {
    $date = $_GET['date'];
    $sheet = $_GET['sheet'];

    $sql = "SELECT * 
    FROM user_details 
    JOIN bookings ON bookings.reg_number = user_details.reg_number 
    WHERE bookings.number = '$sheet' 
    AND bookings.date = '$date';";


    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result); 
    }
    ?>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
            let seatModal = new bootstrap.Modal(document.getElementById('seatModal'));
            seatModal.show();
            });
    </script>
    <?php

  }

?>

    <div class="modal fade" id="seatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment Details</h5>
            </div>
            <div class="modal-body">
                <div class="form-group pb-3">
                    <label for="name">NAME:</label>
                    <input class="form-control" type="text" id="modal_name" value="<?php echo isset($row['name_with_initials']) ? $row['name_with_initials']: ''; ?>" disabled>
                </div>

                <div class="form-group pb-3">
                    <label for="name">Reg_num</label>
                    <input class="form-control" type="text" id="modal_name" value="<?php echo isset($row['reg_number']) ? $row['reg_number']: ''; ?>" disabled>
                </div>

                <div class="form-group pb-3">
                    <label for="tel">TEL:</label>
                    <input class="form-control" type="tel" id="modal_tel" value="<?php echo isset($row['mobile_number']) ? "0".$row['mobile_number']: ''; ?>" disabled>
                </div>
                <div class="form-group pb-3">
                    <label for="nic">NIC:</label>
                    <input class="form-control" type="text" id="modal_nic" value="<?php echo isset($row['nic']) ? $row['nic']: ''; ?>" disabled>
                </div>
                <div class="form-group pb-3">
                    <label for="date">DATE:</label>
                    <input class="form-control" type="text" id="modal_date" value="<?php echo $_GET['date']?>" disabled>
                </div>
                <div class="form-group pb-3">
                    <label for="sheet">SHEET:</label>
                    <input class="form-control" type="text" id="modal_sheet" value="<?php echo $_GET['sheet'] ?>" disabled>
                </div>
                <form  method="post">
                <div class="form-group ">
                  <input type="submit" name="mark" class="btn btn-primary m-4 px-4" value="<?php echo in_array($sheet,$marked)?"Incompleted":"Completed"?>">
                </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='./'" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<?php 
  if(array_key_exists('mark', $_POST)){
    $sheet = $_GET['sheet'];
    $date = $_GET['date'];
    $get_sql = "SELECT `marked` FROM `bookings` WHERE number = '$sheet' AND date = '$date';";
    $get_res = mysqli_query($conn, $get_sql);
    if(mysqli_num_rows($get_res) === 1) {
      $row_get = mysqli_fetch_assoc($get_res);
      if($row_get['marked'] == 0) {
        $mark = 1;
        echo $row['reg_number'];
      }else {
        $mark = 0;
      }
      $sql= "UPDATE `bookings` SET `marked`='$mark' WHERE `number` = '$sheet' AND `date`='$date';";
      mysqli_query($conn, $sql);
    }
      
    
  }
    
      
  

?>

<script>
function showModal(seatNumber) {
  
    window.location.href = "./?sheet=" + seatNumber + "&date=<?php echo $selected?>";
}
</script>

<?php include("./doctor_footer.php") ?>