<?php 
include('../db_config.php');
$sql = "SELECT * FROM `doctor`";
$result = mysqli_query($conn, $sql);

?>
<div class="d-flex">
<div class="d-flex flex-column gap-3 mt-5 w-50"> 
<h3 class=" text-center">Doctors</h3>
    <?php
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        ?> 
            <div class="card w-40" style="margin:0 0 10px 50px;">
                <div style="position: absolute; top: 0; right: 10px; color: red"><?php echo ($row['is_work']) ? "Available" : "Unavailable"?></div>
                <div class="d-flex align-items-center">
                    <img style="width: 130px;" src="../assets/images/DoctorAvatar-01.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['dr_name'] ?></h5>
                        <p class="card-text"><?php echo $row['hospital'] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Button</a> -->
                    </div>

                </div>
                
            </div>
        <?php
    }
}
?> </div> <?php

?>
    <div class="mt-4" style="width: 50%; ">
        <h3 class="m-4 text-center">Add Doctors</h3>
        <form method="post" action="#" class="w-40 mt-2" style=" width: 400px; margin:auto">
        <div class="form-group mb-3">
                <label for="name">NAME</label>
                <input type="text" class="form-control" id="name" name="name"  placeholder="Enter NAME" required>
            </div>
            <div class="form-group mb-3">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter NIC" required>
            </div>
            <div class="form-group mb-3">
                <label for="hospital">HOSPITAL</label>
                <input type="text" class="form-control" id="hospital" name="hospital"  placeholder="Enter Hospital" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone">CONTACT NO</label>
                <input type="tel" class="form-control" id="phone" name="number" placeholder="Contact No" required>
            </div>
            <div class="form-group mb-3">
                <label for="address">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-group mb-3">
                MALE:<input type="radio" name="gender" id="" value="Male">
                FEMALE:<input type="radio" name="gender" id="" value="Female">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    </div>
<?php 
?>

<?php 
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $name = $_POST["name"];
        $nic = $_POST['nic'];
        $hospital = $_POST['hospital'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $sql = "INSERT INTO `doctor`(`dr_name`, `hospital`, `nic`, `contact_no`, `address`, `email`, `gender`, `password`) VALUES ('$name','$hospital','$nic','$number','$address','$email','$gender','\$2y\$10\$QCYYeXwXWhOWBr6yuN15AOFlAm18SuCKlUizBhjnuHiylUbaj0KCu')";
        mysqli_query($conn, $sql);
        ?> <script>window.location.href = './?path=doctor' </script> <?php
    }

?>





