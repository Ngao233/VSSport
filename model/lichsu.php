<?php
if (session_status() == PHP_SESSION_NONE) {  
    session_start();  
}
if (!isset($_SESSION['id_KhachHang'])) {
    echo "Bạn cần đăng nhập để xem lịch sử đơn hàng.";
    exit();
}
$id_KhachHang = $_SESSION['id_KhachHang'];

$sql = "SELECT donhang.id_DonHang, donhang.NgayDatHang, donhang.TrangThai, donhang.Tong
        FROM donhang
        WHERE donhang.id_KhachHang = :id_KhachHang
        ORDER BY donhang.NgayDatHang DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$orderHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);

function cancelOrder($orderId) {
    global $conn;
    $sql = "UPDATE donhang SET TrangThai = 'Đã hủy' WHERE id_DonHang = :id_DonHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_DonHang', $orderId, PDO::PARAM_INT);
    $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel_order'])) {
    cancelOrder($_POST['order_id']);
    header("Location: lichsu");
    exit();
}
?>