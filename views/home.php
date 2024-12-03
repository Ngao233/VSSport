<section class="banner">
            <div class="slides" id="slides">
                <div class="slide"><img src="image/banner1.png" alt="Hình ảnh 1"></div>
                <div class="slide"><img src="image/banner2.png" alt="Hình ảnh 2"></div>
        </section>
    </header>

    <div class="title-categogy">
        <h2>Danh Mục Sản Phẩm</h2>
    </div>
    <section class="Category">

        <div class="block-top-left">
            <a href="">
                <img src="public/image/Category1.png" alt="">
                <p>Giày Thể Thao</p>
            </a>
        </div>
        </div>
        <div class="block-center-left">
            <a href="">
                <img src="public/image/Category2.png" alt="">
                <p>Áo Bóng đá</p>
            </a>
        </div>
        <div class="block-top-right">
            <a href="">
                <img src="public/image/Category3.png" alt="">
                <p>Áo khoác thể thao</p>
            </a>
        </div>
        <div class="block-botoom-right">
            <a href="">
                <img src="public/image/Category4.png" alt="">
                <p>Quần thể thao</p>
            </a>
        </div>
        <div class="block-botoom-left">
            <a href="">
                <img src="public/image/Category5.png" alt="">
                <p>Giày Bóng Đá</p>
            </a>
        </div>
        <div class="rong">
            <a href="">
                <img src="public/image/Category6.png" alt="">
                <p>Các Loại bóng</p>
            </a>
        </div>

    </section>

    <h2>Sản Phẩm Khuyến Mại</h2>
    <section class="product-sale-home">
        <div class="pro-sale">
            <img src="public/image/mc-chinh.webp" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name">Áo Manchester City</p>
                <div class="p-product-sale">
                    <p class="price-sale-home">230000 đ</p>
                    <p class="price-down-home">190000 đ</p>
                </div>
                <button>Thêm giỏ hàng</button>
            </div>
        </div>
        <div class="pro-sale">
            <img src="public/image/mc-chinh.webp" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name">Áo Manchester City</p>
                <div class="p-product-sale">
                    <p class="price-sale-home">230000 đ</p>
                    <p class="price-down-home">190000 đ</p>
                </div>
                <button>Thêm giỏ hàng</button>
            </div>
        </div>
        <div class="pro-sale">
            <img src="public/image/mc-chinh.webp" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name">Áo Manchester City</p>
                <div class="p-product-sale">
                    <p class="price-sale-home">230000 đ</p>
                    <p class="price-down-home">190000 đ</p>
                </div>
                <button>Thêm giỏ hàng</button>
            </div>
        </div>
        <div class="pro-sale">
            <img src="public/image/mc-chinh.webp" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name">Áo Manchester City</p>
                <div class="p-product-sale">
                    <p class="price-sale-home">230000 đ</p>
                    <p class="price-down-home">190000 đ</p>
                </div>
                <button>Thêm giỏ hàng</button>
            </div>
        </div>
        <div class="pro-sale">
            <img src="public/image/mc-chinh.webp" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name">Áo Manchester City</p>
                <div class="p-product-sale">
                    <p class="price-sale-home">230000 đ</p>
                    <p class="price-down-home">190000 đ</p>
                </div>
                <button>Thêm giỏ hàng</button>
            </div>
        </div>
    </section>
    <!-- Sản phẩm- home -->
    <h2>Sản Phẩm</h2>
    <section class="Product-home-Product">
        <div class="menu-product-home">
            <div class="Category-product-home" data-category="1">
                <br>
                <a href="#">  Giày Thể Thao</a>
            </div>
            <div class="Category-product-home" data-category="2">
                <br>
                <a href="#"> Giày Bóng Đá</a>
            </div>
            <div class="Category-product-home" data-category="3">
                <br>
                <a href="#"> Áo Bóng Đá</a>
            </div>
            <div class="Category-product-home" data-category="4">
                <br>
                <a href="#">  Áo Khoác Thể Thao</a>
            </div>
            <div class="Category-product-home" data-category="5">
                <br>
                <a href="#">  Quần Thể Thao</a>
            </div>
            <div class="Category-product-home" data-category="6">
                <br>
                <a href="#">  Các Loại Bóng</a>
            </div>
        </div>
        <div class="product-home1">
        <?php foreach ($product as $product){?>
            <div class="product-home-one" data-product-category="<?=$product["id_DanhMuc"]?>">
                <a href="chi-tiet-san-pham.html" class="product-home-one-link">
                    <img src="public/image/<?=$product["HinhAnh"]?>" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name"><?=$product["TenSanPham"]?></p>
                <p class="product-home-one-price"><?=$product["Gia"]?> đ</p>

            </div>
            <?php }?> 

 
            <div class="product-home-one" data-product-category="real-madrid">
                <a href="chi-tiet-san-pham.html" class="product-home-one-link">
                    <img src="public/image/AkReal.png" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name">Áo đấu Manchester United</p>
                <p class="product-home-one-price">300,000đ</p>
            </div>
 

            <div class="product-home-one" data-product-category="liverpool">
                <a href="chi-tiet-san-pham.html" class="product-home-one-link">
                    <img src="public/image/AtLiver.png" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name">Áo đấu Manchester United</p>
                <p class="product-home-one-price">300,000đ</p>
            </div>

            <div class="product-home-one" data-product-category="manchester-city">
                <a href="chi-tiet-san-pham.html"class="product-home-one-link">
                    <img src="public/image/mc-chinh.webp" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name">Áo đấu Manchester United</p>
                <p class="product-home-one-price">300,000đ</p>
            </div>
            
            <div class="product-home-one" data-product-category="chelsea">
                <a href="chi-tiet-san-pham.html" class="product-home-one-link">
                    <img src="public/image/AtChelsea.png" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name">Áo đấu Manchester United</p>
                <p class="product-home-one-price">300,000đ</p>
            </div>

            <div class="product-home-one" data-product-category="barcelona">
                <a href="chi-tiet-san-pham.html"
                    class="product-home-one-link">
                    <img src="public/image/AtBar.png" alt="" class="product-home-one-public/image" />
                </a>
                <div class="circle">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <div class="product-home-one-info">
                    <button class="product-home-one-button">Thêm vào giỏ hàng</button>
                </div>
                <p class="sproduct-home-one-name">Áo đấu Manchester United</p>
                <p class="product-home-one-price">300,000đ</p>
            </div>
           
        </div>
    </section>
    <div class="News-home">
        <h2>Tin Tức Mới</h2>
        <button>Xem Thêm</button>
    </div>
    <section>
        <div class="tinTuc">

            <div class="oTinTuc">
                <a href="#">
                    <img src="public/image/tintuc1.png" alt="">
                    <p>Áo thun phong cách thể thao,
                        sản phẩm đc săn đón khi ra mắt
                    </p>
                </a>

            </div>
            <div class="oTinTuc">
                <a href="#">
                    <img src="public/image/tintuc2.png" alt="">
                    <p>Trái bóng được săn đón nhiều
                        nhất tính từ Euro 2024
                    </p>
                </a>

            </div>

        </div>
    </section>

    <!-- Footer-->

    <script src="public/js/javascrip.js">

    </script>

    