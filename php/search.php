<?php
// --- PHẦN 1: THIẾT LẬP ---
// Kết nối với cơ sở dữ liệu
include("dbconnect.php");

// --- PHẦN 2: LẤY TỪ KHÓA TÌM KIẾM ---
// Lấy từ khóa từ URL (ví dụ: search.php?keyword=dienthoai)
$keyword = '';
if(isset($_GET['keyword'])) {
    $keyword = trim($_GET['keyword']);  // Xóa khoảng trắng thừa
}

// Nếu không có từ khóa, quay về trang chủ
if(empty($keyword)) {
    header("Location: index.php");
    exit();
}

// Kết nối với header
include("header.php");

// --- PHẦN 3: TÌM KIẾM SẢN PHẨM ---
$searchTerm = "%" . $keyword . "%";  // Thêm % để tìm kiếm mọi từ có chứa keyword
$sql = "SELECT * FROM products WHERE product_name LIKE '$searchTerm'";
$result = $conn->query($sql);  // Thực hiện truy vấn
?>

<!-- --- PHẦN 4: HIỂN THỊ KẾT QUẢ --- -->
<main class="container my-5">
    <h2 class="mb-4">Kết quả tìm kiếm: "<?php echo htmlspecialchars($keyword); ?>"</h2>
    
    <?php 
    // Kiểm tra xem có kết quả nào không
    if($result && $result->num_rows > 0): ?>
        <div class="row g-4">
            <?php 
            // Hiển thị từng sản phẩm tìm được
            while($product = $result->fetch_assoc()): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <?php if(!empty($product['product_discount'])): ?>
                            <span class="discount-badge">-<?php echo $product['product_discount']; ?>%</span>
                        <?php endif; ?>
                        
                        <img src="<?php echo $product['product_image']; ?>" class="card-img-top product-img" 
                             alt="<?php echo $product['product_name']; ?>">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                            <p class="product-price"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>₫</p>
                            <a href="cart.php?action=add&product_id=<?php echo $product['product_id']; ?>" 
                               class="btn btn-primary btn-sm">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <!-- Hiển thị thông báo nếu không tìm thấy sản phẩm -->
        <div class="alert alert-info">
            <p>Không tìm thấy sản phẩm. <a href="index.php">Quay về trang chủ</a></p>
        </div>
    <?php endif; ?>
</main>

<?php 
// --- PHẦN 5: KẾT THÚC ---
// Đóng kết nối database và hiển thị footer
$conn->close();
include("footer.php"); 
?> 