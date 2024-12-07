<?php

session_start();   

if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
} else {
    header("Location: dangnhap"); 
    exit();
} 


$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session

// Truy vấn giỏ hàng của khách hàng
$sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);     

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
        $sql = "SELECT * FROM diachinguoidung WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
       
?>