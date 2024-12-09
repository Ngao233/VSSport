<?php 
//include_once "models/Category.php";
include_once "model/cart.php";

// include_once "models/contact.php";
switch ($action) {
    case 'giohang':
        include "views/header.php";
        include "views/giohang.php";
        include "views/footer.php";
        break; 
        case 'cart_update':
            // Kiểm tra sự tồn tại của giá trị trong $_POST trước khi sử dụng
            if (isset($_POST['id_ChiTietGioHang']) && isset($_POST['SoLuong'])) {
                // Lấy giá trị từ form gửi lên
                $id_ChiTietGioHang = $_POST['id_ChiTietGioHang'];
                $newQuantity = $_POST['SoLuong'];
        
                // Kiểm tra số lượng nhập vào có hợp lệ không
                if ($newQuantity < 1 || $newQuantity > 100) {
                    echo "Số lượng không hợp lệ!";
                    break;
                }
        
                // Gọi hàm để cập nhật số lượng trong giỏ hàng
                $result = updateCartQuantity($id_ChiTietGioHang, $newQuantity, $conn);
        
                // Hiển thị kết quả cập nhật
                echo $result;
        
            } else {
                echo "Dữ liệu không hợp lệ hoặc thiếu thông tin!";
            }
        
            // Bao gồm các tệp để hiển thị lại trang giỏ hàng
            include "views/Header.php";
            include "views/giohang.php"; // Giỏ hàng sau khi cập nhật
            include "views/Footer.php";
            break;
        
            case 'addtocart':
                include "views/addtocart.php";
                break;
            case 'cart_delete':
                if (isset($_POST['id_GioHang'])) {
                    $cartId = $_POST['id_GioHang'];
                    
                    // Gọi hàm xóa sản phẩm
                    $result = deleteCartItem($cartId, $conn);
                    echo $result;
                } else {
                    echo "Dữ liệu không hợp lệ!";
                }
            
                // Bao gồm các file giao diện
                include "views/Header.php";
                include "views/giohang.php";
                include "views/Footer.php";
                break;
        
              

            
        
}