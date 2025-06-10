<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'dbconnect.php'; // file này chứa kết nối $conn tới database

$user_id = $_SESSION['user_id'];
$sql = "SELECT p.* FROM products p
        INNER JOIN yeuthich y ON p.id = y.product_id
        WHERE y.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm yêu thích</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Sản phẩm yêu thích của bạn</h2>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text"><?php echo number_format($row['price']); ?> VNĐ</p>
                        <a href="product_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
<?php include "footer.php"; ?>
<?php
$stmt->close();
$conn->close();
?>