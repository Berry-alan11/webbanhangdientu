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
ORDER BY product_discount DESC
-- product_discount > 0 AND (product_price - (product_price *
-- product_discount/100)) > 0 ORDER BY discount_price ASC";
// Kết nối CSDL
// Thực hiện truy vấn
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
