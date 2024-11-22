<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['register'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                if($confirm_password == $password){
                    $data =[
                        'email' => $email,
                        'password' => $password,
                        'role' => 0
                    ];
                    $user = new user();
                    $result = $user->register($data);
                    if($result == true){
                        echo "<script>alert('.$result.')</script>";
                        header('location: index.php?pages=login');
                    } else{
                        echo "<script>alert('.$result.')</script>";
                    }
                } else{
                    echo '<script>alert("Mật khẩu xác nhận không đúng!")</script>';
                }
            }
        }
    ?>
<div class="container mt-5">
    <h5 class="text-center mb-4">Đăng nhập ngay để nhận các ưu đãi độc quyền từ Dự án 1</h5>

    <!-- Tabs for Login and Register -->
    <div class="tab-title">
        <a href="index.php?pages=login">ĐĂNG NHẬP</a>
        <a href="#" class="active">ĐĂNG KÝ</a>
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
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Xác nhận mật khẩu*</label>
                <input type="password" class="form-control" id="password" name='confirm_password' required>

            </div>

            <button type="submit" class="btn btn-dark w-100 mt-3" name='register'>ĐĂNG KÝ</button>
        </form>
    </div>
</div>