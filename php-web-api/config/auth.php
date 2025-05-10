<?php
require "vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";  // Thay thế bằng khóa bảo mật riêng

function generate_jwt($user_id) {
    global $secret_key;
    $payload = [
        "user_id" => $user_id,
        "iat" => time(),
        "exp" => time() + (60 * 60 * 24) // Hết hạn sau 1 ngày
    ];
    return JWT::encode($payload, $secret_key, "HS256");
}

function verify_jwt($token) {
    global $secret_key;
    try {
        return JWT::decode($token, new Key($secret_key, "HS256"));
    } catch (Exception $e) {
        return false;
    }
}
?>
