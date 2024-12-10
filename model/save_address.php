<?php
session_start();
include './init/config.php'; /

if (!isset($_SESSION['id_KhachHang'])) {
    exit('Không có quyền truy cập.');
}

$id_KhachHang = $_SESSION['id_KhachHang'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $city = $_POST['city'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $address = $_POST['address'];


    $fullAddress = "$address, $district, $province, $city";

    try {

        $sql = "INSERT INTO diachinguoidung (id_KhachHang, DiaChi) VALUES (:id_KhachHang, :fullAddress)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->bindParam(':fullAddress', $fullAddress);
        $stmt->execute();


        $id_DiaChi = $conn->lastInsertId();


        $updateSql = "UPDATE khachhang SET Id_DiaChi = :id_DiaChi WHERE id_KhachHang = :id_KhachHang";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(':id_DiaChi', $id_DiaChi, PDO::PARAM_INT);
        $updateStmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $updateStmt->execute();

        header("Location: diachi");
        exit();
    } catch (PDOException $e) {
        exit('Lỗi kết nối: ' . $e->getMessage());
    }
}
?>