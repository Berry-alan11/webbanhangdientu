<?php
require "../config/db.php";

$search = $_GET['q'];
$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(["%$search%"]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($products);
?>
