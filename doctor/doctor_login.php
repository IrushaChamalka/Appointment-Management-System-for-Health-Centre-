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
                    header('location: ./index.php');
                }
            }else {
                echo "<script>alert('doctor not found');</script>";
            }
        }
    }

    
?>

<?php include("./doctor_header.php") ?>
    <div class="login-container">
    <div class="doctor-form">
        <h2>Doctor Login</h2>
        <form action="" method="POST">
            <div class="input-icon form-group d-flex">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control" name="dr_nic" id="regno" placeholder="Nic Number" required>
            </div>

            <div class="input-icon form-group d-flex">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="dr_password" id="pwd" placeholder="Password" required>
            </div>

            <button type="submit" name="login_submit" class="btn btn-primary">Login</button>
        </form>
        <p><a href ="changepwd.php"> Change password?</a></p>
    </div>
    </div>
<?php include('./doctor_footer.php') ?>