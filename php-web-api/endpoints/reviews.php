<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("INSERT INTO reviews (user_id, product_id, rating, comment) VALUES (?, ?, ?, ?)");
$stmt->execute([$data->user_id, $data->product_id, $data->rating, $data->comment]);

echo json_encode(["message" => "Đánh giá thành công"]);
?>
