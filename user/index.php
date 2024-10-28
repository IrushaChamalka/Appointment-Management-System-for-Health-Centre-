
<?php
session_start();
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

</head>
<body>
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- search -->
                <h1 class="welcome"> Welcome <span class="wel_us"><?php echo $_SESSION['username']?></span></h1>
            <!-- user Image -->
            <div class="user">
                <img src="images/user.jpg" alt="">
            </div>

        </div>

        <a href="index.php?action=signout">
                    <span class="icon1"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title1"></span>
                    <span class="icon1">Sign Out</span>
        </a>
</body>
</html>