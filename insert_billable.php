<?php

require "./db/config.php";


$repair_id = $_POST['repair_id'];
$cost_description = $_POST['cost_description'];
$amount = $_POST['amount'];

// Prepare the SQL statement
$sql = "INSERT INTO Billable (repair_id, cost_description, amount)
        VALUES ('$repair_id', '$cost_description', '$amount')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Billable information inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>