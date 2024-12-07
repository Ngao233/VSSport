<?php   

include_once "model/category.php";  
include_once "model/product.php";
  
switch ($action) {  
    case 'themspyt':  
        $id=$_GET["id"]??"";
        $id = $_GET['id'] ?? "";  
$id_KhachHang = $_GET['id_KhachHang'] ?? ""; 

if ($id != "" && $id_KhachHang != "") {
    $sql = "INSERT INTO sanphamyeuthich (id_KhachHang, id_sanpham) VALUES (:id_KhachHang, :id_sanpham)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->bindParam(':id_sanpham', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "Sản phẩm đã được thêm vào danh sách yêu thích!";
    } else {
        echo "Lỗi khi thêm sản phẩm!";
    }
} else {
    echo "Thiếu thông tin ID sản phẩm hoặc ID khách hàng!";
}
       
    break;
    case 'spyeuthich':  
        session_start(); 
        if (isset($_SESSION['id_KhachHang'])) {
            $id_KhachHang = $_SESSION['id_KhachHang'];
        } else {
            header("Location: dangnhap"); 
            exit();
        } 
        $id_KhachHang = $_SESSION['id_KhachHang'];
        include_once "views/header.php"; 
        include "views/spyeuthich.php";  
        include_once "views/footer.php";
    break;
    
}