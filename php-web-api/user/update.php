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

$stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$data->name, $data->email, $decoded->user_id]);

echo json_encode(["message" => "Cập nhật thành công"]);
?>
