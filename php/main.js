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
            
            // Gửi dữ liệu đến server để cập nhật giỏ hàng
            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=add&product_id=${productId}&quantity=1`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Hiển thị thông báo thành công
                    alert(`Đã thêm sản phẩm ${productName} vào giỏ hàng!`);
                    // Reload trang để cập nhật số lượng giỏ hàng
                    window.location.reload();
                } else {
                    // Nếu chưa đăng nhập hoặc có lỗi khác
                    if(data.message) {
                        alert(data.message);
                        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                        if(data.message.includes('đăng nhập')) {
                            window.location.href = 'login.php';
                        }
                    } else {
                        alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
            });
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
}); 