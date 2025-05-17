<?php include 'header.php'; ?>
<?php require 'database.php';

if (isset($_GET['id'])) {
    $news_id = intval($_GET['id']);
    $sql = "SELECT * FROM news WHERE news_id = $news_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        echo "<div class='container mt-5'><p>Tin tức không tồn tại.</p></div>";
        include 'footer.php';
        exit;
    }
} else {
    echo "<div class='container mt-5'><p>Không có tin tức được chọn.</p></div>";
    include 'footer.php';
    exit;
}
?>
<style>
    .news-breadcrumb {
        margin-top: 30px;
        margin-bottom: 10px;
        font-size: 15px;
        color: #888;
    }
    .news-card {
        max-width: 800px;
        margin: 30px auto 50px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 32px 28px 28px 28px;
    }
    .news-title {
        font-size: 2.2rem;
        font-weight: bold;
        margin-bottom: 12px;
        color: #1a237e;
    }
    .news-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 18px;
    }
    .news-image {
        display: block;
        margin: 0 auto 24px auto;
        max-width: 100%;
        max-height: 400px;
        border-radius: 8px;
        object-fit: contain;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }
    .news-summary {
        font-size: 1.1rem;
        color: #444;
        margin-bottom: 18px;
        font-style: italic;
        border-left: 4px solid #1976d2;
        padding-left: 12px;
        background: #f6f8fa;
    }
    .news-content {
        font-size: 1.08rem;
        color: #222;
        line-height: 1.7;
        margin-bottom: 10px;
    }
    @media (max-width: 600px) {
        .news-card { padding: 16px 6px; }
        .news-title { font-size: 1.3rem; }
    }
</style>

<div class="container">
    <div class="news-breadcrumb">
        <a href="index.php" style="color:#1976d2;text-decoration:none;">Trang chủ</a> &raquo; 
        <a href="news.php" style="color:#1976d2;text-decoration:none;">Tin tức</a> &raquo; 
        <span><?php echo htmlspecialchars($news['title']); ?></span>
    </div>
    <div class="news-card">
        <div class="news-title"><?php echo htmlspecialchars($news['title']); ?></div>
        <div class="news-date">
            <i class="fa fa-calendar"></i>
            Đăng ngày: <?php echo date('d/m/Y', strtotime($news['created_at'])); ?>
        </div>
        <?php if (!empty($news['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($news['image_url']); ?>" class="news-image" alt="<?php echo htmlspecialchars($news['title']); ?>">
        <?php endif; ?>
        <?php if (!empty($news['summary'])): ?>
            <div class="news-summary"><?php echo htmlspecialchars($news['summary']); ?></div>
        <?php endif; ?>
        <div class="news-content">
            <?php echo nl2br($news['content']); ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
