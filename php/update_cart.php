<?php
session_start();
include("dbconnect.php");

// Response data structure
$response = ['success' => false];

// Kiểm tra đăng nhập
if(!isset($_SESSION['iduser']) || empty($_SESSION['iduser'])) {
    $response['message'] = 'Vui lòng đăng nhập để tiếp tục';
    echo json_encode($response);
    exit;
}

$user_id = $_SESSION['iduser'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    switch($action) {
        case 'add':
            // Thêm sản phẩm vào giỏ hàng
            if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
                $product_id = (int)$_POST['product_id'];
                $quantity = (int)$_POST['quantity'];
                
                // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                $check_sql = "SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?";
                $check_stmt = $conn->prepare($check_sql);
                $check_stmt->bind_param("ii", $user_id, $product_id);
                $check_stmt->execute();
                $result = $check_stmt->get_result();
                
                if($result->num_rows > 0) {
                    // Sản phẩm đã có trong giỏ, cập nhật số lượng
                    $cart_item = $result->fetch_assoc();
                    $new_quantity = $cart_item['quantity'] + $quantity;
                    
                    $update_sql = "UPDATE cart SET quantity = ? WHERE id = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bind_param("ii", $new_quantity, $cart_item['id']);
                    
                    if($update_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã cập nhật số lượng trong giỏ hàng';
                    }
                    $update_stmt->close();
                } else {
                    // Thêm mới sản phẩm vào giỏ
                    $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
                    $insert_stmt = $conn->prepare($insert_sql);
                    $insert_stmt->bind_param("iii", $user_id, $product_id, $quantity);
                    
                    if($insert_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã thêm sản phẩm vào giỏ hàng';
                    }
                    $insert_stmt->close();
                }
                $check_stmt->close();
            }
            break;
            
        case 'update':
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            if(isset($_POST['cart_id']) && isset($_POST['quantity'])) {
                $cart_id = (int)$_POST['cart_id'];
                $quantity = (int)$_POST['quantity'];
                
                // Xác minh cart_id thuộc về người dùng này
                $verify_sql = "SELECT id FROM cart WHERE id = ? AND user_id = ?";
                $verify_stmt = $conn->prepare($verify_sql);
                $verify_stmt->bind_param("ii", $cart_id, $user_id);
                $verify_stmt->execute();
                $verify_result = $verify_stmt->get_result();
                
                if($verify_result->num_rows > 0) {
                    $update_sql = "UPDATE cart SET quantity = ? WHERE id = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bind_param("ii", $quantity, $cart_id);
                    
                    if($update_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã cập nhật số lượng';
                    }
                    $update_stmt->close();
                }
                $verify_stmt->close();
            }
            break;
            
        case 'delete':
            // Xóa sản phẩm khỏi giỏ hàng
            if(isset($_POST['cart_id'])) {
                $cart_id = (int)$_POST['cart_id'];
                
                // Xác minh cart_id thuộc về người dùng này
                $verify_sql = "SELECT id FROM cart WHERE id = ? AND user_id = ?";
                $verify_stmt = $conn->prepare($verify_sql);
                $verify_stmt->bind_param("ii", $cart_id, $user_id);
                $verify_stmt->execute();
                $verify_result = $verify_stmt->get_result();
                
                if($verify_result->num_rows > 0) {
                    $delete_sql = "DELETE FROM cart WHERE id = ?";
                    $delete_stmt = $conn->prepare($delete_sql);
                    $delete_stmt->bind_param("i", $cart_id);
                    
                    if($delete_stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Đã xóa sản phẩm khỏi giỏ hàng';
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