<!-- php include 'header.php'; ?>

php 
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
    php if ($result && $result->num_rows > 0): ?>
    <div class="container">
        <h2 class="mb-4">Sản phẩm đang khuyến mãi</h2>
        <div class="row">
            php while ($row = $result->fetch_assoc()): 
                $discounted_price = $row['product_price'] * (1 - $row['discount_percent'] / 100);
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="php echo htmlspecialchars($row['product_image']); ?>" class="card-img-top" alt="<?php echo $row['product_name']; ?>" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title">php echo $row['product_name']; ?></h5>
                            <p class="card-text">
                                <span style="text-decoration: line-through; color: #888;"><?php echo number_format($row['product_price'], 0); ?>₫</span><br>
                                <span style="color: red; font-weight: bold;">php echo number_format($discounted_price, 0); ?>₫</span><br>
                                <small class="text-muted">php echo $row['promotion_name']; ?> (-<?php echo $row['discount_percent']; ?>%)</small>
                            </p>
                            <a href="cart.php?action=add&product_id=php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            php endwhile; ?>
        </div>
    </div>
    php else: ?>
        <div class="container"><p>Hiện không có sản phẩm nào đang được khuyến mãi.</p></div>
    php endif; ?>
</body>
</html>

php $conn->close(); ?>

php include 'footer.php';  -->

<?php
include "header2.php";
include "database.php";

// Thời gian kết thúc Flash Sale (ví dụ)
$flashSaleEnd = strtotime('2024-07-01 20:00:00');
$now = time();

if ($now < $flashSaleEnd) {
    // Nếu chưa đến giờ, chuyển hướng hoặc thông báo
    echo "<div style='text-align:center; margin:40px 0; font-size:20px; color:#e53935;'>Trang khuyến mãi sẽ mở khi Flash Sale kết thúc!</div>";
    include "footer2.php";
    exit();
}

// Truy vấn sản phẩm giảm giá (giả sử có cột 'discount_price' trong bảng products)
$sql = "SELECT product_id, product_name, product_price, product_discount, product_image FROM products WHERE
product_discount > 0  
ORDER BY product_discount DESC";
$result = $conn->query($sql);
?>

<style>
    .promotion-container {
        margin-top: 24px;
        margin-bottom: 24px;
    }
    .promotion-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 18px;
        color: #222;
    }
    .promotion-row {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }
    .promotion-col {
        width: 100%;
        max-width: 270px;
        margin-bottom: 30px;
        flex: 1 1 22%;
    }
    .promotion-card {
        border: 1px solid #eee;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: box-shadow 0.2s;
    }
    .promotion-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
    }
    .promotion-img {
        width: 100%;
        height: 250px;
        object-fit: contain;
        border-radius: 8px 8px 0 0;
        background: #fafafa;
    }
    .promotion-card-body {
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }
    .promotion-card-title {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 6px;
        color: #222;
    }
    .promotion-card-price {
        color: #d32f2f;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 10px;
    }
    .promotion-add-cart {
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 8px 0;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 8px;
        transition: background 0.2s;
        width: 100%;
        text-decoration: none;
        text-align: center;
    }
    .promotion-add-cart:hover {
        background: #0d47a1;
    }
    .promotion-wishlist-btn {
        background: none;
        border: 1px solid #1976d2;
        color: #1976d2;
        border-radius: 4px;
        padding: 4px 10px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.2s, color 0.2s;
    }
    .promotion-wishlist-btn:hover {
        background: #1976d2;
        color: #fff;
    }
    @media (max-width: 900px) {
        .promotion-col { max-width: 48%; }
    }
    @media (max-width: 600px) {
        .promotion-row { flex-direction: column; }
        .promotion-col { max-width: 100%; }
    }
</style>

<div class="container">
    <div class="promotion-container">
        <h2 class="promotion-title">Sản phẩm khuyến mãi HOT</h2>
        <div class="promotion-row">
            <?php
            if ($result->num_rows == 0) {
                echo '<div class="promotion-col" style="width: 100%; text-align: center; padding: 20px;">Hiện chưa có sản phẩm khuyến mãi.</div>';
            } else {
                while ($product = $result->fetch_assoc()) {
                    $discountPrice = $product["product_price"] - ($product["product_price"] * $product["product_discount"] / 100);
                    echo '<div class="promotion-col">
                        <div class="promotion-card">
                            <img src="' . htmlspecialchars($product["product_image"]) . '" class="promotion-img" alt="' . htmlspecialchars($product["product_name"]) . '">
                            <div class="promotion-card-body">
                                <h5 class="promotion-card-title">' . htmlspecialchars($product["product_name"]) . '</h5>
                                <div class="promotion-card-price">' . number_format($discountPrice) . '₫</div>
                                <a href="add_to_cart.php?product_id=' . $product['product_id'] . '" class="promotion-add-cart">Thêm vào giỏ</a>
                                <button class="promotion-wishlist-btn add-to-wishlist" data-id="' . $product['product_id'] . '" action="yeuthich.php" method="get">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include "footer2.php"; ?>
