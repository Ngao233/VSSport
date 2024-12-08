<?php  
 session_start(); 
if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
} else {
    header("Location: dangnhap"); 
    exit();
} 
$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session
// Truy vấn giỏ hàng của khách hàng
$sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <style>
          
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
            }

            .cart-container {
                width: 80%;
                margin: 50px auto;
                background-color: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            .cart-item {
                display: flex;
                border-bottom: 1px solid #ccc;
                padding: 15px 0;
                align-items: center;
            }

            .cart-item img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border: 1px solid #ddd;
                border-radius: 8px;
            }

            .item-details {
                flex: 1;
                margin-left: 20px;
            }

            .item-details h2 {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .quantity {
                display: flex;
                align-items: center;
            }

            .quantity button {
                background-color: #ff5722;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 5px;
            }

            .quantity input {
                width: 40px;
                text-align: center;
                margin: 0 10px;
            }

            .remove-btn {
                background-color: #ff4444;
                color: white;
                border: none;
                padding: 8px 15px;
                cursor: pointer;
                border-radius: 5px;
                margin-top: 10px;
            }

            .cart-summary {
                text-align: right;
                margin-top: 20px;
            }

            .checkout-btn {
                background-color: #ff5722;
                color: white;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
                font-size: 16px;
            }

   </style>
</head>  
<body>  


<div class="cart-container">  
    <h1>Giỏ hàng của bạn</h1>  
    <?php if ($cartItems): ?>  
        <?php   
        $total = 0; // Khởi tạo tổng ở đây  
        foreach ($cartItems as $item):   
            // Lấy thông tin sản phẩm từ id_SanPham  
            $product = getProductDetailsByCartId($item['id_SanPham']); // Hàm lấy chi tiết sản phẩm  
            $discount = getDiscountByProductId($item['id_SanPham']); // Lấy giá trị giảm giá từ bảng sản phẩm  

            // Tính tổng tiền sản phẩm sau giảm giá  
            $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);  
            $total += $itemTotal;   
        ?>  
            <div class="cart-item">  
                <img src="public/image/<?= htmlspecialchars($product['HinhAnh']); ?>" alt="<?= htmlspecialchars($product['TenSanPham']); ?>">  
                <div class="item-details">  
                    <h2><?= htmlspecialchars($product['TenSanPham']); ?></h2>  
                    <p>Giá: <?= number_format($product['Gia'], 0, ',', '.');?>đ </p>  
                   
                    <p>Danh mục: <?= getCategoryNameByProductId($product['id_DanhMuc']); ?></p>  
                    <form method="POST" action="cart_update">  
                        <div class="quantity">  
                            <input type="number" name="SoLuong" value="<?= htmlspecialchars($item['SoLuong']); ?>" min="1" max="100">  
                            <button type="submit">Cập nhật</button>     
                        </div>  
                        <input type="hidden" name="id_GioHang" value="<?= $item['id_GioHang']; ?>">  
                    </form>  
                    <form method="POST" action="cart_delete">  
                        <input type="hidden" name="id_GioHang" value="<?= $item['id_GioHang']; ?>">  
                        <button type="submit" class="remove-btn">Xóa</button>  
                    </form>  
                </div>  
            </div>  
        <?php endforeach; ?>  
        
        <!-- Hiển thị tổng sau vòng lặp -->  
        <div class="total">  
            <p>Tổng cộng: <?= number_format($total, 0, ',', '.');?>đ</p>  
        </div>  

    <?php else: ?>  
        <p>Giỏ hàng của bạn đang trống.</p>  
    <?php endif; ?>  
    <a href="thanhtoan/<?=$_SESSION['id_KhachHang']?>"><button type="submit" class="remove-btn">Thanh Toán</button></a>
</div>  

</body>
</html>

    


<!-- Footer-->

    