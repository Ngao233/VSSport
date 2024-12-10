<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<?php include_once "views/header.php"; ?>
<div class="khoangtrang" style="width: 100%; height: 40px;"></div>
        <div class="web-Sp-container">
          <nav class="filter-container">  
            <h3>BỘ LỌC TÌM KIẾM</h3>  
            
            <div class="filter-section">  
              <h4>Loại sản phẩm</h4>  
              <div class="price-filter">  
                  <input type="checkbox" id="price1" value="0-200">  
                  <label for="price1">Áo bóng đá</label>  
              </div>  
              <div class="price-filter">  
                  <input type="checkbox" id="price2" value="200-500">  
                  <label for="price2">Giày thể thao</label>  
              </div>  
              <div class="price-filter">  
                  <input type="checkbox" id="price3" value="500-700">  
                  <label for="price3">Đồ bộ</label>  
              </div> 
              <div class="price-filter">  
                <input type="checkbox" id="price3" value="500-700">  
                <label for="price3">Quần thể thao</label>  
            </div> 
            </div>  
        
            <div class="filter-section">  
              <h4>Giá tiền từ</h4>  
                <div class="price-filter">  
                    <input type="checkbox" id="price1" value="0-200">  
                    <label for="price1">0 - 200k</label>  
                </div>  
                <div class="price-filter">  
                    <input type="checkbox" id="price2" value="200-500">  
                    <label for="price2">200k - 500k</label>  
                </div>  
                <div class="price-filter">  
                    <input type="checkbox" id="price3" value="500-700">  
                    <label for="price3">500k - 700k</label>  
                </div>  
                <div class="price-filter">  
                    <input type="checkbox" id="price4" value="1000">  
                    <label for="price4">1 Triệu</label>  
                </div>  
            </div>  
        
            <div class="filter-section">  
              <h4>Áo đội tuyển</h4> 
                <div class="price-filter">  
                  <input type="checkbox" id="price1" value="0-200">  
                  <label for="price1">Mu</label>  
              </div>  
              <div class="price-filter">  
                  <input type="checkbox" id="price2" value="200-500">  
                  <label for="price2">Barcelona</label>  
              </div>  
              <div class="price-filter">  
                  <input type="checkbox" id="price3" value="500-700">  
                  <label for="price3">Real Madrid</label>  
              </div>  
              <div class="price-filter">  
                  <input type="checkbox" id="price4" value="1000">  
                  <label for="price4">Juventus</label>  
              </div>  
            </div>  
          </nav>
          <Section id="san-pham-WebSp-section">
          <?php foreach ($product as $product): ?>
          <div class="san-pham-WebSp">
                <a href="cac/<?=$product['id_SanPham']?>" class="san-pham-WebSp-link">
                  <img src="public/image/<?=htmlspecialchars($product["HinhAnh"])?>" alt="<?=htmlspecialchars($product["TenSanPham"])?>" class="san-pham-WebSp-image" />
                </a>
                <div class="circle">
                  <a href="">
                      <i class="fa-solid fa-heart"></i>
                  </a>
              </div>
                <div class="san-pham-WebSp-info">
                  <button class="san-pham-WebSp-button">Thêm vào giỏ hàng</button>
                </div>
                  <p class="san-pham-WebSp-name"><?=htmlspecialchars($product["TenSanPham"])?></p>
                  <p class="san-pham-WebSp-price"><?=htmlspecialchars($product["Gia"])?></p>
          </div>
          <?php endforeach; ?>
              
          </Section>
        </div>
        <?php include_once "views/footer.php";?>