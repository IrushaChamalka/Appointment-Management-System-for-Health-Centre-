<?php
// Database connection
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "your_database_name"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$reg_number = mysqli_real_escape_string($conn, $_POST['reg_number']);
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
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password for security
$blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
$last_school_attend = mysqli_real_escape_string($conn, $_POST['last_school_attend']);
$profile_photo = mysqli_real_escape_string($conn, $_POST['profile_photo']);

// SQL query to insert the user into the database
$sql = "INSERT INTO user_details (reg_number, full_name, name_with_initials, gender, dob, mobile_number, email, residential_address, permenent_address, nic, martial_status, faculty, department, height, weight, gardian_name, relation, contact_number, password, blood_group, last_school_attend, profile_photo)
VALUES ('$reg_number', '$full_name', '$name_with_initials', '$gender', '$dob', '$mobile_number', '$email', '$residential_address', '$permenent_address', '$nic', '$martial_status', '$faculty', '$department', '$height', '$weight', '$gardian_name', '$relation', '$contact_number', '$password', '$blood_group', '$last_school_attend', '$profile_photo')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
