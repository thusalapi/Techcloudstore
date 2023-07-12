<!DOCTYPE html>
<html>
<head>
  <title>Repair Form</title>

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
    <h1>Search Customers</h1>
    <form action="search_customer.php" method="post">
      <label for="customer_name">Customer Name:</label>
      <input type="text" id="customer_name" name="customer_name" required>
      
      <input type="submit" value="Search">
    </form>

    <h1 style="margin-top: 40px;">Repair Information</h1>
    <form action="insert_repair.php" method="post">
      <label for="customer_id">Customer ID:</label>
      <input type="text" id="customer_id" name="customer_id" required>
    
      <label for="phone_model">Phone Model:</label>
      <input type="text" id="phone_model" name="phone_model" required>
    
      <label for="problem_description">Problem Description:</label>
      <textarea id="problem_description" name="problem_description" rows="4" cols="50" required></textarea>
    
      <label for="estimated_cost">Estimated Cost:</label>
      <input type="text" id="estimated_cost" name="estimated_cost" required>
    
      <label for="assigned_date">Assigned Date:</label>
      <input type="date" id="assigned_date" name="assigned_date" required>
    
      <!-- <label for="repair_status">Repair Status:</label>
      <select id="repair_status" name="repair_status">
        <option value="Pending">Pending</option>
        <option value="In Progress">In Progress</option>
        <option value="Completed">Completed</option>
      </select> -->
    
      <!-- <label for="repair_cost">Repair Cost:</label>
      <input type="text" id="repair_cost" name="repair_cost" required><br><br> -->
    
      <!-- <label for="return_date">Return Date:</label>
      <input type="date" id="return_date" name="return_date" required> -->
    
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
