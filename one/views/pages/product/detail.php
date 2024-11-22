<?php 
$id_product = $_GET['id'] ;
$id_category = $_GET['id_categories'] ;
$product = new products();
// $result = $product -> detail($product->product_detail($id));
$result = $product->product_detail($id_product);
$img_more = $product->img_more($product ->get_img($id_product));
$recomend = $product->recomend($product ->get_recomend($id_product, $id_category))
?>

<div class="container mt-5">
    <!-- Product Detail Section -->
    <div class="row mb-5">
        <!-- Left Column: Product Images -->
        <div class="col-md-6">
            <div class="row">
                <?=$img_more?>
            </div>
        </div>

        <!-- Right Column: Product Details -->
        <div class="col-md-6">
            <h2><?=$result['name_product'] ?></h2>
            <p class="text-muted"><?=$result['price'] ?></p>
            <div class="mb-3">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star-o text-warning"></i>
            </div>

            <h5>Chọn kích thước</h5>
            <div class="btn-group mb-3" role="group">
                <button type="button" class="btn btn-outline-secondary">S</button>
                <button type="button" class="btn btn-outline-secondary">M</button>
                <button type="button" class="btn btn-outline-secondary">L</button>
            </div>

            <div class="mb-3">
                <button class="btn border-dark btn-block">THÊM GIỎ HÀNG</button>
                <button class="btn btn-dark btn-block">MUA NGAY</button>
            </div>

            <div class="mb-3">
                <a href="#" class="text-muted"><i class="fa fa-heart-o"></i> Lưu vào danh mục yêu thích</a>
            </div>

            <h5>Chi tiết sản phẩm</h5>
            <p>
                <?=$result['desc_product'] ?>
            </p>
            <ul class="list-unstyled">
                <li><strong>Bộ sưu tập:</strong> Stranger Things</li>
                <li><strong>Mã sản phẩm:</strong> 213964C01</li>
                <li><strong>Chất liệu:</strong> Thủy tinh Murano</li>
                <li><strong>Loại sản phẩm:</strong> Charm</li>
                <li><strong>Màu sắc:</strong> Đỏ</li>
            </ul>
        </div>
    </div>

    <!-- Related Products Section -->
    <h4 class="mb-4 text-center">SẢN PHẨM CÙNG LOẠI</h4>
    <div class="row text-center">
        <!-- Product Card -->
        <?=$recomend?>

        <!-- ... -->
    </div>

    <!-- Divider -->
    <hr>

    <!-- Sale Off 50% Section -->
    <h4 class="mb-4 text-center">SALE SẬP SÀN</h4>
    <div class="row text-center">
        <!-- Product Card -->
        <div class="col-md-3 mb-4">
            <div class="card border-0">
                <img src="/DUAN1/views/assets/img/product/bong.webp" class="card-img-top img-fluid" alt="Product 2">
                <div class="card-body">
                    <div class="mb-2">
                        <span class="dot bg-primary"></span>
                        <span class="dot bg-secondary"></span>
                        <span class="dot bg-pink"></span>
                    </div>
                    <h6 class="card-title">Plant Talisman of Endurance IV</h6>
                    <p class="card-text text-muted">3,290,000đ</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0">
                <img src="/DUAN1/views/assets/img/product/bongtai.webp" class="card-img-top img-fluid" alt="Product 2">
                <div class="card-body">
                    <div class="mb-2">
                        <span class="dot bg-primary"></span>
                        <span class="dot bg-secondary"></span>
                        <span class="dot bg-pink"></span>
                    </div>
                    <h6 class="card-title">Plant Talisman of Endurance IV</h6>
                    <p class="card-text text-muted">3,290,000đ</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0">
                <img src="/DUAN1/views/assets/img/product/chuyen.webp" class="card-img-top img-fluid" alt="Product 2">
                <div class="card-body">
                    <div class="mb-2">
                        <span class="dot bg-primary"></span>
                        <span class="dot bg-secondary"></span>
                        <span class="dot bg-pink"></span>
                    </div>
                    <h6 class="card-title">Plant Talisman of Endurance IV</h6>
                    <p class="card-text text-muted">3,290,000đ</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card border-0">
                <img src="/DUAN1/views/assets/img/product/co.webp" class="card-img-top img-fluid" alt="Product 2">
                <div class="card-body">
                    <div class="mb-2">
                        <span class="dot bg-primary"></span>
                        <span class="dot bg-secondary"></span>
                        <span class="dot bg-pink"></span>
                    </div>
                    <h6 class="card-title">Plant Talisman of Endurance IV</h6>
                    <p class="card-text text-muted">3,290,000đ</p>
                </div>
            </div>
        </div>
        <!-- ... -->
    </div>
</div>

<!-- Styles for Color Dots -->
<style>
.dot {
    height: 10px;
    width: 10px;
    display: inline-block;
    border-radius: 50%;
    margin-right: 5px;
}

.bg-pink {
    background-color: pink;
}
</style>