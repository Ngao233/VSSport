<?php
function getCategoryNameByProductId($id) {  
    global $conn;  
    $sql = "SELECT danhmuc.TenDanhMuc AS danhmuc_TenDanhMuc  
            FROM sanpham  
            JOIN danhmuc ON sanpham.id_DanhMuc = danhmuc.id_DanhMuc   
            WHERE sanpham.id_DanhMuc = :id";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id', $id);  
    $stmt->execute();  
    

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $result ? $result['danhmuc_TenDanhMuc'] : null;  
}
function getAllCategories() {  
    global $conn; 
    try {  
        $sql = "SELECT * FROM danhmuc"; 
        $stmt = $conn->prepare($sql);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {  
     
        echo "Lỗi khi lấy danh mục: " . $e->getMessage();  
        return []; 
    }  
}

