<?php
require "../config/db.php";
require "../config/auth.php";

$headers = getallheaders();
if (!isset($headers["Authorization"])) {
    die(json_encode(["error" => "Không có token xác thực"]));
}

$token = str_replace("Bearer ", "", $headers["Authorization"]);
$decoded = verify_jwt($token);
if (!$decoded) {
    die(json_encode(["error" => "Token không hợp lệ"]));
}

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$decoded->user_id]);

echo json_encode(["message" => "Tài khoản đã bị xóa"]);
?>
