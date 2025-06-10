<?php
include("header.php");
include("database.php");

// Lấy từ khóa tìm kiếm từ URL
// Kiểm tra xem có từ khóa tìm kiếm không
// Nếu không có từ khóa thì không truy vấn
// Lấy từ khóa tìm kiếm từ từ cái việc nhập dữ liệu vào ô tìm kiếm
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

// Nếu không có từ khóa thì không truy vấn
// Tạo một mảng để lưu trữ kết quả sản phẩm
$products = [];
// Kiểm tra xem từ khóa có rỗng hay không
if ($keyword !== '') {
    // Truy vấn sản phẩm theo tên, không phân biệt hoa thường, có dấu
    // Truy vấn sản phẩm từ bảng products với điều kiện tên sản phẩm chứa từ khóa tìm kiếm
    // Sử dụng COLLATE để so sánh không phân biệt hoa thường và có dấu
    $sql = "SELECT * FROM products WHERE product_name COLLATE utf8mb4_unicode_ci LIKE ?";
    // prepare giúp bảo mật truy vấn SQL bằng cách sử dụng tham số thay vì chèn trực tiếp giá trị vào câu truy vấn
    // hay nói cách khác là tránh SQL Injection
    $stmt = $conn->prepare($sql);// stmt là một đối tượng để chuẩn bị truy vấn, stmt là viết tắt của (statement)
    $like = "%$keyword%";// Thêm dấu % vào trước và sau từ khóa để tìm kiếm chứa từ khóa ở bất kỳ vị trí nào
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<div class="container">
    <h2>Kết quả tìm kiếm</h2>
    <div class="row">
        <?php
        if ($keyword === '') {
            echo '<div class="col-12">Vui lòng nhập từ khóa tìm kiếm.</div>';
        } elseif (empty($products)) {
            echo '<div class="col-12">Không tìm thấy sản phẩm nào.</div>';
        } else {
            foreach ($products as $product) {
                echo '<div class="col-md-3" style="margin-bottom: 30px;">
                    <div class="card h-100">
                        <img src="' . htmlspecialchars($product["product_image"]) . '" class="card-img-top" alt="' . htmlspecialchars($product["product_name"]) . '" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product["product_name"]) . '</h5>
                            <p class="card-text" style="color: red; font-weight: bold;">' . number_format($product["product_price"]) . '₫</p>
                            <a href="cart.php?action=add&product_id=' . intval($product["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
<!-- ?php
    // Kết nối cơ sở dữ liệu
    //include("header.php");
    include("database.php");// kết nối cơ sở dữ liệu
    //Truy vấn sản phẩm thuộc danh mục "Laptop"
    $sql = "SELECT product_id,product_name,product_price, product_image FROM products WHERE product_category = 'Laptop'";
    $result = $conn->query($sql);


// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'webbanhangdientu');
$conn->set_charset('utf8mb4');

// Lấy từ khóa và các tham số tìm kiếm từ AJAX
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$min_price = isset($_GET['min_price']) ? floatval($_GET['min_price']) : 0;
$max_price = isset($_GET['max_price']) ? floatval($_GET['max_price']) : 0;

// Xây dựng câu truy vấn
$sql = "SELECT * FROM products WHERE 1";
$params = [];
$types = "";

// Tìm kiếm theo tên (không phân biệt hoa thường, có thể dùng COLLATE)
if ($keyword !== '') {
    $sql .= " AND product_name COLLATE utf8mb4_unicode_ci LIKE ?";
    $params[] = "%$keyword%";
    $types .= "s";
}

// Tìm kiếm theo danh mục
if ($category !== '') {
    $sql .= " AND product_category = ?";
    $params[] = $category;
    $types .= "s";
}

// Tìm kiếm theo khoảng giá
if ($min_price > 0) {
    $sql .= " AND product_price >= ?";
    $params[] = $min_price;
    $types .= "d";
}
if ($max_price > 0) {
    $sql .= " AND product_price <= ?";
    $params[] = $max_price;
    $types .= "d";
}

// Chuẩn bị và thực thi truy vấn
$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
} -->

<!-- // In kết quả dưới dạng JSON
//header("Location: search_result.php");
//echo json_encode($products);
?> -->

<!-- <div class="container">
    <h2>Kết quả tìm kiếm</h2>
    <div class="row">
        ?php
        if (empty($products)) {
            echo '<div class="col-12">Không tìm thấy sản phẩm nào.</div>';
        } else {
            foreach ($products as $product) {
                echo '<div class="col-md-3" style="margin-bottom: 30px;">
                    <div class="card h-100">
                        <img src="' . htmlspecialchars($product["product_image"]) . '" class="card-img-top" alt="' . htmlspecialchars($product["product_name"]) . '" style="height: 250px; object-fit: contain;">
                        <div class="card-body">
                            <
                            <h5 class="card-title">' . htmlspecialchars($product["product_name"]) . '</h5>
                            <p class="card-text" style="color: red; font-weight: bold;">' . number_format($product["product_price"]) . '₫</p>
                            <a href="cart.php?action=add&product_id=' . intval($product["product_id"]) . '" class="btn btn-primary">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div> -->

<!-- ?php
    include("footer.php");
?> -->