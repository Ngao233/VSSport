<?php
class products extends connect {
    public $name;

    function get_products() {
        $conn = new connect();
        $sql = "SELECT * FROM products order by id desc";
        $product = $conn->queryAll($sql);
        return  $product;
    }

    function product_detail ($id) {
        $conn = new connect();
        $sql = "SELECT * FROM products WHERE id_product = $id";
        $product = $conn->queryOne($sql);
        return  $product;
    }
    function get_img ($id) {
        $conn = new connect();
        $sql = "SELECT img FROM img_more WHERE id_product = $id";
        $product = $conn->queryAll($sql);
        return  $product;
    }
    function get_recomend ($id_product,$id_categories) {
        $conn =new connect();
        $sql = "select * from products where id_category = $id_categories and id_product != $id_product order by id_product asc";
        $product = $conn->queryAll($sql);
        return  $product;
    }
    function bessellers ($limi){
        $conn = new connect();
        $sql = "select products.*, sum(order_detail.quantity) as toltal_sold from order_detail 
        inner join products on order_detail.id_product = products.id_product 
        group by products.id_product
        order by toltal_sold desc limit ".$limi;
        $product = $conn->queryAll($sql);
        return  $product;
    }
    function discount (){
        $conn = new connect();
        $sql = " select * from products order by discount desc limit 8 ";
        $product = $conn->queryAll($sql);
        return  $product;
    }
    function category (){
        $conn = new connect();
        $sql = "SELECT * FROM categories LIMIT 4";
        $product = $conn->queryAll($sql);
        return  $product;
    }
    // show hmtl
    function show_products($product) {
        $product_html = '';
        foreach ($product as $item) {
            $product_html .= '
                <div class="col-3 text-left">
                <div class="product-card p-3 text-left ">
                <a href="index.php?pages=detail&id='.$item['id_product'].'&id_categories='.$item['id_category'].'"> 
                <img src="views/assets/img/product/'.$item['img'].'"  alt="Product Image 1 class="bg-secondary" style="background-color: rgba(128, 128, 128, 0.08);"">
                    <p class="product-name text-left">'.$item['name_product'].'</p>
                    <p class="discount-price">'.$item['price'].' VND</p>
                    <p class="product-price">1,200,000 VND</p>
                </a>
                    
                </div>
            </div>
            '; 
        }
        return $product_html;
    }
    function show_products_list($products) {
        $limited_products = array_slice($products, 0, 12); // Limit to the first 12 products
        $product_html = '';
    
        foreach ($limited_products as $index => $item) {
            // Product HTML
            $product_html .= '
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card border-0">
                        <a href="index.php?pages=detail&id='.$item['id_product'].'&id_categories='.$item['id_category'].'">
                            <div class="position-relative">
                                <img src="views/assets/img/product/'.$item['img'].'" class="card-img-top img-fluid" alt="Product Image">
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title">'.$item['name_product'].'</h6>
                                <p class="text-muted">'.$item['price'].' VND</p>
                                <button class="btn btn-sm btn-outline-secondary">Back in Stock</button>
                            </div>
                        </a>
                    </div>
                </div>
            ';
    
        //    chen banner vao sau sp t7
            if ($index === 7) {
                $product_html .= '
                    <!-- Buy Now Section -->
<section class="container my-5 buy-now-section">
    <div class="row">
     <!-- countdown -->
        <p id="countdown-timer" class="countdown-timer"></p>
        <!-- Left Column: Product Showcase -->
        <div class="col-md-6 d-flex align-items-center">
            <div class="video-container">
                <img style="margin-top: -170px;" src="/DUAN1/views/assets/img/poster/anhmau.gif" autoplay loop muted
                    class="img-fluid rounded">
                </img>
            </div>
        </div>
        <!--  Right Column: Video/GIF Section-->
        <div class="col-md-6">
            <div class="product-showcase text-center">
                <!-- Title and Subtitle -->
                <h2 class="section-title">New Collection</h2>
                <p class="section-subtitle">Discover Our Latest Heart Pendant</p>

                <!-- Main Product Image -->
                <div class="main-product-image mb-3">
                    <img src="/DUAN1/views/assets/img/product/hoaco.avif" alt="Main Product" id="mainImage1"
                        class="img-fluid main-img">
                </div>

                <!-- Product Name and Description -->
                <h3 class="product-name">Heart Pendant</h3>
                <p class="product-description">Crafted with elegance, this Heart Pendant adds a touch of charm to any
                    outfit.</p>

                <!-- Buy Now Button -->
                <button class="btn btn-dark mt-3 mb-4">MUA NGAY</button>

                <!-- Additional Images -->
                <div class="additional-images d-flex justify-content-center">
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/vong.avif" alt="Product Image 1"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/tronvang.webp" alt="Product Image 2"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                    <div class="small-image">
                        <img src="/DUAN1/views/assets/img/product/vongdeo.webp" alt="Product Image 3"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                ';
            }
        }
        return $product_html;
    }

    


    /// img more
    function img_more($img){
        $img_more ='';
        foreach ($img as $item){
            $img_more.='
                <div class="col-6 mb-3">
                    <img src="/DUAN1/views/assets/img/product/'.$item['img'].'" class="img-fluid img-thumbnail" alt="Product Image 1">
                </div>
            ';
        }
        return $img_more;
    }
    // product recomen
    function recomend($product){
        $recomend = '';
        foreach ($product as $item){
            $recomend .= '
                    <div class="col-md-3 mb-4">
                        <div class="card border-0">
                        <img src="views/assets/img/product/'.$item['img'].'" class="card-img-top img-fluid" alt="Product 1">
                        <div class="card-body">
                            <div class="mb-2">
                            <span class="dot bg-primary"></span>
                            <span class="dot bg-secondary"></span>
                            <span class="dot bg-pink"></span>
                            </div>
                            <h6 class="card-title">'.$item['name_product'].'</h6>
                            <p class="card-text text-muted">'.$item['price'].'</p>
                        </div>
                        </div>
                    </div>
            ';
        }
        return $recomend;
    }
    function category_html ($item) {
        $html = '';
        foreach ($item as $item) {
            $html.= '
                <div class="col-3">
                <div class="product-card p-3 text-center">
                    <img src="views/assets/img/catalog/'.$item['img_category'].'" alt="Product" class="mb-3">
                    <h1 class="product-name-kp">'.$item['name_category'].'</h1>
                </div>
            </div>
            ';
        }
        return $html;
    }
}




