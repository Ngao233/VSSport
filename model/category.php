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
    
    // Lấy kết quả  
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    // Kiểm tra xem có tìm thấy tên danh mục không, nếu có trả về, nếu không trả về null  
    return $result ? $result['danhmuc_TenDanhMuc'] : null;  
}
function getAllCategories() {  
    global $conn; // Kết nối cơ sở dữ liệu  
    try {  
        $sql = "SELECT * FROM danhmuc"; // Truy vấn để lấy tất cả danh mục  
        $stmt = $conn->prepare($sql);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả danh mục dưới dạng một mảng  
    } catch (PDOException $e) {  
        // Xử lý lỗi nếu có  
        echo "Lỗi khi lấy danh mục: " . $e->getMessage();  
        return []; // Trả về mảng rỗng nếu có lỗi  
    }  
}

