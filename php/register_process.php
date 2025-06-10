<?php 
$servername = "localhost";
$database = "webbanhangdientu";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// hostname, username, password, database

//Check connection

if($conn->connect_error){
    die("Connection failed (kết nối bị lỗi): ".$conn->connect_error);
}
echo"Connected sucessfully";
// Đóng kết nối quá sớm sẽ xảy ra lỗi vì vậy nên comment dòng này
// Nếu muốn biết lỗi gì thì thử chạy file là biết
// mysqli_close($conn);

// Lấy dữ liệu từ form
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$phonenumber=(int)$_POST['phonenumber'];//ép kiểu phone về int
$passwords=password_hash($_POST['passwords'], PASSWORD_DEFAULT);

// Dùng câu lệnh insert để chèn dữ liệu vào bảng users trong database websale
$sql = "INSERT INTO users(lastname, firstname, email, phonenumber, password_hash) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
// Kiểm tra kết nối để biết việc chuẩn bị có thành công hay chưa
if(!$stmt){
    die("SQL prepare failed ".$conn->error);
}
$stmt->bind_param('sssis', $lastname, $firstname, $email, $phonenumber, $passwords);// có bao nhiêu dữ liệu tương ứng thì truyền vào bấy nhiêu s, i
// sssis đồng nghĩa dữ liệu của các trường là string, string, string, int, string sẽ tương ứng với lastname, firstname, email, phonenumber, passwords

//Thực thi câu lệnh sql và kiểm tra xem dữ liệu đã được chèn vào bảng hay chưa
if($stmt->execute()){
    echo"\nĐăng ký thành công và đã chèn vào được";
    header("Location:login.php");
}else{
    echo "Error".$stmt->error;
}

$stmt->close();
$conn->close();

?>

<!-- // Lấy dữ liệu từ form
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu

// Chuẩn bị câu lệnh INSERT
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

// Thực thi và kiểm tra
if ($stmt->execute()) {
    echo "Đăng ký thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close(); -->