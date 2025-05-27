<?php
session_start();

// Save the logout message before destroying the session
$_SESSION['logout_message'] = "Đăng xuất thành công!";
$_SESSION['destroy_after'] = true;

// Redirect to login page
header("Location: login.php?logout=success");
exit();
?> 