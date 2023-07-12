<?php
// Assuming you have established a database connection
require "./db/config.php";

// Assuming you have established a database connection

$repair_id = $_GET['repair_id'];

// Retrieve the repair details from the database
$sql = "SELECT c.first_name, c.last_name, r.repair_id, r.repair_cost, r.assigned_date, r.return_date
        FROM Repairs r
        INNER JOIN Customer c ON r.customer_id = c.customer_id
        WHERE r.repair_id = '$repair_id' AND r.repair_status = 'Completed'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $repair_id = $row['repair_id'];
    $repair_cost = $row['repair_cost'];
    $assigned_date = $row['assigned_date'];
    $return_date = $row['return_date'];

    // Generate the invoice HTML
    $html = "
        <html>
        <head>
            <title>Invoice</title>
                <link rel='stylesheet' type='text/css' href='styles/invoice_template.css'>
        </head>
        <body>
            <div class='invoice-container'>
                <h1>Invoice</h1>
                
                <p>Customer Name: $first_name $last_name</p>
    
                <p>Repair ID: $repair_id</p>
                <p>Repair Cost: $repair_cost</p>
                <p>Assigned Date: $assigned_date</p>
                <p>Return Date: $return_date</p>
                <button onclick='window.print()'>Print Invoice</button>
            </div>
        </body>
        </html>


        
    ";

    // Output the invoice HTML
    echo $html;
} else {
    echo "No completed repair found for the given repair ID.";
}

// Close the database connection
mysqli_close($conn);

?>