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
?>
