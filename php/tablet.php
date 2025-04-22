<?php include("header.php"); ?>

<div class="container">
    <h2 style="margin-top: 20px;">MÁY TÍNH BẢNG</h2>
    <div class="row">
        <?php
        $tablets = [
            [
                "name" => "iPad Pro M4 11 inch",
                "price" => 27890000,
                "image" => "../img/tablet/iPad_Pro_M4_11_inch.jpg"
            ],
            [
                "name" => "iPad Pro 11 2021 M1",
                "price" => 17990000,
                "image" => "../img/tablet/iPad_Pro_11_2021_M1.jpg"
            ],
            [
                "name" => "iPad A16 Wifi 128GB 2025",
                "price" => 9690000,
                "image" => "../img/tablet/iPad_A16_Wifi_128GB_2025.jpg"
            ],
            [
                "name" => "Máy tính bảng Teclast P30 4GB 64GB",
                "price" => 1990000,
                "image" => "../img/tablet/Máy tính bảng Teclast P30 4GB 64GB.jpg"
            ],
            [
                "name" => "Xiaomi Pad 7 Pro 8GB 256GB",
                "price" => 12990000,
                "image" => "../img/tablet/Xiaomi Pad 7 Pro 8GB 256GB.jpg"
            ],
            [
                "name" => "iPad mini 7 2024 Wifi 128GB",
                "price" => 13890000,
                "image" => "../img/tablet/iPad mini 7 2024 Wifi 128GB.jpg"
            ],
            [
                "name" => "Huawei MatePad Pro (12GB 512GB)",
                "price" => 20990000,
                "image" => "../img/tablet/Huawei MatePad Pro (12GB 512GB).jpg"
            ],
            [
                "name" => "iPad Air 11 inch M3 Wifi 128GB 2025",
                "price" => 16690000,
                "image" => "../img/tablet/iPad Air 11 inch M3 Wifi 128GB 2025.jpg"
            ],
        ];
        
        foreach ($tablets as $tablet) {
            echo '<div class="col-md-3" style="margin-bottom: 30px;">
                <div class="card h-100">
                    <img src="' . $tablet["image"] . '" class="card-img-top" alt="' . $tablet["name"] . '" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">' . $tablet["name"] . '</h5>
                        <p class="card-text" style="color: red; font-weight: bold;">' . number_format($tablet["price"]) . '₫</p>
                        <a href="cart.php?action=add&name=' . urlencode($tablet["name"]) . '&price=' . $tablet["price"] . '" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>


<?php include("footer.php"); ?>