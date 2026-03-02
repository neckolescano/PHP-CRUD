<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;
 
 
    $sql = "INSERT INTO transactions (item, price, quantity, total)
            VALUES (:item, :price, :quantity, :total)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':quantity' => $quantity,
        ':total' => $total
    ]);

    header("Location: read.php");
}
?>
