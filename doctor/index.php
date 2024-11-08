<?php 
    session_start();

    if (!isset($_SESSION['dr_nic'])) {
        include('./doctor_login.php');
        include('./isWork.php');
    } else {
        if(isset($_GET['path']))
        {
            if($_GET['path'] === 'appointment'){
                include('./doctor_dashbord.php');
            }
            elseif($_GET['path'] === 'logout'){
                header('location: logout.php' );
            }
            elseif($_GET['path'] === 'reset'){
                include('./reset_password.php' );
            }
            else {
                header("location: .");
            }
        }else{
            include('./doctor_dashbord.php');
            ob_end_flush();
        }
    }

?>
