<?php
    include("../db_config.php");
    session_start();

    if(isset($_POST["login_submit"])){
        $admin_username = $_POST["admin-username"];
        $admin_password = $_POST["admin-password"];

        $query = "SELECT * FROM `admin` WHERE admin_name = '$admin_username'";
        $result = mysqli_query($conn, $query);


        if($result) {
            if(mysqli_num_rows($result) === 1) {
                
                $row = mysqli_fetch_assoc($result);
                $verified = password_verify($admin_password, $row["admin_password"]);

                if($verified) {
                    
                    $_SESSION['admin-username'] = $row['admin_name'];
                    header("location: index.php");
                }
            }else {
                echo "<script>password incorrect;</script>";
            }
        }
    }

    
?>

<?php include("./admin_header.php") ?>
    <div class="login-container">
    <div class="admin-form">
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <div class="input-icon form-group d-flex">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" name="admin-username" id="regno" placeholder="Username" required>
            </div>

            <div class="input-icon form-group d-flex">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="admin-password" id="pwd" placeholder="Password" required>
            </div>

            <button type="submit" name="login_submit" class="btn btn-primary">Login</button>
        </form>
        <p><a href ="changepwd.php"> Change password?</a></p>
    </div>
    </div>
<?php include('./admin_footer.php') ?>