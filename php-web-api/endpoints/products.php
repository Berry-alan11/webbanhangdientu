<?php
require "../config/db.php";

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($products);
?>
