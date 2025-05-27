<?php
include("header.php");
include("dbconnect.php");

if (!isset($_SESSION['iduser'])) {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    $_SESSION['redirect_after_login'] = 'my_orders.php';
    echo "<script>alert('Vui lòng đăng nhập để xem đơn hàng của bạn!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['iduser'];

// Lấy danh sách đơn hàng của người dùng
$orders_sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$orders_stmt = $conn->prepare($orders_sql);
if ($orders_stmt === FALSE) {
    echo "Lỗi chuẩn bị truy vấn đơn hàng: " . $conn->error;
    exit();
}

$orders_stmt->bind_param("i", $user_id);
$orders_stmt->execute();
$orders_result = $orders_stmt->get_result();

// Hàm chuyển đổi trạng thái đơn hàng sang màu sắc badge
function getStatusBadge($status) {
    switch ($status) {
        case 'Đang xử lý':
            return 'warning';
        case 'Đã xác nhận':
            return 'info';
        case 'Đang giao hàng':
            return 'primary';
        case 'Đã giao hàng':
            return 'success';
        case 'Đã hủy':
            return 'danger';
        default:
            return 'secondary';
    }
}
?>

<div class="container-fluid py-4" style="background-color: #f5f5f5;">
    <div class="container">
        <h2 class="mb-4 text-primary fw-bold">
            <i class="fas fa-shopping-bag me-2"></i>Đơn hàng của tôi
        </h2>

        <?php if ($orders_result->num_rows > 0): ?>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($order = $orders_result->fetch_assoc()): ?>
                                    <tr>
                                        <td>#<?php echo str_pad($order['id'], 8, '0', STR_PAD_LEFT); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></td>
                                        <td class="fw-bold text-danger"><?php echo number_format($order['total_amount'], 0, ',', '.'); ?>₫</td>
                                        <td>
                                            <?php 
                                            switch($order['payment_method']) {
                                                case 'cod':
                                                    echo '<i class="fas fa-money-bill-wave text-success me-1"></i>Thanh toán khi nhận hàng';
                                                    break;
                                                case 'banking':
                                                    echo '<i class="fas fa-university text-primary me-1"></i>Chuyển khoản ngân hàng';
                                                    break;
                                                case 'creditcard':
                                                    echo '<i class="fas fa-credit-card text-info me-1"></i>Thẻ tín dụng / Ghi nợ';
                                                    break;
                                                default:
                                                    echo $order['payment_method'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo getStatusBadge($order['status']); ?>">
                                                <?php echo $order['status']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="order_confirmation.php?order_id=<?php echo $order['id']; ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-1"></i>Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/a60759ad1dabe909c46a817ecbf71878.png" alt="Empty Orders" style="width: 150px;" class="mb-3">
                    <h4 class="mb-3">Bạn chưa có đơn hàng nào</h4>
                    <p class="text-muted mb-4">Hãy tiếp tục mua sắm để có những trải nghiệm tuyệt vời với các sản phẩm của chúng tôi!</p>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Mua sắm ngay
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$orders_stmt->close();
$conn->close();
include("footer.php");
?> 