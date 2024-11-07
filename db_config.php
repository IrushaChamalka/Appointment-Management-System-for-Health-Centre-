<?php
    define('HOST', 'localhost');
    define('U_NAME', 'csc210user');
    define('DB_PASS', 'CSC210!');
    define('DB_NAME','group13');

    //define('HOST', 'localhost');
    //define('U_NAME', 'root');
    //define('DB_PASS', '');
    //define('DB_NAME','medical_center');
    



    $conn = mysqli_connect(HOST, U_NAME, DB_PASS, DB_NAME);

    if(!$conn) {
       die("connection fail".mysqli_connect_error());
    }
?>
