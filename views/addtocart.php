<?php  
if (session_status() == PHP_SESSION_NONE) {  
    session_start();  
}
if (isset($_POST['id_SanPham'], $_POST['quantity'], $_SESSION['id_KhachHang'])) {  
 

    $id_KhachHang = $_SESSION['id_KhachHang'];  
    $id_SanPham = $_POST['id_SanPham'];  
    $quantity = (int)$_POST['quantity'];  

    $sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);  
    $stmt->execute();  
    $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);  

    if ($existingItem) {  

        $newQuantity = $existingItem['SoLuong'] + $quantity; 
        $sql = "UPDATE giohang SET SoLuong = :SoLuong WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";  
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':SoLuong', $newQuantity, PDO::PARAM_INT);  
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
        $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);  
        $stmt->execute();  
    } else {  
  
        $sql = "INSERT INTO giohang (id_KhachHang, id_SanPham, SoLuong) VALUES (:id_KhachHang, :id_SanPham, :SoLuong)";  
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
        $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);  
        $stmt->bindParam(':SoLuong', $quantity, PDO::PARAM_INT);  
        $stmt->execute();  
    }  

 
    header("Location: $base_url");
    exit();  
} else {  
    // Xử lý lỗi  
     
}  
?>