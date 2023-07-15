<!DOCTYPE html>
<html>
<head>
  <title>Billable Information</title>
  <link rel="stylesheet" href="./styles/repair.css">
  <link rel="stylesheet" href="./styles/navbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
</head>
<body>
<nav>
    <div class="container">
      <a href="./index.php" class="logo">Mobile Repair Shop</a>
      <ul class="nav-links">
        <li><a href="./customer.php">Add Customer</a></li>
        <li><a href="./repair.php">Repair Services</a></li>
        <li><a href="./billable.php">Billable Information</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <br><br>
    <h1>Find Latest Repair ID</h1>
    <form action="find_latest_repair.php" method="post">
      <label for="customer_id">Customer ID:</label>
      <input type="text" id="customer_id" name="customer_id">
    
      <label for="customer_name">Customer Name:</label>
      <input type="text" id="customer_name" name="customer_name">
    
      <input type="submit" value="Find">
    </form>
    <br><br>

    
    <h1>Billable Information</h1>
    <form action="./insert_billable.php" method="post">
      <label for="repair_id">Repair ID:</label>
      <input type="text" id="repair_id" name="repair_id" required>
    
      <label for="cost_description">Cost Description:</label>
      <input type="text" id="cost_description" name="cost_description" required>
    
      <label for="amount">Amount:</label>
      <input type="text" id="amount" name="amount" required>

      <label for="repair_status">Repair Status:</label>
      <select id="repair_status" name="repair_status">
        <!-- <option value="Pending">Pending</option> -->
        <option value="In Progress">In Progress</option>
        <option value="Completed">Completed</option>
      </select><br><br>

      <label for="return_date">Date:</label>
      <input type="date" id="return_date" name="return_date">
    
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
