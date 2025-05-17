<?php
// filepath: c:\xampp\htdocs\git\webbanhangdientu\php\facebook.php
    // Url của Facebook fanpage hoặc trang cá nhân của cửa hàng
    $facebook_url = "https://www.facebook.com/tenshopban";
    
    // Chuyển hướng người dùng đến địa chỉ Facebook
    header("Location: $facebook_url");
    exit();
?>