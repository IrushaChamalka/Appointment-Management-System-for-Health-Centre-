<?php include('../db_config.php')?>
<?php  include('./doctor_header.php') ?>
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
      $sel_query = "SELECT number FROM `bookings` WHERE `date` = '$selected'";
      $result = mysqli_query($conn, $sel_query);
    
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          array_push($booked, $row['number']);
        }
      }
      for($i=1; $i<=100; $i++) {
        ?>

        <div class="p-2" style="max-width: calc(10% - 10px)">
          <?php 
          if(in_array($i, $booked)){
            ?>
              <input type="radio" class="btn-check" name="" id=<?php echo "btnradio".$i ?> autocomplete="off" checked>
              <label class="btn btn-outline-danger custom-btn-size" onmouseover="showModal(<?php echo $i; ?>)"  for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
            <?php
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

    <div class="modal fade" id="seatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Confirm Your Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">NAME:</label>
                    <input class="form-control" type="text" id="modal_name" disabled>
                </div>
                <div class="form-group">
                    <label for="tel">TEL:</label>
                    <input class="form-control" type="tel" id="modal_tel" disabled>
                </div>
                <div class="form-group">
                    <label for="nic">NIC:</label>
                    <input class="form-control" type="text" id="modal_nic" disabled>
                </div>
                <div class="form-group">
                    <label for="date">DATE:</label>
                    <input class="form-control" type="text" id="modal_date" disabled>
                </div>
                <div class="form-group">
                    <label for="sheet">SHEET:</label>
                    <input class="form-control" type="text" id="modal_sheet" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
function showModal(seatNumber) {
    // Fetch the data dynamically for this seat (this is where you would add PHP values)
    document.getElementById('modal_name').value = "John Doe";  // Example name, replace with dynamic PHP data
    document.getElementById('modal_tel').value = "1234567890";  // Replace with PHP data
    document.getElementById('modal_nic').value = "991234567V";  // Replace with PHP data
    document.getElementById('modal_date').value = "2024-10-28";  // Example date, replace with selected date
    document.getElementById('modal_sheet').value = seatNumber;  // Display the seat number

    // Show the modal
    $('#seatModal').modal('show');
}

</script>


<?php include("./doctor_footer.php") ?>