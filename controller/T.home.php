<?php   
include_once "model/category.php";  
include_once "model/product.php";  
include_once "model/tintuc.php";
include_once "init/config.php";


switch ($action) {  
    case '':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
    break;
    case 'statistics':
        include "admin/statistics.php";
        break;
    case 'home':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
        break;
    case 'searchome':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $search = trim($_POST["search"] ?? ""); // Nhận từ khóa tìm kiếm  
        
            if ($search != "") {  
               
                $product = searchProduct($search);
                if ($product) {  
                    include "views/search.php";
                } else {  
                    include "views/search1.php";
                }  
            }  
        } 
        break;
        case 'searchgiaythethao':  
            // Đảm bảo $categories chứa danh sách danh mục bạn muốn tìm  
            $categories = ['Giày bóng đá'];  
            
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
                    echo "Không tìm thấy sản phẩm nào trong các danh mục đã chọn.";  
                }  
            } else {  
                echo "Lỗi khi chuẩn bị câu truy vấn.";  
            }  
        
            break;
            case 'searchaobongda': 
                include "views/searchcategory.php";
                
                break;
}
?>
<head>
    <style>
        .san-pham-WebSp {  
    border: 1px solid #ddd;  
    border-radius: 5px;  
    padding: 10px;  
    margin: 10px;  
    text-align: center;  
    transition: transform 0.2s;  
}  

.san-pham-WebSp:hover {  
    transform: scale(1.05);  
}  

.san-pham-WebSp-image {  
    width: 20%;  
    height: auto;   
}  

.san-pham-WebSp-name {  
    font-weight: bold;  
    margin: 10px 0;  
}  

.san-pham-WebSp-price {  
    color: #FF5722;   
    font-size: 1.2em;  
}  

.san-pham-WebSp-button {  
    background-color: #007BFF;  
    color: white;  
    border: none;  
    padding: 10px 20px;  
    cursor: pointer;  
    border-radius: 5px;  
}  

.san-pham-WebSp-button:hover {  
    background-color: #0056b3;  
}  

.circle {  
    position: relative;  
    display: inline-block;  
}
    </style>
</head>
        