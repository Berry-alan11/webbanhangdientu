<?php
    include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    //Truy vấn sản phẩm thuộc danh mục "Điện thoại"
    //include("search.php");
     $sql = "SELECT product_id,product_name,product_price, product_image, product_favorite FROM products WHERE product_category = 'Phone'";
     $result = $conn->query($sql);
?>

<div class="container phone-container">
    <h2 class="phone-title">Điện thoại</h2>
    <div class="row phone-row">
        <?php
        // Lặp qua từng sản phẩm trong kết quả truy vấn
        while ($products = $result->fetch_assoc()) {
            echo '<div class="col-md-3 phone-col">
                <div class="card phone-card">
                    <img src="' . htmlspecialchars($products["product_image"]) . '" class="card-img-top phone-img" alt="' . htmlspecialchars($products["product_name"]) . '">
                    <div class="card-body phone-card-body">
                        <h5 class="card-title phone-card-title">' . htmlspecialchars($products["product_name"]) . '</h5>
                        <p class="card-text phone-card-price">' . number_format($products["product_price"]) . '₫</p>
                        <a href="add_to_cart.php?product_id=' . $products['product_id'] . '" class="btn btn-primary phone-add-cart">Thêm vào giỏ</a>
                        <button class="btn btn-sm btn-outline-secondary add-to-wishlist phone-wishlist-btn" data-id="' . $products['product_id'] . '">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>


<?php include("footer.php"); ?>

<!-- <a href="product.php?action=add&product_id=' . ($products["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a> -->