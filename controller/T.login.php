<?php   

include_once "model/product.php";  
include_once "model/login.php";  

// Thay đổi để lấy giá trị từ URL  
switch ($action) {   
     
        
    case 'login':  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $email = $_POST['Email'] ?? '';  
            $matKhau = $_POST['MatKhau'] ?? '';  
            $loginSuccess = login($email, $matKhau);   
        
            if ($loginSuccess) {  
                $product = getProduct();  
                header("Location: $base_url/");   
                exit();  
            }  
        }  
        break;  
        case 'dangnhap':
            include 'views/dangnhap.php';

    // case 'profile':  
    //     include "views/profile.php";   
    //     break;  

    // case 'logout':  
    //     break;  

    default:   
        // Hành động mặc định có thể được xử lý ở đây  
        break;  
}