<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        var_dump($_POST);
        if(isset($_POST["appoinment_submit"])){
            $reg = $row['reg_number'];
            $name = $row['name_with_initials'];
            $email = $row['email'];
            $gender = $row['gender'];
            $remark = $_POST['remark'];
            $push_apt_sql = "INSERT INTO `bookings`(`number`, `reg_number`, `name`, `email`, `date`, `remark`, `gender`) VALUES ('$sheet','$reg','$name','$email','$selected','$remark', '$gender')";
            mysqli_query($conn, $push_apt_sql);
            ?>
                <script>window.location.href = "./"</script>
            <?php
        }
        
    }
    
?>