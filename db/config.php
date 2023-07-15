<?php 
    $servername = "localhost:3307";
    $username = "root";
    $dbname = "techstore";
    $password = "";
    

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
