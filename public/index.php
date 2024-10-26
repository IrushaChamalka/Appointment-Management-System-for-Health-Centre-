<?php 
    include('./header.php');
    if(isset($_GET['path']))
    {
        if($_GET['path'] === 'about'){
            include('./about.php');
        }
        elseif($_GET['path'] === 'staff'){
            include('./staff.php');
        }elseif($_GET['path'] === 'login'){
            include('../user/login/login.html');
        }elseif ($_GET['path'] === 'signup') {
            include('../user/signup/signup.html');
        }else {
            header("location: .");
        }
    }else{
            include('./doctor_details.php');
            include('./appoi_select.php');
            ob_end_flush();
    }
    include('./footer.php');


?>

