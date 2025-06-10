<?php
session_start();
include 'dbconnect.php';

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['new_password'], $_POST['confirm_password']) &&
    isset($_SESSION['otp_verified'], $_SESSION['otp_email']) &&
    $_SESSION['otp_verified'] === true
) {
    $email = $_SESSION['otp_email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $_SESSION['pw_error'] = "Mật khẩu nhập lại không khớp!";
        header("Location: change_password.php?step=newpass&email=" . urlencode($email));
        exit();
    }

    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET passwords = ? WHERE email = ?");
    $stmt->bind_param("ss", $hash, $email);
    $stmt->execute();

    // Xóa session liên quan OTP
    unset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['otp_expire'], $_SESSION['otp_verified']);

    $_SESSION['pw_success'] = "Đổi mật khẩu thành công! Bạn có thể đăng nhập lại.";
    header("Location: login.php");
    exit();
}
header("Location: change_password.php");
exit();
?>
<body>
    <form action="update_password.php" method="post" id="form-password" style="display:none;">
            <h2>Đổi mật khẩu mới</h2>
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" id="new_password" required>
            <label for="confirm_password">Nhập lại mật khẩu mới:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="hidden" name="email" id="pw-email">
            <button type="submit">Đổi mật khẩu</button>
        </form>
</body>
  
