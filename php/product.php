<?php
session_start();
include "header.php";
include("database.php");
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$products = [];

if (!empty($cart)) {
    $ids = implode(',', array_keys($cart));
    $sql = "SELECT * FROM products WHERE product_id IN ($ids)";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $row['quantity'] = $cart[$row['product_id']];
        $products[] = $row;
    }
}
?>
<!-- HTML hiển thị -->
<table style="width:100%; border-collapse:collapse; background:#fff; font-size:15px; box-shadow:0 2px 8px rgba(0,0,0,0.04); border-radius:8px; overflow:hidden;">
    <tr style="background:#f5f5f5; color:#222; font-weight:600;">
        <th style="padding:12px 8px; text-align:left;">Sản phẩm</th>
        <th style="padding:12px 8px; text-align:right;">Giá</th>
        <th style="padding:12px 8px; text-align:center;">Số lượng</th>
        <th style="padding:12px 8px; text-align:right;">Thành tiền</th>
    </tr>
    <?php foreach ($products as $item): ?>
    <tr style="border-bottom:1px solid #eee; vertical-align:middle;">
        <td style="padding:10px 8px; display:flex; align-items:center; gap:10px;">
            <img src="<?php echo htmlspecialchars($item['product_image']); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>" width="60" height="60" style="object-fit:contain; border:1px solid #eee; border-radius:4px; background:#fafafa;">
            <span style="font-weight:500;"><?php echo htmlspecialchars($item['product_name']); ?></span>
        </td>
        <td style="padding:10px 8px; color:#d32f2f; font-weight:600; text-align:right;">
            <?php echo number_format($item['product_price']); ?>₫
        </td>
        <td style="padding:10px 8px; text-align:center;">
            <span style="display:inline-block; min-width:32px;"><?php echo $item['quantity']; ?></span>
        </td>
        <td style="padding:10px 8px; color:#d32f2f; font-weight:600; text-align:right;">
            <?php echo number_format($item['product_price'] * $item['quantity']); ?>₫
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div style="margin-top:20px; text-align:right;">
    <button></button><strong>Tổng cộng: </strong>
    <?php
    $total = array_reduce($products, function($carry, $item) {
        return $carry + ($item['product_price'] * $item['quantity']);
    }, 0);
    echo number_format($total); ?>₫
</div>

<div style="margin-top:20px; text-align:center;">
    <div id="flash-sale-countdown" style="font-size:24px; font-weight:600; color:#d32f2f;"></div>
</div>

<!-- <script>
const flashSaleEnd = new Date('2025-07-01T20:00:00').getTime(); // Thời gian kết thúc Flash Sale

function updateCountdown() {
    const now = new Date().getTime();
    const distance = flashSaleEnd - now;
    if (distance > 0) {
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24))/(1000*60*60));
        const minutes = Math.floor((distance % (1000 * 60 * 60))/(1000*60));
        const seconds = Math.floor((distance % (1000 * 60))/1000);
        document.getElementById('flash-sale-countdown').innerHTML =
            `<span class="countdown-hour">${hours.toString().padStart(2,'0')}</span> :
             <span class="countdown-minute">${minutes.toString().padStart(2,'0')}</span> :
             <span class="countdown-second">${seconds.toString().padStart(2,'0')}</span>`;
    } else {
        document.getElementById('flash-sale-countdown').innerHTML = "Flash Sale đã kết thúc!";
        clearInterval(timer);
    }
}
updateCountdown();
const timer = setInterval(updateCountdown, 1000);
</script> -->

<?php include "footer.php"; ?>