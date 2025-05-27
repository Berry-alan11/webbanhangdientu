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
// echo"Connected sucessfully";
//mysqli_close($conn);

?>