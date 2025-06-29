<!--GỌI PHẦN HEADER CHUNG CỦA TRANG WEB-->
<?php include("header.php"); ?>
<!-- Main Content Section Placeholder -->
<main>
        <!-- Banner Carousel -->
        <section class="container-fluid p-0">
            <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/banner/banner1.png" class="d-block w-100 banner-img" alt="Banner 1">
                        <div class="carousel-caption d-none d-md-block">
                             <a href="phone.php" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/banner/banner2.png" class="d-block w-100 banner-img" alt="Banner 2">
                        <div class="carousel-caption d-none d-md-block">
                             <a href="phone.php" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/banner/banner3.png" class="d-block w-100 banner-img" alt="Banner 3">
                        <div class="carousel-caption d-none d-md-block">
                        <a href="phone.php" class="btn btn-primary">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- Category Pills -->
        
<section class="container mt-5">
    <div class="row g-4">
        <div class="col-6 col-md-3 col-lg-2">
            <a href="phone.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/dienthoai.webp" alt="Điện thoại">
                    <p class="mb-0">Điện thoại</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
            <a href="laptop.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/laptop.webp" alt="Laptop">
                    <p class="mb-0">Laptop</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
            <a href="tablet.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/maytinhbang.webp" alt="Tablet">
                    <p class="mb-0">Máy tính bảng</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
            <a href="smartwatch.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/dongho.webp" alt="Smartwatch">
                    <p class="mb-0">Đồng hồ smart</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
            <a href="headphone.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/tainghe.webp" alt="Tai nghe">
                    <p class="mb-0">Tai nghe</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
            <a href="accessorie.php" class="text-decoration-none">
                <div class="category-pill">
                    <img src="../img/danhmucnoibat/phukien.webp" alt="Phụ kiện">
                    <p class="mb-0">Phụ kiện</p>
                </div>
            </a>
        </div>
    </div>
</section>

        <!-- Flash Sale -->
        <section class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">FLASH SALE</h3>
                <a href="FlashSale.php" class="text-decoration-none">Xem thêm <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="row g-4">
                <!-- Product Card 1 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="discount-badge">-20%</span>
                        <img src="https://images.unsplash.com/photo-1589492477829-5e65395b66cc?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="iPhone 15">
                        <div class="card-body">
                            <h5 class="card-title product-title">iPhone 15 Pro Max 256GB</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price me-2">27.990.000₫</span>
                                <span class="product-price-old">34.990.000₫</span>
                            </div>

                            <!-- <form action="add_to_cart.php" method="post"> -->
                                <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="1" data-name="iPhone 15 Pro Max" data-price="27990000">
                                <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="1" action="yeuthich.php" method="get">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <!-- </form>  -->
                            
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="discount-badge">-15%</span>
                        <img src="https://images.unsplash.com/photo-1610945264803-c22b62d2a7b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title product-title">Samsung Galaxy S24 Ultra 5G</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price me-2">25.990.000₫</span>
                                <span class="product-price-old">30.990.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="2" data-name="Samsung Galaxy S24 Ultra" data-price="25990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="2">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="discount-badge">-25%</span>
                        <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="Laptop Gaming">
                        <div class="card-body">
                            <h5 class="card-title product-title">Laptop Gaming MSI Katana GF66</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price me-2">19.990.000₫</span>
                                <span class="product-price-old">26.590.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="3" data-name="Laptop Gaming MSI" data-price="19990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="3">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="discount-badge">-30%</span>
                        <!-- https://images.unsplash.com/photo-1542495392-7617d61c48b5?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80 -->
                        <img src="../img/headphone/router_engraving__d1q0o3p8lk2u_large.jpg" 
                            class="card-img-top product-img" alt="Tai nghe Apple AirPods">
                        <div class="card-body">
                            <h5 class="card-title product-title">Apple AirPods Pro 2</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price me-2">4.990.000₫</span>
                                <span class="product-price-old">7.190.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="4" data-name="Apple AirPods Pro" data-price="4990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="4">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- New Products -->
        <section class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">SẢN PHẨM MỚI</h3>
                <a href="productNew.php" class="text-decoration-none">Xem thêm <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="row g-4">
                <!-- Product Card 1 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Mới</span>
                        <img src="https://images.unsplash.com/photo-1600086827875-a63b01f1335c?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="Macbook Pro">
                        <div class="card-body">
                            <h5 class="card-title product-title">MacBook Pro 14 M3 Pro</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price">42.990.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="5" data-name="MacBook Pro M3" data-price="42990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="5">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Mới</span>
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="iPad Pro">
                        <div class="card-body">
                            <h5 class="card-title product-title">iPad Pro M4 12.9 inch</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price">29.990.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="6" data-name="iPad Pro M4" data-price="29990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="6">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Mới</span>
                        <img src="https://images.unsplash.com/photo-1617043786394-f977fa12eddf?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80" 
                            class="card-img-top product-img" alt="Apple Watch">
                        <div class="card-body">
                            <h5 class="card-title product-title">Apple Watch Ultra 2 (49mm)</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price">19.490.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="7" data-name="Apple Watch Ultra" data-price="19490000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="7">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Mới</span>
                        <!-- https://images.unsplash.com/photo-1628815113969-0487917fc601?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80 -->
                        <img src="../img/loa/loa-bluetooth-sony-ult-field-1_5__1.webp" 
                            class="card-img-top product-img" alt="Loa Sony">
                        <div class="card-body">
                            <h5 class="card-title product-title">Loa Bluetooth Sony SRS-XG300</h5>
                            <div class="d-flex align-items-center mb-2">
                                <span class="product-price">4.590.000₫</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="8" data-name="Loa Sony SRS-XG300" data-price="4590000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="8">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Brands -->
