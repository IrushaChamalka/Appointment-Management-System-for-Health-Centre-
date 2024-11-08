
<?php
session_start();
include('../db_config.php');
    if(!isset($_SESSION['reg_number'])){
        header("location: login/login.php");
    }

    if(isset($_GET['action'])){
        if($_GET['action'] == 'signout'){
            session_unset();
            session_destroy();
            header("location: ../public/?path=login");
        }
    }
    include('./user_header.php');
    if(isset($_GET['path']))
    {
        if($_GET['path'] === 'appoinment'){

            include('dashboard/appointments.php');
        }

        elseif($_GET['path'] === 'dashboard'){
            include('dashboard/user_prof.php');
        }
        elseif($_GET['path'] === 'reset'){

            include('reset_password/reset_password.php');
        }
        elseif($_GET['path'] === 'logout') {
            ?>
                <script>window.location.href="./login/logout.php"</script>
            <?php
        }
        
        else {
            include('dashboard/appointments.php');
        }

    }else{
        header("location: ./?path=appoinment");
    }
    include('./user_footer.php');
    
?>

