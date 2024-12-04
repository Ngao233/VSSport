<?php
session_start();
include './init/config.php'; // Kết nối đến cơ sở dữ liệu

if (!isset($_SESSION['id_KhachHang'])) {
    exit('Không có quyền truy cập.');
}

$id_KhachHang = $_SESSION['id_KhachHang'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $renewpassword = $_POST['renewpassword'];

    // Kiểm tra xem mật khẩu mới và mật khẩu xác nhận có khớp không
    if ($newpassword !== $renewpassword) {
        exit('Mật khẩu mới không khớp. Vui lòng thử lại.');
    }

    try {
        // Truy vấn mật khẩu hiện tại từ cơ sở dữ liệu
        $sql = "SELECT MatKhau FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        $khach = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra mật khẩu cũ
        if (!password_verify($password, $khach['MatKhau'])) {
            exit('Mật khẩu cũ không đúng. Vui lòng thử lại.');
        }

        // Mã hóa mật khẩu mới
        $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        $sql = "UPDATE khachhang SET MatKhau = :newpassword WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':newpassword', $hashedNewPassword);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();

        // Chuyển hướng về trang hồ sơ với thông báo thành công
        header("Location: doimatkhau");
        exit();
    } catch (PDOException $e) {
        exit('Lỗi kết nối: ' . $e->getMessage());
    }
}
?>