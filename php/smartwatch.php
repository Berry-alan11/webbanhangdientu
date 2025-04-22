<?php
include("header.php");
?>

<div class="container">
    <h2 style="margin-top: 20px;">ĐỒNG HỒ THÔNG MINH</h2>
    <div class="row">

        <?php
        // Mảng demo sản phẩm đồng hồ thông minh
        $smartwatches = [
            [
                "name" => "Apple Watch Series 8",
                "price" => 9990000,
                "image" => "../img/smartwatch/apple_watch_series8.jpg"
            ],
            [
                "name" => "Samsung Galaxy Watch 5",
                "price" => 6490000,
                "image" => "../img/smartwatch/samsung_galaxy_watch5.jpg"
            ],
            [
                "name" => "Xiaomi Watch S1 Active",
                "price" => 4290000,
                "image" => "../img/smartwatch/xiaomi_watch_s1_active.jpg"
            ],
            [
                "name" => "Huawei Watch GT 4",
                "price" => 5890000,
                "image" => "../img/smartwatch/huawei_watch_gt4.jpg"
            ],
            [
                "name" => "Garmin Forerunner 255",
                "price" => 5890000,
                "image" => "../img/smartwatch/garmin_forerunner_255.jpg"
            ],
            [
                "name" => "Xiaomi Redmi Watch 4",
                "price" => 1890000,
                "image" => "../img/smartwatch/xiaomi_redmi_watch4.jpg"
            ],
            [
                "name" => "Apple Watch Series 9",
                "price" => 7490000,
                "image" => "../img/smartwatch/apple_watch_series9.jpg"
            ],
            [
                "name" => "Kieslect Pura",
                "price" => 1490000,
                "image" => "../img/smartwatch/Kieslect_Pura.jpg"
            ],
        ];

        foreach ($smartwatches as $watch) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100">
                    <img src="' . $watch["image"] . '" class="card-img-top" alt="' . $watch["name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $watch["name"] . '</h5>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($watch["price"]) . '₫</p>
                        <a href="cart.php?action=add&name=' . urlencode($watch["name"]) . '&price=' . $watch["price"] . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
        ?>

    </div>
</div>

<?php
include("footer.php");
?>
