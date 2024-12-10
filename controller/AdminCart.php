<?php 

include_once "model/cart.php";


switch ($action) {
    case 'giohang':
        include "views/header.php";
        include "views/giohang.php";
        include "views/footer.php";
        break; 
        case 'cart_update':

            if (isset($_POST['id_ChiTietGioHang']) && isset($_POST['SoLuong'])) {

                $id_ChiTietGioHang = $_POST['id_ChiTietGioHang'];
                $newQuantity = $_POST['SoLuong'];
        

                if ($newQuantity < 1 || $newQuantity > 100) {
                    echo "Số lượng không hợp lệ!";
                    break;
                }

                $result = updateCartQuantity($id_ChiTietGioHang, $newQuantity, $conn);

                echo $result;
        
            }

            include "views/Header.php";
            include "views/giohang.php"; 
            include "views/Footer.php";
            break;
        
            case 'addtocart':
                include "views/addtocart.php";
                break;
            case 'cart_delete':
                if (isset($_POST['id_ChiTietGioHang'])) {
                    $id_ChiTietGioHang = $_POST['id_ChiTietGioHang'];
            

                    $sql = "DELETE FROM chitietgiohang WHERE id_ChiTietGioHang = :id_ChiTietGioHang";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id_ChiTietGioHang', $id_ChiTietGioHang, PDO::PARAM_INT);
            

                    if ($stmt->execute()) {
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    } else {
                        echo "Lỗi khi xóa sản phẩm!";
                    }
                } else {
                    echo "Dữ liệu không hợp lệ!";
                }
                break;
            

                include "views/Header.php";
                include "views/giohang.php";
                include "views/Footer.php";
                break;
        
              

            
        
}