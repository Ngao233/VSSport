<?php
session_start();
include './init/config.php'; // Kết nối đến cơ sở dữ liệu

if (!isset($_SESSION['id_KhachHang'])) {
    exit('Không có quyền truy cập.');
}

$id_KhachHang = $_SESSION['id_KhachHang'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $city = $_POST['tinh_name'];
    $province = $_POST['quan_name'];
    $district = $_POST['phuong_name'];
    $address = $_POST['address'];

    // Kết hợp địa chỉ thành một dòng
    $fullAddress = "$address, $district, $province, $city";

    try {
        // Truy vấn để lưu địa chỉ vào bảng diachinguoidung
        $sql = "INSERT INTO diachinguoidung (id_KhachHang, DiaChi) VALUES (:id_KhachHang, :fullAddress)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->bindParam(':fullAddress', $fullAddress);
        $stmt->execute();

        // Chuyển hướng về trang hồ sơ với thông báo thành công
        header("Location: diachi");
        exit();
    } catch (PDOException $e) {
        exit('Lỗi kết nối: ' . $e->getMessage());
    }
}
?>