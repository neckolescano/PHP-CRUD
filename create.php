<?php
require 'db.php';
require 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    if (!validateNumber($price) || !validateNumber($quantity)) {
        die("Invalid input.");
    }

    $total = computeTotal($price, $quantity);
    
 
    $sql = "INSERT INTO transactions (item, price, quantity, total)
            VALUES (:item, :price, :quantity, :total)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':quantity' => $quantity,
        ':total' => $total
    ]);

    redirectPage("read.php");
}
?>
