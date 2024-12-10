<?php

if (!isset($_SESSION['id_KhachHang'])) {
    exit('Không có quyền truy cập.');
}

$id_KhachHang = $_SESSION['id_KhachHang'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $renewpassword = $_POST['renewpassword'];


    if ($newpassword !== $renewpassword) {
        exit('Mật khẩu mới không khớp. Vui lòng thử lại.');
    }

    try {

        $sql = "SELECT MatKhau FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        $khach = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!password_verify($password, $khach['MatKhau'])) {
            exit('Mật khẩu cũ không đúng. Vui lòng thử lại.');
        }

        $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);


        $sql = "UPDATE khachhang SET MatKhau = :newpassword WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':newpassword', $hashedNewPassword);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: doimatkhau");
        exit();
    } catch (PDOException $e) {
        exit('Lỗi kết nối: ' . $e->getMessage());
    }
}
?>