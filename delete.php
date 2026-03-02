<?php
require 'db.php';
require 'function.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);

redirectPage("read.php");
?>