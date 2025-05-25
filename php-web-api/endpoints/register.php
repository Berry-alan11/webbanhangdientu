<?php
require "../config/db.php";

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->name, $data->email, $data->password)) {
    die(json_encode(["error" => "Dữ liệu không hợp lệ"]));
}

$password_hash = password_hash($data->password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$data->name, $data->email, $password_hash]);

echo json_encode(["message" => "Đăng ký thành công"]);
?>
