<?php
function getOrder($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM donhang Order BY id_DonHang $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $Order = $stmt->fetchAll();
    return $Order; 
}
function getOrderid($id){
    global $conn;
    $sql = "SELECT * FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $Order = $stmt->fetch();
    return $Order; 
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
function addOrder($ngayDatHang, $trangThai, $khachHangId) {  
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
    $sql = "SELECT * FROM donhang WHERE TenSanPham LIKE :search Order BY id_DonHang $sort";  
    $stmt = $conn->prepare($sql);  
    $searchTerm = '%' . $search . '%';  
    $stmt->bindParam(':search', $searchTerm);  
    $stmt->execute();  
    $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $Orders;  
}
function deleteOrder($id) {  
    global $conn;  
    $sql = "DELETE FROM donhang WHERE id_DonHang = :id";   
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
}
// model/Order.php  
function getAllOrders() {  
    global $conn;  

    $sql = "SELECT * FROM donhang";  
    $stmt = $conn->prepare($sql);  
    $stmt->execute();  

    $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    // Trả về mảng (có thể rỗng) hoặc rỗng nếu không lấy được  
    return $Orders ?: []; // Nếu không có đơn hàng trả về mảng rỗng  
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
    $sql = "UPDATE Orders SET TrangThai = ? WHERE id_DonHang = ?";
    executeQuery($sql, [$trangThai, $Id]);
}

?>