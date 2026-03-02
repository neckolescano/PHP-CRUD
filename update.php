<?php
require 'db.php';
$id = $_GET['id'];
 
 
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;

    $sql = "UPDATE transactions 
            SET item=:item, price=:price, quantity=:quantity, total=:total
            WHERE id=:id";
 
 
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':quantity' => $quantity,
        ':total' => $total,
        ':id' => $id
    ]);

    header("Location: read.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<h2>Edit Transaction</h2>
<form method="post">
    <label>Item:</label>
    <input type="text" name="item" value="<?= $data['item'] ?>" required>
    
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>" required>
    
    <label>Quantity:</label>
    <input type="number" name="quantity" value="<?= $data['quantity'] ?>" required>
    
    <button type="submit">Update</button>
</form>

<div class="nav-link">
    <a href="read.php">Back to List</a>
</div>
</div>
</body>
</html>