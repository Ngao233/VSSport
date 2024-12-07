<?php  
session_start();   
if (isset($_SESSION['id_KhachHang'])) {  
    $id_KhachHang = $_SESSION['id_KhachHang']; 

$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session
// Truy vấn giỏ hàng của khách hàng
$sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $id_KhachHang = null;   
}

?> 
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
            grid-template-rows: 300px;
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
        .minh {  
            display: inline-block;  
            margin-right: 10px;  
            margin-left: 15px;  
            padding: 10px;  
            color: black;  
            border: 1px solid;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 45%;  
            font-weight: bold; 
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

        /**/

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
        .product-sale-home{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 27px;
            grid-template-columns: 18% 18% 18% 18% 18%;
            grid-template-rows: 350px;
            margin-right: 10%;
            text-align: center;
            font-family: 'Montserrat', sans-serif;   
            
        }
        .product-sale-home div{
            border-radius: 5px;
            background-color: #ffffff;
            
        }

        .product-sale-home .pro-sale img{
            width: 100%;
            margin-top: 15px;

        }


        .pro-sale {
            position: relative;
            border:solid 1px #FFA031;
            box-shadow: 1px 0px 0px 0px #FFA031,   
                    -1px 0px 0px 0px #FFA031,  
                        0px 1px 0px 0px #FFA031,   
                        0px -1px 0px 0px #FFA031;
        }
        .pro-sale .circle {
            border-radius: 50px;
        }
        .circle i{
            padding: 13px;
            color:#a8a8a8;
        }
        .circle{
            background-color: white;
            position: absolute;
            border-radius: 50px;
            top: 5px;
            right: 6px;
            border:solid 1px #888;
        }
        .circle :hover{
            background-color: #FFA031;
            border-radius: 50px;
            color: white;
            border:solid 1px white;
        }
        .p-product-sale{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            margin-top: -20px;
            width: 80%;
            margin-left: 10%;
        }
        .p-product-sale .price-sale-home{
            text-decoration: line-through;  
            color: #c9c7c7;
            font-size: 12px;
            margin-top: 19px;
        }
        .pro-sale button{
            background-color: #ff9f313e;
            padding: 8px;
            margin-top: -20px;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif; 
            font-weight: bold;
            color: #FFA031;
            border: none;
        }
        .pro-sale button:hover{
            background-color: #ff9f31;
            font-family: 'Montserrat', sans-serif; 
            font-weight: bold;
            color: #ffffff;
            border: none;
        }

        .price-down-home{
            color: red;
            font-weight: bold;
            font-size: 16px;
        }
</style>
    </head>
    
    <body>
        <header>
            <!-- menu phu -->
            <nav class="menu-one">
                <ul>
                    <li><a href="#">VSSport.vn</a></li>
                    <div>
                        <li><a href="#">Giúp đỡ</a></li>
                        <li><a href="#">Ngôn ngữ</a></li>
                    </div>
                </ul>
            </nav>
            <!-- menu chinh -->
            <nav class="menu-two">
                <a href="#"><img src="public/image/logo.png" alt="" style="width: 155px ;"></a>
                <ul>
                    <li><a href="#">TRANG CHỦ</a></li>
                    <li><a href="views/sanpham.html">SẢN PHẨM</a></li>
                    <li><a href="#">THÔNG TIN</a></li>
                    <li><a href="views/dangky.html">ĐĂNG KÝ</a></li>
                    <li><a href="views/dangnhap.html">ĐĂNG NHẬP</a></li>
                </ul>
                <!-- icon bao gom "shoping" "user" "seach" -->
                <div class="icon">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-user"></i></a>
                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
    
            </nav>
            </section>
        </header><br>
        <section class="duy">
            <div>
              <body onload="loadImgs()">
                  <div><img src="../public/image/<?=$product['HinhAnh']?>" alt ="<?=$product['HinhAnh']?>" id="hoa" onmouseover="mouseover()" onmouseout="mouseout()" width="540px"/></div>
            </div>
            <div><h1 class="hhhhh"><span><?=$product['TenSanPham']?></span></h1>
                <hr>
                <div >
                    <img src="../public/image/pic-0.jpg"class="nham" width="70px" onclick="showimage(0)">
                    <img src="../public/image/pic-1.jpg"class="nham" width="70px" onclick="showimage(1)">
                    <img src="../public/image/pic-2.jpg"class="nham" width="70px" onclick="showimage(2)">
                    <img src="../public/image/pic-3.jpg"class="nham" width="70px" onclick="showimage(3)">
                  </div>
                  
                  
                  
                   
                   <script>
                   var imgArr = [];
                    var curIndex = 0;
                    
                    function loadImgs(){
                      for (let i=0; i<=4; i++ ){
                        imgArr[i] = new Image();
                        imgArr[i].src = "public/image/pic-" + i + ".jpg";
                      }
                    }
                    function showimage(i){
                      document.getElementById("hoa").src = imgArr[i].src;
                      console.log(document.getElementById("hoa").src);
                    }
                    </script>
                  <p class="ngum">Giá Sản Phẩm</p><p class="ngu"><?=$product['Gia']?> đ</p>
                <button class="time" ><i class="fa-solid fa-heart"></i>Thêm vào yêu thích</button>  
                <script>  
                     
                    document.querySelector('.time').addEventListener('click', function() {  
                        this.classList.toggle('active'); // Thay đổi trạng thái của lớp 'active'  
                        if (this.classList.contains('active')) {  
                            this.textContent = 'Đã thêm vào yêu thích'; // Thay đổi chữ trên nút  
                        } else {  
                            this.textContent = 'Thêm vào yêu thích'; // Trả lại chữ cũ  
                        }  
                    });  
                </script>  
                <a href="#"><button class="food"><i class="fa-solid fa-pen-to-square"></i>Tùy chỉnh</button></a>  
                <div class="size-selection">  
                    <p class="p-product-sale-name">Chọn kích thước:</p>  
                    <button class="size">S</button>  
                    <button class="size">M</button>  
                    <button class="size">L</button>  
                    <button class="size">XL</button>  
                    <button class="size">XXL</button>  
                </div> <br>
                <script>  
                    const sizeButtons = document.querySelectorAll('.size');  
                
                    sizeButtons.forEach(button => {  
                        button.addEventListener('click', function() {  
                            // Xóa lớp 'active' khỏi tất cả các nút  
                            sizeButtons.forEach(btn => btn.classList.remove('active'));  
                            // Thêm lớp 'active' vào nút đã nhấp  
                            this.classList.add('active');  
                        });  
                    });  
                </script>  
                <button class="minh add-to-cart">Thêm giỏ hàng</button>  
<a href="#"><button class="minh buy-now">Mua Ngay</button></a>  
                </div>  
                 </body>
            </div>
        </section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 class="weywie">Sản phẩm tương tự</h1>
        <section class="product-sale-home">
            <div class="pro-sale">
                <img src="../public/image/mc-chinh.webp" alt="">
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
                <img src="../public/image/mc-chinh.webp" alt="">
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
                <img src="../public/image/mc-chinh.webp" alt="">
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
                <img src="../public/image/mc-chinh.webp" alt="">
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
                <img src="../public/image/mc-chinh.webp" alt="">
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
        </section><br><br>
        <section class="DI">
<div><h2>Chi Tiết Sản Phẩm</h2>
<p>Tên Sản Phẩm: <?=$product['TenSanPham']?><br> 
   Giá: <?=$product['Gia']?><br>
   Màu Sắc: <?=$product['MauSac']?><br>
   Kích Thước: <?=$product['KichThuoc']?><br>
   Số Lượng: <?=$product['SoLuong']?><br>
    -Gửi từ: TP. Hồ Chí Minh</p>
</div>
<div><h2>Mô tả Sản Phẩm</h2>
<p><?=$product['MoTa']?></p>
</div>
        </section><br><br><br><br>
<section class="min">
    <div>
        <div class="enzont">  
            <h1>Bình Luận</h1>  
            <div class="comment-section">  
                <h2>Viết bình luận</h2>  
                <textarea id="commentInput" rows="4" placeholder="Nhập bình luận của bạn..."></textarea><br>  
                <button onclick="addComment()">Gửi</button>  
            </div>  
    
            <div class="new-comments" id="commentSection"></div>  
        </div>  
    
        <script>  
            function addComment() {  
                var commentText = document.getElementById('commentInput').value;  
                if (commentText) {  
                    var commentSection = document.getElementById('commentSection');  
                    var newComment = document.createElement('div');  
                    newComment.classList.add('comment');  
                    newComment.innerHTML = `<strong>Bạn:</strong><p>${commentText}</p>`;  
                    commentSection.appendChild(newComment);  
                    document.getElementById('commentInput').value = ''; // Clear input  
                } else {  
                    alert('Vui lòng nhập bình luận!');  
                }  
            }  
        </script>  
    </div>
</section>
    </body>
</html>