<?php
include("header.php");
include("dbconnect.php");

if (!isset($_SESSION['iduser'])) {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    $_SESSION['redirect_after_login'] = 'index.php';
    echo "<script>alert('Vui lòng đăng nhập để xem đơn hàng!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['iduser'];
$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

if ($order_id <= 0) {
    // Nếu không có order_id hợp lệ, chuyển về trang chủ
    echo "<script>alert('Không tìm thấy thông tin đơn hàng!'); window.location.href='index.php';</script>";
    exit();
}

// Lấy thông tin đơn hàng
$order_sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
$order_stmt = $conn->prepare($order_sql);
if ($order_stmt === FALSE) {
    echo "Lỗi chuẩn bị truy vấn đơn hàng: " . $conn->error;
    exit();
}

$order_stmt->bind_param("ii", $order_id, $user_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

if ($order_result->num_rows == 0) {
    // Đơn hàng không tồn tại hoặc không thuộc về người dùng này
    echo "<script>alert('Không tìm thấy đơn hàng!'); window.location.href='index.php';</script>";
    exit();
}

$order = $order_result->fetch_assoc();

// Lấy chi tiết đơn hàng
$details_sql = "SELECT * FROM order_details WHERE order_id = ?";
$details_stmt = $conn->prepare($details_sql);
if ($details_stmt === FALSE) {
    echo "Lỗi chuẩn bị truy vấn chi tiết đơn hàng: " . $conn->error;
    exit();
}

$details_stmt->bind_param("i", $order_id);
$details_stmt->execute();
$details_result = $details_stmt->get_result();

// Hằng số
$shipping = 30000; // Phí vận chuyển
$discount = 0;     // Giảm giá
?>

<div class="container-fluid py-4" style="background-color: #f5f5f5;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="fas fa-check-circle me-2"></i>Đặt hàng thành công
                            </h4>
                            <a href="#" class="btn btn-outline-light btn-sm" onclick="window.print()">
                                <i class="fas fa-print me-1"></i>In hóa đơn
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h2 class="text-primary fw-bold">SUDES<span class="text-danger">PHONE</span></h2>
                            <p class="mb-0">Địa chỉ: 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
                            <p class="mb-0">Hotline: 1900 6750 | Email: support@sudesphone.com</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="border-bottom pb-2">Thông tin đơn hàng</h5>
                                <p class="mb-1"><strong>Mã đơn hàng:</strong> #<?php echo str_pad($order['id'], 8, '0', STR_PAD_LEFT); ?></p>
                                <p class="mb-1"><strong>Ngày đặt:</strong> <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></p>
                                <p class="mb-1"><strong>Phương thức thanh toán:</strong> 
                                    <?php 
                                    switch($order['payment_method']) {
                                        case 'cod':
                                            echo 'Thanh toán khi nhận hàng (COD)';
                                            break;
                                        case 'banking':
                                            echo 'Chuyển khoản ngân hàng';
                                            break;
                                        case 'creditcard':
                                            echo 'Thẻ tín dụng / Ghi nợ';
                                            break;
                                        default:
                                            echo $order['payment_method'];
                                    }
                                    ?>
                                </p>
                                <p class="mb-1"><strong>Trạng thái:</strong> <span class="badge bg-warning"><?php echo $order['status']; ?></span></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="border-bottom pb-2">Thông tin giao hàng</h5>
                                <p class="mb-1"><strong>Người nhận:</strong> <?php echo htmlspecialchars($order['fullname']); ?></p>
                                <p class="mb-1"><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
                                <p class="mb-1"><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
                                <?php if(!empty($order['note'])): ?>
                                <p class="mb-1"><strong>Ghi chú:</strong> <?php echo htmlspecialchars($order['note']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <h5 class="border-bottom pb-2 mb-3">Chi tiết đơn hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-end">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $subtotal = 0;
                                    $i = 1;
                                    while($item = $details_result->fetch_assoc()): 
                                        $item_total = $item['product_price'] * $item['quantity'];
                                        $subtotal += $item_total;
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                            <td class="text-center"><?php echo number_format($item['product_price'], 0, ',', '.'); ?>₫</td>
                                            <td class="text-center"><?php echo $item['quantity']; ?></td>
                                            <td class="text-end"><?php echo number_format($item_total, 0, ',', '.'); ?>₫</td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Tạm tính:</strong></td>
                                        <td class="text-end"><?php echo number_format($subtotal, 0, ',', '.'); ?>₫</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Phí vận chuyển:</strong></td>
                                        <td class="text-end"><?php echo number_format($shipping, 0, ',', '.'); ?>₫</td>
                                    </tr>
                                    <?php if($discount > 0): ?>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Giảm giá:</strong></td>
                                        <td class="text-end text-danger">-<?php echo number_format($discount, 0, ',', '.'); ?>₫</td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                                        <td class="text-end fw-bold text-danger"><?php echo number_format($order['total_amount'], 0, ',', '.'); ?>₫</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="alert alert-info mt-4">
                            <p class="mb-0"><i class="fas fa-info-circle me-2"></i>Cảm ơn bạn đã mua hàng tại SudesPhone. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>
                        </div>

                        <div class="text-center mt-4">
                            <a href="index.php" class="btn btn-primary me-2">
                                <i class="fas fa-home me-1"></i>Về trang chủ
                            </a>
                            <a href="my_orders.php" class="btn btn-outline-primary">
                                <i class="fas fa-list me-1"></i>Xem đơn hàng của tôi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$order_stmt->close();
$details_stmt->close();
$conn->close();
include("footer.php");
?> 