<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<h2>Add Transaction</h2>
 
<form method="post" action="create.php">
    <label>Item:</label>
    <input type="text" name="item" required>
    
    <label>Price:</label>
    <input type="number" step="0.01" name="price" required>
    
    <label>Quantity:</label>
    <input type="number" name="quantity" required>
    
    <button type="submit">Save</button>
</form>
 
<div class="nav-link">
    <a href="read.php">View Transactions</a>
</div>
</div>
</body>
</html>