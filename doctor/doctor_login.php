<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include("../db_config.php");
    

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
                }else{
                    ?>
                    <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">NIC or Password incorrect</h5>
                            </div>
                            <div class="modal-body">
                                <p>If you're having trouble logging in, please contact the administrator for assistance.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='./'">Try Again</button>
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
            }else {
                ?>
                    <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Doctor Not Found</h5>
                            </div>
                            <div class="modal-body">
                                <p>If you're having trouble logging in, please contact the administrator for assistance.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='./'">Try Again</button>
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
    </div>
    </div>
<?php include('./doctor_footer.php') ?>