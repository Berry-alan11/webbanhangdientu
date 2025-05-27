<?php
session_start();
include("dbconnect.php");

// Kiểm tra đăng nhập
if(!isset($_SESSION['iduser'])) {
    echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để tiếp tục']);
    exit;
}

$user_id = $_SESSION['iduser'];
$response = ['success' => false];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    switch($action) {
        case 'add':
            // Thêm sản phẩm vào danh sách yêu thích
            if(isset($_POST['product_id'])) {
                $product_id = (int)$_POST['product_id'];
                
                // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích chưa
                $check_sql = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
                $check_stmt = $conn->prepare($check_sql);
                $check_stmt->bind_param("ii", $user_id, $product_id);
                $check_stmt->execute();
                $result = $check_stmt->get_result();
                
                if($result->num_rows == 0) {
                    // Thêm sản phẩm vào danh sách yêu thích
                    $insert_sql = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";
                    $insert_stmt = $conn->prepare($insert_sql);
                    $insert_stmt->bind_param("ii", $user_id, $product_id);
                    
                    if($insert_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã thêm sản phẩm vào danh sách yêu thích';
                    }
                    $insert_stmt->close();
                } else {
                    $response['success'] = true;
                    $response['message'] = 'Sản phẩm đã có trong danh sách yêu thích';
                }
                $check_stmt->close();
            }
            break;
            
        case 'delete':
            // Xóa sản phẩm khỏi danh sách yêu thích
            if(isset($_POST['wishlist_id'])) {
                $wishlist_id = (int)$_POST['wishlist_id'];
                
                // Xác minh wishlist_id thuộc về người dùng này
                $verify_sql = "SELECT id FROM wishlist WHERE id = ? AND user_id = ?";
                $verify_stmt = $conn->prepare($verify_sql);
                $verify_stmt->bind_param("ii", $wishlist_id, $user_id);
                $verify_stmt->execute();
                $verify_result = $verify_stmt->get_result();
                
                if($verify_result->num_rows > 0) {
                    $delete_sql = "DELETE FROM wishlist WHERE id = ?";
                    $delete_stmt = $conn->prepare($delete_sql);
                    $delete_stmt->bind_param("i", $wishlist_id);
                    
                    if($delete_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã xóa sản phẩm khỏi danh sách yêu thích';
                    }
                    $delete_stmt->close();
                }
                $verify_stmt->close();
            }
            break;
    }
}

echo json_encode($response);
$conn->close();
?> 