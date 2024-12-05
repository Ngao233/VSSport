<?php  
session_start();   

if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
} else { 
    exit();
} 
 

$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session

// Truy vấn giỏ hàng của khách hàng
$sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);


?> 
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
    <?php foreach ($product1 as $productItem): 
        // Tính toán giá giảm
        $giagiam = $productItem['Gia'] * ($productItem['GiamGia'] / 100);
        $saugiam = $productItem['Gia'] - $giagiam;
    ?> 
        <div class="pro-sale">
            <img src="public/image/<?=$productItem['HinhAnh']?>" alt="">
            <div class="circle">
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <div>
                <p class="p-product-sale-name"><?=$productItem['TenSanPham']?></p>
                <div class="p-product-sale">
                    <p class="price-sale-home"><?= number_format($productItem['Gia'], 0, ',', '.'); ?>đ</p> <!-- Giá ban đầu -->
                    <p class="price-down-home"><?= number_format($saugiam, 0, ',', '.'); ?>đ</p> <!-- Giá sau giảm -->
                </div>
                <button>Thêm giỏ hàng</button>

            </div>
        </div>
    <?php endforeach; ?>
</section>

    <!-- Sản phẩm- home -->
    <h2>Sản Phẩm</h2>
    <section class="Product-home-Product">
        <div class="menu-product-home">
            <div class="Category-product-home" data-category="1">
                <br>
                <a href="#">Trang Chủ</a>
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
        
        <?php foreach ($product as $product) { ?>  
    <div class="product-home-one" data-product-category="<?=$product["id_DanhMuc"]?>">  
        <a href="chitietsp/<?=$product['id_SanPham']?>" class="product-home-one-link">  
            <img src="public/image/<?=$product["HinhAnh"]?>" alt="" class="product-home-one-public/image" />  
        </a>  

        <div class="circle">  
            <a href="">  
                <i class="fa-solid fa-heart"></i>  
            </a>  
        </div>  
        
        <div class="product-home-one-info">   
        <form action="addtocart" method="post" class="formhome">  
        <input type="hidden" name="id_SanPham" value="<?=$product['id_SanPham']?>" >  
        <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 50px; text-align: center;">  
        <button class="product-home-one-button" type="submit">  
        Thêm vào giỏ hàng  
    </button>  
</form>
        </div>  

        <p class="product-home-one-name"><?=$product["TenSanPham"]?></p>  
        <p class="product-home-one-price"><?=$product["Gia"]?> đ</p>  
        
    </div>  
<?php } ?>
           
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



    <script>
        const categoriProductH = document.querySelectorAll('.Category-product-home');  
const products = document.querySelectorAll('.product-home-one');   
 
categoriProductH[0].classList.add('active');  

products[1].classList.add('active'); 
products[2].classList.add('active'); 
products[3].classList.add('active'); 
products[4].classList.add('active'); 
products[5].classList.add('active'); 
products[6].classList.add('active'); 
products[7].classList.add('active'); 
products[8].classList.add('active');


categoriProductH.forEach(link => {  
    link.addEventListener('click', function(event) {  
        event.preventDefault();  

        // Xóa lớp 'active' khỏi tất cả các mục  
        categoriProductH.forEach(l => l.classList.remove('active'));  
        
        // Xóa lớp 'active' khỏi tất cả sản phẩm  
        products.forEach(p => p.classList.remove('active'));  

        // Thêm lớp 'active' cho mục đang được nhấp  
        this.classList.add('active');  

        // Lấy danh mục của mục đã nhấp  
        const category = this.getAttribute('data-category');  

        // Hiển thị sản phẩm tương ứng với danh mục đã chọn  
        products.forEach(p => {  
            if (p.getAttribute('data-product-category') === category) {  
                p.classList.add('active'); // Hiển thị sản phẩm tương ứng  
            }  
        });  
    });  
});
document.querySelectorAll('.formhome').forEach(form => {  
        const quantityInput = form.querySelector('.quantity-input');  
        
        form.addEventListener('submit', () => {  
            // Đảm bảo rằng số lượng tối thiểu là 1  
            if (parseInt(quantityInput.value) < 1) {  
                quantityInput.value = 1;  
            }  
        });  
    }); 
    </script>
    