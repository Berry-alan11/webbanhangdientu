<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
$stmt->execute([$data->user_id, $data->product_id, 1]);

echo json_encode(["message" => "Đã thêm vào giỏ hàng"]);
?>
