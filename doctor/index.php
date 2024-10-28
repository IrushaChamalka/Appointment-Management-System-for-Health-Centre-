<?php 
    if(!isset($_SESSION['dr_nic'])){
        include('./doctor_login.php');
    }
    else{
        include('./doctor_dashbord.php');
    }
?>