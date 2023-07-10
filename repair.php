<!DOCTYPE html>
<html>
<head>
  <title>Repair Form</title>

  <link rel="stylesheet" href="styles/repair.css">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="top-div">
    <h1>Search Customers</h1>
    <form action="search_customer.php" method="post">
      <label for="customer_name">Customer Name:</label>
      <input type="text" id="customer_name" name="customer_name" required>
      
      <input type="submit" value="Search">
    </form>
  </div>

  <div class="bot-div"></div>
  <h1>Repair Information</h1>
  <form action="insert_repair.php" method="post">
    <label for="customer_id">Customer ID:</label>
    <input type="text" id="customer_id" name="customer_id" required><br><br>
  
    <label for="phone_model">Phone Model:</label>
    <input type="text" id="phone_model" name="phone_model" required><br><br>
  
    <label for="problem_description">Problem Description:</label>
    <textarea id="problem_description" name="problem_description" rows="4" cols="50" required></textarea><br><br>
  
    <label for="estimated_cost">Estimated Cost:</label>
    <input type="text" id="estimated_cost" name="estimated_cost" required><br><br>
  
    <label for="assigned_date">Assigned Date:</label>
    <input type="date" id="assigned_date" name="assigned_date" required><br><br>
  
    <label for="repair_status">Repair Status:</label>
    <select id="repair_status" name="repair_status">
      <option value="Pending">Pending</option>
      <option value="In Progress">In Progress</option>
      <option value="Completed">Completed</option>
    </select><br><br>
  
    <label for="repair_cost">Repair Cost:</label>
    <input type="text" id="repair_cost" name="repair_cost" required><br><br>
  
    <label for="return_date">Return Date:</label>
    <input type="date" id="return_date" name="return_date" required><br><br>
  
    <input type="submit" value="Submit">
  </form>
</body>
</html>
