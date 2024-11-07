<?php
session_start(); 
$reg_num = $_SESSION['reg_number'];
$today =new DateTime();
$today_date=$today->format('Y-m-d');

$sql_active = "SELECT * FROM `bookings` WHERE `reg_number` = '$reg_num' AND `marked` = 0 AND `date` = '$today_date'";
$result = mysqli_query($conn, $sql_active);
?>

<body>
    <h4 style="margin-top: 100px; margin-left: 20px; margin-bottom: 20px;">Active Appointment:</h4>
    <div class="" style="margin-left: 30px; display: flex; flex-wrap: wrap; gap: 10px">
    <?php 
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                ?> 
                    <div class="card mb-5" style="width: 300px">
                        <div class="card-header" style="background-color: green; color: white">
                            <?php echo "#".$row['id']?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p>Appointment Number: <?php echo $row['number'] ?></p>
                            <footer class="blockquote-footer"><?php echo $row['date']?>
                            </blockquote>
                        </div>
                    </div>
                <?php
            }
        }
        else{
    ?>  
    
    <div class="card text-center">
        <div class="card-header">
            Not Found
        </div>
        <div class="card-body">
            <h5 class="card-title">No Any Active Appointments</h5><br>
            <a href="./../public/index.php" class="btn btn-primary">Make Appointment</a>
        </div>

    </div>

    <?php } ?>

    </div>

<?php
    $sql_all = "SELECT * FROM `bookings` WHERE `reg_number` = '$reg_num'  ORDER BY `date`  DESC";
    $result2 = mysqli_query($conn, $sql_all);
?>

<body>
<h4 style="margin-top: 50px; margin-left: 20px; margin-bottom: 40px">Previous Appointment:</h4>
    <div class="d-flex gap-5 flex-wrap" style="margin-left: 30px;">
    <?php 
        if(mysqli_num_rows($result2)>0){
            while($row=mysqli_fetch_assoc($result2)){
                ?> 
                    <div class="card mb-5" style="min-width: 300px">
                        <div class="card-header" >
                            <?php echo "#".$row['id']?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p>Appointment Number: <?php echo $row['number'] ?></p>
                            <footer class="blockquote-footer"><?php echo $row['date']?>
                            </blockquote>
                        </div>
                    </div>
                <?php
            }
        }
        else{
    ?>  

    
    <div class="card text-center">
        <div class="card-header">
            Not Found
        </div>
        <div class="card-body">
            <h5 class="card-title">No Any Appointments</h5><br>
            <a href="./../public/index.php" class="btn btn-primary">Make Appointment</a>
        </div>

    </div>

    <?php }?>
    

</body>


