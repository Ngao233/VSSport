<?php
$orderId = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($orderId === 0) {
    echo "ID đơn hàng không hợp lệ.";
    exit();
}

try {

    $sql = "SELECT donhang.NgayDatHang, donhang.TrangThai, donhang.Tong,
                    chitietdonhang.SoLuong, chitietdonhang.TongTien, sanpham.TenSanPham,
                    khachhang.Ten, khachhang.Email, khachhang.id_KhachHang
            FROM donhang
            JOIN chitietdonhang ON donhang.id_DonHang = chitietdonhang.id_DonHang
            JOIN sanpham ON chitietdonhang.id_SanPham = sanpham.id_SanPham
            JOIN khachhang ON donhang.id_KhachHang = khachhang.id_KhachHang
            WHERE donhang.id_DonHang = :orderId";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($orderDetails)) {
        echo "Không tìm thấy đơn hàng. ID: " . htmlspecialchars($orderId);
        exit();
    }


    $idKhachHang = $orderDetails[0]['id_KhachHang'];


    $addressSql = "SELECT DiaChi FROM diachinguoidung WHERE id_KhachHang = :idKhachHang";
    $addressStmt = $conn->prepare($addressSql);
    $addressStmt->bindParam(':idKhachHang', $idKhachHang, PDO::PARAM_INT);
    $addressStmt->execute();
    $address = $addressStmt->fetch(PDO::FETCH_ASSOC);

    if (empty($address)) {
        echo "Không tìm thấy địa chỉ cho khách hàng ID: " . htmlspecialchars($idKhachHang);
        exit();
    }

    $customerAddress = $address['DiaChi'] ?? 'Không có địa chỉ';
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit();
}
?>