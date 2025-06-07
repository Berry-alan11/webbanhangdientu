
<!-- Popup Quảng Cáo -->
<div id="adPopup" class="ad-popup">
    <div class="ad-content">
        <div class="ad-header">
            <h3>🔥 KHUYẾN MÃI HOT 🔥</h3>
        </div>
        <div class="ad-body">
            <img src="https://techstore.vn/themes/echula/images/logo.png" alt="TechStore" class="ad-image">
            <h4>TechStore - Siêu thị điện tử uy tín</h4>
            <p>✨ Giảm giá lên đến <strong>70%</strong> tất cả sản phẩm</p>
            <p>🎁 Tặng kèm phụ kiện cao cấp</p>
            <p>🚚 Freeship toàn quốc</p>
            
            <div class="promotion-code">
                <p><strong>Mã giảm giá: TECH70</strong></p>
            </div>
            
            <div class="ad-buttons">
                <a href="https://techstore.vn" target="_blank" class="btn-shop-now" onclick="closeAd()">
                    Mua ngay tại TechStore
                </a>
                <button class="btn-later" onclick="closeAd()">Để sau</button>
            </div>
        </div>
    </div>
</div>
<script>
function showAdPopup() {
    const randomDelay = Math.random() * 1000 + 1000; 
    
    setTimeout(function() {
        document.getElementById('adPopup').style.display = 'block';
    }, randomDelay);
}
function closeAd() {
    document.getElementById('adPopup').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
    showAdPopup();
});
</script>
<style>

.ad-popup {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8); 
}

.ad-content {
    
    margin: 3% auto;
    padding: 0;
    border-radius: 20px;
    width: 90%;
    max-width: 320px;
    
}

.ad-header {
    background: linear-gradient(45deg, #ff6b6b, #ffa500, #ff6b6b);
    color: white;
    padding: 20px;
    text-align: center;
    margin: 0;
    border-radius: 20px 20px 0 0; 
}

.ad-header h3 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.ad-body {
    padding: 15px 12px;              
    text-align: center;
    background: white;
    color: #333;
    border-radius: 0 0 20px 20px; 
}

.ad-image {
    width: 100%;
    max-width: 280px;
    height: 120px;                   
    border-radius: 15px;
    margin-bottom: 10px;             
    border: 3px solid #667eea;
}

.ad-body h4 {
    color: #667eea;
    font-size: 16px;                 
    margin: 10px 0 8px 0;            
    font-weight: bold;
}
.ad-body p {
    color: #555;
    margin: 5px 0;                   
    font-size: 13px;                 
    line-height: 1.3;                
}
.promotion-code {
    background: linear-gradient(45deg, #ff6b6b, #ffa500);
    color: white;
    padding: 8px;                   
    border-radius: 8px;              
    margin: 10px 0;                  
    font-size: 14px;                 
}
.promotion-code p {
    margin: 0;
    font-size: 14px;
}
.ad-buttons {
    margin-top: 12px;                
    gap: 8px;                       
}

.btn-shop-now, .btn-later {
    padding: 8px 16px;               
    border: none;
    border-radius: 25px;            
    font-size: 13px;                
    font-weight: bold;
    text-decoration: none; 
    display: inline-block; 
}

.btn-shop-now {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white; 
}
.btn-later {
    background:rgb(73, 202, 22);
    color: white;
    border-radius: 25px; 
    
}
</style>