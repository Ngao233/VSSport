<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['id_KhachHang'])) {
        echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.']);
        exit();
    }

    $id_KhachHang = $_SESSION['id_KhachHang']; 
    $id_SanPham = isset($_POST['id_SanPham']) ? $_POST['id_SanPham'] : null;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    
    if ($id_SanPham && $quantity > 0) {
        $response = addProductToCart($id_KhachHang, $id_SanPham, $quantity);
        echo json_encode($response);
    }
}

function addProductToCart($id_KhachHang, $id_SanPham, $quantity) {
    global $conn;
    $id_GioHang = getCartIdByUserId($id_KhachHang);
    if ($id_GioHang === null) {
        $sql = "INSERT INTO giohang (id_KhachHang) VALUES (:id_KhachHang)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        $id_GioHang = $conn->lastInsertId();
    }

    $sql = "SELECT * FROM chitietgiohang WHERE id_GioHang = :id_GioHang AND id_SanPham = :id_SanPham";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $newQuantity = $row['SoLuong'] + $quantity;

        $updateQuery = "UPDATE chitietgiohang SET SoLuong = :SoLuong WHERE id_GioHang = :id_GioHang AND id_SanPham = :id_SanPham";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':SoLuong', $newQuantity, PDO::PARAM_INT);
        $updateStmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
        $updateStmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $updateStmt->execute();
        return ['success' => true, 'message' => 'Cập nhật giỏ hàng thành công!'];
    } else {
        $insertQuery = "INSERT INTO chitietgiohang (id_GioHang, id_SanPham, SoLuong) VALUES (:id_GioHang, :id_SanPham, :SoLuong)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);
        $insertStmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $insertStmt->bindParam(':SoLuong', $quantity, PDO::PARAM_INT);
        $insertStmt->execute();
        return ['success' => true, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng!'];
    }
}
?>
