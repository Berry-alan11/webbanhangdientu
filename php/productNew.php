<?php

    include("header.php");
    include("database.php");
    
    
    $products_per_page = 10;  
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // làm cho người dùng biết mình đang trang thứ mấy
    $offset = ($page - 1) * $products_per_page; // truy vấn đúng sản phẩm tương ứng với trang người dùng đang xem
    
    
    $count_sql = "SELECT COUNT(*) as total FROM products"; 
    $count_result = $conn->query($count_sql); 
    $total_products = $count_result->fetch_assoc()['total'];
    $total_pages = ceil($total_products / $products_per_page); 
   
    $sql = "SELECT product_id, product_name, product_price, product_image, product_category 
            FROM products 
            LIMIT $products_per_page 
            OFFSET $offset"; // lấy sản phẩm đúng với trang hiện tại nguoiwfddang xem
    
    $result = $conn->query($sql); 
?>

<div class="container mt-4">
    <h2>Tất cả sản phẩm mới</h2>
    <div class="row">
        <?php

if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        echo '<div class="col-md-3" style="margin-bottom: 30px;">
            <div class="card h-100" style="position: relative; display: flex; flex-direction: column;">
                <!-- Badge Mới -->
                <div class="badge bg-success position-absolute" style="top: 10px; left: 10px; z-index: 10;">Mới</div>
                <img src="' . $product["product_image"] . '" class="card-img-top" alt="' . $product["product_name"] . '" style="height: 250px; object-fit: contain;">
                <div class="card-body" style="display: flex; flex-direction: column; flex: 1;">
                    <h5 class="card-title">' . $product["product_name"] . '</h5>
                    <p><small class="text-muted">' . $product["product_category"] . '</small></p>
                    <p class="card-text" style="color: red; font-weight: bold;">' . number_format($product["product_price"]) . '₫</p>
                    <div class="d-flex justify-content-between" style="margin-top: auto;">
                        <a href="cart.php?action=add&product_id=' . ($product["product_id"]) . '" class="btn btn-primary">
                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                        </a>
                        <a href="wishlist.php?action=add&product_id=' . ($product["product_id"]) . '" class="btn btn-outline-danger">
                            <i class="fas fa-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<div class="col-12"><p class="text-center">Không có sản phẩm nào.</p></div>';
}

        ?>
    </div>
    
    <?php

 if ($total_pages > 1): ?> 
<nav aria-label="Page navigation" class="mt-4"> 
    <ul class="pagination justify-content-center"> 

      
        <?php if ($page > 1): ?> 
            <li class="page-item"> 
                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous"> 
                    <span aria-hidden="true">&laquo;</span> 
                </a>
            </li>
        <?php endif; ?> 
        
     
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        
        
        <?php if ($page < $total_pages): ?> 
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
<!-- CSS cho layout và badge -->
<style>
.col-md-2-4 {
    flex: 0 0 20%; 
    max-width: 20%; 
}
.badge {
    display: inline-block; 
    padding: 0.25em 0.6em; 
    font-size: 0.75em;
    font-weight: 700;
    line-height: 1; 
    text-align: center; 
    border-radius: 0.25rem;
}

.bg-success {
    background-color: #28a745 ;
    color: white;
}
.card {
    transition: transform 0.3s ease; 
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
}
</style>

<?php include("footer.php"); ?>