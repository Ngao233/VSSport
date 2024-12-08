<?php
include_once "model/payment.php";
include_once "model/product.php";

// Kiểm tra action
switch ($action) {
    case 'thanhtoan':
        // Lấy thông tin khách hàng, phương thức thanh toán và địa chỉ giao hàng
        $customer = getCustomerById($conn, $id_KhachHang) ?: ['Ten' => '', 'Email' => '', 'Sdt' => ''];
        $payment = getPaymentMethodByCustomerId($conn, $id_KhachHang) ?: ['phuongthuc' => ''];
        $shippingAddress = getShippingAddressByCustomerId($conn, $id_KhachHang) ?: ['DiaChi' => ''];

        // Gọi các view
        include "views/header.php";
        include "views/thanhtoan.php";
        include "views/footer.php";
        break;
}
?>
