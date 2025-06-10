<?php include "header2.php"?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - Sudes Phone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" text="text/css" href="../css/payment.css">
    <!-- <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Header */
        .header {
            width: 100%;
            padding: 15px 0;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            font-family: 'Arial Black', sans-serif;
            letter-spacing: 1px;
        }

        /* Main Content */
        .checkout-section {
            flex: 3;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border-style: solid;
            border-width: 3px;
            border-color:#0277bd;
        }

        .order-summary {
            flex: 2;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            height: fit-content;
            border-style: solid;
            border-width: 3px;
            border-color:#0277bd;
        }

        /* Tabs */
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .tab {
            padding: 10px 15px;
            cursor: pointer;
            font-weight: 500;
            color: #666;
            position: relative;
        }

        .tab.active {
            color: #2196F3;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #2196F3;
        }

        .tab-icon {
            margin-right: 8px;
            color: #2196F3;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #2196F3;
            outline: none;
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18px" height="18px"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 15px center;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Section Titles */
        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        /* Payment Methods */
        .payment-methods {
            margin-top: 20px;
        }

        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .payment-method-radio {
            margin-right: 15px;
        }

        .payment-method-icon {
            margin-left: auto;
            color: #2196F3;
            font-size: 20px;
        }

        /* Order Summary */
        .order-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }

        .product-list {
            margin-bottom: 20px;
        }

        .product-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .product-image {
            width: 60px;
            height: 60px;
            border: 1px solid #eee;
            border-radius: 4px;
            margin-right: 15px;
            padding: 2px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .product-price {
            color: #f44336;
            font-weight: 500;
            font-size: 16px;
        }

        .product-quantity {
            background-color: #2196F3;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-right: 10px;
        }

        /* Summary Details */
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            color: #666;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .summary-total-amount {
            color: #f44336;
        }

        /* Coupon Code */
        .coupon-form {
            display: flex;
            margin: 20px 0;
        }

        .coupon-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
            font-size: 14px;
        }

        .coupon-button {
            padding: 0 20px;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-weight: 500;
            white-space: nowrap;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
        }

        .btn-primary {
            background-color: #2196F3;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1e88e5;
        }

        .btn-back {
            background-color: transparent;
            color: #2196F3;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .back-arrow {
            margin-right: 8px;
        }

        /* Checkout Actions */
        .checkout-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Phone Country Select */
        .phone-input {
            display: flex;
        }

        .country-select {
            width: 80px;
            padding: 12px 10px;
            border: 1px solid #ddd;
            border-right: none;
            border-radius: 4px 0 0 4px;
            background-color: #f9f9f9;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .country-flag {
            width: 24px;
            height: 16px;
            margin-right: 5px;
        }

        .phone-number {
            flex: 1;
            border-radius: 0 4px 4px 0;
        }

        /* Shipping Info Message */
        .shipping-info {
            background-color: #e1f5fe;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #0277bd;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .checkout-section, .order-summary {
                width: 100%;
            }

            .tabs {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 5px;
            }

            .checkout-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn-back {
                order: 2;
                justify-content: center;
            }

            .btn-primary {
                order: 1;
            }
        }
    </style> -->
