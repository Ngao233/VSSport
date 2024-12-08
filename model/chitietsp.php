<?php
function getProductDetail($id){
    global $conn;
    $sql = "SELECT * FROM chitietsanpham WHERE id_ChiTietSanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $getproductdetail = $stmt->fetch();
    return $getproductdetail; 
}

?>