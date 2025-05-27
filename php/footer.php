<!-- Footer Placeholder -->
<footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-white">SUDES<span class="text-danger">PHONE</span></h2>
                    <p class="mt-3">SudesPhone - Hệ thống bán lẻ thiết bị điện tử chính hãng hàng đầu Việt Nam với hơn 100 cửa hàng trên toàn quốc.</p>
                    <div class="social-links mt-3">
                        <a href="https://www.facebook.com/sudesphone"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/sudesphone"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/sudesphone"><i class="fab fa-youtube"></i></a>
                        <a href="https://https://www.tiktok.com/sudesphone"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-2 footer-links">
                    <h5>Thông tin</h5>
                    <ul>
                        <li><a href="gioithieu.php">Giới thiệu</a></li>
                        <li><a href="news.php">Tin tức</a></li>
                        <li><a href="discount.php">Khuyến mãi</a></li>
                        <li><a href="tuyendung.php">Tuyển dụng</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2 footer-links">
                    <h5>Chính sách</h5>
                    <ul>
                        <li><a href="chinhsachbaohanh.php">Chính sách bảo hành</a></li>
                        <li><a href="chinhsachdoitra.php">Chính sách đổi trả</a></li>
                        <li><a href="chinhsachgiaohang.php">Chính sách giao hàng</a></li>
                        <li><a href="chinhsachbaomat.php">Chính sách bảo mật</a></li>
                        <li><a href="dieukhoansudung.php">Điều khoản sử dụng</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 footer-links">
                    <h5>Liên hệ</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Đống Đa, Quy Nhơn, Bình Định</li>
                        <li><i class="fas fa-phone-alt me-2"></i> Hotline: 1900 6750</li>
                        <li><i class="fas fa-envelope me-2"></i> Email: support@sudesphone.com</li>
                    </ul>
                    <div class="mt-3">
                        <h5>Phương thức thanh toán</h5>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            <img src="https://cdn-icons-png.flaticon.com/64/196/196578.png" alt="Visa" height="30">
                            <img src="https://cdn-icons-png.flaticon.com/64/196/196561.png" alt="Mastercard" height="30">
                            <img src="https://cdn-icons-png.flaticon.com/64/217/217445.png" alt="PayPal" height="30">
                            <img src="https://cdn-icons-png.flaticon.com/64/5968/5968279.png" alt="MoMo" height="30">
                            <img src="https://cdn-icons-png.flaticon.com/64/4365/4365217.png" alt="COD" height="30">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 SudesPhone. Tất cả các quyền được bảo lưu.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="main.js"></script>
    
    <!-- Initialize dropdowns -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure all dropdowns work properly
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
            
            // Fix any z-index issues
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.style.zIndex = "1050";
            });
        });
    </script>
</body>
</html>