</head>
<body>
    
    <!-- Header -->
    <!-- <div class="header">
        <a href="#" class="logo">Sudes Phone</a>
    </div> -->

    <!-- Main Container -->
    <div class="container">
        <!-- Checkout Section -->
        <div class="checkout-section">
            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active">
                    <!-- thẻ span dùng để bao bọc nội dung văn bản nhằm áp dụng CSS, JS -->
                     <!-- gồm các thuộc tính như id, class, style, title, data-*
                      ngoài ra còn có các sự kiện như onclick, onmouserover để thực
                      hiện với JS -->
                    <span class="tab-content" title="Khách hàng nhập thông tin vào đây">Thông tin nhận hàng</span>
                </div>
                <div class="tab">
                    <i class="tab-icon fas fa-user-circle"></i>
                    <a href="login.php"><span class="tab-content" >Đăng nhập</span></a>
                </div>
                <div class="tab">
                    <span class="tab-content">Vận chuyển</span>
                </div>
            </div>

            <!-- Shipping Info Message -->
            <div class="shipping-info">
                Vui lòng nhập thông tin giao hàng
            </div>

            <!-- Shipping Form -->
            <form id="shipping-form"><!-- Shipping Form tạo một biểu mẫu-->
                <!-- form thường chứa thẻ input, select, textarea, button -->
                 <!--  -->
                <div class="form-group">
                    <!-- tạo một thẻ input email có type là email giúp kiểm tra định dạng nhập vào
                     có phải là email, một class mang tên form-control để truy xuất bằng js hoặc css
                     cho dễ, id là email và đây là tên định danh cho form shipping-form
                     placeholder dùng cho việc hiển thị chữ mờ giúp gợi ý cho người dùng biết được
                     cần nhập gì vào đó, thuộc tính require giúp check việc phải nhập vào thì mới
                     cho gửi được form, đồng nghĩa trước khi nhập form thì phải nhập trường này vào -->
                    <input type="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <!-- tạo một thẻ div có class là form-group, form-group là kiểu đặt tên trong
                 Bootstrap giúp form được đồng bộ và đẹp -->
                <div class="form-group">
                    <!-- type bằng text thì dữ liệu nhập vào là văn bản -->
                    <input type="text" class="form-control" id="fullname" placeholder="Họ và tên" required>
                </div>
                <div class="form-group">
                    <div class="phone-input">
                        <div class="country-select">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2000px-Flag_of_Vietnam.svg.png" alt="VN" class="country-flag">
                            <!-- <span>+84</span> -->
                            
                    <select class="form-select" id="province">
                        <option value="" selected disabled>Tỉnh thành --</option>
                        <option value="hn">+84</option>
                        <option value="hcm">+86</option>
                        <option value="dn">Đà Nẵng</option>
                        <option value="dn"><span>+84</span></option>
                    </select>
                        </div>
                        <!-- type bằng tel có nghĩa dữ liệu nhập vào phải là số điện thoại -->
                        <input type="tel" class="form-control phone-number" id="phone" placeholder="Số điện thoại (tùy chọn)">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ (tùy chọn)">
                </div>
                <div class="form-group">
                    <select class="form-select" id="province">
                        <option value="" selected disabled>Tỉnh thành --</option>
                            <option value="angiang">An Giang</option>
                            <option value="bariavungtau">Bà Rịa - Vũng Tàu</option>
                            <option value="baclieu">Bạc Liêu</option>
                            <option value="backan">Bắc Kạn</option>
                            <option value="bacgiang">Bắc Giang</option>
                            <option value="bacninh">Bắc Ninh</option>
                            <option value="bentre">Bến Tre</option>
                            <option value="binhduong">Bình Dương</option>
                            <option value="binhdinh">Bình Định</option>
                            <option value="binhphuoc">Bình Phước</option>
                            <option value="binhthuan">Bình Thuận</option>
                            <option value="camau">Cà Mau</option>
                            <option value="caobang">Cao Bằng</option>
                            <option value="cantho">Cần Thơ</option>
                            <option value="danang">Đà Nẵng</option>
                            <option value="daklak">Đắk Lắk</option>
                            <option value="daknong">Đắk Nông</option>
                            <option value="dienbien">Điện Biên</option>
                            <option value="dongnai">Đồng Nai</option>
                            <option value="dongthap">Đồng Tháp</option>
                            <option value="gialai">Gia Lai</option>
                            <option value="hagiang">Hà Giang</option>
                            <option value="hanam">Hà Nam</option>
                            <option value="hanoi">Hà Nội</option>
                            <option value="hatinh">Hà Tĩnh</option>
                            <option value="haiduong">Hải Dương</option>
                            <option value="haiphong">Hải Phòng</option>
                            <option value="haugiang">Hậu Giang</option>
                            <option value="hoabinh">Hòa Bình</option>
                            <option value="hochiminh">TP. Hồ Chí Minh</option>
                            <option value="hungyen">Hưng Yên</option>
                            <option value="khanhhoa">Khánh Hòa</option>
                            <option value="kiengiang">Kiên Giang</option>
                            <option value="kontum">Kon Tum</option>
                            <option value="laichau">Lai Châu</option>
                            <option value="langson">Lạng Sơn</option>
                            <option value="laocai">Lào Cai</option>
                            <option value="lamdong">Lâm Đồng</option>
                            <option value="longan">Long An</option>
                            <option value="namdinh">Nam Định</option>
                            <option value="nghean">Nghệ An</option>
                            <option value="ninhbinh">Ninh Bình</option>
                            <option value="ninhthuan">Ninh Thuận</option>
                            <option value="phutho">Phú Thọ</option>
                            <option value="phuyen">Phú Yên</option>
                            <option value="quangbinh">Quảng Bình</option>
                            <option value="quangnam">Quảng Nam</option>
                            <option value="quangngai">Quảng Ngãi</option>
                            <option value="quangninh">Quảng Ninh</option>
                            <option value="quangtri">Quảng Trị</option>
                            <option value="soctrang">Sóc Trăng</option>
                            <option value="sonla">Sơn La</option>
                            <option value="tayninh">Tây Ninh</option>
                            <option value="thaibinh">Thái Bình</option>
                            <option value="thainguyen">Thái Nguyên</option>
                            <option value="thanhhoa">Thanh Hóa</option>
                            <option value="thuathienhue">Thừa Thiên Huế</option>
                            <option value="tiengiang">Tiền Giang</option>
                            <option value="travinh">Trà Vinh</option>
                            <option value="tuyenquang">Tuyên Quang</option>
                            <option value="vinhlong">Vĩnh Long</option>
                            <option value="vinhphuc">Vĩnh Phúc</option>
                            <option value="yenbai">Yên Bái</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-select" id="district">
                        <!-- value="" selected disabled là lựa chọn mặc định không cho chọn -->
                        <option value="" selected disabled>Quận huyện (tùy chọn)</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-select" id="ward">
                        <option value="" selected disabled>Phường xã (tùy chọn)</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- thẻ textarea này dùng để nhập nhiều dòng, cho phép người dùng chỉnh sửa văn bản dài
                     vd: ghi chú, bình luận, mô tả khác với <input type="text" chỉ được nhập 1 dòng, textarea
                     cho phép nhập nhiều dòng  -->
                    <textarea class="form-control" id="notes" placeholder="Ghi chú (tùy chọn)"></textarea>
                </div>
            </form>

            <!-- Payment Section -->
            <div class="payment-section">
                <h3 class="section-title">Thanh toán</h3>
                <div class="payment-methods">
                    <div class="payment-method">

                        <input type="radio" name="payment" id="cod" class="payment-method-radio" checked>
                        <!-- thẻ label dùng để tạo nhãn cho các trường nhập dữ liệu -->
                        <label for="cod">Thanh toán khi giao hàng (COD)</label>
                        <div class="payment-method-icon">
                            <!-- có tác dụng hiển thị chữ nghiêng hoăc biểu tượng icon từ thư viện Font Awesome -->
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h3 class="order-title">
                <span>Đơn hàng</span>
                <span>(1 sản phẩm)</span>
            </h3>

            <!-- Product List -->
            <div class="product-list">
                <div class="product-item">
                    <div class="product-image">
                        <img src="https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MMX62?wid=2000&hei=2000&fmt=jpeg&qlt=95&.v=1580420175242" alt="Apple Earpods">
                    </div>
                    <div class="product-info">
                        <div class="product-quantity">1</div>
                        <div class="product-name">Tai nghe Apple Earpods Lightning Chính Hãng MMTN2ZA</div>
                        <div class="product-price">600.000₫</div>
                    </div>
                </div>
            </div>

            <!-- Coupon Form -->
            <div class="coupon-form">
                <input type="text" class="coupon-input" placeholder="Nhập mã giảm giá">
                <!-- dùng để tạo nút và dùng cho việc thực hiện hành động có thể đặt nội
                 dung là text hoặc icon, có nhiều loại type button, submit, reset 
                 dùng để thực hiện hành động chuyển tới trang web khác bằng thuộc tính href 
                 của thẻ a-->
                <!-- <button type="button" class="coupon-button"><a href="contact.php">Áp dụng</a></button> -->
                 <button type="button" class="coupon-button">Áp dụng</button>
                 
            </div>

            <!-- Order Total -->
            <div class="summary-row">
                <span>Tạm tính</span>
                <span>600.000₫</span>
            </div>
            <div class="summary-row">
                <span>Phí vận chuyển</span>
                <span>-</span>
            </div>
            <div class="summary-total">
                <span>Tổng cộng</span>
                <span class="summary-total-amount">600.000₫</span>
            </div>

            <!-- Checkout Button -->
            <button type="button" class="btn btn-primary btn-block" id="checkout-btn">ĐẶT HÀNG</button>
            <!-- dùng để tạo liên kết hyperlink giữa các trang web tới vị trí nào đó trên trang
             khi nhấp thì sẽ chuyển đến địa chỉ được chỉ định trong thuộc tính href -->
            <a href="product.php" class="btn-back">
                <i class="fas fa-arrow-left back-arrow"></i>
                <!-- thẻ nội tuyến (inline) dùng nhóm hoặc bao bọc một phần nhỏ
                 nội dung trong văn bản nhằm áp dụng thay đổi css cho phần đó mà không làm thay đổi
                 dữ liệu -->
                <span>Quay về giỏ hàng</span>
            </a>
        </div>
    </div>

    <script>
        // Lấy các phần tử HTML cần thao tác
        const provinceSelect = document.getElementById('province'); // Select tỉnh/thành phố
        const districtSelect = document.getElementById('district'); // Select quận/huyện
        const wardSelect = document.getElementById('ward');         // Select phường/xã
        const checkoutBtn = document.getElementById('checkout-btn'); // Nút đặt hàng
        const shippingForm = document.getElementById('shipping-form'); // Form thông tin giao hàng
        const tabs = document.querySelectorAll('.tab'); // Các tab trên giao diện

        // Khai báo dữ liệu quận/huyện cho từng tỉnh/thành phố
        const districtsByProvince = {
        'angiang': ['Thành phố Long Xuyên', 'Thành phố Châu Đốc', 'Huyện An Phú', 'Huyện Châu Phú', 'Huyện Châu Thành', 'Huyện Chợ Mới', 'Huyện Phú Tân', 'Huyện Thoại Sơn', 'Huyện Tịnh Biên', 'Huyện Tri Tôn'],
        'bariavungtau': ['Thành phố Vũng Tàu', 'Thành phố Bà Rịa', 'Thị xã Phú Mỹ', 'Huyện Châu Đức', 'Huyện Côn Đảo', 'Huyện Đất Đỏ', 'Huyện Long Điền', 'Huyện Xuyên Mộc'],
        'baclieu': ['Thành phố Bạc Liêu', 'Thị xã Giá Rai', 'Huyện Đông Hải', 'Huyện Hòa Bình', 'Huyện Hồng Dân', 'Huyện Phước Long', 'Huyện Vĩnh Lợi'],
        'backan': ['Thành phố Bắc Kạn', 'Huyện Ba Bể', 'Huyện Bạch Thông', 'Huyện Chợ Đồn', 'Huyện Chợ Mới', 'Huyện Na Rì', 'Huyện Ngân Sơn', 'Huyện Pác Nặm'],
        'bacgiang': ['Thành phố Bắc Giang', 'Huyện Hiệp Hòa', 'Huyện Lạng Giang', 'Huyện Lục Nam', 'Huyện Lục Ngạn', 'Huyện Sơn Động', 'Huyện Tân Yên', 'Huyện Việt Yên', 'Huyện Yên Dũng', 'Huyện Yên Thế'],
        'bacninh': ['Thành phố Bắc Ninh', 'Thị xã Từ Sơn', 'Huyện Gia Bình', 'Huyện Lương Tài', 'Huyện Quế Võ', 'Huyện Thuận Thành', 'Huyện Tiên Du', 'Huyện Yên Phong'],
        'bentre': ['Thành phố Bến Tre', 'Huyện Ba Tri', 'Huyện Bình Đại', 'Huyện Châu Thành', 'Huyện Chợ Lách', 'Huyện Giồng Trôm', 'Huyện Mỏ Cày Bắc', 'Huyện Mỏ Cày Nam', 'Huyện Thạnh Phú'],
        'binhduong': ['Thành phố Thủ Dầu Một', 'Thành phố Dĩ An', 'Thành phố Thuận An', 'Thị xã Bến Cát', 'Thị xã Tân Uyên', 'Huyện Bàu Bàng', 'Huyện Bắc Tân Uyên', 'Huyện Dầu Tiếng', 'Huyện Phú Giáo'],
        'binhdinh': ['Thành phố Quy Nhơn', 'Thị xã An Nhơn', 'Thị xã Hoài Nhơn', 'Huyện An Lão', 'Huyện Hoài Ân', 'Huyện Phù Cát', 'Huyện Phù Mỹ', 'Huyện Tây Sơn', 'Huyện Tuy Phước', 'Huyện Vân Canh', 'Huyện Vĩnh Thạnh'],
        'binhphuoc': ['Thành phố Đồng Xoài', 'Thị xã Bình Long', 'Thị xã Phước Long', 'Thị xã Chơn Thành', 'Huyện Bù Đăng', 'Huyện Bù Đốp', 'Huyện Bù Gia Mập', 'Huyện Đồng Phú', 'Huyện Hớn Quản', 'Huyện Lộc Ninh', 'Huyện Phú Riềng'],
        'binhthuan': ['Thành phố Phan Thiết', 'Thị xã La Gi', 'Huyện Bắc Bình', 'Huyện Đức Linh', 'Huyện Hàm Tân', 'Huyện Hàm Thuận Bắc', 'Huyện Hàm Thuận Nam', 'Huyện Phú Quý', 'Huyện Tánh Linh', 'Huyện Tuy Phong'],
        'camau': ['Thành phố Cà Mau', 'Huyện Cái Nước', 'Huyện Đầm Dơi', 'Huyện Năm Căn', 'Huyện Ngọc Hiển', 'Huyện Phú Tân', 'Huyện Thới Bình', 'Huyện Trần Văn Thời', 'Huyện U Minh'],
        'caobang': ['Thành phố Cao Bằng', 'Huyện Bảo Lạc', 'Huyện Bảo Lâm', 'Huyện Hạ Lang', 'Huyện Hà Quảng', 'Huyện Hòa An', 'Huyện Nguyên Bình', 'Huyện Thạch An', 'Huyện Trùng Khánh', 'Huyện Quảng Hòa', 'Huyện Phục Hòa', 'Huyện Thạch An', 'Huyện Trà Lĩnh'],
        'cantho': ['Quận Ninh Kiều', 'Quận Bình Thủy', 'Quận Cái Răng', 'Quận Ô Môn', 'Quận Thốt Nốt', 'Huyện Cờ Đỏ', 'Huyện Phong Điền', 'Huyện Thới Lai', 'Huyện Vĩnh Thạnh'],
        'danang': ['Quận Hải Châu', 'Quận Thanh Khê', 'Quận Sơn Trà', 'Quận Ngũ Hành Sơn', 'Quận Liên Chiểu', 'Quận Cẩm Lệ', 'Huyện Hòa Vang', 'Huyện Hoàng Sa'],
        'daklak': ['Thành phố Buôn Ma Thuột', 'Thị xã Buôn Hồ', 'Huyện Buôn Đôn', 'Huyện Cư Kuin', 'Huyện Cư M\'gar', 'Huyện Ea H\'leo', 'Huyện Ea Kar', 'Huyện Ea Súp', 'Huyện Krông Ana', 'Huyện Krông Bông', 'Huyện Krông Búk', 'Huyện Krông Năng', 'Huyện Krông Pắc', 'Huyện Lắk', 'Huyện M\'Đrắk'],
        'daknong': ['Thành phố Gia Nghĩa', 'Huyện Cư Jút', 'Huyện Đắk Glong', 'Huyện Đắk Mil', 'Huyện Đắk R\'Lấp', 'Huyện Đắk Song', 'Huyện Krông Nô', 'Huyện Tuy Đức'],
        'dienbien': ['Thành phố Điện Biên Phủ', 'Thị xã Mường Lay', 'Huyện Điện Biên', 'Huyện Điện Biên Đông', 'Huyện Mường Ảng', 'Huyện Mường Chà', 'Huyện Mường Nhé', 'Huyện Nậm Pồ', 'Huyện Tủa Chùa', 'Huyện Tuần Giáo'],
        'dongnai': ['Thành phố Biên Hòa', 'Thành phố Long Khánh', 'Huyện Cẩm Mỹ', 'Huyện Định Quán', 'Huyện Long Thành', 'Huyện Nhơn Trạch', 'Huyện Tân Phú', 'Huyện Thống Nhất', 'Huyện Trảng Bom', 'Huyện Vĩnh Cửu', 'Huyện Xuân Lộc'],
        'dongthap': ['Thành phố Cao Lãnh', 'Thành phố Sa Đéc', 'Thị xã Hồng Ngự', 'Huyện Cao Lãnh', 'Huyện Châu Thành', 'Huyện Hồng Ngự', 'Huyện Lai Vung', 'Huyện Lấp Vò', 'Huyện Tam Nông', 'Huyện Tân Hồng', 'Huyện Thanh Bình', 'Huyện Tháp Mười'],
        'gialai': ['Thành phố Pleiku', 'Thị xã An Khê', 'Thị xã Ayun Pa', 'Huyện Chư Păh', 'Huyện Chư Prông', 'Huyện Chư Pưh', 'Huyện Chư Sê', 'Huyện Đăk Đoa', 'Huyện Đăk Pơ', 'Huyện Đức Cơ', 'Huyện Ia Grai', 'Huyện Ia Pa', 'Huyện Kông Chro', 'Huyện Krông Pa', 'Huyện Mang Yang', 'Huyện Phú Thiện', 'Huyện Kbang'],
        'hagiang': ['Thành phố Hà Giang', 'Huyện Bắc Mê', 'Huyện Bắc Quang', 'Huyện Đồng Văn', 'Huyện Hoàng Su Phì', 'Huyện Mèo Vạc', 'Huyện Quản Bạ', 'Huyện Quang Bình', 'Huyện Vị Xuyên', 'Huyện Xín Mần', 'Huyện Yên Minh'],
        'hanam': ['Thành phố Phủ Lý', 'Thị xã Duy Tiên', 'Huyện Bình Lục', 'Huyện Kim Bảng', 'Huyện Lý Nhân', 'Huyện Thanh Liêm'],
        'hanoi': ['Quận Ba Đình', 'Quận Hoàn Kiếm', 'Quận Hai Bà Trưng', 'Quận Đống Đa', 'Quận Tây Hồ', 'Quận Cầu Giấy', 'Quận Thanh Xuân', 'Quận Hoàng Mai', 'Quận Long Biên', 'Quận Bắc Từ Liêm', 'Quận Nam Từ Liêm', 'Thị xã Sơn Tây', 'Huyện Ba Vì', 'Huyện Chương Mỹ', 'Huyện Đan Phượng', 'Huyện Đông Anh', 'Huyện Gia Lâm', 'Huyện Hoài Đức', 'Huyện Mê Linh', 'Huyện Mỹ Đức', 'Huyện Phú Xuyên', 'Huyện Phúc Thọ', 'Huyện Quốc Oai', 'Huyện Sóc Sơn', 'Huyện Thạch Thất', 'Huyện Thanh Oai', 'Huyện Thanh Trì', 'Huyện Thường Tín', 'Huyện Ứng Hòa'],
        'hatinh': ['Thành phố Hà Tĩnh', 'Thị xã Hồng Lĩnh', 'Thị xã Kỳ Anh', 'Huyện Cẩm Xuyên', 'Huyện Can Lộc', 'Huyện Đức Thọ', 'Huyện Hương Khê', 'Huyện Hương Sơn', 'Huyện Lộc Hà', 'Huyện Nghi Xuân', 'Huyện Thạch Hà', 'Huyện Vũ Quang'],
        'haiduong': ['Thành phố Hải Dương', 'Thành phố Chí Linh', 'Thị xã Kinh Môn', 'Huyện Bình Giang', 'Huyện Cẩm Giàng', 'Huyện Gia Lộc', 'Huyện Kim Thành', 'Huyện Nam Sách', 'Huyện Ninh Giang', 'Huyện Thanh Hà', 'Huyện Thanh Miện', 'Huyện Tứ Kỳ'],
        'haiphong': ['Quận Hồng Bàng', 'Quận Lê Chân', 'Quận Ngô Quyền', 'Quận Kiến An', 'Quận Hải An', 'Quận Đồ Sơn', 'Quận Dương Kinh', 'Thị xã Kiến Thụy', 'Huyện An Dương', 'Huyện An Lão', 'Huyện Bạch Long Vĩ', 'Huyện Cát Hải', 'Huyện Tiên Lãng', 'Huyện Vĩnh Bảo', 'Huyện Thủy Nguyên'],
        'haugiang': ['Thành phố Vị Thanh', 'Thành phố Ngã Bảy', 'Thị xã Long Mỹ', 'Huyện Châu Thành', 'Huyện Châu Thành A', 'Huyện Phụng Hiệp', 'Huyện Vị Thủy'],
        'hoabinh': ['Thành phố Hòa Bình', 'Huyện Cao Phong', 'Huyện Đà Bắc', 'Huyện Kim Bôi', 'Huyện Lạc Sơn', 'Huyện Lạc Thủy', 'Huyện Lương Sơn', 'Huyện Mai Châu', 'Huyện Tân Lạc', 'Huyện Yên Thủy', 'Huyện Kỳ Sơn'],
        'hochiminh': ['Quận 1', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 6', 'Quận 7', 'Quận 8', 'Quận 10', 'Quận 11', 'Quận 12', 'Quận Bình Thạnh', 'Quận Gò Vấp', 'Quận Phú Nhuận', 'Quận Tân Bình', 'Quận Tân Phú', 'Quận Thủ Đức', 'Quận Bình Tân', 'Huyện Bình Chánh', 'Huyện Cần Giờ', 'Huyện Củ Chi', 'Huyện Hóc Môn', 'Huyện Nhà Bè'],
        'hungyen': ['Thành phố Hưng Yên', 'Thị xã Mỹ Hào', 'Huyện Ân Thi', 'Huyện Khoái Châu', 'Huyện Kim Động', 'Huyện Phù Cừ', 'Huyện Tiên Lữ', 'Huyện Văn Giang', 'Huyện Văn Lâm', 'Huyện Yên Mỹ'],
        'khanhhoa': ['Thành phố Nha Trang', 'Thành phố Cam Ranh', 'Thị xã Ninh Hòa', 'Huyện Cam Lâm', 'Huyện Diên Khánh', 'Huyện Khánh Sơn', 'Huyện Khánh Vĩnh', 'Huyện Trường Sa', 'Huyện Vạn Ninh'],
        'kiengiang': ['Thành phố Rạch Giá', 'Thành phố Hà Tiên', 'Thành phố Phú Quốc', 'Huyện An Biên', 'Huyện An Minh', 'Huyện Châu Thành', 'Huyện Giang Thành', 'Huyện Giồng Riềng', 'Huyện Gò Quao', 'Huyện Hòn Đất', 'Huyện Kiên Hải', 'Huyện Kiên Lương', 'Huyện Tân Hiệp', 'Huyện U Minh Thượng', 'Huyện Vĩnh Thuận'],
        'kontum': ['Thành phố Kon Tum', 'Huyện Đăk Glei', 'Huyện Đăk Hà', 'Huyện Đăk Tô', 'Huyện Kon Plông', 'Huyện Kon Rẫy', 'Huyện Sa Thầy', 'Huyện Tu Mơ Rông', 'Huyện Ia H\'Drai'],
        'laichau': ['Thành phố Lai Châu', 'Huyện Mường Tè', 'Huyện Nậm Nhùn', 'Huyện Phong Thổ', 'Huyện Sìn Hồ', 'Huyện Tam Đường', 'Huyện Tân Uyên', 'Huyện Than Uyên'],
        'lamdong': ['Thành phố Đà Lạt', 'Thành phố Bảo Lộc', 'Huyện Bảo Lâm', 'Huyện Cát Tiên', 'Huyện Đạ Huoai', 'Huyện Đạ Tẻh', 'Huyện Đam Rông', 'Huyện Di Linh', 'Huyện Đơn Dương', 'Huyện Đức Trọng', 'Huyện Lạc Dương', 'Huyện Lâm Hà'],
        'langson': ['Thành phố Lạng Sơn', 'Huyện Bắc Sơn', 'Huyện Bình Gia', 'Huyện Cao Lộc', 'Huyện Chi Lăng', 'Huyện Đình Lập', 'Huyện Hữu Lũng', 'Huyện Lộc Bình', 'Huyện Văn Lãng', 'Huyện Văn Quan', 'Huyện Tràng Định'],
        'laocai': ['Thành phố Lào Cai', 'Thị xã Sa Pa', 'Huyện Bắc Hà', 'Huyện Bảo Thắng', 'Huyện Bảo Yên', 'Huyện Bát Xát', 'Huyện Mường Khương', 'Huyện Si Ma Cai', 'Huyện Văn Bàn'],
        'longan': ['Thành phố Tân An', 'Thị xã Kiến Tường', 'Huyện Bến Lức', 'Huyện Cần Đước', 'Huyện Cần Giuộc', 'Huyện Châu Thành', 'Huyện Đức Huệ', 'Huyện Đức Hòa', 'Huyện Mộc Hóa', 'Huyện Tân Hưng', 'Huyện Tân Thạnh', 'Huyện Thạnh Hóa', 'Huyện Thủ Thừa', 'Huyện Vĩnh Hưng'],
        'namdinh': ['Thành phố Nam Định', 'Huyện Giao Thủy', 'Huyện Hải Hậu', 'Huyện Mỹ Lộc', 'Huyện Nam Trực', 'Huyện Nghĩa Hưng', 'Huyện Trực Ninh', 'Huyện Vụ Bản', 'Huyện Xuân Trường', 'Huyện Ý Yên'],
        'nghean': ['Thành phố Vinh', 'Thị xã Cửa Lò', 'Thị xã Thái Hòa', 'Thị xã Hoàng Mai', 'Huyện Anh Sơn', 'Huyện Con Cuông', 'Huyện Diễn Châu', 'Huyện Đô Lương', 'Huyện Hưng Nguyên', 'Huyện Kỳ Sơn', 'Huyện Nam Đàn', 'Huyện Nghi Lộc', 'Huyện Nghĩa Đàn', 'Huyện Quế Phong', 'Huyện Quỳ Châu', 'Huyện Quỳ Hợp', 'Huyện Quỳnh Lưu', 'Huyện Tân Kỳ', 'Huyện Thanh Chương', 'Huyện Tương Dương', 'Huyện Yên Thành'],
        'ninhbinh': ['Thành phố Ninh Bình', 'Thành phố Tam Điệp', 'Huyện Gia Viễn', 'Huyện Hoa Lư', 'Huyện Kim Sơn', 'Huyện Nho Quan', 'Huyện Yên Khánh', 'Huyện Yên Mô'],
        'ninhthuan': ['Thành phố Phan Rang – Tháp Chàm', 'Huyện Bác Ái', 'Huyện Ninh Hải', 'Huyện Ninh Phước', 'Huyện Ninh Sơn', 'Huyện Thuận Bắc', 'Huyện Thuận Nam'],
        'phutho': ['Thành phố Việt Trì', 'Thị xã Phú Thọ', 'Huyện Cẩm Khê', 'Huyện Đoan Hùng', 'Huyện Hạ Hòa', 'Huyện Lâm Thao', 'Huyện Phù Ninh', 'Huyện Tam Nông', 'Huyện Tân Sơn', 'Huyện Thanh Ba', 'Huyện Thanh Sơn', 'Huyện Thanh Thủy', 'Huyện Yên Lập'],
        'phuyen': ['Thành phố Tuy Hòa', 'Thị xã Sông Cầu', 'Thị xã Đông Hòa', 'Huyện Đồng Xuân', 'Huyện Phú Hòa', 'Huyện Sơn Hòa', 'Huyện Sông Hinh', 'Huyện Tây Hòa', 'Huyện Tuy An'],
        'quangbinh': ['Thành phố Đồng Hới', 'Thị xã Ba Đồn', 'Huyện Bố Trạch', 'Huyện Lệ Thủy', 'Huyện Minh Hóa', 'Huyện Quảng Ninh', 'Huyện Tuyên Hóa', 'Huyện Đảo Cồn Cỏ'],
        'quangnam': ['Thành phố Tam Kỳ', 'Thành phố Hội An', 'Thị xã Điện Bàn', 'Huyện Bắc Trà My', 'Huyện Đại Lộc', 'Huyện Đông Giang', 'Huyện Duy Xuyên', 'Huyện Hiệp Đức', 'Huyện Nam Giang', 'Huyện Nam Trà My', 'Huyện Nông Sơn', 'Huyện Núi Thành', 'Huyện Phú Ninh', 'Huyện Phước Sơn', 'Huyện Quế Sơn', 'Huyện Thăng Bình', 'Huyện Tiên Phước', 'Huyện Tây Giang'],
        'quangngai': ['Thành phố Quảng Ngãi', 'Thị xã Đức Phổ', 'Huyện Ba Tơ', 'Huyện Bình Sơn', 'Huyện Lý Sơn', 'Huyện Minh Long', 'Huyện Mộ Đức', 'Huyện Nghĩa Hành', 'Huyện Sơn Hà', 'Huyện Sơn Tây', 'Huyện Sơn Tịnh', 'Huyện Trà Bồng', 'Huyện Tư Nghĩa'],
        'quangninh': ['Thành phố Hạ Long', 'Thành phố Cẩm Phả', 'Thành phố Uông Bí', 'Thành phố Móng Cái', 'Thị xã Quảng Yên', 'Thị xã Đông Triều', 'Huyện Ba Chẽ', 'Huyện Bình Liêu', 'Huyện Cô Tô', 'Huyện Đầm Hà', 'Huyện Hải Hà', 'Huyện Tiên Yên', 'Huyện Vân Đồn'],
        'quangtri': ['Thành phố Đông Hà', 'Thị xã Quảng Trị', 'Huyện Cam Lộ', 'Huyện Cồn Cỏ', 'Huyện Đa Krông', 'Huyện Gio Linh', 'Huyện Hải Lăng', 'Huyện Hướng Hóa', 'Huyện Triệu Phong', 'Huyện Vĩnh Linh'],
        'soctrang': ['Thành phố Sóc Trăng', 'Thị xã Vĩnh Châu', 'Thị xã Ngã Năm', 'Huyện Châu Thành', 'Huyện Cù Lao Dung', 'Huyện Kế Sách', 'Huyện Long Phú', 'Huyện Mỹ Tú', 'Huyện Mỹ Xuyên', 'Huyện Thạnh Trị', 'Huyện Trần Đề'],
        'sonla': ['Thành phố Sơn La', 'Huyện Bắc Yên', 'Huyện Mai Sơn', 'Huyện Mộc Châu', 'Huyện Mường La', 'Huyện Phù Yên', 'Huyện Quỳnh Nhai', 'Huyện Sông Mã', 'Huyện Sốp Cộp', 'Huyện Thuận Châu', 'Huyện Vân Hồ', 'Huyện Yên Châu'],
        'tayninh': ['Thành phố Tây Ninh', 'Thị xã Hòa Thành', 'Thị xã Trảng Bàng', 'Huyện Bến Cầu', 'Huyện Châu Thành', 'Huyện Dương Minh Châu', 'Huyện Gò Dầu', 'Huyện Tân Biên', 'Huyện Tân Châu'],
        'thaibinh': ['Thành phố Thái Bình', 'Huyện Đông Hưng', 'Huyện Hưng Hà', 'Huyện Kiến Xương', 'Huyện Quỳnh Phụ', 'Huyện Thái Thụy', 'Huyện Tiền Hải', 'Huyện Vũ Thư'],
        'thainguyen': ['Thành phố Thái Nguyên', 'Thành phố Sông Công', 'Thị xã Phổ Yên', 'Huyện Đại Từ', 'Huyện Định Hóa', 'Huyện Đồng Hỷ', 'Huyện Phú Bình', 'Huyện Phú Lương', 'Huyện Võ Nhai', 'Huyện Định Hóa'],
        'thanhhoa': ['Thành phố Thanh Hóa', 'Thành phố Sầm Sơn', 'Thị xã Bỉm Sơn', 'Thị xã Nghi Sơn', 'Huyện Bá Thước', 'Huyện Cẩm Thủy', 'Huyện Đông Sơn', 'Huyện Hà Trung', 'Huyện Hậu Lộc', 'Huyện Hoằng Hóa', 'Huyện Lang Chánh', 'Huyện Mường Lát', 'Huyện Nga Sơn', 'Huyện Ngọc Lặc', 'Huyện Nông Cống', 'Huyện Quan Hóa', 'Huyện Quan Sơn', 'Huyện Quảng Xương', 'Huyện Thạch Thành', 'Huyện Thiệu Hóa', 'Huyện Thọ Xuân', 'Huyện Thường Xuân', 'Huyện Triệu Sơn', 'Huyện Vĩnh Lộc', 'Huyện Yên Định'],
        'thuathienhue': ['Thành phố Huế', 'Thị xã Hương Thủy', 'Thị xã Hương Trà', 'Huyện A Lưới', 'Huyện Nam Đông', 'Huyện Phong Điền', 'Huyện Phú Lộc', 'Huyện Phú Vang', 'Huyện Quảng Điền'],
        'tiengiang': ['Thành phố Mỹ Tho', 'Thị xã Gò Công', 'Thị xã Cai Lậy', 'Huyện Cái Bè', 'Huyện Châu Thành', 'Huyện Chợ Gạo', 'Huyện Gò Công Đông', 'Huyện Gò Công Tây', 'Huyện Tân Phú Đông', 'Huyện Tân Phước'],
        'travinh': ['Thành phố Trà Vinh', 'Thị xã Duyên Hải', 'Huyện Càng Long', 'Huyện Châu Thành', 'Huyện Cầu Kè', 'Huyện Cầu Ngang', 'Huyện Duyên Hải', 'Huyện Tiểu Cần', 'Huyện Trà Cú'],
        'tuyenquang': ['Thành phố Tuyên Quang', 'Huyện Chiêm Hóa', 'Huyện Hàm Yên', 'Huyện Lâm Bình', 'Huyện Na Hang', 'Huyện Sơn Dương', 'Huyện Yên Sơn'],
        'vinhlong': ['Thành phố Vĩnh Long', 'Thị xã Bình Minh', 'Huyện Bình Tân', 'Huyện Long Hồ', 'Huyện Mang Thít', 'Huyện Tam Bình', 'Huyện Trà Ôn', 'Huyện Vũng Liêm'],
        'vinhphuc': ['Thành phố Vĩnh Yên', 'Thành phố Phúc Yên', 'Huyện Bình Xuyên', 'Huyện Lập Thạch', 'Huyện Sông Lô', 'Huyện Tam Đảo', 'Huyện Tam Dương', 'Huyện Vĩnh Tường', 'Huyện Yên Lạc'],
        'yenbai': ['Thành phố Yên Bái', 'Thị xã Nghĩa Lộ', 'Huyện Lục Yên', 'Huyện Mù Cang Chải', 'Huyện Trạm Tấu', 'Huyện Trấn Yên', 'Huyện Văn Chấn', 'Huyện Văn Yên', 'Huyện Yên Bình'],
        // Các tỉnh thành khác đã được bổ sung
};

        // Khi người dùng thay đổi tỉnh/thành phố
        provinceSelect.addEventListener('change', function() {
            const selectedProvince = this.value; // Lấy giá trị tỉnh/thành phố được chọn
            // Xóa các option cũ của quận/huyện và phường/xã
            districtSelect.innerHTML = '<option value="" selected disabled>Quận huyện (tùy chọn)</option>';
            wardSelect.innerHTML = '<option value="" selected disabled>Phường xã (tùy chọn)</option>';
            // Nếu có dữ liệu quận/huyện cho tỉnh/thành phố này thì thêm vào select quận/huyện
            if (districtsByProvince[selectedProvince]) {
                districtsByProvince[selectedProvince].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            }
        });

        // Khi người dùng thay đổi quận/huyện
        districtSelect.addEventListener('change', function() {
            const selectedDistrict = this.value;
            // Xóa các option cũ của phường/xã
            wardSelect.innerHTML = '<option value="" selected disabled>Phường xã (tùy chọn)</option>';
            // Nếu có dữ liệu phường/xã cho quận/huyện này thì thêm vào select phường/xã
            if (wardsByDistrict[selectedDistrict]) {
                wardsByDistrict[selectedDistrict].forEach(ward => {
                    const option = document.createElement('option');
                    option.value = ward;
                    option.textContent = ward;
                    wardSelect.appendChild(option);
                });
            }
        });

        // Xử lý khi click vào các tab
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active')); // Bỏ active ở tất cả tab
                this.classList.add('active'); // Thêm active cho tab được click
            });
        });

        // Xử lý khi nhấn nút ĐẶT HÀNG
        checkoutBtn.addEventListener('click', function() {
            const email = document.getElementById('email').value;
            const fullname = document.getElementById('fullname').value;
            // Kiểm tra nếu chưa nhập email hoặc họ tên thì báo lỗi
            if (!email || !fullname) {
                alert('Vui lòng nhập đầy đủ thông tin email và họ tên.');
                return;
            }
            // Nếu hợp lệ thì báo đặt hàng thành công
            alert('Đặt hàng thành công! Cảm ơn bạn đã mua sắm tại Sudes Phone.');
        });
    </script>
</body>
</html>

<?php include "footer2.php"?>
<!-- 
Thẻ (tag) trong HTML là một thành phần dùng để xác định cấu trúc và nội dung của trang web.
Một thẻ HTML thường có dạng: <ten_the>nội dung</ten_the>
Ví dụ: <div>...</div>, <span>...</span>, <a>...</a>
Thẻ có thể có thuộc tính để bổ sung thông tin hoặc điều khiển hiển thị, ví dụ: <input type="text" placeholder="Nhập tên">
-->