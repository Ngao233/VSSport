<?php
function getProductDetailsByCartId($id_SanPham) {  
    global $conn;
    $sql = "SELECT sanpham.TenSanPham, sanpham.HinhAnh, sanpham.Gia, sanpham.id_DanhMuc
            FROM sanpham
            WHERE sanpham.id_SanPham = :id_SanPham";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function getCartIdByUserId($id_KhachHang) {
    global $conn;
    $sql = "SELECT id_GioHang FROM giohang WHERE id_KhachHang = :id_KhachHang";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($cart) {
        return $cart['id_GioHang'];
    } else {
        return null; 
    }
}
function getCartProductIdsByCartId($id_GioHang) {  
    global $conn;  

    if (!is_int($id_GioHang)) {  
        return [];  
    }  
    $sql = "SELECT id_SanPham FROM chitietgiohang WHERE id_GioHang = :id_GioHang";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);  
    $stmt->execute();  
    $productIds = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return array_column($productIds, 'id_SanPham'); 
}
function getCartItemsByCartId($id_GioHang) {  
    global $conn;  
    $sql = "SELECT c.id_ChiTietGioHang, c.id_SanPham, c.SoLuong   
            FROM chitietgiohang AS c   
            WHERE c.id_GioHang = :id_GioHang";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);   
    $stmt->execute();  
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $cartItems;
}
function updateCartQuantity($id_ChiTietGioHang, $SoLuong, $conn) {  

    if ($SoLuong < 1 || $SoLuong > 100) {  
        return "Số lượng không hợp lệ!";  
    }  
    $sql = "UPDATE chitietgiohang SET SoLuong = :SoLuong WHERE id_ChiTietGioHang = :id_ChiTietGioHang";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':SoLuong', $SoLuong, PDO::PARAM_INT);  
    $stmt->bindParam(':id_ChiTietGioHang', $id_ChiTietGioHang, PDO::PARAM_INT);  
    $stmt->execute();
}

function deleteCartItem($id_GioHang, $conn) {
    $sql = "DELETE FROM giohang WHERE id_GioHang = :id_GioHang";


function deleteCartItem($conn, $id_GioHang, $id_SanPham = null) {
    try {
        if ($id_SanPham) {
            $sql = "DELETE FROM chitietgiohang WHERE id_GioHang = :id_GioHang AND id_SanPham = :id_SanPham";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
            $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        } else {

            $sql = "DELETE FROM giohang WHERE id_GioHang = :id_GioHang";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
        }


        if ($stmt->execute()) {
            return "Xóa thành công!";
        } else {
            return "Lỗi khi xóa!";
        }
    } catch (Exception $e) {
        return "Lỗi hệ thống: " . $e->getMessage();
    }
}
}
function getDiscountByProductId($productId) {
    global $conn; 
    $sql = "SELECT GiamGia FROM sanpham WHERE id_SanPham = :id_SanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_SanPham', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['GiamGia']; 
    } else {
        return 0; 
    }
}

?>


