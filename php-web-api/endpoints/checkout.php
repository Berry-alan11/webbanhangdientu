<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));
$stmt = $conn->prepare("UPDATE orders SET status = 'Paid' WHERE id = ?");
$stmt->execute([$data->order_id]);

echo json_encode(["message" => "Thanh toán thành công"]);
?>

<!-- php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("UPDATE orders SET status = 'Paid' WHERE id = ?");
$stmt->execute([$data->order_id]);

// Gửi thông báo
$stmt = $conn->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
$message = "Đơn hàng #" . $data->order_id . " đã được thanh toán thành công!";
$stmt->execute([$data->user_id, $message]);

echo json_encode(["message" => "Thanh toán thành công và đã gửi thông báo"]);

 -->