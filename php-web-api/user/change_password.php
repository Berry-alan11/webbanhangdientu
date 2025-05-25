<?php
require "../../config/db.php";
require "../../config/auth.php";

$headers = getallheaders();
$token = str_replace("Bearer ", "", $headers["Authorization"] ?? "");

$decoded = verify_jwt($token);
if (!$decoded) {
    die(json_encode(["error" => "Token không hợp lệ"]));
}

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
$stmt->execute([$decoded->user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($data->old_password, $user["password"])) {
    die(json_encode(["error" => "Mật khẩu cũ không đúng"]));
}

$new_password = password_hash($data->new_password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$stmt->execute([$new_password, $decoded->user_id]);

echo json_encode(["message" => "Đổi mật khẩu thành công"]);
?>
