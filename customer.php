<!DOCTYPE html>
<html>
<head>
  <title>Add Customer</title>
</head>
<body>
  <h2>Add Customer</h2>
  <form action="insert_customer.php" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>
    
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" required><br><br>
    
    <input type="submit" value="Submit">
  </form>
</body>
</html>