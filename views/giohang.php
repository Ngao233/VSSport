<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id_KhachHang = null;
$cartItems = []; 

if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
    $id_GioHang = getCartIdByUserId($id_KhachHang); 
    
    if ($id_GioHang) {
        
        $cartItems = getCartItemsByCartId($id_GioHang); 
    }
} else {
   
    $id_KhachHang = null;
    $cartItems = [];  
}

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
    <title>Giỏ Hàng</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .cart-container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .cart-item {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            align-items: center;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .item-details {
            flex: 1;
            margin-left: 20px;
        }
        .item-details h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .quantity {
            display: flex;
            align-items: center;
        }
        .quantity input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .quantity button {
            background-color: #FFA031;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .remove-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .checkout-btn {
            background-color: #FFA031;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
        }
        .empty-cart {
            text-align: center;
            margin: 50px auto;
            padding: 20px;
            border: 1px dashed #ddd;
            background-color: #fff;
            border-radius: 10px;
        }
        .empty-cart img {
            width: 150px;
            margin-bottom: 20px;
        }
        .empty-cart p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .empty-cart a {
            color: #FFA031;
            text-decoration: none;
            font-weight: bold;
        }
        .empty-cart a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <?php
    if ($id_GioHang) {
        $cartItems = getCartItemsByCartId($id_GioHang); // Lấy sản phẩm trong giỏ hàng
        if ($cartItems) {
            $total = 0;
            ?>
            <h1>Giỏ hàng của bạn</h1>
            <?php foreach ($cartItems as $item):
                $product = getProductDetailsByCartId($item['id_SanPham']);
                $discount = getDiscountByProductId($item['id_SanPham']);
                $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);
                $total += $itemTotal;
                ?>
                <div class="cart-item">
                    <img src="../public/image/<?= htmlspecialchars($product['HinhAnh']); ?>" alt="<?= htmlspecialchars($product['TenSanPham']); ?>">
                    <div class="item-details">
                        <h2><?= htmlspecialchars($product['TenSanPham']); ?></h2>
                        <p>Giá: <?= number_format($product['Gia'], 0, ',', '.');?>đ</p>
                        <p>Danh mục: <?= getCategoryNameByProductId($product['id_DanhMuc']); ?></p>
                        <form method="POST" action="cart_update">
                            <div class="quantity">
                                <input type="number" name="SoLuong" value="<?= htmlspecialchars($item['SoLuong']); ?>" min="1" max="100">
                                <button type="submit">Cập nhật</button>
                            </div>
                            <input type="hidden" name="id_ChiTietGioHang" value="<?= $item['id_ChiTietGioHang']; ?>">
                        </form>
                        <form method="POST" action="cart_delete">
                            <input type="hidden" name="action" value="cart_delete">
                            <input type="hidden" name="id_ChiTietGioHang" value="<?= $item['id_ChiTietGioHang']; ?>">
                            <button type="submit" class="remove-btn">Xóa</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="total">
                <p>Tổng cộng: <?= number_format($total, 0, ',', '.');?>đ</p>
            </div>
            <a href="thanhtoan/<?=$_SESSION['id_KhachHang']?>"><button class="checkout-btn">Thanh Toán</button></a>
            <?php
        } else {
            ?>
            <div class="empty-cart">
                <img src="public/image/giohangtron.png" alt="Giỏ hàng trống">
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="home">Quay lại mua sắm</a>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="empty-cart">
            <img src="public/image/empty_cart.png" alt="Không tìm thấy giỏ hàng">
            <a href="sanpham.php">Quay lại mua sắm</a>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>






    