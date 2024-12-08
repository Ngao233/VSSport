
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Đăng nhập</title>  
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/dangnhap.css">
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

</head>
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
      <a href="#"><img src="image/logo.png" alt="" style="width: 155px ;"></a>
      <ul>
        <li><a href="home">TRANG CHỦ</a></li>
        <li><a href="sanpham">SẢN PHẨM</a></li>
        <li><a href="tonghoptt">THÔNG TIN</a></li>
        <li><a href="dangky">ĐĂNG KÝ</a></li>
        <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
      </ul>
      <!-- icon bao gom "shoping" "user" "seach" -->
      <div class="icon">
      <i id="search" style="color: white; font-size: 20px;margin-top:-2px" class="fa-solid fa-magnifying-glass"></i>
        <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="hoso"><i class="fa-solid fa-user"></i></a>
        
      </div>
      <form action="searchome" class="formSearchhome" method="post" style="top:30px">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

      <style>
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
      </style>

    <script>
      document.getElementById('search').addEventListener('click',()=>{
      document.getElementById('searchInput').classList.toggle('show');
     })
    </script>

    </nav>
  </header>
  

  <div class="khungDN">
      <div class="background-image"></div>
      <div class="dangnhap">
      <form method="POST" action="login"> 
        <h1>Đăng nhập</h1>
        <input type="text" name="Email" id="Email" placeholder="Nhập Email">
        <br>
        <input type="password" name="MatKhau" placeholder="Nhập mật khẩu">
        <br>
        <button type="submit"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
        <br>
      </form>
        <p>Đăng nhập bằng cách khác</p>
        <div class="cachDN">
          <button onclick="loginWithGoogle()"><i class="fab fa-google"></i> Đăng nhập bằng Google</button>
          <br>
          <button onclick="loginWithFacebook()"><i class="fab fa-facebook"></i> Đăng nhập bằng Facebook</button>  
        </div>
        

      </div>
    </div>
    </div>
    <?php  
include 'views/footer.php';  
?>  