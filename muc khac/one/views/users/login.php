<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new user();
            $result = $user->login($email, $password); 
            if($result == true){
                header('location: index.php');
            }else{
                echo '<script>alert( "Tài khoản hoặc mật khẩu không đúng!")</script>';
            }
            echo $result;
        }
    }
?>
<div class="container mt-5">
    <h5 class="text-center mb-4">Đăng nhập ngay để nhận các ưu đãi độc quyền từ Dự án 1</h5>

    <!-- Tabs for Login and Register -->
    <div class="tab-title">
        <a href="#" class="active">ĐĂNG NHẬP</a>
        <a href="index.php?pages=register">ĐĂNG KÝ</a>
    </div>

    <!-- Login Form -->
    <div class="login-box mt-4 mb-5">
        <form method='post'>
            <div class="mb-3 position-relative">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name='email' required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Mật khẩu *</label>
                <input type="password" class="form-control" id="password" name='password' required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="#" class="text-decoration-none">Quên mật khẩu?</a>
            </div>
            <button type="submit" class="btn btn-dark w-100 mt-3" name='login'>ĐĂNG NHẬP</button>
        </form>
    </div>
</div>