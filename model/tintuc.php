<?php
function getTinTuc($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM tintuc ORDER BY id_TinTuc $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tintuc = $stmt->fetchAll();
    return $tintuc; 
}
function getTinTucid($id){
    global $conn;
    $sql = "SELECT * FROM tintuc WHERE id_TinTuc = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $tintuc = $stmt->fetch();
    return $tintuc; 
}
function updateTinTuc($id, $TieuDe, $NgayDang, $HinhAnh, $NoiDung) {  
    global $conn;  
    $sql = "UPDATE tintuc  
            SET TinTuc = :TinTuc,   
                TieuDe = :TieuDe,   
                NgayDang = :NgayDang,      
                HinhAnh = :HinhAnh,
                NoiDung = :NoiDung,      
            WHERE id_TinTuc = :id";  
            
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':TieuDe', $TieuDe);  
    $stmt->bindParam(':NgayDang', $NgayDang);   
    $stmt->bindParam(':HinhAnh', $HinhAnh); 
    $stmt->bindParam(':NoiDung', $NoiDung);   
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
}
function addTinTuc($TieuDe,$NgayDang,$HinhAnh,$NoiDung)
{  
    global $conn;  
    $sql = "INSERT INTO tintuc( TieuDe, NgayDang, HinhAnh, NoiDung) VALUES( :TieuDe, :NgayDang, :HinhAnh, :NoiDung)";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':TieuDe', $TieuDe);  
    $stmt->bindParam(':NgayDang', $NgayDang);   
    $stmt->bindParam(':HinhAnh', $HinhAnh); 
    $stmt->bindParam(':NoiDung', $NoiDung);   
    $stmt->execute();
}
function searchTinTuc($search, $sort="DESC") {  
    global $conn;  
    $sql = "SELECT * FROM tintuc WHERE TinTuc LIKE :search ORDER BY id_TinTuc $sort";  
    $stmt = $conn->prepare($sql);  
    $searchTerm = '%' . $search . '%';  
    $stmt->bindParam(':search', $searchTerm);  
    $stmt->execute();  
    $tintuc = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    return $tintuc;  
}
function deleteTinTuc($id){
    global $conn;
    $sql = "DELETE FROM tintuc WHERE id_TinTuc = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

 ?>