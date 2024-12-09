<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Liên kết đến CSS của bạn -->  
    <title>Danh Sách Sản Phẩm</title>  
    <style>  
      /* Kiểu chung cho trang và sản phẩm */  
      body {  
          font-family: Arial, sans-serif; /* Font chữ cơ bản */  
          margin: 0;  
          padding: 0;  
          background-color: #f8f9fa; /* Màu nền trang */  
      }  

      .product-grid {  
          display: flex; /* Sử dụng Flexbox để bố cục */  
          flex-wrap: wrap; /* Cho phép các mục sản phẩm xuống dòng */  
          justify-content: space-between; /* Đều khoảng cách giữa các mục */  
          padding: 20px; /* Khoảng cách bên trong cho grid */  
      }  

      .san-pham-WebSp {  
          background-color: #ffffff; /* Màu nền cho thẻ sản phẩm */  
          border: 1px solid #ddd; /* Viền nhẹ cho thẻ sản phẩm */  
          border-radius: 5px; /* Đường viền bo tròn */  
          padding: 10px; /* Padding cho sản phẩm */  
          margin: 10px; /* Khoảng cách giữa các sản phẩm */  
          text-align: center; /* Căn giữa nội dung sản phẩm */  
          width: calc(20% - 20px); /* Đảm bảo 5 sản phẩm mỗi hàng, trừ đi margin */  
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ cho sản phẩm */  
          transition: transform 0.3s; /* Hiệu ứng chuyển tiếp */  
      }  

      .san-pham-WebSp:hover {  
          transform: scale(1.05); /* Hiệu ứng phóng to khi di chuột qua */  
      }  

      .san-pham-WebSp-image {  
          width: 100%; /* 100% chiều rộng của hình ảnh */  
          height: auto; /* Chiều cao tự động để giữ tỷ lệ */  
          border-radius: 5px; /* Bo tròn hình ảnh */  
      }  

      .san-pham-WebSp-name {  
          font-weight: bold; /* Chữ đậm cho tên sản phẩm */  
          margin: 10px 0; /* Khoảng cách trên dưới cho tên sản phẩm */  
      }  

      .san-pham-WebSp-price {  
          color: #FF5722; /* Màu sắc cho giá sản phẩm */  
          font-size: 1.2em; /* Kích thước lớn hơn cho giá */  
          margin: 5px 0; /* Khoảng cách phía trên và dưới cho giá */  
      }  

      .san-pham-WebSp-button {  
          background-color: #007BFF; /* Màu nền cho nút */  
          color: white; /* Màu chữ của nút */  
          border: none; /* Không có viền */  
          padding: 10px 20px; /* Padding cho nút */  
          cursor: pointer; /* Chỉ thị con trỏ cho các nút */  
          border-radius: 5px; /* Bo tròn cho nút */  
          transition: background-color 0.3s; /* Hiệu ứng chuyển màu nền */  
      }  

      .san-pham-WebSp-button:hover {  
          background-color: #0056b3; /* Màu nền mới khi di chuột qua nút */  
      }  

      .circle {  
          position: relative; /* Để giải quyết vị trí của biểu tượng trái tim */  
          display: inline-block; /* Để căn giữa biểu tượng */  
          margin: 10px 0; /* Khoảng cách cho biểu tượng */  
      }  

      .circle a {  
          text-decoration: none; /* Không có gạch chân */  
          color: #ff4081; /* Màu cho biểu tượng khi không di chuột */  
      }  

      .circle a:hover {  
          color: #e91e63; /* Màu cho biểu tượng khi di chuột */  
      }  

      /* Nút quay lại trang chính */  
      .back-home {  
          display: inline-block;   
          background-color: #28a745; /* Màu nền cho nút quay lại */  
          color: white; /* Màu chữ cho nút */  
          padding: 10px 15px; /* Padding cho nút */  
          border-radius: 5px; /* Bo tròn cho nút */  
          text-decoration: none; /* Không có gạch chân */  
          margin: 20px; /* Khoảng cách với các phần tử khác */  
          transition: background-color 0.3s; /* Hiệu ứng chuyển màu */  
      }  

      .back-home:hover {  
          background-color: #218838; /* Màu nền khi di chuột qua */  
      }  
    </style>  
</head>  
<body>  
    <!-- Nút quay lại trang chính -->  
    <a href="path/to/homepage" class="back-home">Quay lại Trang Chính</a>  
    
    <div class="product-grid"> <!-- Wrapper cho danh sách sản phẩm -->  
        <?php  
        // Đảm bảo $categories chứa danh sách danh mục bạn muốn tìm  
        $categories = ['Áo Bóng đá'];  
        
        // Tạo placeholder cho số lượng danh mục  
        $placeholders = rtrim(str_repeat('?,', count($categories)), ',');  
        
        // Chuẩn bị câu truy vấn SQL để lấy sản phẩm trong danh mục đã cho  
        $sql = "SELECT sp.* FROM sanpham sp  
                JOIN danhmuc dm ON sp.id_DanhMuc = dm.id_DanhMuc   
                WHERE dm.TenDanhMuc IN ($placeholders)";  
        
        $stmt = $conn->prepare($sql);  
        
        if ($stmt) {  
            // Thực hiện truy vấn với các tham số là danh mục  
            $stmt->execute($categories);  
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        
            // Kiểm tra có sản phẩm nào được tìm thấy không  
            if (count($result) > 0) {  
                foreach ($result as $product) {  
                    echo '<div class="san-pham-WebSp">';  
                    echo    '<a href="cac/' . htmlspecialchars($product['id_SanPham']) . '" class="san-pham-WebSp-link">';  
                    echo        '<img src="public/image/' . htmlspecialchars($product["HinhAnh"]) . '" alt="' . htmlspecialchars($product["TenSanPham"]) . '" class="san-pham-WebSp-image" />';  
                    echo    '</a>';  
                    echo    '<div class="circle">';  
                    echo        '<a href="">';  
                    echo            '<i class="fa-solid fa-heart"></i>';  
                    echo        '</a>';  
                    echo    '</div>';  
                    echo    '<div class="san-pham-WebSp-info">';  
                    echo        '<button class="san-pham-WebSp-button">Thêm vào giỏ hàng</button>';  
                    echo    '</div>';  
                    echo    '<p class="san-pham-WebSp-name">' . htmlspecialchars($product["TenSanPham"]) . '</p>';  
                    echo    '<p class="san-pham-WebSp-price">' . number_format($product["Gia"], 0) . ' VNĐ</p>';  
                    echo '</div>';  
                }  
            } else {  
                echo "<p>Không tìm thấy sản phẩm nào trong các danh mục đã chọn.</p>";  
            }   
        } else {  
            echo "<p>Lỗi khi chuẩn bị câu truy vấn.</p>";  
        }  
        ?>  
    </div>  
</body>  
</html>