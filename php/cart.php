<?php
// --- PHẦN 1: KẾT NỐI VÀ THIẾT LẬP ---
include("header.php");
include("dbconnect.php");

// --- PHẦN 2: XỬ LÝ THÊM SẢN PHẨM VÀO GIỎ ---
if(isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    // Kiểm tra đăng nhập
    if(isset($_SESSION['iduser'])) {
        $user_id = $_SESSION['iduser'];
        $product_id = (int)$_GET['product_id'];
        $quantity = 1; // Mặc định thêm 1 sản phẩm

        // Kiểm tra sản phẩm đã có trong giỏ chưa
        $check_sql = "SELECT id, quantity FROM cart WHERE user_id = $user_id AND product_id = $product_id";
        $result = $conn->query($check_sql);
        
        if($result->num_rows > 0) {
            // Sản phẩm đã có trong giỏ, cập nhật số lượng
            $cart_item = $result->fetch_assoc();
            $new_quantity = $cart_item['quantity'] + $quantity;
            
            $update_sql = "UPDATE cart SET quantity = $new_quantity WHERE id = {$cart_item['id']}";
            $conn->query($update_sql);
        } else {
            // Thêm mới sản phẩm vào giỏ
            $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
            $conn->query($insert_sql);
        }
        
        // Thông báo và quay lại trang trước
        echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!');</script>";
        if(isset($_SERVER['HTTP_REFERER'])) {
            echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
            exit();
        }
    } else {
        // Yêu cầu đăng nhập
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        echo "<script>alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!'); window.location.href='login.php';</script>";
        exit();
    }
}

