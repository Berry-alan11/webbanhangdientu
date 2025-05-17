<?php
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
}
