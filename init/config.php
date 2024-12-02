<?php  
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "vssport";  

try {  
    // Tạo kết nối PDO  
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);  
    // Thiết lập chế độ báo lỗi  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {  
    // Xuất thông báo lỗi khi có vấn đề kết nối  
    echo "Kết nối thất bại: " . $e->getMessage();  
}  

// Đảm bảo rằng biến $conn là biến toàn cục để sử dụng trong các hàm khác  
global $conn;