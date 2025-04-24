<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SudesPhone - Cửa hàng đồ điện tử</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Topbar -->
        <div class="container-fluid bg-primary py-2 d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-white"><i class="fas fa-phone-alt me-2"></i>Hotline: 1900 6750</span>
                        <span class="text-white ms-4"><i class="fas fa-envelope me-2"></i>Email: support@sudesphone.com</span>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="login.php" class="text-white me-3"><i class="fas fa-user me-1"></i>Đăng nhập</a>
                        <a href="register.php" class="text-white"><i class="fas fa-user-plus me-1"></i>Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2 class="fw-bold text-primary">SUDES<span class="text-danger">PHONE</span></h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex mx-auto" style="width: 50%;">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm...">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-heart fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Categories Navigation -->
        <div class="container-fluid bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" href="#">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="phone.php">Điện thoại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="laptop.php">Laptop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tablet.php">Máy tính bảng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="smartwatch.php">Đồng hồ thông minh</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="headphone.php">Tai nghe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="accessorie.php">Phụ kiện</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Khuyến mãi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>