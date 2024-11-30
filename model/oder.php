<?php
function getOder($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM sanpham ORDER BY id_SanPham $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $Oder = $stmt->fetchAll();
    return $Oder; 
}
function getOderid($id){
    global $conn;
    $sql = "SELECT * FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $Oder = $stmt->fetch();
    return $Oder; 
}
function updateOder($id,$TenSanPham,$MoTa,$Gia,$SoLuong,$HinhAnh,$KichThuoc,$MauSac){
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
function addOder($TenSanPham,$MoTa,$Gia,$SoLuong,$HinhAnh,$KichThuoc,$MauSac)
{  
    global $conn;  
    $sql = "INSERT INTO sanpham( TenSanPham,MoTa, Gia, SoLuong,HinhAnh,KichThuoc,MauSac) VALUES( :TenSanPham,:MoTa, :Gia, :SoLuong, :HinhAnh, :KichThuoc, :MauSac)";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':TenSanPham', $TenSanPham); 
    $stmt->bindParam(':MoTa', $MoTa); 
    $stmt->bindParam(':Gia', $Gia);  
    $stmt->bindParam(':SoLuong', $SoLuong); 
    $stmt->bindParam(':HinhAnh', $HinhAnh);
    $stmt->bindParam(':KichThuoc', $KichThuoc);
    $stmt->bindParam(':MauSac', $MauSac);
    $stmt->execute();
}
function searchOder($search, $sort="DESC") {  
    global $conn;  
    $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE :search ORDER BY id_SanPham $sort";  
    $stmt = $conn->prepare($sql);  
    $searchTerm = '%' . $search . '%';  
    $stmt->bindParam(':search', $searchTerm);  
    $stmt->execute();  
    $Oder = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $Oder;  
}
function deleteOder($id){
    global $conn;
    $sql = "DELETE FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

?>