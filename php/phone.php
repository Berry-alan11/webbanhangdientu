<?php
    include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    //Truy vấn sản phẩm thuộc danh mục "Điện thoại"
    $sql = "SELECT product_id,product_name,product_price, product_image FROM products WHERE product_category = 'Phone'";
    $result = $conn->query($sql);
?>

<div class="container"><h2>Điện thoại</h2>
    <div class="row">
        <?php
        // Lặp qua từng sản phẩm trong kết quả truy vấn
        while ($phone = $result->fetch_assoc()) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100">
                    <img src="' . $phone["product_image"] . '" class="card-img-top" alt="' . $phone["product_name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $phone["product_name"] . '</h5>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($phone["product_price"]) . '₫</p>
                        <div class="d-flex justify-content-between">
                            <a href="cart.php?action=add&product_id=' . ($phone["product_id"]) . '" class="btn btn-primary">
                                <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                            </a>
                            <a href="wishlist.php?action=add&product_id=' . ($phone["product_id"]) . '" class="btn btn-outline-danger">
                                <i class="fas fa-heart"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>


<?php include("footer.php"); ?>