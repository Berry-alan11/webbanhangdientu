<?php
session_start();
require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['contact_error'] = "Vui lòng điền đầy đủ thông tin.";
        header("Location: contact.php");
        exit;
    }
    
    // Insert the contact message into the database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        $_SESSION['contact_success'] = "Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.";
        header("Location: contact.php");
        exit;
    } else {
        $_SESSION['contact_error'] = "Có lỗi xảy ra: " . $conn->error;
        header("Location: contact.php");
        exit;
    }
    
    $stmt->close();
} else {
    header("Location: contact.php");
    exit;
}
?>
