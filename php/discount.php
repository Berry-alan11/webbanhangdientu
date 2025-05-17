<?php include 'header.php'; ?>

<?php 
    require 'database.php';
// Ngày hiện tại để lọc khuyến mãi còn hiệu lực
$today = date('Y-m-d');
// Truy vấn lấy sản phẩm trong khuyến mãi còn hiệu lực
$sql = "SELECT 
    p.product_id, 
    p.product_name, 
    p.product_price, 
    p.product_image, 
    pr.discount_percent,
    pr.promotion_name
FROM products p
JOIN promotion_product pp ON p.product_id = pp.product_id
JOIN promotions pr ON pp.promotion_id = pr.promotion_id
WHERE pr.start_date <= '$today' AND pr.end_date >= '$today'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm khuyến mãi</title>
    <style>
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px;
            width: 200px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }
        .price-old {
            text-decoration: line-through;
            color: #888;
        }
        .price-new {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php if ($result && $result->num_rows > 0): ?>
    <div class="container">
        <h2 class="mb-4">Sản phẩm đang khuyến mãi</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): 
                $discounted_price = $row['product_price'] * (1 - $row['discount_percent'] / 100);
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo htmlspecialchars($row['product_image']); ?>" class="card-img-top" alt="<?php echo $row['product_name']; ?>" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            <p class="card-text">
                                <span style="text-decoration: line-through; color: #888;"><?php echo number_format($row['product_price'], 0); ?>₫</span><br>
                                <span style="color: red; font-weight: bold;"><?php echo number_format($discounted_price, 0); ?>₫</span><br>
                                <small class="text-muted"><?php echo $row['promotion_name']; ?> (-<?php echo $row['discount_percent']; ?>%)</small>
                            </p>
                            <a href="cart.php?action=add&product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php else: ?>
        <div class="container"><p>Hiện không có sản phẩm nào đang được khuyến mãi.</p></div>
    <?php endif; ?>
</body>
</html>

<?php $conn->close(); ?>

<?php include 'footer.php'; ?>