// --- PHẦN 3: KIỂM TRA ĐĂNG NHẬP ---
if(!isset($_SESSION['iduser'])) {
    // Người dùng chưa đăng nhập
    $_SESSION['redirect_after_login'] = 'cart.php';
    echo "<script>alert('Vui lòng đăng nhập để xem giỏ hàng!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['iduser'];

// --- PHẦN 4: LẤY DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG ---
$sql = "SELECT c.id as cart_id, c.quantity, p.product_id, p.product_name, p.product_price, 
              p.product_image, p.product_discount 
       FROM cart c 
       JOIN products p ON c.product_id = p.product_id 
       WHERE c.user_id = $user_id";
$cart_items = $conn->query($sql);
?>

<!-- --- PHẦN 5: HIỂN THỊ GIAO DIỆN GIỎ HÀNG --- -->
<div class="container-fluid py-4" style="background-color: #f5f5f5;">
    <div class="container">
        <h2 class="mb-4 text-primary fw-bold">
            <i class="fas fa-shopping-cart me-2"></i>Giỏ hàng của tôi
        </h2>

        <?php if($cart_items && $cart_items->num_rows > 0): ?>
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <div class="form-check">
                                <input class="form-check-input select-all" type="checkbox" id="selectAll">
                                <label class="form-check-label" for="selectAll"></label>
                            </div>
                        </div>
                        <div class="col-5">Sản Phẩm</div>
                        <div class="col-2 text-center">Đơn Giá</div>
                        <div class="col-2 text-center">Số Lượng</div>
                        <div class="col-1 text-center">Thao Tác</div>
                        <div class="col-1 text-end">Tổng Tiền</div>
                    </div>
                </div>

                <div class="card-body">
                    <?php 
                    $total = 0;
                    while($item = $cart_items->fetch_assoc()): 
                        $item_total = $item['product_price'] * $item['quantity'];
                        $total += $item_total;
                    ?>
                        <div class="row align-items-center py-3 border-bottom item-row">
                            <div class="col-1">
                                <div class="form-check">
                                    <input class="form-check-input item-check" type="checkbox" value="<?php echo $item['cart_id']; ?>" data-price="<?php echo $item_total; ?>">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>" class="img-fluid me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div>
                                        <h6 class="mb-0"><?php echo $item['product_name']; ?></h6>
                                        <?php if($item['product_discount'] > 0): ?>
                                            <span class="badge bg-danger">-<?php echo $item['product_discount']; ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <span class="text-danger fw-bold"><?php echo number_format($item['product_price'], 0, ',', '.'); ?>₫</span>
                                <?php if($item['product_discount'] > 0): 
                                    $old_price = $item['product_price'] * (100 / (100 - $item['product_discount']));
                                ?>
                                    <br><small class="text-decoration-line-through text-muted"><?php echo number_format($old_price, 0, ',', '.'); ?>₫</small>
                                <?php endif; ?>
                            </div>
                            <div class="col-2 text-center">
                                <div class="input-group quantity-group" style="width: 120px; margin: 0 auto;">
                                    <button class="btn btn-outline-primary btn-sm quantity-btn minus" data-id="<?php echo $item['cart_id']; ?>">-</button>
                                    <input type="text" class="form-control text-center quantity-input" value="<?php echo $item['quantity']; ?>" data-id="<?php echo $item['cart_id']; ?>">
                                    <button class="btn btn-outline-primary btn-sm quantity-btn plus" data-id="<?php echo $item['cart_id']; ?>">+</button>
                                </div>
                            </div>
                            <div class="col-1 text-center">
                                <button class="btn btn-link text-danger delete-item" data-id="<?php echo $item['cart_id']; ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="col-1 text-end">
                                <span class="text-danger fw-bold"><?php echo number_format($item_total, 0, ',', '.'); ?>₫</span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="mb-2">Mã giảm giá</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nhập mã giảm giá">
                                    <button class="btn btn-primary">Áp dụng</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Tổng tiền hàng:</span>
                                        <span class="fw-bold" id="subtotal"><?php echo number_format($total, 0, ',', '.'); ?>₫</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Phí vận chuyển:</span>
                                        <span class="fw-bold" id="shipping">30.000₫</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Giảm giá:</span>
                                        <span class="fw-bold text-danger" id="discount">-0₫</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">Tổng thanh toán:</span>
                                        <span class="fw-bold text-danger fs-5" id="total"><?php echo number_format($total + 30000, 0, ',', '.'); ?>₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg" id="checkoutBtn">
                                    <i class="fas fa-credit-card me-2"></i>Thanh Toán
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Hiển thị khi giỏ hàng trống -->
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f49e36beaf32db.png" alt="Empty Cart" style="width: 150px;" class="mb-3">
                    <h4 class="mb-3">Giỏ hàng của bạn còn trống</h4>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Mua sắm ngay
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- --- PHẦN 6: JAVASCRIPT XỬ LÝ --- -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý chọn tất cả
    const selectAll = document.querySelector('.select-all');
    const itemChecks = document.querySelectorAll('.item-check');
    
    if(selectAll) {
        selectAll.addEventListener('change', function() {
            itemChecks.forEach(check => {
                check.checked = selectAll.checked;
            });
            updateTotal();
        });
    }
    
    // Xử lý khi chọn từng sản phẩm
    itemChecks.forEach(check => {
        check.addEventListener('change', function() {
            updateTotal();
            checkSelectAll();
        });
    });
    
    // Kiểm tra nếu tất cả sản phẩm được chọn
    function checkSelectAll() {
        let allChecked = true;
        itemChecks.forEach(check => {
            if(!check.checked) {
                allChecked = false;
            }
        });
        if(selectAll) {
            selectAll.checked = allChecked;
        }
    }
    
    // Cập nhật tổng tiền dựa trên sản phẩm được chọn
    function updateTotal() {
        let total = 0;
        itemChecks.forEach(check => {
            if(check.checked) {
                total += parseFloat(check.getAttribute('data-price'));
            }
        });
        
        const shipping = 30000;
        const discount = 0;
        
        document.getElementById('subtotal').innerText = formatCurrency(total);
        document.getElementById('total').innerText = formatCurrency(total + shipping - discount);
    }
    
    // Định dạng tiền tệ
    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN') + '₫';
    }
    
    // Nút tăng giảm số lượng
    const minusBtns = document.querySelectorAll('.minus');
    const plusBtns = document.querySelectorAll('.plus');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    
    minusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
            let value = parseInt(input.value);
            if(value > 1) {
                input.value = value - 1;
                updateQuantity(id, input.value);
            }
        });
    });
    
    plusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
            let value = parseInt(input.value);
            input.value = value + 1;
            updateQuantity(id, input.value);
        });
    });
    
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            const id = this.getAttribute('data-id');
            let value = parseInt(this.value);
            if(isNaN(value) || value < 1) {
                value = 1;
                this.value = 1;
            }
            updateQuantity(id, value);
        });
    });
    
    // Cập nhật số lượng bằng AJAX
    function updateQuantity(cartId, quantity) {
        // Cách đơn giản hơn để gửi yêu cầu AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    location.reload();
                }
            }
        };
        xhr.send(`action=update&cart_id=${cartId}&quantity=${quantity}`);
    }
    
    // Xử lý xóa sản phẩm
    const deleteButtons = document.querySelectorAll('.delete-item');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            if(confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                const cartId = this.getAttribute('data-id');
                deleteItem(cartId);
            }
        });
    });
    
    // Xóa sản phẩm bằng AJAX
    function deleteItem(cartId) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    location.reload();
                }
            }
        };
        xhr.send(`action=delete&cart_id=${cartId}`);
    }
    
    // Xử lý nút thanh toán
    const checkoutBtn = document.getElementById('checkoutBtn');
    if(checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            let hasSelected = false;
            itemChecks.forEach(check => {
                if(check.checked) {
                    hasSelected = true;
                }
            });
            
            if(hasSelected) {
                window.location.href = 'checkout.php';
            } else {
                alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán!');
            }
        });
    }
});
</script>

<?php 
// --- PHẦN 7: KẾT THÚC ---
$conn->close();
include("footer.php");
?> 