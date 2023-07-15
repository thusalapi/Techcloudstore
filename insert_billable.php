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
// if (mysqli_query($conn, $sql_insert_billable)) {
//     echo "Billable information inserted successfully.";
    
//     // Update the repair status and return date in the Repairs table
//     $sql_update_repair = "UPDATE Repairs SET repair_status = '$repair_status', return_date = '$return_date' WHERE repair_id = '$repair_id'";
    
//     if (mysqli_query($conn, $sql_update_repair)) {
//         echo "Repair status and return date updated successfully.";
        
//         // Check if the repair status is marked as completed
//         if ($repair_status === "Completed") {
//             // Calculate the repair_cost by summing the amount values from the Billable table for the given repair_id
//             $sql_calculate_repair_cost = "UPDATE Repairs SET repair_cost = (SELECT SUM(amount) FROM Billable WHERE repair_id = '$repair_id') WHERE repair_id = '$repair_id'";
            
//             if (mysqli_query($conn, $sql_calculate_repair_cost)) {
//                 echo "Repair cost calculated and updated successfully.";
                
//                 // Redirect to the invoice page with the repair ID as a parameter
//                 header("Location: invoice_template.php?repair_id=$repair_id");
//                 exit;
//             } else {
//                 echo "Error calculating repair cost: " . mysqli_error($conn);
//             }
//         }
//     } else {
//         echo "Error updating repair status and return date: " . mysqli_error($conn);
//     }
// } else {
//     echo "Error inserting billable information: " . mysqli_error($conn);
// }

if (mysqli_query($conn, $sql_insert_billable)) {
    echo "Billable information inserted successfully.";
    
    // Update the repair status and return date in the Repairs table
    $sql_update_repair = "UPDATE Repairs SET repair_status = '$repair_status', return_date = '$return_date' WHERE repair_id = '$repair_id'";
    
    if (mysqli_query($conn, $sql_update_repair)) {
        echo "Repair status and return date updated successfully.";
        
        // Check if the repair status is marked as completed
        if ($repair_status === "Completed") {
            // Calculate the repair_cost by summing the amount values from the Billable table for the given repair_id
            $sql_calculate_repair_cost = "UPDATE Repairs SET repair_cost = (SELECT SUM(amount) FROM Billable WHERE repair_id = '$repair_id') WHERE repair_id = '$repair_id'";
            
            if (mysqli_query($conn, $sql_calculate_repair_cost)) {
                echo "Repair cost calculated and updated successfully.";
                
                // Redirect to the invoice page with the repair ID as a parameter
                header("Location: invoice_template.php?repair_id=$repair_id");
                exit;
            } else {
                echo "Error calculating repair cost: " . mysqli_error($conn);
            }
        } else {
            // Redirect to the billable.php page
            header("Location: billable.php");
            exit;
        }
    } else {
        echo "Error updating repair status and return date: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting billable information: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
