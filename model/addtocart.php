<?php
session_start();

// Kiểm tra xem khách hàng đã đăng nhập chưa
if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
} else {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: dangnhap");
    exit();
}

// Kiểm tra xem id_SanPham có trong URL hay không
if (isset($_GET['id_SanPham'])) {
    $id_SanPham = $_GET['id_SanPham'];
    
    
    // Kết nối cơ sở dữ liệu
    // Thay $conn bằng đối tượng kết nối của bạn
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    $stmt->execute();

    // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
    if ($stmt->rowCount() > 0) {
        $sqlUpdate = "UPDATE giohang SET SoLuong = SoLuong + 1 WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmtUpdate->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $stmtUpdate->execute();
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào
        $sqlInsert = "INSERT INTO giohang (id_KhachHang, id_SanPham, SoLuong) VALUES (:id_KhachHang, :id_SanPham, 1)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmtInsert->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $stmtInsert->execute();
    }

    // Sau khi thêm sản phẩm vào giỏ hàng, chuyển hướng lại về giỏ hàng
    header("Location: giohang.php");
    exit();
}
?>
