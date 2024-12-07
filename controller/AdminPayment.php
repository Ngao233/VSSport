<?php
include_once "model/payment.php";
include_once "model/cart.php";
include_once "model/product.php";
// Kiểm tra action
switch ($action) {
    case 'thanhtoan':

        $id_KhachHang = $_SESSION['id_KhachHang']; // Lấy ID khách hàng từ session

        // Lấy thông tin khách hàng
        $customer = getCustomerById($conn, $id_KhachHang);
        
        // Lấy phương thức thanh toán
        $payment = getPaymentMethodByCustomerId($conn, $id_KhachHang);
        
        // Lấy địa chỉ giao hàng
        $shippingAddress = getShippingAddressByCustomerId($conn, $id_KhachHang);
        
        // Hiển thị thông tin
        echo "Họ và Tên: " . htmlspecialchars($customer['Ten']);
        echo "Email: " . htmlspecialchars($customer['Email']);
        echo "Phương thức thanh toán: " . htmlspecialchars($payment['phuongthuc']);
        echo "Địa chỉ: " . htmlspecialchars($shippingAddress['DiaChi']);
        
        
        include "views/header.php";
        include "views/thanhtoan.php";
        include "views/footer.php";
        break;
        
}
?>
