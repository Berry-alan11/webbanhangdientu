<!-- Ẩn lỗi trên trình duyệt	 -->
<?php
ini_set('display_errors', 0);
error_reporting(0);
?>

<?php include 'header.php'; ?>
<?php require 'database.php'; 

$sql = "SELECT * FROM news ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: contain;
        width: 100%;
    }

    .news-link {
        text-decoration: none;
        color: inherit;
    }

    .news-link:hover .card-title {
        color: #007bff;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Tin tức công nghệ</h2>
    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="news_detail.php?id=<?php echo $row['news_id']; ?>" style="color: inherit; text-decoration: none;">
                            <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="card-text"><?php echo mb_strimwidth(htmlspecialchars($row['summary']), 0, 150, "..."); ?></p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <small class="text-muted">Đăng ngày: <?php echo date('d/m/Y', strtotime($row['created_at'])); ?></small>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Hiện chưa có bài viết nào.</p>
        <?php endif; ?>
    </div>
</div>

<?php $conn->close(); ?>
<?php include 'footer.php'; ?>
