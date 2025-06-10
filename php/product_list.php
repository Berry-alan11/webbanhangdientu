<!-- ?php

function render_product_list($products, $title = "Kết quả tìm kiếm") {
    echo '<div class="container"><h2>' . htmlspecialchars($title) . '</h2><div class="row">';
    if (empty($products)) {
        echo '<div class="col-12">Không tìm thấy sản phẩm nào.</div>';
    } else {
        foreach ($products as $product) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100">
                    <img src="' . htmlspecialchars($product["product_image"]) . '" class="card-img-top" alt="' . htmlspecialchars($product["product_name"]) . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($product["product_name"]) . '</h5>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($product["product_price"]) . '₫</p>
                        <a href="cart.php?action=add&product_id=' . intval($product["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
    }
    echo '</div></div>';
}
?> -->