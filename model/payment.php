<?php
function getCustomerById($conn, $id_KhachHang) {  
    // Ví dụ mã truy vấn cơ sở dữ liệu  
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang");  
    $stmt->bindParam(':id_KhachHang', $id_KhachHang);  
    $stmt->execute();  
    return $stmt->fetch(PDO::FETCH_ASSOC);  
}
?>