<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webbanhangdientu";
//Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);
//Kiểm tra kết nối
if($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

<!-- ?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webbanhangdientu";
//Tạo kết nối
$conn = new mysqli($servername, $username, $password,$database);
//Kiểm tra kết nối

?> -->