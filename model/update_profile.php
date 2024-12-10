<?php
session_start();
include './init/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_KhachHang = $_SESSION['id_KhachHang'];
    $ho = $_POST['ho'] ?? null;
    $ten = $_POST['ten'] ?? null;
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    try {

        if (!empty($ho) && !empty($ten)) {
            $sql = "UPDATE khachhang SET Ho = :ho, Ten = :ten, Email = :email, Sdt = :phone WHERE id_KhachHang = :id_KhachHang";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ho', $ho);
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        } else {
            $sql = "UPDATE khachhang SET Email = :email, Sdt = :phone WHERE id_KhachHang = :id_KhachHang";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        }
        
        

        $stmt->execute();


        header("Location: hoso");
        exit();
    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
} else {
    echo 'Yêu cầu không hợp lệ.';
}
?>
?>