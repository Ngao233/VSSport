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
function updateProduct($id, $TenSanPham, $Gia, $SoLuong, $HinhAnh,  $id_DanhMuc) {  
    global $conn;  
    $sql = "UPDATE sanpham   
            SET TenSanPham = :TenSanPham,     
                Gia = :Gia,   
                SoLuong = :SoLuong,   
                HinhAnh = :HinhAnh,   
                id_DanhMuc = :id_DanhMuc   
            WHERE id_SanPham = :id";  
            
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':TenSanPham', $TenSanPham);    
    $stmt->bindParam(':Gia', $Gia);  
    $stmt->bindParam(':SoLuong', $SoLuong);  
    $stmt->bindParam(':HinhAnh', $HinhAnh);      
    $stmt->bindParam(':id_DanhMuc', $id_DanhMuc);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
}
function addProduct($TenSanPham,$Gia,$SoLuong,$HinhAnh,$id_DanhMuc)
{  
    global $conn;  
    $sql = "INSERT INTO sanpham( TenSanPham, Gia, SoLuong,HinhAnh,id_DanhMuc) VALUES( :TenSanPham, :Gia, :SoLuong, :HinhAnh,:id_DanhMuc)";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':TenSanPham', $TenSanPham);  
    $stmt->bindParam(':Gia', $Gia);  
    $stmt->bindParam(':SoLuong', $SoLuong); 
    $stmt->bindParam(':HinhAnh', $HinhAnh);
    $stmt->bindParam(':id_DanhMuc', $id_DanhMuc);

    $stmt->execute();
}
function searchProduct($search, $sort="DESC") {  
    global $conn;  
    $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE :search ORDER BY id_SanPham $sort";  
    $stmt = $conn->prepare($sql);  
    $searchTerm = '%' . $search . '%';  
    $stmt->bindParam(':search', $searchTerm);  
    $stmt->execute();  
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $product;  
}
function deleteProduct($id){
    global $conn;
    $sql = "DELETE FROM sanpham WHERE id_SanPham = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getProductWithDiscount($sort = "DESC") {
    global $conn;
    // Thêm điều kiện WHERE để lọc sản phẩm có GiamGia >= 1
    $sql = "SELECT * FROM sanpham WHERE GiamGia >= 1 ORDER BY id_SanPham $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll();
    return $product;
}


?>