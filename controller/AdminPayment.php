<?php
include_once "model/payment.php";
include_once "model/product.php";


// Kiểm tra action
switch ($action) {
    case 'thanhtoan':
        session_start();  // Đảm bảo session đã được khởi tạo

if (isset($_SESSION['id_KhachHang']) && $_SESSION['id_KhachHang'] !== null) {
    $id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session
} else {
    header("Location: dangnhap"); // Nếu không có id_KhachHang trong session, chuyển hướng đến trang đăng nhập
    exit();
}

    

        // Gọi các view
        include "views/header.php";
        include "views/thanhtoan.php";
        include "views/footer.php";
        break;
    case 'update_payment':
        session_start();  // Đảm bảo session đã được khởi tạo

        if (isset($_SESSION['id_KhachHang']) && $_SESSION['id_KhachHang'] !== null) {
            $id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session
        } else {
            header("Location: dangnhap"); // Nếu không có id_KhachHang trong session, chuyển hướng đến trang đăng nhập
            exit();
        }
        include_once "model/payment.php";
    
        $ten = trim($_POST['Ten'] ?? '');
        $email = trim($_POST['Email'] ?? '');
        $sdt = trim($_POST['Sdt'] ?? '');
        $diaChi = trim($_POST['DiaChi'] ?? '');
        $phuongthuc = trim($_POST['payment'] ?? '');
        $ghiChu = trim($_POST['GhiChu'] ?? '');
        
        try {
            $conn->beginTransaction();
        
            // 1. Thêm khách hàng
            $id_KhachHang = insertCustomer($conn, $ten, $email, $sdt);
        
            // 2. Thêm địa chỉ giao hàng
            insertShippingAddress($conn, $id_KhachHang, $diaChi);
        
            // 3. Thêm phương thức thanh toán
            insertPaymentMethod($conn, $id_KhachHang, $phuongthuc);
        
            // 4. Thêm đơn hàng
            $id_DonHang = insertOrder($conn, $id_KhachHang, $ghiChu);
        
            $conn->commit();
            echo "Đặt hàng thành công! Đơn hàng của bạn có ID: " . $id_DonHang;
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Có lỗi xảy ra: " . $e->getMessage();
        } 
}  
?>
