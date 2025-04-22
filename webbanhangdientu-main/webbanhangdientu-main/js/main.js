// trang index.html
// Chức năng cho carousel
document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo tooltip Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Xử lý thêm vào giỏ hàng
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            
            // Hiển thị thông báo
            alert(`Đã thêm sản phẩm ${productName} vào giỏ hàng!`);
            
            // Trong thực tế, bạn sẽ thêm sản phẩm vào giỏ hàng thông qua API hoặc lưu trữ cục bộ
            console.log(`Đã thêm sản phẩm: ID=${productId}, Tên=${productName}, Giá=${productPrice}`);
        });
    });

    // Xử lý nút thêm vào danh sách yêu thích
    const wishlistButtons = document.querySelectorAll('.add-to-wishlist');
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('text-danger');
            
            const productId = this.getAttribute('data-id');
            const isFavorited = this.classList.contains('text-danger');
            
            // Hiển thị thông báo
            if (isFavorited) {
                alert('Đã thêm vào danh sách yêu thích!');
            } else {
                alert('Đã xóa khỏi danh sách yêu thích!');
            }
            
            // Trong thực tế, bạn sẽ cập nhật trạng thái yêu thích thông qua API
            console.log(`Sản phẩm ID=${productId} ${isFavorited ? 'đã thêm vào' : 'đã xóa khỏi'} danh sách yêu thích`);
        });
    });

    // Xử lý lọc sản phẩm theo giá
    const priceFilterSelect = document.getElementById('price-filter');
    if (priceFilterSelect) {
        priceFilterSelect.addEventListener('change', function() {
            // Thực hiện lọc sản phẩm theo giá
            const selectedValue = this.value;
            console.log(`Lọc sản phẩm theo giá: ${selectedValue}`);
            
            // Trong thực tế, bạn sẽ áp dụng bộ lọc và cập nhật giao diện người dùng
        });
    }

    // Xử lý lọc sản phẩm theo thương hiệu
    const brandCheckboxes = document.querySelectorAll('.brand-filter');
    brandCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const brand = this.value;
            const isChecked = this.checked;
            
            console.log(`Thương hiệu ${brand} ${isChecked ? 'đã chọn' : 'đã bỏ chọn'}`);
            
            // Trong thực tế, bạn sẽ áp dụng bộ lọc và cập nhật giao diện người dùng
        });
    });

    // Xử lý nút thêm vào giỏ hàng
    const cartButtons = document.querySelectorAll('.cart-button');
    cartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn chuyển trang ngay lập tức
            
            // Lấy thông tin sản phẩm
            const productCard = this.closest('.product-card');
            const productName = productCard.querySelector('.product-name').innerText;
            const productPrice = productCard.querySelector('.current-price').innerText;
            const productImage = productCard.querySelector('.product-image img').src;
                   
            // Lưu thông tin sản phẩm vào localStorage
            const cartItem = {
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            };
            
            // Lấy giỏ hàng hiện tại hoặc tạo mới
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Thêm sản phẩm vào giỏ hàng
            cart.push(cartItem);
            
            // Lưu giỏ hàng vào localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            document.querySelector('.cart-icon span').innerText = cart.length;
            
            // Chuyển hướng đến trang giỏ hàng
            window.location.href = "loginsign/shoppingcart.html";
        });
    });

    // Xử lý nút mua hàng
    const buyButtons = document.querySelectorAll('.buy-button');
    buyButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Chuyển hướng trực tiếp đến trang giỏ hàng
            window.location.href = "loginsign/shoppingcart.html";
        });
    });
});


