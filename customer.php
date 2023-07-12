<!DOCTYPE html>
<html>
<head>
  <title>Add Customer</title>
  <link rel="stylesheet" href="styles/add_customer.css">
  <link rel="stylesheet" href="styles/navbar.css">
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
    <h2>Add Customer</h2>
    <form action="insert_customer.php" method="post">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" required>
      
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="phone_number">Phone Number:</label>
      <input type="text" id="phone_number" name="phone_number" required>
      
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
