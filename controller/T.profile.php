<?php  
include_once  "model/login.php";
session_start(); 
switch ($action) {  
    case 'profile':
            
            if (Islogin()) {  
                $user = UserLogin($_SESSION['id_KhachHang']);  
                header("Location: $base_url/profile");
            } else {  
                header("Location: $base_url/dangnhap");
                exit();  }
           
            break;
        include_once "views/footer.php";
        break;
        }
      