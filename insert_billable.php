<?php

require "./db/config.php";

$repair_id = $_POST['repair_id'];
$cost_description = $_POST['cost_description'];
$amount = $_POST['amount'];
$repair_status = $_POST['repair_status'];
$return_date = $_POST['return_date'];

// Prepare the SQL statement to insert data into the Billable table
$sql_insert_billable = "INSERT INTO Billable (repair_id, cost_description, amount)
                        VALUES ('$repair_id', '$cost_description', '$amount')";

// Execute the SQL statement to insert data into the Billable table
if (mysqli_query($conn, $sql_insert_billable)) {
    echo "Billable information inserted successfully.";
} else {
    echo "Error: " . $sql_insert_billable . "<br>" . mysqli_error($conn);
}

// Update the return date in the Repairs table
$sql_update_return_date = "UPDATE Repairs SET return_date = '$return_date' WHERE repair_id = '$repair_id'";

if (mysqli_query($conn, $sql_update_return_date)) {
    echo "Return date updated successfully.";

    // Calculate the repair_cost by summing the amount values from the Billable table
    $sql_calculate_repair_cost = "UPDATE Repairs SET repair_cost = (SELECT SUM(amount) FROM Billable WHERE repair_id = '$repair_id') WHERE repair_id = '$repair_id'";

    // Execute the SQL statement to calculate the repair_cost
    if (mysqli_query($conn, $sql_calculate_repair_cost)) {
        echo "Repair cost calculated and updated successfully.";
    } else {
        echo "Error: " . $sql_calculate_repair_cost . "<br>" . mysqli_error($conn);
    }

    // Prepare the SQL statement to update the repair status in the Repairs table
    $sql_update_repair_status = "UPDATE Repairs SET repair_status = '$repair_status' WHERE repair_id = '$repair_id'";

    if (mysqli_query($conn, $sql_update_repair_status)) {
        echo "Repair status updated successfully.";
        if ($repair_status === "Completed") {
            // Redirect to the invoice page with the repair ID as a parameter
            header("Location: invoice_template.php?repair_id=$repair_id");
            exit;
        }
    } else {
        echo "Error: " . $sql_update_repair_status . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error updating return date: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);











// require "./db/config.php";


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



// $repair_id = $_POST['repair_id'];
// $cost_description = $_POST['cost_description'];
// $amount = $_POST['amount'];
// $repair_status = $_POST['repair_status'];
// $return_date = $_POST['return_date'];

// // Prepare the SQL statement to insert data into the Billable table
// $sql_insert_billable = "INSERT INTO Billable (repair_id, cost_description, amount)
//                         VALUES ('$repair_id', '$cost_description', '$amount')";

// // Execute the SQL statement to insert data into the Billable table
// if (mysqli_query($conn, $sql_insert_billable)) {
//     echo "Billable information inserted successfully.";
// } else {
//     echo "Error: " . $sql_insert_billable . "<br>" . mysqli_error($conn);
// }

// // Calculate the repair_cost by summing the amount values from the Billable table
// $sql_calculate_repair_cost = "UPDATE Repairs SET repair_cost = (SELECT SUM(amount) FROM Billable WHERE repair_id = '$repair_id') WHERE repair_id = '$repair_id'";

// // Execute the SQL statement to calculate the repair_cost
// if (mysqli_query($conn, $sql_calculate_repair_cost)) {
//     echo "Repair cost calculated and updated successfully.";
// } else {
//     echo "Error: " . $sql_calculate_repair_cost . "<br>" . mysqli_error($conn);
// }


// // Prepare the SQL statement to update the repair status in the Repairs table
// $sql_update_repair_status = "UPDATE Repairs SET repair_status = '$repair_status' WHERE repair_id = '$repair_id'";

// if (mysqli_query($conn, $sql_update_repair_status)) {
//     echo "Repair status updated successfully.";
//     if ($repair_status === "Completed") {
//         // Redirect to the invoice page with the repair ID as a parameter
//         header("Location: invoice.php?repair_id=$repair_id");
//         exit;
//     }
// } else {
//     echo "Error: " . $sql_update_repair_status . "<br>" . mysqli_error($conn);
// }


// // Update the return date in the Repairs table
// $sql_update_return_date = "UPDATE Repairs SET return_date = '$return_date' WHERE repair_id = '$repair_id'";

// if (mysqli_query($conn, $sql_update_return_date)) {
//     echo "Return date updated successfully.";
// } else {
//     echo "Error updating return date: " . mysqli_error($conn);
// }

// // Close the database connection
// mysqli_close($conn);


?>