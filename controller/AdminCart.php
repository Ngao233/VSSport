<?php 
//include_once "models/Category.php";
include_once "model/cart.php";
// include_once "models/contact.php";
switch ($action) {
    case 'giohang':
        include "admin/HeaderAdmin.php";
        include "views/giohang.php";
        include "admin/FooterAdmin.php";
        break; 
        case 'cart_update':
            // Kiểm tra sự tồn tại của giá trị trong $_POST trước khi sử dụng
            if (isset($_POST['id_GioHang']) && isset($_POST['SoLuong'])) {
                // Lấy giá trị từ form gửi lên
                $cartId = $_POST['id_GioHang'];
                $newQuantity = $_POST['SoLuong'];  
        
                 
                  
                    $result = updateCartQuantity($cartId, $newQuantity, $conn);
        
                    // Hiển thị kết quả cập nhật
                    echo $result;
                
            } else {
                echo "Dữ liệu không hợp lệ hoặc thiếu thông tin!";
            }
        
            // Bao gồm các file giao diện
            include "admin/HeaderAdmin.php";
            include "views/giohang.php";
            include "admin/FooterAdmin.php";
            break;
            case 'addtocart':
            include 'model/addtocart.php';
            break;
              

            
        
}