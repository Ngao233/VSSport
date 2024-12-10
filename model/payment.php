<?php
function getCustomerById($conn, $id_KhachHang) {  

    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang");  
    $stmt->bindParam(':id_KhachHang', $id_KhachHang);  
    $stmt->execute();  
    return $stmt->fetch(PDO::FETCH_ASSOC);  
}
?>