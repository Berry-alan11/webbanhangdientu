<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SudesPhone - Cửa hàng đồ điện tử</title>
    <link rel="stylesheet" type="text/css" href="../css/header2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="topbar-left">
                    <span><i class="fas fa-phone-alt"></i> Hotline: 1900 6750</span>
                    <span><i class="fas fa-envelope"></i> Email: support@sudesphone.com</span>
                </div>
                <div class="topbar-right">
                    <a href="login.php"><i class="fas fa-user"></i> Đăng nhập</a>
                    <a href="register.php"><i class="fas fa-user-plus"></i> Đăng ký</a>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="main-nav">
            <div class="container nav-flex">
                <a class="logo" href="index.php">
                    <span class="logo-main">SUDES</span><span class="logo-sub">PHONE</span>
                </a>
                <form class="search-form" action="search.php" method="get">
                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="nav-icons">
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="product.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </nav>

        <!-- Categories Navigation -->
        <div class="categories">
            <div class="container">
                <ul>
                    <li><a class="active" href="#">Trang chủ</a></li>
                    <li><a href="phone.php">Điện thoại</a></li>
                    <li><a href="laptop.php">Laptop</a></li>
                    <li><a href="tablet.php">Máy tính bảng</a></li>
                    <li><a href="smartwatch.php">Đồng hồ thông minh</a></li>
                    <li><a href="headphone.php">Tai nghe</a></li>
                    <li><a href="accessorie.php">Phụ kiện</a></li>
                    <li><a href="#">Khuyến mãi</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </header>
</body>
</html>