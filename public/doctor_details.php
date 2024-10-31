<style>
    .doctor-image {
        width: 50px;

    }

    .card {
      width: 400px;
    }

    .doctor-container {
      display: flex;
      flex-direction: row;
      gap: 20px;
      margin-left: 20px;
    }
    h5 {
      margin-left: 20px;
    }
  
</style>

<?php 

  $sql = "SELECT * FROM `doctor` WHERE `is_work` = 1";
  $result = mysqli_query($conn, $sql);
  $num_doctors = mysqli_num_rows($result);
?>
<h5>Available</h5>
<div  class="doctor-container">
  <?php if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
    ?>
  <div class="card">
  <div class="card-body d-flex align-items-center gap-5">
    <img class="card-img-left doctor-image" src="../assets/images/DoctorAvatar-01.jpg" alt="Card image cap">
    <div>
    <h5 class="card-title"><?php echo $row['dr_name']?></h5>
    </div>
  </div>
</div>
<?php }}?>
</div>

