<!-- // Tìm kiếm sản phẩm trong cơ sở dữ liệu và hiển thị kết quả
?php
include("header.php");
// include("database.php");
// include("product_list.php");

// Lấy kết quả tìm kiếm từ DB (ví dụ: $products là mảng sản phẩm)
$products = []; // Lấy từ DB
// ... code lấy dữ liệu $products ...

// Sắp xếp ưu tiên theo loại sản phẩm nếu có từ khóa loại (ví dụ: $priorityCategory)
$priorityCategory = isset($_GET['category']) ? $_GET['category'] : '';
if ($priorityCategory) {
    usort($products, function($a, $b) use ($priorityCategory) {
        if ($a['product_category'] === $priorityCategory && $b['product_category'] !== $priorityCategory) return -1;
        if ($a['product_category'] !== $priorityCategory && $b['product_category'] === $priorityCategory) return 1;
        return 0;
    });
}

render_product_list($products, "Kết quả tìm kiếm");

include("footer.php");
?> -->