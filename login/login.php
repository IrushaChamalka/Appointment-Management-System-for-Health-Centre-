<?php
// Start the session
session_start();

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
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database for the user's information
$sql = "SELECT * FROM user_details WHERE reg_number = '$reg_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user's data
    $row = $result->fetch_assoc();
    
    // Verify the password (you should hash passwords in a real application)
    if (password_verify($password, $row['password'])) {
        // Set session variables and login the user
        $_SESSION['reg_number'] = $row['reg_number'];
        $_SESSION['full_name'] = $row['full_name'];
        echo "Login successful! Welcome, " . $row['full_name'];
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "No user found with that registration number.";
}

// Close the database connection
$conn->close();
?>
