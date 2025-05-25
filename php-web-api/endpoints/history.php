<?php
require "../config/db.php";

$stmt = $conn->query("SELECT * FROM orders WHERE user_id = ?");
$stmt->execute([$_GET['user_id']]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($orders);
?>
