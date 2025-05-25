<?php
require "../../config/db.php";
require "../../config/auth.php";

$headers = getallheaders();
$token = str_replace("Bearer ", "", $headers["Authorization"] ?? "");

$decoded = verify_jwt($token);
if (!$decoded) {
    die(json_encode(["error" => "Token không hợp lệ"]));
}

$stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmt->execute([$decoded->user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($user ?: ["error" => "Không tìm thấy người dùng"]);
?>
