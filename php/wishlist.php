<?php
include("header.php");
include("dbconnect.php");

// Xử lý thêm sản phẩm vào danh sách yêu thích qua phương thức GET
if(isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    // Nếu người dùng đã đăng nhập
    if(isset($_SESSION['iduser'])) {
        $user_id = $_SESSION['iduser'];
        $product_id = (int)$_GET['product_id'];
        
        // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích chưa
        $check_sql = "SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?";
        $check_stmt = $conn->prepare($check_sql);
        if($check_stmt === FALSE) {
            echo "Lỗi khi chuẩn bị truy vấn kiểm tra: " . $conn->error;
            exit();
        }
        
        $check_stmt->bind_param("ii", $user_id, $product_id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        
        if($result->num_rows == 0) {
            // Sản phẩm chưa có trong danh sách yêu thích, thêm mới
            $insert_sql = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            if($insert_stmt === FALSE) {
                echo "Lỗi khi chuẩn bị truy vấn thêm mới: " . $conn->error;
                exit();
            }
            
            $insert_stmt->bind_param("ii", $user_id, $product_id);
            $insert_stmt->execute();
            $insert_stmt->close();
            
            echo "<script>alert('Sản phẩm đã được thêm vào danh sách yêu thích!');</script>";
        } else {
            echo "<script>alert('Sản phẩm đã có trong danh sách yêu thích!');</script>";
        }
        
        $check_stmt->close();
        
        // Chuyển hướng lại trang trước đó
        if(isset($_SERVER['HTTP_REFERER'])) {
            echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
            exit();
        }
    } else {
        // Nếu chưa đăng nhập, lưu URL hiện tại và chuyển về trang đăng nhập
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        echo "<script>alert('Vui lòng đăng nhập để thêm sản phẩm vào danh sách yêu thích!'); window.location.href='login.php';</script>";
        exit();
    }
}

if(!isset($_SESSION['iduser'])) {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    $_SESSION['redirect_after_login'] = 'wishlist.php';
    echo "<script>alert('Vui lòng đăng nhập để xem danh sách yêu thích!'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['iduser'];

// Lấy danh sách sản phẩm yêu thích của người dùng
$sql = "SELECT w.id as wishlist_id, p.product_id, p.product_name, p.product_price, p.product_image, p.product_discount 
        FROM wishlist w 
        JOIN products p ON w.product_id = p.product_id 
        WHERE w.user_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === FALSE) {
    echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
    exit();
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$wishlist_items = $stmt->get_result();
?>

<div class="container-fluid py-4" style="background-color: #f5f5f5;">
    <div class="container">
        <h2 class="mb-4 text-primary fw-bold">
            <i class="fas fa-heart me-2"></i>Sản phẩm yêu thích
        </h2>

        <?php if($wishlist_items->num_rows > 0): ?>
            <div class="row g-4">
                <?php while($item = $wishlist_items->fetch_assoc()): ?>
                    <div class="col-md-3">
                        <div class="card product-card h-100 shadow-sm">
                            <?php if($item['product_discount'] > 0): ?>
                                <span class="discount-badge">-<?php echo $item['product_discount']; ?>%</span>
                            <?php endif; ?>
                            
                            <img src="<?php echo $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>" class="card-img-top" style="height: 200px; object-fit: contain;">
                            
                            <div class="card-body">
                                <h5 class="card-title product-title"><?php echo $item['product_name']; ?></h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-danger fw-bold me-2"><?php echo number_format($item['product_price'], 0, ',', '.'); ?>₫</span>
                                    <?php if($item['product_discount'] > 0): 
                                        $old_price = $item['product_price'] * (100 / (100 - $item['product_discount']));
                                    ?>
                                        <span class="text-decoration-line-through text-muted"><?php echo number_format($old_price, 0, ',', '.'); ?>₫</span>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-sm add-to-cart" data-id="<?php echo $item['product_id']; ?>" data-name="<?php echo $item['product_name']; ?>" data-price="<?php echo $item['product_price']; ?>">
                                        <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm remove-wishlist" data-id="<?php echo $item['wishlist_id']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/4cddac8a462d1f793ceb5a96d8c2773e.png" alt="Empty Wishlist" style="width: 150px;" class="mb-3">
                    <h4 class="mb-3">Danh sách yêu thích của bạn còn trống</h4>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>Khám phá sản phẩm ngay
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý thêm vào giỏ hàng
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            
            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=add&product_id=${productId}&quantity=1`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Sản phẩm đã được thêm vào giỏ hàng!');
                }
            });
        });
    });
    
    // Xử lý xóa khỏi danh sách yêu thích
    const removeButtons = document.querySelectorAll('.remove-wishlist');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            if(confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi danh sách yêu thích?')) {
                const wishlistId = this.getAttribute('data-id');
                
                fetch('update_wishlist.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=delete&wishlist_id=${wishlistId}`
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        location.reload();
                    }
                });
            }
        });
    });
});
</script>

<?php
$stmt->close();
$conn->close();
include("footer.php");
?> 