<!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Chủ</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>
<style>
     .formhome input{
                display:none;
            }
            .formSearchhome{
    position: absolute;
    right: 180px;
    top: 35px;
        }
        .searchhome {
            padding: 8px !important;
            border: none;
            border-radius: 5px;
            width: 180px;
            display: none;
            transition: transform 1s ease;
            transform: translateX(100%);
        }
        .searchhome.show {  
            display: block; 
            transform: translateX(0);  
        }
                    body h2 {
                        font-family: 'Montserrat', sans-serif;
                        margin-left: 10%;
                        margin-top: 40px;
                    }
            .duy{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 10px;
            grid-template-columns: 49% 49%;
            grid-template-rows: 540px;
            margin-right: 10%;
        }

        .time, .food{  
            display: block;  
            width: 100%;  
            margin: 10px 0;  
            padding: 20px 25px;  
            background-color: rgb(231, 231, 231);  
            color: black;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;        
            font-weight: bold;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            
        }  
        .time.active {  
            background-color: #FFA031; /* Màu đỏ */  
        }
        .product-home-one-button {  
            display: inline-block;
            margin-top: 30px;  
            margin-right: 25%;  
            margin-left: 25%;  
            padding: 15px;  
            color: black;  
            border: 1px solid;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 50%;  
            font-weight: bold; 
            font-size:16px;
            font-family: 'Montserrat', sans-serif; 
        }  

        .add-to-cart {  
            background-color: #ffffff; /* Màu cho nút "Thêm giỏ hàng" */  
            font-family: 'Montserrat', sans-serif;
        
        }  

        .buy-now {  
            background-color: #FFA031; /* Màu cho nút "Mua Ngay" */  
            font-family: 'Montserrat', sans-serif;
        }
            
        
        .size {  
            width:18%;
            margin:4px;  
            padding: 8px 13px;  
            background-color: white;  
            color: black;  
            border: 1px solid;  
            border-radius: 5px;  
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .size.active {  
            background-color: #FFA031;
        }
        .time i{margin-right:5px; }
        .food i{margin-right:5px;}
        .nham{border: 1px solid;
        border-radius: 5px;
        margin-right: 5px;
        }
        .ngu{color:red;
        font-size: 20px;
        font-family: 'Montserrat', sans-serif;}
        .ngum{font-size: 20px;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif;}
        #hoa{margin-left: 10%;}
        .enzo{
            display: grid;
            grid-template-columns: repeat(4,1fr);
            width: 80%;
            margin-left: 17%;
            gap: 10px;
            grid-template-columns: 20% 20% 20% 20%;
            grid-template-rows: 300px;
            margin-right: 10%;
        }
        .enzo div{background-color: #FFA500;}
        .weywie{
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }
        .hhhhh{font-family: 'Montserrat', sans-serif;}
        .DI div{background-color: white;
        }
        .DI{display: grid;
            grid-template-columns: repeat(2,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 10px;
            grid-template-columns: 49% 49%;
            grid-template-rows: 300px;
            margin-right: 10%;}
        .DI p{margin-left: 10px;
            font-family: 'Montserrat', sans-serif;}
        .min{display: grid;
            grid-template-columns: repeat(1,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 10px;
            grid-template-columns: 100%;
            grid-template-rows: 300px;
            margin-right: 10%;
        margin-bottom: 20px;
        font-family: 'Montserrat', sans-serif;

        }

        .enzont {  
            width: 100%;      
            background-color: #ffffff;  
            margin-bottom: 12px;
            border-radius: 5px;
        }  

        .enzont h1 {  
            text-align: center;  
            color: #007bff;  
        }  
        .enzont h2{
            margin: 10px;

        }
        .comment {  
            border-bottom: 1px solid #ccc;  
            padding: 10px 0;  
            margin-left: 10px;
        }  

        .comment strong {  
            color: #007bff;  
        }  

        .comment-section {  
            margin-top: 20px;  
        }  

        textarea {  
            width: 97%;  
            margin: 12px;
            border: 1px solid #000000;  
            border-radius: 5px;  
            margin-bottom: 10px;  
            font-size: 16px;  
            resize: none;  
        }  

        .enzont button {  
            background-color: #007bff;  
            color: white;  
            padding: 10px 15px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            font-size: 16px;  
            transition: background-color 0.3s;  
            margin-left: 10px;
        }  

        .enzont button:hover {  
            background-color: #0056b3;  
        }  

        .new-comments {  
            margin-top: 20px;  
            margin-bottom: 20px;
        }
        /*muc san pham*/
        .sanpham-moi{
            font-family: 'Montserrat', sans-serif;
            width: 100%;
            padding: 0;
            margin: 0;
        
        }
        .sp-moi{
            width: 100%;
            height: auto;
            display: flex;
            position: relative;
            justify-items: center;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin-top: -5%;
            margin-bottom: 5%;

        }
        .sanpham-moi .sp-moi .khoisp{
            text-align: center;
            width: 15%;
            padding: 5% 10px 0 10px;
            margin-top: 0;
            margin-bottom: 0;
            
        }
        .sanpham-moi .sp-moi .khoisp img{
            width: 100%;
            padding: 10px 0 10px;
            
        }
        .sanpham-moi .sp-moi .khoisp p{
            margin: 10px 0;
        }
        .sanpham-moi .sp-moi .khoisp h4{
            width: 100%;
            text-align: center;
            color: #888;
            padding: 0 10px 0 10px ;
            margin: 15px 0;
        }
        .sanpham-moi .sp-moi .khoisp #nutthem{
            border-radius: 20px;
            color: white;
            background-color: orange;
            border: none;
            justify-items: center;
            padding: 10px;
            margin-left: 20px;    
        }

        /* menu */

        header{
            display: flex;
            flex-direction: column;
            font-family:'Poppins', sans-serif;
            
        }

        /* menu chinh */
        .menu-two {
            background-color: #FFA031;
            display: flex;
            flex-direction: Row;
            justify-content: space-between;
            height: 50px;
        }
        .menu-two ul{
            font-weight: bold;
            font-size: 14px;
            padding: 0;
            display: flex;
            flex-direction: Row;
            color: white;
        }
        .menu-two ul li{
            list-style-type: none;
            margin-right: 20px;
            letter-spacing: 2px;
            color: white;
        }
        .menu-two ul li a{
            color: white;
            text-decoration: none;
        }
        .menu-two img{
            margin-left: 25px;
        }
        /* menu phu */
        .menu-one ul{
            margin: inherit;
            justify-content: space-between;
            font-size: 12px;
            display: flex;
            flex-direction: Row;
            color: white ;

        }
        .menu-one{
            background-color: #5c3911;
        }
        .menu-one ul div{
            display: flex;
            flex-direction: Row;
            
        }
        .menu-one ul li {
            list-style-type: none;
            margin-right: 20px;
            letter-spacing: 2px;
        }
        .menu-one ul li a{
            color: white;
            text-decoration: none;
        }   
        /* Icon (Giỏ hàng, người dùng, tìm kiếm) */
        .icon{
            display: flex;
            flex-direction: row;
            align-items: Center;
            margin-right: 4%;
        }

        .icon form {
            display: flex;
            margin-right: 20px;
        }

        .icon input[type="text"] {
            padding: 8px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .icon button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .icon a {
            margin-left: 15px;
            color: white;
            font-size: 20px;
            transition: color 0.3s;
        }
        
</style>
<body>
        <header>
            <!-- menu phu -->
            <nav class="menu-one">
                <ul>
                    <li><a href="home">VSSport.vn</a></li>
                    <div>
                        <li><a href="#">Giúp đỡ</a></li>
                        <li><a href="#">Ngôn ngữ</a></li>
                    </div>
                </ul>
            </nav>
            <!-- menu chinh -->
            <nav class="menu-two">
                <a href="home"><img src="../public/image/logo.png" alt="" style="width: 155px ;"></a>

                <ul>
                <li><a href="<?= $base_url ?>/home">TRANG CHỦ</a></li>
                <li><a href="<?= $base_url ?>/tonghoptt">Thông Tin</a></li>
                <li><a href="<?= $base_url ?>/dangky">ĐĂNG KÝ</a></li>
                <li><a href="<?= $base_url ?>/dangnhap">ĐĂNG NHẬP</a></li>
                </ul>
                <!-- icon bao gom "shoping" "user" "seach" -->
                <div class="icon">

                <i id="search" style="color: white; font-size: 20px;" class="fa-solid fa-magnifying-glass"></i>
                    <a href="<?= $base_url ?>/giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="<?= $base_url ?>/hoso"><i class="fa-solid fa-user"></i></a>
                </div>
                <form action="searchome" class="formSearchhome" method="post">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>
            </nav>
            </section>
        </header>
<section class="duy">  
    <div>
    <img src="../public/image/<?=$product['HinhAnh']?>" alt="<?=$product['HinhAnh']?>" id="hoa" onmouseover="mouseover()" onmouseout="mouseout()" width="540px"/>
</div> 
    <div>
    <h1 class="hhhhh"><?=$product['TenSanPham']?></h1>  
    <hr>  

    <p class="ngum">Giá Sản Phẩm</p>  
    <p class="ngu"><?=$product['Gia']?> đ</p>  
    <button class="time"><i class="fa-solid fa-heart"></i>Thêm vào yêu thích</button>  
    <a href="#"><button class="food"><i class="fa-solid fa-pen-to-square"></i>Tùy chỉnh</button></a>
    <p class="p-product-sale-name">Chọn kích thước:</p>  
    <button class="size">S</button>  
    <button class="size">M</button>  
    <button class="size">L</button>  
    <button class="size">XL</button>  
    <button class="size">XXL</button>  
    
    <form id="addToCartForm" class="formhome" onsubmit="return false;">  
    <input type="hidden" name="id_SanPham" value="<?=$product['id_SanPham']?>">  
    <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 50px; text-align: center;">  
    <button class="product-home-one-button" id="btn" type="button" onclick="addToCart('<?=$product['id_SanPham']?>', this)">  
        Thêm vào giỏ hàng  
    </button>  
</form> 
    
</div>
</section>  
<section class="DI">
<div><h2>Chi Tiết Sản Phẩm</h2>
<p>Tên Sản Phẩm: <?=$productdetail['TenSanPham']?><br> 
   Giá: <?=$productdetail['Gia']?><br>
   Màu Sắc: <?=$productdetail['MauSac']?><br>
   Kích Thước: <?=$productdetail['KichThuoc']?><br>
   Số Lượng: <?=$product['SoLuong']?><br>
    -Gửi từ: TP. Hồ Chí Minh</p>
</div>
<div><h2>Mô tả Sản Phẩm</h2>
<p><?=$productdetail['MoTa']?></p>
</div>
        </section>
<script>  
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
</script>