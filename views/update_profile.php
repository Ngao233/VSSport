<?php
session_start();
include './init/config.php'; // Kết nối đến cơ sở dữ liệu


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_KhachHang = $_SESSION['id_KhachHang'];
    $password = $_POST['password'] ?? null; // Mật khẩu có thể không được cung cấp
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {
        // Câu lệnh SQL để cập nhật hồ sơ
        if (!empty($password)) {
            // Nếu có mật khẩu, cập nhật cả email, phone và password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE khachhang SET Email = :email, Sdt = :phone, MatKhau = :password WHERE id_KhachHang = :id_KhachHang";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword);
        } else {
            // Nếu không có mật khẩu, chỉ cập nhật email và phone
            $sql = "UPDATE khachhang SET Email = :email, Sdt = :phone WHERE id_KhachHang = :id_KhachHang";
            $stmt = $conn->prepare($sql);
        }

        // Liên kết các tham số
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        
        // Thực hiện câu lệnh
        $stmt->execute();

        // Chuyển hướng về trang hồ sơ hoặc thông báo thành công
        header("Location: hoso");
        exit();
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
} else {
    echo 'Yêu cầu không hợp lệ.';
}
?>