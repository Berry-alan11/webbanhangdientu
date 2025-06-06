<?php
session_start(); // Bắt đầu phiên làm việc
    //include 'header.php';//Kêt nối tới header

    include'dbconnect.php';//Kêt nối tới cơ sở dữ liệu

    // $email=$_GET['email'];
    // $passwords=$_GET['passwords'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email=$_POST['email'];
        $passwords=$_POST['passwords'];

        $stmt = $conn->prepare("SELECT iduser, email, passwords FROM users WHERE email = ?");
        $stmt-> bind_param("s", $email);
        $stmt -> execute();
        $result = $stmt-> get_result();

        if($result->num_rows > 0){
            $users=$result->fetch_assoc();
            
            //Kiểm tra mật khẩu vừa lấy về từ bảng users trong database webbanhangdientu
            if(password_verify($passwords,$users['passwords'])){
                // Lưu thông tin người dùng vào session
                $_SESSION['iduser'] = $users['iduser'];
                $_SESSION['email'] = $users['email'];
                $_SESSION['login_success'] = "Đăng nhập thành công!";
                
                // Kiểm tra xem có trang cần chuyển hướng sau đăng nhập không
                if(isset($_SESSION['redirect_after_login']) && !empty($_SESSION['redirect_after_login'])) {
                    $redirect = $_SESSION['redirect_after_login'];
                    unset($_SESSION['redirect_after_login']); // Xóa biến session này sau khi đã sử dụng
                    header("Location: $redirect");
                    exit();
                } else {
                    // Chuyển hướng về trang chủ nếu không có trang cần chuyển hướng
                    header("Location: index.php");
                    exit();
                }
            }else{
                $_SESSION['login_error'] = "Sai mật khẩu!";
                header("Location: login.php");
                exit();
            }
        }else{
            $_SESSION['login_error'] = "Email không tồn tại trong hệ thống!";
            header("Location: login.php");
            exit();
        }
    }
    $stmt->close();
    $conn->close();
?>

