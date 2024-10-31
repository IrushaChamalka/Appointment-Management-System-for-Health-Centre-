
<?php 
    session_start();
    include('../db_config.php');
    $id = $_SESSION['dr_id'];
    $dr_n = "SELECT * FROM `doctor` WHERE  `dr_id`= '$id'";
    
    $result = mysqli_query($conn, $dr_n);
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
    }

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        if(isset($_POST['isin'])) {
            $is_work = 1;
        }if(isset($_POST['isout'])){
            $is_work = 0;
        }
        $sql = "UPDATE `doctor` SET `is_work`='$is_work' WHERE `dr_id` = '$id'";
        mysqli_query($conn, $sql);
    }


    header("Location: index.php");
    exit;
?>