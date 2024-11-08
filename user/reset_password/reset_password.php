<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('./../../db_config.php');
?>
<div class="login-container">
    <div class="doctor-form">
        <h2>Doctor Login</h2>
        <form action="" method="POST">
            <div class="input-icon form-group d-flex">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="pre_dr_password" id="pwd" placeholder="Previous Password" required>
            </div>
            <div class="input-icon form-group d-flex">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="new_dr_password" id="pwd" placeholder="New Password" required>
            </div>
            <div class="input-icon form-group d-flex">
                <i class="fa fa-lock"></i>
                <input type="password" class="form-control" name="new_2_dr_password" id="pwd" placeholder="New Password Again" required>
            </div>
            <button type="submit" name="login_submit" class="btn btn-primary">Reset Password</button>

        </form>
    </div>
    </div>




<?php 
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $reg_num = $_SESSION['reg_number'];
        $password = $_POST['pre_dr_password'];
        $new_password = $_POST['new_dr_password'];
        $new_password2 = $_POST['new_2_dr_password'];
        $sql = "SELECT * FROM `user_details` WHERE `reg_number`='$reg_num'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $veri = password_verify($password, $row['password']);
        }
        if($veri) {
            if($new_password === $new_password2){
                $passwordhash = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE `user_details` SET `password` = '$passwordhash' WHERE `user_details`.`reg_number` = '$reg_num'";
                mysqli_query($conn, $sql);
                header("location: ./?path=logout");
            }else{
                ?>
                    <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Your passwords are not match</h5>
                            </div>
                            <div class="modal-body">
                                <p>If you're having trouble reset password, please contact the administrator for assistance.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Try again</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let incorrect_pwd = new bootstrap.Modal(document.getElementById('incorrect_pwd'));
                            incorrect_pwd.show();
                        });
                    </script>

            <?php

            }
        }else{
            ?>
                    <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Your password is incorrect</h5>
                            </div>
                            <div class="modal-body">
                                <p>If you're having trouble reset password, please contact the administrator for assistance.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Try again</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let incorrect_pwd = new bootstrap.Modal(document.getElementById('incorrect_pwd'));
                            incorrect_pwd.show();
                        });
                    </script>

            <?php
        }
        

    }

?>