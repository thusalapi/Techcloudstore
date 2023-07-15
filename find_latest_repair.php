<?php
// Assuming you have established a database connection
require "./db/config.php";

$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];

// Prepare the SQL statement to retrieve the latest repair ID based on customer ID and/or customer name
$sql = "SELECT r.repair_id
        FROM Repairs r
        INNER JOIN Customer c ON r.customer_id = c.customer_id
        WHERE";

if (!empty($customer_id) && !empty($customer_name)) {
    $sql .= " r.customer_id = '$customer_id' AND (c.first_name = '$customer_name' OR c.last_name = '$customer_name')";
} elseif (!empty($customer_id)) {
    $sql .= " r.customer_id = '$customer_id'";
} elseif (!empty($customer_name)) {
    $sql .= " c.first_name = '$customer_name' OR c.last_name = '$customer_name'";
} else {
    echo "Please enter either the customer ID or customer name.";
    exit;
}

$sql .= " ORDER BY r.repair_id DESC LIMIT 1";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $latest_repair_id = $row['repair_id'];
//     echo "Latest Repair ID: " . $latest_repair_id;
// } else {
//     echo "No repairs found for the given criteria.";
// }

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $latest_repair_id = $row['repair_id'];
    echo "<script>alert('Latest Repair ID: " . $latest_repair_id . "'); window.location = 'billable.php';</script>";
} else {
    echo "<script>alert('No repairs found for the given criteria.'); window.location = 'billable.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
