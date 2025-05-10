<?php
require "../config/db.php";

$stmt = $conn->query("SELECT * FROM cart");
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($cart);
?>
