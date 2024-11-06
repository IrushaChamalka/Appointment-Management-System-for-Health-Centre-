<?php
session_start();
include('../user_header.php');
include("./../../db_config.php");
$reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM user_details WHERE reg_number = '$reg_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if (password_verify($password, $row['password'])) {
        $_SESSION['reg_number'] = $row['reg_number'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['username'] = $row['name_with_initials'];
        header("location: ../index.php");
    } else {
        ?>
        <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Number Or Password Not Match</h5>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='/medibook/public/?path=login'">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='../../public/?path=signup'">Create New Account</button>    
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
} else {
    ?>
        <div class="modal fade" id="incorrect_pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Number Not Found</h5>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='/medibook/public/?path=login'">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='../../public/?path=signup'">Create New Account</button>
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

$conn->close();
?>

<?php include('../user_footer.php')?>