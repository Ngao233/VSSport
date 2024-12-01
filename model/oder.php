<?php
function getOder($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM donhang ORDER BY id_DonHang $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $oder = $stmt->fetchAll();
    return $oder; 
}
function getOderid($id){
    global $conn;
    $sql = "SELECT * FROM donhang WHERE id_DonHang = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $Oder = $stmt->fetch();
    return $Oder; 
}
function updateOder($id,$NgayDatHang,$TrangThai){
    global $conn;
    $sql = "UPDATE donhang SET NgayDatHang = :NgayDatHang, TrangThai = :TrangThai WHERE id_DonHang = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':NgayDatHang', $NgayDatHang); 
    $stmt->bindParam(':TrangThai', $TrangThai); 
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
    $sql = "DELETE FROM donhang WHERE id_DonHang = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

?>