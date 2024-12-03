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
                $loginSuccess = login($email, $matKhau); 
            
                if ($loginSuccess) {  
                    $product = getProduct();  
                    header("Location: $base_url/"); 
                    exit();  
                }  
            }  
            
            break;

        // case 'profile':
        //     include "views/profile.php"; 
        //     break;
        // case 'logout':
        // break;
        

    
}