
    <style>
      .custom-btn-size { 
        font-size: 10px;    
        width: 40px;
        height: 40px;
      }
      .select-tag {
        flex: 0 1 80px;
      }

      .name-tag{
        flex: 1;
      }
      label {
        font-size: 12px;
        font-weight: bold;
      }
      .form-inputs {
        margin-bottom: 20px;
      }
      .radio-select {
        font-size: 12px;
        font-weight: bold;
      }
      input::placeholder {
        font-size: 14px;
      }

    </style>
    <div class="mt-4 position-relative">
      <div class="d-flex justify-content-around align-items-center">
      <p class="display-6 text-center">PLACE YOUR APPOINTMENT</p>
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
                <label class="btn btn-outline-success custom-btn-size" for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
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
              <input type="radio" class="btn-check" name="btnchecked" id=<?php echo "btnradio".$i ?>  autocomplete="off" onclick="setSheet(<?php echo $i ?>)">
              <label class="btn btn-outline-primary custom-btn-size" for=<?php echo "btnradio".$i ?>><span class="" style=" font-size: 14px"><?php echo $i ?></span></label>
            <?php
          }
          ?>
        </div>
      
        <?php
      }
      ?>
      
      </div>
      <div class="w-75 d-flex flex-wrap justify-content-end">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getRegistrationNum">
      Continue
    </button>
      </div>

  </div>
    
  <div>


<div class="modal fade" id="getRegistrationNum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Your Registration Number:</h5>
      </div>
      <form action="" method="GET">
        <div class="modal-body">
          
            <select name="year" id="" class="custom-select custom-select-lg mb-3 p-2">
              <option selected>Year</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
            </select>
            
            <select name="dept" id="" class="custom-select custom-select-lg mb-3 p-2">
              <option selected>Department</option>
              <option value="L">A</option>
              <option value="MGT">BAD</option>
              <option value="MGT">BS</option>
              <option value="MGT">BST</option>
              <option value="MGT">COM</option>
              <option value="CSC">CSC</option>
              <option value="PHY">PHY</option>
              <option value="L">L</option>
              <option value="L">MS</option>
              <option value="L">NUR</option>
              <option value="L">PHA</option>
            </select>
            <input type="text" name="num" id="" placeholder="enter number" class="" style="padding: 6px">
            <div class="input-group">
            <input type="text" name="sheet" class="sheet" value="" style="display: none;">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '.'">Close</button>
          <button type="submit" class="btn btn-primary">Continue</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function setSheet(num) {
    console.log(num);
    let sheet = num;
    getSheet(sheet);
  }

  function getSheet(num) {
    let sheetOut =document.querySelector('.sheet');
    sheetOut.setAttribute('value', num);
  }

</script>


<?php  

  if(isset($_GET["year"]) && isset($_GET['dept']) && isset($_GET["num"])){
    $year = $_GET["year"];
    $dept = $_GET["dept"];
    $num = $_GET["num"];
    $sheet = $_GET["sheet"];

    $reg_number = $year.$dept.$num;
    $user_select_sql = "SELECT * FROM user_details WHERE reg_number = '$reg_number'";
    $user_res = mysqli_query($conn, $user_select_sql); 

    if( mysqli_num_rows($user_res) === 1){
      $row = mysqli_fetch_assoc($user_res);
       ?> 
          <div class="modal fade" id="getAppo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php include('./appointment_details.php') ?>
          </div>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
            let myModal = new bootstrap.Modal(document.getElementById('getAppo'));
            myModal.show();
            });
          </script>
       <?php
    }
    else {
      ?>
        <div class="modal fade" id="notFoundId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <?php 
            include('./reg_num_err.php');
          ?>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            let idNotFound = new bootstrap.Modal(document.getElementById('notFoundId'));
            idNotFound.show();
            });
          </script>

      <?php
    }
  }

?>



  </div>
    </body>
