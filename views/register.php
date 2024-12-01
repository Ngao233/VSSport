<?php  
include 'views/header.php';  
// Gọi hàm xử lý đăng ký  
?>  

<div class="khungDN">  
    <div class="background-image"></div>  
    <div class="dangnhap">  
        <h1>Đăng ký</h1>         
        <form action="<?=$base_url?>/postuser" method="post" >  
            <input type="text" name="Ho" id="username" placeholder="Nhập họ của bạn" value="<?=$_POST["Ho"] ?? ""?>" required>  
            <br>
            <input type="text" name="Ten" id="username" placeholder="Nhập tên của bạn" value="<?=$_POST["Ten"] ?? ""?>" required>  
            <br>  
            <input type="password" name="MatKhau" id="password" placeholder="Nhập mật khẩu"  value="<?=$_POST["MatKhau"] ?? ""?>"  required>  
            <br>
            <input type="text" name="Email" id="repassword" placeholder="Nhập Email "  value="<?=$_POST["Email"] ?? ""?>"  required>  
            <br>  
            <input type="text" name="Sdt" id="age" placeholder="Nhập số điện thoại "  value="<?=$_POST["Sdt"] ?? ""?>"  required>  
            <br>
            <button><i class="fas fa-sign-in-alt"></i> Đăng ký</button>  
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