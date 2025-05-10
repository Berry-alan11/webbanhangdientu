<?php
require "../config/db.php";
require "../config/auth.php";

$data = json_decode(file_get_contents("php://input"));

$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->execute([$data->email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($data->password, $user['password'])) {
    die(json_encode(["error" => "Email hoặc mật khẩu không đúng"]));
}

$token = generate_jwt($user['id']);
echo json_encode(["message" => "Đăng nhập thành công", "token" => $token]);
?>
