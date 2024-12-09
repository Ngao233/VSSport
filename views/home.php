<?php  
session_start();  
if (isset($_SESSION['id_KhachHang'])) {  
    $id_KhachHang = $_SESSION['id_KhachHang'];  
    
    // Kiểm tra xem có giỏ hàng nào cho khách hàng này không  
    $sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
    $stmt->execute();  
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);  

    // Nếu giỏ hàng không tồn tại, tạo giỏ hàng mới  
    if (!$cart) {  
        $sql = "INSERT INTO giohang (id_KhachHang) VALUES (:id_KhachHang)";  
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':id_KhachHang', $id_KhachHang);  
        $stmt->execute();  

        // Lấy ID của giỏ hàng mới tạo  
        $id_GioHang = $conn->lastInsertId();  
        
        // Trong trường hợp bạn có sản phẩm đã thêm gì đó, bạn có thể tạo chi tiết giỏ hàng ở đây  
        // Ví dụ thêm sản phẩm với id lĩnh vực 1 và số lượng 1  
        $id_SanPham = 1; // Thay thế bằng id sản phẩm thực  
        $soLuong = 1; // Số lượng bất kỳ bạn muốn thêm  
        
        // Thêm sản phẩm vào chi tiết giỏ hàng  
        $sql = "INSERT INTO chitietgiohang (id_GioHang, id_SanPham, SoLuong) VALUES (:id_GioHang, :id_SanPham, :SoLuong)";  
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':id_GioHang', $id_GioHang);  
        $stmt->bindParam(':id_SanPham', $id_SanPham);  
        $stmt->bindParam(':SoLuong', $soLuong);  
        $stmt->execute();  
    } else {  
        $id_GioHang = $cart['id_GioHang']; // Lấy ID giỏ hàng nếu đã tồn tại  
    }  

    // Truy vấn sản phẩm trong giỏ hàng nếu cần  
    $sql = "SELECT c.*, s.TenSanPham FROM chitietgiohang c JOIN sanpham s ON c.id_SanPham = s.id_SanPham WHERE c.id_GioHang = :id_GioHang";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);  
    $stmt->execute();  
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);  

} else {  
    $id_KhachHang = null;  
    $cartItems = [];  
}  
?>

