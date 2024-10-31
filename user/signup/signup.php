<?php

include("./../../db_config.php");

$year = mysqli_real_escape_string($conn,$_POST['year']);
$department = mysqli_real_escape_string($conn,$_POST['dpt']);
$reg_no = mysqli_real_escape_string($conn,$_POST['reg_no']);

// Retrieve form data
$reg_number = $year.$department.$reg_no;
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$name_with_initials = mysqli_real_escape_string($conn, $_POST['name_with_initials']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$residential_address = mysqli_real_escape_string($conn, $_POST['residential_address']);
$permenent_address = mysqli_real_escape_string($conn, $_POST['permenent_address']);
$nic = mysqli_real_escape_string($conn, $_POST['nic']);
$martial_status = mysqli_real_escape_string($conn, $_POST['martial_status']);
$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$height = mysqli_real_escape_string($conn, $_POST['height']);
$weight = mysqli_real_escape_string($conn, $_POST['weight']);
$gardian_name = mysqli_real_escape_string($conn, $_POST['gardian_name']);
$relation = mysqli_real_escape_string($conn, $_POST['relation']);
$contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$re_password = password_hash($_POST['re_password'], PASSWORD_DEFAULT); 
$blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
$last_school_attend = mysqli_real_escape_string($conn, $_POST['last_school_attend']);
$profile_photo = mysqli_real_escape_string($conn, $_POST['profile_photo']);


$sql = "INSERT INTO user_details (reg_number, full_name, name_with_initials, gender, dob, mobile_number, email, residential_address, permenent_address, nic, martial_status, faculty, department, height, weight, gardian_name, relation, contact_number, password , blood_group, last_school_attend, profile_photo)
VALUES ('$reg_number', '$full_name', '$name_with_initials', '$gender', '$dob', '$mobile_number', '$email', '$residential_address', '$permenent_address', '$nic', '$martial_status', '$faculty', '$department', '$height', '$weight', '$gardian_name', '$relation', '$contact_number', '$password', '$blood_group', '$last_school_attend', '$profile_photo')";

if ($conn->query($sql) === TRUE) {
    header("location: ./?path=login");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
