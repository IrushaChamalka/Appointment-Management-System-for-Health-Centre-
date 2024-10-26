<?php
    include("../db_config.php");
    session_start();

    if(isset($_POST["login_submit"])){
        $dr_nic = $_POST["dr_nic"];
        $dr_password = $_POST["dr_password"];

        $query = "SELECT * FROM doctor WHERE nic = '$dr_nic'";
        $result = mysqli_query($conn, $query);

        if($result) {
            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $verified = password_verify($dr_password, $row["password"]);

                if($verified) {
                    $_SESSION['dr_id'] = $row['dr_id'];
                    $_SESSION['dr_nic'] = $row['nic'];
                    $_SESSION['dr_name'] = $row['dr_name'];
                    header('location: index.php');
                }
            }else {
                echo "<script>alert('doctor not found');</script>";
            }
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel ="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <div class="login-container">
        <h2>Doctor Login</h2>
        <form action="" method="POST">
            <!-- reg number -->
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input type="text" name="dr_nic" id="regno" placeholder="Nic Number" required>
            </div>

            <!-- password -->
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input type="password" name="dr_password" id="pwd" placeholder="Password" required>
            </div>

            <button type="submit" name="login_submit">Login</button>
        </form>
        <p><a href ="changepwd.php"> Change password?</a></p>
    </div>
</body>
</html>