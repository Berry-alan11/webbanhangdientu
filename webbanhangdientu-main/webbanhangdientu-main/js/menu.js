// trang dienthoat.html tính năng cuộn xuống


// Xử lý smooth scroll khi click vào các anchor link
document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các liên kết anchor trong bộ lọc
    const brandLinks = document.querySelectorAll('.filter-btn[href^="#"]');
    
    // Thêm sự kiện click cho mỗi liên kết
    brandLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Lấy id từ href
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Cuộn đến vị trí của phần tử đích với hiệu ứng mượt
                window.scrollTo({
                    top: targetElement.offsetTop - 100, // Trừ đi 100px để không bị header che mất
                    behavior: 'smooth'
                });
            }
        });
    });

    // Kiểm tra nếu có fragment identifier trong URL khi tải trang
    if (window.location.hash) {
        const targetElement = document.querySelector(window.location.hash);
        if (targetElement) {
            setTimeout(() => {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }, 300); // Đợi 300ms để trang tải xong
        }
    }
    // Thêm chức năng lọc theo giá
    const priceFilterLinks = document.querySelectorAll('.price-dropdown-content a');
    
    priceFilterLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Lấy giá trị filter
            const filterValue = this.getAttribute('data-filter');
            
            // Thay đổi tiêu đề nút dropdown (tùy chọn)
            const priceBtn = document.querySelector('.price-btn');
            priceBtn.textContent = this.textContent;
            
            // Lấy tất cả sản phẩm
            const products = document.querySelectorAll('.product-card');
            
            products.forEach(product => {
                // Mặc định hiển thị tất cả sản phẩm khi chọn "all"
                if (filterValue === 'all') {
                    product.style.display = 'block';
                    return;
                }
                
                // Lấy giá hiện tại của sản phẩm
                const priceElement = product.querySelector('.current-price');
                if (!priceElement) return;
                
                // Xử lý chuỗi giá để lấy số
                const priceText = priceElement.textContent;
                const price = parseInt(priceText.replace(/\D/g, ''));
                
                // Ẩn/hiện sản phẩm dựa trên khoảng giá đã chọn
                switch (filterValue) {
                    case 'under-2m':
                        product.style.display = price < 2000000 ? 'block' : 'none';
                        break;
                    case '2m-5m':
                        product.style.display = (price >= 2000000 && price < 5000000) ? 'block' : 'none';
                        break;
                    case '5m-10m':
                        product.style.display = (price >= 5000000 && price < 10000000) ? 'block' : 'none';
                        break;
                        case '10m-20m':
                            product.style.display = (price >= 10000000 && price < 20000000) ? 'block' : 'none';
                            break;
                        case 'over-20m':
                            product.style.display = price >= 20000000 ? 'block' : 'none';
                            break;
                        default:
                            product.style.display = 'block';
                    }
                });
                
                // Đóng dropdown sau khi chọn (tùy chọn)
                document.querySelector('.price-dropdown-content').style.display = 'none';
                setTimeout(() => { 
                    document.querySelector('.price-dropdown-content').style.removeProperty('display');
                }, 100);
            });
        });
    
        // Cho phép dropdown hiển thị lại khi hover sau khi đã click (tùy chọn)
        const priceDropdown = document.querySelector('.price-dropdown');
        priceDropdown.addEventListener('mouseleave', function() {
            setTimeout(() => {
                document.querySelector('.price-dropdown-content').style.removeProperty('display');
            }, 100);
        }); 
});

