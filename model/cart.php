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
function updateCartQuantity($id_GioHang, $SoLuong, $conn) {
    // Kiểm tra số lượng nhập vào có hợp lệ không
    if ($SoLuong < 1 || $SoLuong > 100) {
        return "Số lượng không hợp lệ!";
    }

    // Câu lệnh SQL để cập nhật số lượng
    $sql = "UPDATE giohang SET SoLuong = :SoLuong WHERE id_GioHang = :id_GioHang";

    // Sử dụng prepared statement với PDO
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':SoLuong', $SoLuong, PDO::PARAM_INT);
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        return ;
    } else {
        return "Lỗi khi cập nhật!";
    }
}

?>


