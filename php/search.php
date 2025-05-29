<?php
include("header.php");
include("dbconnect.php");

// Lấy từ khóa tìm kiếm
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
// Nếu không có từ khóa tìm kiếm, chuyển hướng về trang chủ
if(empty($keyword)) {
    header("Location: index.php");
    exit();
}
// Truy vấn tìm kiếm sản phẩm
$sql = "SELECT * FROM products WHERE product_name LIKE ?";//Truy vấn tìm kiếm sản phẩm
$stmt = $conn->prepare($sql);// Chuẩn bị truy vấn
$searchTerm = "%" . $keyword . "%";// Từ khóa tìm kiếm
$stmt->bind_param("s", $searchTerm);// Thực thi truy vấn
$stmt->execute();// Lấy kết quả
$result = $stmt->get_result();// Lấy kết quả
?>

<main class="container my-5">
    <h2 class="mb-4">Kết quả tìm kiếm: "<?php echo htmlspecialchars($keyword); ?>"</h2>
    
    <?php if($result->num_rows > 0): ?>
        <div class="row g-4">
            <?php while($product = $result->fetch_assoc()): ?>
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
        <div class="alert alert-info">
            <p>Không tìm thấy sản phẩm. <a href="index.php">Quay về trang chủ</a></p>
        </div>
    <?php endif; ?>
</main>

<?php 
$stmt->close();
$conn->close();
include("footer.php"); 
?> 