<section class="container mt-5 brands-section">
    <h3 class="fw-bold mb-4">THƯƠNG HIỆU NỔI BẬT</h3>
    <div class="row g-4">
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/Apple_logo_black.svg.png" alt="Apple">
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/Samsung_logo.svg.png" alt="Samsung">
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/Xiaomi.jpg" alt="Xiaomi">
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/Oppo.jpg" alt="Oppo">
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/msi-logo_b.png" alt="MSI">
            </div>
        </div>
        <div class="col-4 col-md-2">
            <div class="brand-logo-container">
                <img src="../img/logo/Sony.jpg" alt="Sony">
            </div>
        </div>
    </div>
</section>
<style>
    .brand-logo-container {
       border: 1px solid #e0e0e0;
        border-radius: 8px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.3s;
        margin-bottom: 15px;
        position: relative;
        
    }

    .brand-logo-container img {
        max-height: 70px;
        max-width: 80%;
    }

</style>

        <!-- Promotional Banner -->
        <section class="container mt-5">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-bold">LAPTOP GAMING</h4>
                                    <p>Hiệu năng mạnh mẽ, trải nghiệm chơi game tuyệt vời</p>
                                    <a href="laptop.php" class="btn btn-primary">Xem ngay</a>
                                </div>
                                <div class="col-4">
                                    <img src="https://images.unsplash.com/photo-1593642702909-dec73df255d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" 
                                        class="img-fluid" alt="Laptop Gaming">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="fw-bold">PHỤ KIỆN THÔNG MINH</h4>
                                    <p>Phụ kiện thông minh giúp tối ưu hiệu suất và nâng tầm phong cách sống</p>
                                    <a href="accessorie.php" class="btn btn-primary">Khám phá</a>
                                </div>
                                <div class="col-4">
                                    <img src="../img/phukien/bang-ve-inphic-c5_5e444972868e40c2899264f0bf06cbb9_large.webp" 
                                     class="img-fluid" alt="Phụ kiện">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<!-- GỌI PHẦN FOOTER CHUNG CỦA TRANG WEB-->
<?php include("footer.php"); ?>
   