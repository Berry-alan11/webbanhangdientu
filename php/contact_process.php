<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Nếu dùng Composer autoload
//require 'vendor/autoload.php';
// Nếu không dùng Composer, dùng dòng sau:
// require 'phpmailer/PHPMailerAutoload.php';
//require 'phpmailer/class.phpmailer.php';
// require 'phpmailer/class.smtp.php';
// require 'phpmailer/class.phpmailer.php';
//require 'phpmailer/class.phpmailer.php';
require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';
// require './PHPMailer/src/PHPMailerAutoload.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';
// require './PHPMailer/src/Exception.php';
// Nếu bạn không sử dụng Composer, hãy chắc chắn rằng đường dẫn đến các file này là chính xác
// require 'phpmailer/SMTP.php';
// require 'phpmailer/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server của Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vibadao123a@gmail.com'; // Gmail của bạn
        $mail->Password   = 'ufvvvtdhepkwjgqx';    // App password (không phải mật khẩu Gmail thông thường)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        //Recipients
        $mail->setFrom("vilaptrinh@gmail.com", $name);
        // $mail->addAddress('support@webbanhangdientu.vn', 'Web Bán Hàng Điện Tử');
        $mail->addAddress('thanhkha23122005@gmail.com', "Web Bán Hàng Điện Tử"); // Địa chỉ email nhận thông báo
        $mail->addReplyTo("vibadao123@gmail.com", $name); // Địa chỉ email trả lời
        

        //Content
        $mail->isHTML(false);
        $mail->Subject = "Liên hệ từ khách hàng: $name";
        $mail->Body    = "Họ tên: $name\nEmail: $email\n\nNội dung:\n$message";

        $mail->send();
        echo "<script>alert('Gửi liên hệ thành công!');window.location='contact.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gửi liên hệ thất bại: {$mail->ErrorInfo}');window.location='contact.php';</script>";
    }
}
?>
<!-- ?php
require 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<div style='padding: 20px;'>
                    <h4>✔️ Cảm ơn bạn đã liên hệ!</h4>
                    <p>Chúng tôi sẽ phản hồi sớm nhất có thể.</p>
                    <p><a href='contact.php'>Quay lại trang liên hệ</a></p>
                  </div>";
        } else {
            echo "<p>❌ Lỗi khi gửi liên hệ. Vui lòng thử lại.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>❌ Vui lòng điền đầy đủ thông tin.</p>";
    }

    $conn->close();
} else {
    header("Location: contact.php");
    exit;
} -->
