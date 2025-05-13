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
                            
                            <button class="btn btn-primary">Mua ngay</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/banner/banner2.png" class="d-block w-100 banner-img" alt="Banner 2">
                        <div class="carousel-caption d-none d-md-block">
                            
                            <button class="btn btn-primary">Khám phá ngay</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/banner/banner3.png" class="d-block w-100 banner-img" alt="Banner 3">
                        <div class="carousel-caption d-none d-md-block">
                            
                            <button class="btn btn-primary">Xem thêm</button>
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
                    <div class="category-pill">
                        <img src="https://cdn-icons-png.flaticon.com/128/15/15874.png" alt="Điện thoại">
                        <p class="mb-0">Điện thoại</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="category-pill">
                        <img src="https://cdn-icons-png.flaticon.com/128/3474/3474360.png" alt="Laptop">
                        <p class="mb-0">Laptop</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="category-pill">
                    <!-- https://cdn-icons-png.flaticon.com/128/2946/2946198.png -->
                        <img src="/img/sanpham/tablet.png" alt="Tablet">
                        <p class="mb-0">Máy tính bảng</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="category-pill">
                    <!-- https://cdn-icons-png.flaticon.com/128/2935/2935235.png -->
                        <img src="/img/sanpham/smartwatch.png" alt="Smartwatch">
                        <p class="mb-0">Đồng hồ thông minh</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="category-pill">
                    <!-- https://cdn-icons-png.flaticon.com/128/3522/3522263.png -->
                        <img src="/img/sanpham/headphone-symbol.png" alt="Tai nghe">
                        <p class="mb-0">Tai nghe</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="category-pill">
                    <!-- https://cdn-icons-png.flaticon.com/128/2947/2947998.png -->
                        <img src="/img/sanpham/phukien.png" alt="Phụ kiện">
                        <p class="mb-0">Phụ kiện</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Flash Sale -->
        <section class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">FLASH SALE</h3>
                <a href="#" class="text-decoration-none">Xem thêm <i class="fas fa-chevron-right"></i></a>
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
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-sm btn-cart add-to-cart" data-id="1" data-name="iPhone 15 Pro Max" data-price="27990000">
                                    <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                                </button>
                                <button class="btn btn-sm btn-outline-secondary add-to-wishlist" data-id="1">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
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
                        <img src="/img/headphone/router_engraving__d1q0o3p8lk2u_large.jpg" 
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
                <a href="#" class="text-decoration-none">Xem thêm <i class="fas fa-chevron-right"></i></a>
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
                        <img src="/img/loa/loa-bluetooth-sony-ult-field-1_5__1.webp" 
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
        <section class="container mt-5">
            <h3 class="fw-bold mb-4">THƯƠNG HIỆU NỔI BẬT</h3>
            <div class="row g-4">
                <div class="col-4 col-md-2">
                    <div class="card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1024px-Apple_logo_black.svg.png" 
                            class="card-img-top p-4" alt="Apple">
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/1024px-Samsung_Logo.svg.png" 
                            class="card-img-top p-4" alt="Samsung">
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="card">
                    <!-- https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Xiaomi_logo.svg/1024px-Xiaomi_logo.svg.png -->
                        <img src="/img/logo/Xiaomi.jpg" 
                            class="card-img-top p-4" alt="Xiaomi">
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="card">
                    <!-- https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Oppo_logo.svg/1024px-Oppo_logo.svg.png -->
                        <img src="/img/logo/Oppo.jpg" 
                            class="card-img-top p-4" alt="Oppo">
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="card">
                    <!-- https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/MSI_logo.svg/1024px-MSI_logo.svg.png -->
                        <img src="/img/logo/msi-logo_b.png" 
                            class="card-img-top p-4" alt="MSI">
                    </div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="card">
                    <!-- https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Sony_logo.svg/1024px-Sony_logo.svg.png -->
                        <img src="/img/logo/Sony.jpg" 
                            class="card-img-top p-4" alt="Sony">
                    </div>
                </div>
            </div>
        </section>

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
                                    <a href="#" class="btn btn-primary">Xem ngay</a>
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
                                    <p>Nâng tầm trải nghiệm công nghệ của bạn</p>
                                    <a href="#" class="btn btn-primary">Khám phá</a>
                                </div>
                                <div class="col-4">
                                    <img src="/img/phukien/bang-ve-inphic-c5_5e444972868e40c2899264f0bf06cbb9_large.webp" 
                                     class="img-fluid" alt="Phụ kiện">
                                    <!-- <img src="https://images.unsplash.com/photo-1606135185526-c2255f814c55?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" 
                                        class="img-fluid" alt="Phụ kiện"> -->
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
   