<?php
// --- PHẦN 1: KẾT NỐI VÀ KIỂM TRA ĐĂNG NHẬP ---
include("header.php");
include("dbconnect.php");

// Kiểm tra người dùng đã đăng nhập chưa
if(!isset($_SESSION['iduser'])) {
    // Chưa đăng nhập thì chuyển về trang login
    $_SESSION['redirect_after_login'] = 'checkout.php';
    echo "<script>alert('Vui lòng đăng nhập để thanh toán!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['iduser'];

// --- PHẦN 2: LẤY THÔNG TIN SẢN PHẨM TRONG GIỎ HÀNG ---
$sql = "SELECT c.id as cart_id, c.quantity, p.product_id, p.product_name, 
        p.product_price, p.product_image, p.product_discount 
        FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = $user_id";
$items = $conn->query($sql);

// Tính toán tổng tiền ban đầu
$total = 0;
$shipping = 30000; // Phí vận chuyển mặc định
$discount = 0;     // Giảm giá mặc định

// Lưu thông tin sản phẩm trong giỏ
$cart_items = array();
while ($item = $items->fetch_assoc()) {
    $item_total = $item['product_price'] * $item['quantity'];
    $total += $item_total;
    $cart_items[] = $item;
}

// --- PHẦN 3: XỬ LÝ ĐẶT HÀNG ---
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $note = $_POST['note'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    $final_total = $total + $shipping - $discount;
    
    // Kiểm tra dữ liệu
    if(empty($fullname) || empty($phone) || empty($address)) {
        $error = "Vui lòng điền đầy đủ thông tin giao hàng";
    } else {
        // Lưu thông tin đơn hàng
        $order_sql = "INSERT INTO orders (user_id, fullname, phone, address, note, 
                     total_amount, payment_method) 
                     VALUES ($user_id, '$fullname', '$phone', '$address', '$note', 
                     $final_total, '$payment_method')";
                     
        if($conn->query($order_sql)) {
            $order_id = $conn->insert_id;
            
            // Lấy lại danh sách sản phẩm trong giỏ
            $items = $conn->query($sql);
            
            // Lưu từng sản phẩm vào chi tiết đơn hàng
            while ($item = $items->fetch_assoc()) {
                $product_id = $item['product_id'];
                $product_name = $conn->real_escape_string($item['product_name']);
                $product_price = $item['product_price'];
                $quantity = $item['quantity'];
                
                $detail_sql = "INSERT INTO order_details (order_id, product_id, product_name, 
                              product_price, quantity) 
                              VALUES ($order_id, $product_id, '$product_name', 
                              $product_price, $quantity)";
                $conn->query($detail_sql);
            }
            
            // Xóa giỏ hàng sau khi đặt hàng thành công
            $clear_cart_sql = "DELETE FROM cart WHERE user_id = $user_id";
            $conn->query($clear_cart_sql);
            
            // Lưu order_id vào session và chuyển đến trang xác nhận
            $_SESSION['last_order_id'] = $order_id;
            echo "<script>window.location.href='order_confirmation.php?order_id=" . $order_id . "';</script>";
            exit();
        } else {
            $error = "Đã xảy ra lỗi: " . $conn->error;
        }
    }
}

// Lấy lại danh sách sản phẩm để hiển thị trên trang
$items = $conn->query($sql);
?>

<!-- --- PHẦN 4: GIAO DIỆN THANH TOÁN --- -->
<div class="container-fluid py-4" style="background-color: #f5f5f5;">
    <div class="container">
        <h2 class="mb-4 text-primary fw-bold">
            <i class="fas fa-credit-card me-2"></i>Thanh toán
        </h2>

        <div class="row">
            <div class="col-md-8">
                <!-- Form thanh toán -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Thông tin giao hàng</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Họ và tên người nhận <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ giao hàng <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">Phương thức thanh toán</h5>
                            
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">
                                    <i class="fas fa-money-bill-wave me-2"></i>Thanh toán khi nhận hàng (COD)
                                </label>
                            </div>
                            
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment_method" id="banking" value="banking">
                                <label class="form-check-label" for="banking">
                                    <i class="fas fa-university me-2"></i>Chuyển khoản ngân hàng
                                </label>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="payment_method" id="creditcard" value="creditcard">
                                <label class="form-check-label" for="creditcard">
                                    <i class="fas fa-credit-card me-2"></i>Thẻ tín dụng / Ghi nợ
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-check-circle me-2"></i>Đặt hàng
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- Thông tin đơn hàng -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0">Thông tin đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Sản phẩm</h6>

                        <?php if($items && $items->num_rows > 0): ?>
                            <div class="order-items">
                                <?php 
                                $total = 0;
                                while($item = $items->fetch_assoc()): 
                                    $item_total = $item['product_price'] * $item['quantity'];
                                    $total += $item_total;
                                ?>
                                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-3">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>" style="width: 50px; height: 50px; object-fit: cover;" class="me-2">
                                            <div>
                                                <p class="mb-0"><?php echo $item['product_name']; ?></p>
                                                <small class="text-muted">SL: <?php echo $item['quantity']; ?></small>
                                            </div>
                                        </div>
                                        <span class="text-danger fw-bold"><?php echo number_format($item_total, 0, ',', '.'); ?>₫</span>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <hr class="my-3">

                            <div class="d-flex justify-content-between mb-2">
                                <span>Tạm tính:</span>
                                <span class="fw-bold"><?php echo number_format($total, 0, ',', '.'); ?>₫</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Phí vận chuyển:</span>
                                <span class="fw-bold"><?php echo number_format($shipping, 0, ',', '.'); ?>₫</span>
                            </div>
                            <?php if($discount > 0): ?>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Giảm giá:</span>
                                <span class="fw-bold text-danger">-<?php echo number_format($discount, 0, ',', '.'); ?>₫</span>
                            </div>
                            <?php endif; ?>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between">
                                <h5>Tổng cộng:</h5>
                                <h5 class="text-danger"><?php echo number_format($total + $shipping - $discount, 0, ',', '.'); ?>₫</h5>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                Không có sản phẩm nào được chọn để thanh toán.
                            </div>
                            <a href="cart.php" class="btn btn-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Quay lại giỏ hàng
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// --- PHẦN 5: KẾT THÚC ---
$conn->close();
include("footer.php");
?> 