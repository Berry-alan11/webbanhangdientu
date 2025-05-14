<?php
    include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    // Truy vấn lấy 2-3 sản phẩm từ mỗi danh mục chính
    $sql = "(SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Phone' LIMIT 3)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Laptop' LIMIT 3)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Tablet' LIMIT 3)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Smartwatch' LIMIT 3)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Headphone' LIMIT 4)";
    $result = $conn->query($sql);
?>


<div class="container"><h2>Sản phẩm mới</h2>
    <div class="row">
        <?php
        // Lặp qua từng sản phẩm trong kết quả truy vấn
        while ($product = $result->fetch_assoc()) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100" style="position: relative;">
                    <div class="badge bg-success position-absolute top-0 start-0 m-2">Mới</div>
                    <img src="' . $product["product_image"] . '" class="card-img-top" alt="' . $product["product_name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $product["product_name"] . '</h5>
                        <p><small>' . $product["product_category"] . '</small></p>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($product["product_price"]) . '₫</p>
                        <a href="cart.php?action=add&product_id=' . ($product["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>