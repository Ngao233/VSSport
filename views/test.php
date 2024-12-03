<?php  
// Kết nối đến cơ sở dữ liệu  
$servername = "localhost";  
$username = "root";  // Thay đổi nếu cần  
$password = "";      // Thay đổi nếu cần  
$dbname = "vssport"; // Thay đổi tên cơ sở dữ liệu của bạn  

$conn = new mysqli($servername, $username, $password, $dbname);  

// Kiểm tra kết nối  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  

// Lấy ID sản phẩm từ tham số GET  
if (isset($_GET['id'])) {  
    $product_id = intval($_GET['id']); // Chuyển đổi ID sản phẩm sang kiểu số nguyên  

    // Truy vấn chi tiết sản phẩm  
    $sql = "SELECT p.id, p.name, p.description, pd.detail  
            FROM sanpham p  
            JOIN chitietsanpham pd ON p.id = pd.product_id  
            WHERE p.id = ?";  
    
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("i", $product_id); // Gán giá trị ID sản phẩm  

    $stmt->execute();  
    $result = $stmt->get_result();  

    // Kiểm tra nếu có thông tin sản phẩm  
    if ($result->num_rows > 0) {  
        // Lấy dữ liệu  
        while ($row = $result->fetch_assoc()) {  
            echo "<h1>" . htmlspecialchars($row['name']) . "</h1>";  
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";  
            echo "<h2>Chi tiết sản phẩm:</h2>";  
            echo "<p>" . htmlspecialchars($row['detail']) . "</p>";  
        }  
    } else {  
        echo "Không tìm thấy sản phẩm.";  
    }  

    $stmt->close();  
} else {  
    echo "ID sản phẩm không hợp lệ.";  
}  

$conn->close();  
?>