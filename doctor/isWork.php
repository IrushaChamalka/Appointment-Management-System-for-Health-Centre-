<style>
    .welcoming {
        font-size: 30px;
        text-align: center;
        width: 100%;
        
    }

    .buttons {
        
        text-align: center;
    }

    .isWork {
        padding: 10px 0 50px 0;
    }

</style>
<?php 
    if(isset($_SESSION['dr_id'])){
        $id = $_SESSION['dr_id'];
        $dr_n = "SELECT * FROM `doctor` WHERE  `dr_id`= '$id'";
    
        $result = mysqli_query($conn, $dr_n);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
        }

        ?>
        <div class="isWork">
            <p class="welcoming">Welcome Dr. <?php echo $row['dr_name']?></p>
            <form action="doctor_set.php" method="post">
                <div class="buttons">
                    <button class="btn btn-primary" type="submit" <?php echo $row['is_work']?"disabled":""?> name="isin">I'm In</button>
                    <button class="btn btn-danger" type="submit" <?php echo !$row['is_work']?"disabled":""?> name="isout">I'm Out</button>    
                </div>
            </form>
        </div>
        <?php
    }
    
?>



