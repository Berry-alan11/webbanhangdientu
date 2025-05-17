<?php
    include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    // Truy vấn lấy 2-3 sản phẩm từ mỗi danh mục chính
    $sql = "(SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Tablet' LIMIT 2)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Smartwatch' LIMIT 3)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Laptop' LIMIT 2)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Phone' LIMIT 1)
            UNION ALL
            (SELECT product_id, product_name, product_price, product_image, product_category FROM products WHERE product_category = 'Headphone' LIMIT 4)";
    $result = $conn->query($sql);
    
    // Mảng các mức giảm giá khác nhau
    $discounts = [10, 15, 20, 30, 35, 40];
?>
<div class="container"><h2>Flash Sale</h2>
    <div class="row">
        <?php
        $isFirst = true; // Biến để đánh dấu sản phẩm đầu tiên
        
        while ($product = $result->fetch_assoc()) {
            // Chỉ sản phẩm đầu tiên có giảm giá 25%
            if ($isFirst) {
                $discount = 25;
                $isFirst = false;
            } else {
                // Chọn ngẫu nhiên một mức giảm giá từ mảng
                $discount = $discounts[array_rand($discounts)];
            }
            
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100" style="position: relative;">
                    <div class="badge bg-danger position-absolute top-0 end-0 m-2">-' . $discount . '%</div>
                    <img src="' . $product["product_image"] . '" class="card-img-top" alt="' . $product["product_name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $product["product_name"] . '</h5>
                        <p><small>' . $product["product_category"] . '</small></p>';
                        
            // Tính giá sau khi giảm giá
            $discounted_price = $product["product_price"] * (100 - $discount) / 100;
            
            echo '<p class="card-text">
                    <span style="text-decoration: line-through; color: #999; font-size: 0.9em;">' . number_format($product["product_price"]) . '₫</span>
                    <span style="color: red; font-weight: bold; display: block;">' . number_format($discounted_price) . '₫</span>
                  </p>
                        <a href="cart.php?action=add&product_id=' . ($product["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>