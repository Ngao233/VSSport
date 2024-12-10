<?php
function getProductDetailsByCartId($id_SanPham) {  
    global $conn;
    
    // Truy vấn để lấy thông tin sản phẩm từ bảng sanpham dựa vào id_SanPham
    $sql = "SELECT sanpham.TenSanPham, sanpham.HinhAnh, sanpham.Gia, sanpham.id_DanhMuc
            FROM sanpham
            WHERE sanpham.id_SanPham = :id_SanPham";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    // Lấy kết quả
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Trả về thông tin sản phẩm
    return $product;
}

function getCartIdByUserId($id_KhachHang) {
    global $conn;
    
    // Truy vấn để lấy id giỏ hàng từ bảng giohang dựa vào id_KhachHang
    $sql = "SELECT id_GioHang FROM giohang WHERE id_KhachHang = :id_KhachHang";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    // Lấy kết quả
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Nếu có giỏ hàng, trả về id_GioHang, nếu không trả về null
    if ($cart) {
        return $cart['id_GioHang'];
    } else {
        return null; // Nếu không tìm thấy giỏ hàng
    }
}
function getCartProductIdsByCartId($id_GioHang) {  
    global $conn;  

    if (!is_int($id_GioHang)) {  
        return []; // Trả về một mảng rỗng nếu id_GioHang không hợp lệ  
    }  

    // Truy vấn để lấy id sản phẩm từ bảng chitietgiohang dựa vào id_GioHang  
    $sql = "SELECT id_SanPham FROM chitietgiohang WHERE id_GioHang = :id_GioHang";  

    // Chuẩn bị câu lệnh SQL  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);  

    // Thực thi câu lệnh SQL  
    $stmt->execute();  

    // Lấy tất cả kết quả  
    $productIds = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    // Chuyển đổi kết quả về mảng chỉ chứa id_SanPham  
    return array_column($productIds, 'id_SanPham'); // Trả về danh sách các id sản phẩm  
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



function deleteCartItem($conn, $id_GioHang, $id_SanPham = null) {
    try {
        if ($id_SanPham) {
            // Xóa một sản phẩm cụ thể trong giỏ hàng
            $sql = "DELETE FROM chitietgiohang WHERE id_GioHang = :id_GioHang AND id_SanPham = :id_SanPham";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
            $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        } else {
            // Xóa toàn bộ giỏ hàng
            $sql = "DELETE FROM giohang WHERE id_GioHang = :id_GioHang";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
        }

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            return "Xóa thành công!";
        } else {
            return "Lỗi khi xóa!";
        }
    } catch (Exception $e) {
        return "Lỗi hệ thống: " . $e->getMessage();
    }
}

function getDiscountByProductId($productId) {
    global $conn; // Giả sử kết nối CSDL của bạn đã có trong biến $conn
    $sql = "SELECT GiamGia FROM sanpham WHERE id_SanPham = :id_SanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_SanPham', $productId, PDO::PARAM_INT); // Gắn giá trị vào tham số
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['GiamGia']; // Trả về giá trị giảm giá của sản phẩm
    } else {
        return 0; // Nếu không có giảm giá, trả về 0
    }
}

?>


