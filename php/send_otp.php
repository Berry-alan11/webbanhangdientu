<?php
session_start();
include 'dbconnect.php'; // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    // Kiểm tra email có tồn tại không
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // Sinh OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_email'] = $email;
        $_SESSION['otp_expire'] = time() + 300; // 5 phút

        // Gửi OTP qua email (dùng mail() hoặc PHPMailer)
        $subject = "Mã OTP đổi mật khẩu SudesPhone";
        $message = "Mã OTP của bạn là: $otp (có hiệu lực trong 5 phút)";
        $headers = "From: support@sudesphone.com";
        mail($email, $subject, $message, $headers);

        header("Location: change_password.php?step=otp&email=" . urlencode($email));
        // exit();
    } else {
        $_SESSION['otp_error'] = "Email không tồn tại!";
        header("Location: change_password.php");
        exit();
    }
}
?>
