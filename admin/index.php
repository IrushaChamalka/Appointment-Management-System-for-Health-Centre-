<?php 
    session_start();
    if(!isset($_SESSION['admin-username'])){
        include('./login.php');
    }
    else{
        include('./admin_header.php');
        if(isset($_GET['path']))
        {
            if($_GET['path'] === 'appointments'){
                include('./appointments.php');
            }
            elseif($_GET['path'] === 'doctor'){
                include('./doctor.php');
            }elseif($_GET['path'] === 'logout'){
                include('../admin/logout.php');
            }else {
                header("location: .");
            }
        }else{
                include('./appointments.php');
                ob_end_flush();
        }
        include('./admin_footer.php');
    }
?>