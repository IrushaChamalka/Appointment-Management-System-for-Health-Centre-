<?php
    define('HOST', '10.10.10.157');
    define('U_NAME', 'root');
    define('DB_PASS', '');
    define('DB_NAME','group13');


    $conn = mysqli_connect(HOST, U_NAME, DB_PASS, DB_NAME);

    if(!$conn) {
       die("connection fail".mysqli_connect_error());
    }
?>
