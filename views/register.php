<?php
include 'views/header.php';
?>
<div class="khungDN">  
    <div class="background-image"></div>  
    <div class="dangnhap">  
        <h2>Đăng ký</h2>  
        <form id="registerForm" action="register.php" method="POST" onsubmit="return validateForm()">  
            <input type="text" name="username" id="username" placeholder="Nhập tên tài khoản" required>  
            <br>  
            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>  
            <br>  
            <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu" required>  
            <br>  
            <input type="number" name="age" id="age" placeholder="Nhập tuổi" required min="1">  
            <br>  
            <button type="submit"><i class="fas fa-sign-in-alt"></i> Đăng ký</button>  
            <br>  
            <p>Đăng ký bằng cách khác</p>  
            <div class="cachDN">  
                <button type="button" onclick="loginWithGoogle()"><i class="fab fa-google"></i> Đăng ký bằng Google</button>  
                <br>  
                <button type="button" onclick="loginWithFacebook()"><i class="fab fa-facebook"></i> Đăng ký bằng Facebook</button>  
            </div>  
        </form>  
    </div>  
    
</div>


<?php
include 'views/footer.php';
?>