<?php   

include_once "model/category.php";  
include_once "model/product.php";
  
switch ($action) {  
    case 'themspyt':  
        $id=$_GET["id"]??"";
        $id_KhachHang = $_SESSION['id_KhachHang'];
        $product = getProductid($id); 


    break;
    case 'spyeuthich':  
        
        if (isset($_SESSION['id_KhachHang'])) {
            $id_KhachHang = $_SESSION['id_KhachHang'];
        } else {
            header("Location: dangnhap"); 
            exit();
        } 
        $id_KhachHang = $_SESSION['id_KhachHang'];
        include_once "views/header.php"; 
        include "views/spyeuthich.php";  
        include_once "views/footer.php";
    break;
    
}