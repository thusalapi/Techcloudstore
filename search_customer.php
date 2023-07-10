<?php
require "./db/config.php";

// Get the customer name from the form
$customer_name = $_POST["customer_name"];

// Prepare the SQL statement to retrieve the customer details based on the name
$sql = "SELECT customer_id, first_name, last_name FROM customer WHERE CONCAT(first_name, ' ', last_name) LIKE ?";

// Prepare the statement and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $search_name);

// Construct the search name with wildcard pattern
$search_name = "%" . $customer_name . "%";

// Execute the statement
$stmt->execute();

// Bind the result
$stmt->bind_result($customer_id, $first_name, $last_name);

// Fetch the results into an array
$customer_details = [];
while ($stmt->fetch()) {
    $customer_details[] = [
        'customer_id' => $customer_id,
        'first_name' => $first_name,
        'last_name' => $last_name
    ];
}

// Close the statement
$stmt->close();

// If there are customers found with the name
if (count($customer_details) > 0) {
    echo '<script>alert("Customers found with the name ' . $customer_name . ':\n\n';

    foreach ($customer_details as $customer) {
        echo 'Customer ID: ' . $customer['customer_id'] . '\n';
        echo 'Name: ' . $customer['first_name'] . ' ' . $customer['last_name'] . '\n\n';
    }

    echo '");</script>';
} else {
    echo "No customers found with the name " . $customer_name;
}

// Close the connection
$conn->close();
?>