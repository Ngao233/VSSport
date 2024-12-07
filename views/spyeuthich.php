
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/hoso.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
     .product-sale-home{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 27px;
            grid-template-columns: 18% 18% 18% 18% 18%;
            grid-template-rows: 360px;
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
            color:white;
            background-color: #FFA031;
            border-radius: 50px;
        }
        .circle{
            background-color: #FFA031;
            position: absolute;
            border-radius: 50px;
            top: 5px;
            right: 6px;
            border:solid 1px #FFA031;
        }
        .circle :hover{
            background-color: white;
            border-radius: 50px;
            color: #a8a8a8;
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
        <li><a href="home">TRANG CHỦ</a></li>
        <li><a href="sanpham.html">SẢN PHẨM</a></li>
        <li><a href="#">THÔNG TIN</a></li>
        <li><a href="register">ĐĂNG KÝ</a></li>
        <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
      </ul>
      <!-- icon bao gom "shoping" "user" "seach" -->
      <div class="icon">
        <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="#"><i class="fa-solid fa-user"></i></a>
      </div>
      
    </nav>
  </header>
<!-- Form đăng nhập-->
<h1 class="weywie">Sản phẩm yêu thích</h1>
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
</section>
         
    
    


<!-- Footer-->

    