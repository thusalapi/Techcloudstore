<?php

require "./db/config.php";

// Prepare the SQL statement
$sql = "INSERT INTO customer (first_name, last_name, email, phone_number) VALUES (?, ?, ?, ?)";

// Prepare the statement and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $first_name, $last_name, $email, $phone_number);

// Get the form data
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];

// Execute the statement
if ($stmt->execute()) {
    echo "Customer added successfully.";
    header("Location: repair.php"); // Redirect to repair.php
    exit;
} else {
    echo "Error: " . $stmt->error;
}

?>