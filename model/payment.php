<?php
    function getCustomerById($conn, $id_KhachHang) {
        $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
    function getPaymentMethodByCustomerId($conn, $id_KhachHang) {
        $sql = "SELECT * FROM phuongthucthanhtoan WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
    function getShippingAddressByCustomerId($conn, $id_KhachHang) {
        $sql = "SELECT * FROM diachi WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
       
?>