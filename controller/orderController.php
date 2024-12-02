<?php// controller/orderController.php  

require_once '../model/order.php'; // Nhúng model để sử dụng các hàm truy vấn  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['approve'])) {  
        $orderId = $_POST['order_id'];  
        updateOrderStatus($orderId, 'approved'); // Đánh dấu đơn hàng là đã duyệt  
        header("Location: ../admin/Homeorder.php");  
        exit;  
    }  

    if (isset($_POST['delete'])) {  
        $orderId = $_POST['order_id'];  
        $currentStatus = getOrderStatusById($orderId);  
        if ($currentStatus === 'pending') {  
            deleteOrder($orderId); // Chỉ xóa nếu trạng thái là 'pending'  
            header("Location: ../admin/Homeorder.php");  
            exit;  
        } else {  
            echo "Không thể xóa đơn hàng đã được duyệt.";  
        }  
    }  
}
?>