<?php   

include_once "model/product.php";  
include_once "model/login.php";  

switch ($action) {   
    case 'dangnhap': 
        include "views/dangnhap.php";  
        break;  
    case 'login':
        //dùng lệnh đăng nhập
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'] ?? '';
            $matKhau = $_POST['MatKhau'] ?? '';
            
            // Kiểm tra email và mật khẩu không được rỗng
            if (empty($email) || empty($matKhau)) {
                echo "Vui lòng nhập đầy đủ email và mật khẩu.";
                exit();
            }
            if (kiemTraDangNhap($conn, $email, $matKhau)) {
                header("Location: hoso"); // Chuyển hướng thành công
                exit();
            } else {
                echo "Mật khẩu không chính xác hoặc tài khoản không tồn tại."; // Thông báo lỗi

                }
            }
            
            break;
        case 'dangxuat':
            Logout();
            break;

    
}