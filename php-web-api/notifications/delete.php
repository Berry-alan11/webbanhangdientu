<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->notification_id)) {
    die(json_encode(["error" => "Thiếu ID thông báo"]));
}

$stmt = $conn->prepare("DELETE FROM notifications WHERE id = ?");
$stmt->execute([$data->notification_id]);

echo json_encode(["message" => "Thông báo đã bị xóa"]);
?>
