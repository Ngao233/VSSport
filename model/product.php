<?php
function getProduct($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM sanpham ORDER BY id_SanPham $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll();
    return $product; 
}
function getProductid($id){
    global $conn;
    $sql = "SELECT * FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch();
    return $product; 
}
function updateProduct($id,$TenSanPham,$MoTa,$Gia,$SoLuong,$HinhAnh,$KichThuoc,$MauSac){
    global $conn;
    $sql = "UPDATE sanpham SET TenSanPham = :TenSanPham, MoTa = :MoTa ,Gia = :Gia, SoLuong = :SoLuong, HinhAnh= :HinhAnh , KichThuoc = :KichThuoc, MauSac = :MauSac WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':TenSanPham', $TenSanPham); 
    $stmt->bindParam(':MoTa', $MoTa); 
    $stmt->bindParam(':Gia', $Gia);  
    $stmt->bindParam(':SoLuong', $SoLuong); 
    $stmt->bindParam(':HinhAnh', $HinhAnh);
    $stmt->bindParam(':KichThuoc', $KichThuoc);
    $stmt->bindParam(':MauSac', $MauSac);
    $stmt->bindParam(':id', $id);  
    $stmt->execute();
}

?>