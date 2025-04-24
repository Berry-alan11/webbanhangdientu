<?php
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
            
            //Kiểm tra mật khẩu vừa lấy về từ bảng users trong database websale
            if(password_verify($passwords,$users['passwords'])){
                $_SESSIOIN['user_id'] = $user['iduser'];
                $_SESSIOIN['email'] = $user['email'];
                header("Location:index.php");
                exit();
            }else{echo"Sai password";}
        }else{echo"Ten dang nhap khong ton tai";}
    }
   // $stmt->close();
    //$conn->close();
?>


<!-- session_start();
include 'config.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php"); // Chuyển hướng sau khi đăng nhập thành công
            exit();
        } else {
            echo "Sai mật khẩu!";
        }
    } else {
        echo "Tên đăng nhập không tồn tại!";
    }

    $stmt->close();
    $conn->close();
} -->
