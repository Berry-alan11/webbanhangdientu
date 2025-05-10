<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->user_id, $data->message)) {
    die(json_encode(["error" => "Thiếu dữ liệu"]));
}

$stmt = $conn->prepare("INSERT INTO notifications (user_id, message, is_read) VALUES (?, ?, 0)");
$stmt->execute([$data->user_id, $data->message]);

echo json_encode(["message" => "Gửi thông báo thành công"]);
?>
