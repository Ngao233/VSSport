<?php
function getorder($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM donhang ORDER BY id_DonHang $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $order = $stmt->fetchAll();
    return $order; 
}
function getorderid($id){
    global $conn;
    $sql = "SELECT * FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch();
    return $order; 
}
function updateOrder($id, $ngayDatHang, $trangThai) {  
    global $conn;  
    $sql = "UPDATE donhang SET NgayDatHang = :ngayDatHang, TrangThai = :trangThai WHERE id_DonHang = :id";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':ngayDatHang', $ngayDatHang);  
    $stmt->bindParam(':trangThai', $trangThai);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
}
function addorder($ngayDatHang, $trangThai, $khachHangId) {  
    global $conn;  
    $sql = "INSERT INTO donhang(NgayDatHang, TrangThai, id_KhachHang) VALUES(:ngayDatHang, :trangThai, :khachHangId)";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':ngayDatHang', $ngayDatHang);   
    $stmt->bindParam(':trangThai', $trangThai);   
    $stmt->bindParam(':khachHangId', $khachHangId); // Giả sử bạn cũng muốn lưu thông tin khách hàng  
    $stmt->execute();  
}
function searchOrder($search, $sort="DESC") {  
    global $conn;  
    $sql = "SELECT * FROM donhang WHERE TenSanPham LIKE :search ORDER BY id_DonHang $sort";  
    $stmt = $conn->prepare($sql);  
    $searchTerm = '%' . $search . '%';  
    $stmt->bindParam(':search', $searchTerm);  
    $stmt->execute();  
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $orders;  
}
function deleteOrder($id) {  
    global $conn;  
    $sql = "DELETE FROM donhang WHERE id_DonHang = :id";   
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
}
// model/order.php  
function getAllOrders() {  
    global $conn;  

    $sql = "SELECT * FROM donhang";  
    $stmt = $conn->prepare($sql);  
    $stmt->execute();  

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    // Trả về mảng (có thể rỗng) hoặc rỗng nếu không lấy được  
    return $orders ?: []; // Nếu không có đơn hàng trả về mảng rỗng  
}
function getOrderStatusById($id) {  
    global $conn;  // Giả sử bạn đã kết nối CSDL ở nơi khác  
    $sql = "SELECT TrangThai FROM donhang WHERE id_DonHang = :id";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $result ? $result['TrangThai'] : null;  
}  

function updateOrderStatus($Id, $trangThai) {
    // Cập nhật trạng thái đơn hàng trong database
    $sql = "UPDATE orders SET TrangThai = ? WHERE id_DonHang = ?";
    executeQuery($sql, [$trangThai, $Id]);
}

?>