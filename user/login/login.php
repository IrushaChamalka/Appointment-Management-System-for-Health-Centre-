<?php
session_start();

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
        echo "Login successful! Welcome, " . $row['full_name'];
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "No user found with that registration number.";
}

$conn->close();
?>