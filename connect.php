<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myshop1";

    $conn = new mysqli($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, "utf8");
    //$conn->close();
?>