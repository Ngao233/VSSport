
<?php  
include 'views/header.php';  
// Gọi hàm xử lý đăng ký  
?>  
<div class="khungDN">
      <div class="background-image"></div>
      <div class="dangnhap">
      <form method="POST" action="dangnhap"> 
        <h1>Đăng nhập</h1>
        <input type="text" name="Email" id="Email" placeholder="Nhập Email">
        <br>
        <input type="MatKhau" name="MatKhau" placeholder="Nhập mật khẩu">
        <br>
        <button onclick="login()"><i class="fas fa-sign-in-alt"></i> Đăng ký</button>
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
    <?php  
include 'views/footer.php';  
// Gọi hàm xử lý đăng ký  
?>  