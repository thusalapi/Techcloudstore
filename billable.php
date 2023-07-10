<!DOCTYPE html>
<html>
<head>
  <title>Billable Information</title>
</head>
<body>
  <h1>Billable Information</h1>
  <form action="insert_billable.php" method="post">
    <label for="repair_id">Repair ID:</label>
    <input type="text" id="repair_id" name="repair_id" required><br><br>
  
    <label for="cost_description">Cost Description:</label>
    <input type="text" id="cost_description" name="cost_description" required><br><br>
  
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required><br><br>
  
    <input type="submit" value="Submit">
  </form>
</body>
</html>