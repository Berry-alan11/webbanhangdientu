<?php
session_start();
    include'database.php';//Kêt nối tới cơ sở dữ liệu

    // $email=$_GET['email'];
    // $passwords=$_GET['passwords'];

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email=$_POST['email'];
        $passwords=$_POST['passwords'];

        $stmt = $conn->prepare("SELECT id, firstname, email, password_hash FROM users WHERE email = ?");
        $stmt-> bind_param("s", $email);
        //Tránh kiểm tra như này vì mật khẩu đã băm khác mật khẩu nhập vào từ form
        //$stmt = $conn->prepare("SELECT id, firstname, email, password_hash FROM users WHERE email = ? AND password_hash = ?");
        // $stmt->bind_param("ss", $email, $passwords);
        $stmt -> execute();
        $result = $stmt-> get_result();

        if($row = $result->fetch_assoc()){
            // Nếu có kết quả trả về thì lấy thông tin người dùng
            $users=$result->fetch_assoc();
            
            //Kiểm tra mật khẩu vừa lấy về từ bảng users trong database websale
            if(password_verify($passwords,$row['password_hash'])){
                // Nếu mật khẩu đúng thì lưu thông tin vào session
                $_SESSION['firstname'] = $row['firstname'];
                //$_SESSIOIN['user_id'] = $user['id'];
                $_SESSION['email'] = $row['email'];
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
