<?php

require "./db/config.php";


// $repair_id = $_POST['repair_id'];
// $cost_description = $_POST['cost_description'];
// $amount = $_POST['amount'];

// // Prepare the SQL statement
// $sql = "INSERT INTO Billable (repair_id, cost_description, amount)
//         VALUES ('$repair_id', '$cost_description', '$amount')";

// // Execute the SQL statement
// if (mysqli_query($conn, $sql)) {
//     echo "Billable information inserted successfully.";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }



$repair_id = $_POST['repair_id'];
$cost_description = $_POST['cost_description'];
$amount = $_POST['amount'];

// Prepare the SQL statement to insert data into the Billable table
$sql_insert_billable = "INSERT INTO Billable (repair_id, cost_description, amount)
                        VALUES ('$repair_id', '$cost_description', '$amount')";

// Execute the SQL statement to insert data into the Billable table
if (mysqli_query($conn, $sql_insert_billable)) {
    echo "Billable information inserted successfully.";
} else {
    echo "Error: " . $sql_insert_billable . "<br>" . mysqli_error($conn);
}

// Calculate the repair_cost by summing the amount values from the Billable table
$sql_calculate_repair_cost = "UPDATE Repairs SET repair_cost = (SELECT SUM(amount) FROM Billable WHERE repair_id = '$repair_id') WHERE repair_id = '$repair_id'";

// Execute the SQL statement to calculate the repair_cost
if (mysqli_query($conn, $sql_calculate_repair_cost)) {
    echo "Repair cost calculated and updated successfully.";
} else {
    echo "Error: " . $sql_calculate_repair_cost . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);


?>