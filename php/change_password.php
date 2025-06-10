<?php
// Xử lý gửi OTP, xác thực OTP, đổi mật khẩu sẽ thực hiện ở các file xử lý riêng biệt (ví dụ: send_otp.php, verify_otp.php, update_password.php)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu qua Email OTP</title>
    <link rel="stylesheet" href="../css/change_password.css">
</head>
<body>
    <div class="change-password-container">
        <!-- Bước 1: Nhập email -->
        <form action="send_otp.php" method="post" id="form-email">
            <h2>Quên mật khẩu</h2>
            <label for="email">Nhập email của bạn:</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Gửi OTP</button>
        </form>

        <!-- Bước 2: Nhập OTP (hiển thị sau khi gửi OTP) -->
         <!-- style="display:none;" -->
        <form action="verify_otp.php" method="post" id="form-otp" >
            <h2>Xác thực OTP</h2>
            <label for="otp">Nhập mã OTP gửi về email:</label>
            <input type="text" name="otp" id="otp" required>
            <input type="hidden" name="email" id="otp-email">
            <button type="submit">Xác thực</button>
        </form> 

        <!-- Bước 3: Đổi mật khẩu mới (hiển thị sau khi xác thực OTP thành công) style="display:none; -->
         <form action="update_password.php" method="post" id="form-password" >
            <h2>Đổi mật khẩu mới</h2>
            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" name="new_password" id="new_password" required>
            <label for="confirm_password">Nhập lại mật khẩu mới:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <input type="hidden" name="email" id="pw-email">
            <button type="submit">Đổi mật khẩu</button>
        </form>
    </div>
    <script>
        // Demo chuyển form (bạn xử lý chuyển form bằng PHP hoặc JS sau khi gửi thành công)
        // document.getElementById('form-email').style.display = 'none';
        // document.getElementById('form-otp').style.display = 'block';
        // document.getElementById('form-password').style.display = 'block';
    </script>
</body>
</html>
