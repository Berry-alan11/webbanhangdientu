<?php
include("header.php");
include("dbconnect.php");

// Kiểm tra có từ khóa tìm kiếm hay không
if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $keyword = htmlspecialchars($keyword); // Tránh XSS
    
    // Truy vấn tìm kiếm sản phẩm
    $sql = "SELECT * FROM products WHERE product_name LIKE ? OR product_category LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $keyword . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Không có từ khóa, hiển thị tất cả sản phẩm
    header("Location: index.php");
    exit();
}
?>

<main class="container my-5">
    <h2 class="mb-4">Kết quả tìm kiếm cho: <?php echo htmlspecialchars($keyword); ?></h2>
    
    <?php if($result->num_rows > 0): ?>
        <p>Tìm thấy <?php echo $result->num_rows; ?> sản phẩm</p>
        
        <div class="row g-4">
            <?php while($product = $result->fetch_assoc()): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <?php if(isset($product['product_discount']) && $product['product_discount'] > 0): ?>
                            <span class="discount-badge">-<?php echo $product['product_discount']; ?>%</span>
                        <?php endif; ?>
                        
                        <img src="<?php echo $product['product_image']; ?>" 
                            class="card-img-top product-img" alt="<?php echo $product['product_name']; ?>">
                        
                        <div class="card-body">
                            <h5 class="card-title product-title"><?php echo $product['product_name']; ?></h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price me-2"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>₫</span>
                                <?php if(isset($product['product_discount']) && $product['product_discount'] > 0): 
                                    $old_price = $product['product_price'] * (100 / (100 - $product['product_discount']));
                                ?>
                                    <span class="product-price-old"><?php echo number_format($old_price, 0, ',', '.'); ?>₫</span>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" 
                                        data-id="<?php echo $product['product_id']; ?>" 
                                        data-name="<?php echo $product['product_name']; ?>" 
                                        data-price="<?php echo $product['product_price']; ?>">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" 
                                        data-id="<?php echo $product['product_id']; ?>">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <p>Không tìm thấy sản phẩm nào phù hợp với từ khóa "<?php echo htmlspecialchars($keyword); ?>"</p>
            <p>Gợi ý:</p>
            <ul>
                <li>Kiểm tra lỗi chính tả</li>
                <li>Sử dụng từ khóa khác</li>
                <li>Sử dụng từ khóa ngắn hơn</li>
                <li><a href="index.php" class="alert-link">Quay về trang chủ</a></li>
            </ul>
        </div>
    <?php endif; ?>
</main>

<?php 
$stmt->close();
$conn->close();
include("footer.php"); 
?> 