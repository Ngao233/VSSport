<?php   
include_once "model/category.php";  
include_once "model/product.php";  
include_once "model/login.php";  

switch ($action) {   
    case 'dangnhap':  
        include "views/dangnhap.php";  
        break;  
        case 'login':
            $product = getProduct();  
            header("Location: $base_url/"); 
            break;

    case 'profile':  
        if (Islogin()) {  
            $user = UserLogin($_SESSION['id_KhachHang']);  
            header("Location: $base_url/profile");  
        } else {  
            header("Location: $base_url/dangnhap");  
            exit();  
        }  
        break;  
        

    include_once "views/footer.php";  
    break; 
}