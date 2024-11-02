<?php
// Database connection
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "mc"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

    if(empty($_POST['reg_no'])){
        $error = "Registration number is required";
    }else{
        $reg_no = $_POST['reg_no'];
        if(!preg_match('/^[0-9]+$/',$reg_no)){
            $error = 'Only numbers';
        }
    }

    if(empty($_POST['nic'])){
        $error = "invalid NIC input";
    }else{
        $nic = $_POST['nic'];
        if(!preg_match('/^[0-9vV]+$/',$nic)){
            $error = "The input contains only numbers and the letter 'v' or 'V'.";
        }
    }

    if(empty($_POST['full_name'])){
        $error = "invalid input";
    }else{
        $full_name = $_POST['full_name'];
        if(!preg_match('/^[a-zA-Z]+$/',$full_name)){
            $error = "The input contains only letters";
        }
    }
    
    if(empty($_POST['name_with_initials'])){
        $error = "invalid input";
    }else{
        $name_with_initials = $_POST['name_with_initials'];
        if(!preg_match('/^[a-zA-Z.]+$/',$name_with_initials)){
            $error = "The input contains only letters";
        }
    }
    
    if(empty($_POST['mobile_number'])){
        $error = "invalid input";
    }else{
        $mobile_number = $_POST['mobile_number'];
        if(!preg_match('/^[0-9]+$/',$mobile_number)){
            $error = "The input contains numbers";
        }
    }

    if(empty($_POST['email'])){
        $error = "invalid input";
    }else{
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = "invalid email";
        }
    }
    
    if(empty($_POST['residential_address'])){
        $error = "invalid input";
    }else{
        $residential_address = $_POST['residential_address'];
    }
    
    if(empty($_POST['permenent_address'])){
        $error = "invalid input";
    }else{
        $permenent_address = $_POST['permenent_address'];
    }

    if(empty($_POST['height'])){
        $error = "invalid input";
    }else{
        $height = $_POST['height'];
        if(!preg_match('/^[0-9]+$/',$height)){
            $error = "The input contains numbers";
        }
    }
    
    if(empty($_POST['weight'])){
        $error = "invalid input";
    }else{
        $weight = $_POST['weight'];
        if(!preg_match('/^[0-9]+$/',$weight)){
            $error = "The input contains numbers";
        }
    }

    if(empty($_POST['gardian_name'])){
        $error = "invalid input";
    }else{
        $gardian_name = $_POST['gardian_name'];
        if(!preg_match('/^[a-zA-Z]+$/',$gardian_name)){
            $error = "The input contains only letters";
        }
    }

    if(empty($_POST['contact_number'])){
        $error = "invalid input";
    }else{
        $contact_number = $_POST['contact_number'];
        if(!preg_match('/^[0-9]+$/',$contact_number)){
            $error = "The input contains numbers";
        }
    }

    if(empty($_POST['password'])){
        $error = "invalid input";
    }else{
        $password = $_POST['password'];
    }
    
    if(empty($_POST['re_password'])){
        $error = "invalid input";
    }else{
        $re_password = $_POST['re_password'];
    }

    if($error){
        echo 'error';
    }else{
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
        // $re_password = password_hash($_POST['re_password'], PASSWORD_DEFAULT); // Hashing password for security
        $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
        $last_school_attend = mysqli_real_escape_string($conn, $_POST['last_school_attend']);
        $profile_photo = mysqli_real_escape_string($conn, $_POST['profile_photo']);

        // SQL query to insert the user into the database
        $sql = "INSERT INTO user_details (reg_number, full_name, name_with_initials, gender, dob, mobile_number, email, residential_address, permenent_address, nic, martial_status, faculty, department, height, weight, gardian_name, relation, contact_number, password , blood_group, last_school_attend, profile_photo)
        VALUES ('$reg_number', '$full_name', '$name_with_initials', '$gender', '$dob', '$mobile_number', '$email', '$residential_address', '$permenent_address', '$nic', '$martial_status', '$faculty', '$department', '$height', '$weight', '$gardian_name', '$relation', '$contact_number', '$password', '$blood_group', '$last_school_attend', '$profile_photo')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }

    

}


?>
