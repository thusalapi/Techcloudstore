<?php
require "./db/config.php";

$customer_id = $_POST['customer_id'];
$phone_model = $_POST['phone_model'];
$problem_description = $_POST['problem_description'];
$estimated_cost = $_POST['estimated_cost'];
$assigned_date = $_POST['assigned_date'];
$repair_status = $_POST['repair_status'];
$repair_cost = $_POST['repair_cost'];
$return_date = $_POST['return_date'];

// Prepare the SQL statement
$sql = "INSERT INTO Repairs (customer_id, phone_model, problem_description, estimated_cost, assigned_date, repair_status, repair_cost, return_date)
        VALUES ('$customer_id', '$phone_model', '$problem_description', '$estimated_cost', '$assigned_date', '$repair_status', '$repair_cost', '$return_date')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Repair information inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>