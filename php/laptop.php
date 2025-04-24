<?php
    include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    //Truy vấn sản phẩm thuộc danh mục "Laptop"
    $sql = "SELECT product_id,product_name,product_price, product_image FROM products WHERE product_category = 'Laptop'";
    $result = $conn->query($sql);
?>

<div class="container"><h2>Laptop</h2>
    <div class="row">
        <?php
        // Lặp qua từng sản phẩm trong kết quả truy vấn
        while ($laptop = $result->fetch_assoc()) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100">
                    <img src="' . $laptop["product_image"] . '" class="card-img-top" alt="' . $laptop["product_name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $laptop["product_name"] . '</h5>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($laptop["product_price"]) . '₫</p>
                        <a href="cart.php?action=add&product_id=' . ($laptop["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>


<?php include("footer.php"); ?>