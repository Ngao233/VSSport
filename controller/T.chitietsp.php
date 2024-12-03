
<?php
// Giả sử bạn đã kết nối với cơ sở dữ liệu trước đó  
switch ($action) {  
    case 'chitietsp':  
        if (isset($_GET['id']) && ($_GET['id'])) {  
            $productId = intval($_GET['id']); 
            
            // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm  
            $sql = "SELECT * FROM sanpham WHERE id_SanPham = ?";  
            $stmt = $dbh->prepare($sql); // Sử dụng PDO để chuẩn bị truy vấn, với $dbh là kết nối PDO  
            $stmt->execute([$productId]); // Gửi ID vào truy vấn  
            
            // Lấy thông tin sản phẩm  
            $product = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy sản phẩm dưới dạng mảng  
            
            if (!$product) {  
                // Nếu không tìm thấy sản phẩm  
                $product = null;  
            }  
        } else {  
            $product = null; // Nếu không có id hợp lệ  
            $productIdd = $productId;
        }  

        include "views/chitietsp.php"; // Gọi view chi tiết sản phẩm  
>>>>>>> rodie
        break;  

    // Các case khác hoặc hành động khác có thể ở đây  
}  
?>