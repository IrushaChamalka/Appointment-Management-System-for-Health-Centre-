<?php 
    session_start();
    if(!isset($_SESSION['dr_nic'])){
        include('./doctor_login.php');
    }
    else{
        include('./doctor_dashbord.php');
    }

    if(isset($_GET['action'])){
        if($_GET['action'] == 'logout'){
            session_unset();
            session_destroy();
            header("location: doctor_login.php");
        }
    }
?>


<a href="index.php?action=logout">logout</a>