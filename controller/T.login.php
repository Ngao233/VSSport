<?php   

include_once "model/product.php";  
include_once "model/login.php";  

switch ($action) {   
    case 'dangnhap': 
        include "views/dangnhap.php";  
        break;  
    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'] ?? '';
            $matKhau = $_POST['MatKhau'] ?? '';
            

            if (empty($email) || empty($matKhau)) {
                echo "Vui lòng nhập đầy đủ email và mật khẩu.";
                exit();
            }
            if (kiemTraDangNhap($conn, $email, $matKhau)) {
                header("Location: hoso");
                exit();
            } else {
                echo "Mật khẩu không chính xác hoặc tài khoản không tồn tại."; 

                }
            }
            
            break;
        case 'dangxuat':
            Logout();
            break;

    
}