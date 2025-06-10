<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp'])) {
    $otp = trim($_POST['otp']);
    if (
        isset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['otp_expire']) &&
        $_SESSION['otp'] == $otp &&
        time() <= $_SESSION['otp_expire']
    ) {
        $_SESSION['otp_verified'] = true;
        header("Location: change_password.php?step=newpass&email=" . urlencode($_SESSION['otp_email']));
        exit();
    } else {
        $_SESSION['otp_error'] = "OTP không đúng hoặc đã hết hạn!";
        header("Location: change_password.php?step=otp&email=" . urlencode($_SESSION['otp_email']));
        exit();
    }
}
?>
 <!-- Bước 2: Nhập OTP (hiển thị sau khi gửi OTP) -->
        <form action="verify_otp.php" method="post" id="form-otp" style="display:none;">
            <h2>Xác thực OTP</h2>
            <label for="otp">Nhập mã OTP gửi về email:</label>
            <input type="text" name="otp" id="otp" required>
            <input type="hidden" name="email" id="otp-email">
            <button type="submit">Xác thực</button>
        </form>