<section class="banner">
            <div class="slides" id="slides">
                <div class="slide"><img src="public/image/banner1.png" alt="Hình ảnh 1"></div>
                <div class="slide"><img src="public/image/banner2.png" alt="Hình ảnh 2"></div>
        </section>
    </header>

    <div class="title-categogy">
        <h2>Danh Mục Sản Phẩm</h2>
    </div>
    <section class="Category">

        <div class="block-top-left">
            <a href="searchgiaythethao">
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
            <a href="cac/<?=$productItem['id_SanPham']?>">
            <img src="public/image/<?=$productItem['HinhAnh']?>" alt="">
                
            <a href="themspyt<?=$productItem['id_SanPham']?>">
            <div class="circle">  
                <i class="fa-solid fa-heart"></i>  
            </div> 
            </a> 

            <div>
                <p class="p-product-sale-name"><?=$productItem['TenSanPham']?></p>
                <div class="p-product-sale">
                    <p class="price-sale-home"><?= number_format($productItem['Gia'], 0, ',', '.'); ?>đ</p> <!-- Giá ban đầu -->
                    <p class="price-down-home"><?= number_format($saugiam, 0, ',', '.'); ?>đ</p> <!-- Giá sau giảm -->
                </div>
                <form id="addToCartForm" class="formhome" onsubmit="return false;">  
                <input type="hidden" name="id_SanPham" value="<?=$productItem['id_SanPham']?>">  
                <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 50px; text-align: center;">  
                <button class="product-home-one-button" id="btn" type="button" onclick="addToCart('<?=$productItem['id_SanPham']?>', this)">  
                    Thêm vào giỏ hàng  
                </button>  
                </form>


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
                <a href="searchaobongda"> Áo Bóng Đá</a>
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
        
        <?php foreach ($product as $product) {
            $giagiam = $product['Gia'] * ($product['GiamGia'] / 100);
            $saugiam = $product['Gia'] - $giagiam;
             ?>  
            
    <div class="product-home-one" data-product-category="<?=$product["id_DanhMuc"]?>">  
        <a href="cac/<?=$product['id_SanPham']?>" class="product-home-one-link">  
            <img src="public/image/<?=$product["HinhAnh"]?>" alt="" class="product-home-one-public/image" />  
        </a>  
        <a href="themspyt/<?=$product['id_SanPham']?>">
        <div class="circle">  
                <i class="fa-solid fa-heart"></i>  
        </div> 
        
        </a>
        <div class="product-home-one-info">   
        <form id="addToCartForm" class="formhome" onsubmit="return false;">  
    <input type="hidden" name="id_SanPham" value="<?=$product['id_SanPham']?>">  
    <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 50px; text-align: center;">  
    <button class="product-home-one-button" id="btn" type="button" onclick="addToCart('<?=$product['id_SanPham']?>', this)">  
        Thêm vào giỏ hàng  
    </button>  
</form>
        </div>  
        <p class="product-home-one-name"><?=$product["TenSanPham"]?></p>  
        <p class="product-home-one-price" style="font-size:12px; color:gray;" ><?=$product["Gia"]?> đ</p>  
        <p class="price-down-home" style="margin-top:-1px"><?= number_format($saugiam, 0, ',', '.'); ?>đ</p>
        <p style="position: absolute; top: 10px; left: 5px; background-color:rgba(255, 0, 0, 0.5); border-radius:5px ; padding:5px;">   - <?=$product["GiamGia"]?>%  </p>
    </div>  
    
<?php } ?>
           
        </div>
    </section>
    <div class="News-home">
        <h2 class="">Tin Tức Mới</h2>
        <a class="button-tintuc" href="tonghoptt" class="btn-xem-them">Xem thêm</a>
    </div>
    <section>
    <div class="tinTuc">
    <?php foreach ($tintuc as $tintuc2): ?>
        <div class="oTinTuc">
            <a href="tintuc/<?=$tintuc2['id_TinTuc']?>">
                <img src="public/image/<?=$tintuc2['HinhAnh']?>" alt="">
                <p><?=$tintuc2['TieuDe']?></p>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
    </section>
    
    <style>
        .button-tintuc{
    float: right;
    margin-right: 11%;
    margin-bottom: 20px;
    padding: 10px;
    border: none;
    background-color: #FFA031;
    color: black;
    font-family: 'Montserrat', sans-serif;
    border-radius: 10px;
    font-weight: bold;
    }
    </style>

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
        categoriProductH.forEach(l => l.classList.remove('active'));  
        products.forEach(p => p.classList.remove('active'));  
        this.classList.add('active');  
        const category = this.getAttribute('data-category');  
        products.forEach(p => {  
            if (p.getAttribute('data-product-category') === category) {  
                p.classList.add('active'); 
            }  
        });  
    });  
});
document.querySelectorAll('.formhome').forEach(form => {  
        const quantityInput = form.querySelector('.quantity-input');  
        
        form.addEventListener('submit', () => {  
            
            if (parseInt(quantityInput.value) < 1) {  
                quantityInput.value = 1;  
            }  
        });  
    }); 
    function addToCart(idSanPham, button) {  
    const form = button.closest('form');   
    const quantity = form.querySelector('input[name="quantity"]').value;   
    const formData = new FormData();  
    formData.append('id_SanPham', idSanPham);  
    formData.append('quantity', quantity);  

    // Sử dụng button mà bạn đã nhấn thay vì lấy lại từ id  
    const btn = button; // Sử dụng button được truyền vào  

    fetch('addtocart', {  
        method: 'POST',  
        body: formData  
    })  
    .then(response => response.json()) 
    .then(data => {  
        console.log(data);  
        updateCartDisplay(data.cartDetails);   
        btn.innerText = "Đã thêm vào giỏ hàng"; // Thay đổi văn bản  
        btn.disabled = true; // Vô hiệu hóa button để tránh nhấn nhiều lần  
        btn.style.backgroundColor = "#4CAF50"; // Thay đổi màu nền thành màu xanh  
        btn.style.color = "white"; // Thay đổi màu chữ thành trắng  
    })  
    .catch(error => {  
        console.error('Error:', error);  
    });  
}
document.getElementById('search').addEventListener('click',()=>{
  document.getElementById('searchInput').classList.toggle('show');
})
    </script>