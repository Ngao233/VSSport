<?php  
session_start();  
 // Đảm bảo đã kết nối với cơ sở dữ liệu  

// Kiểm tra người dùng đã đăng nhập hay chưa  
if (!isset($_SESSION['id_KhachHang'])) {  
    header("Location: dangnhap");  
    exit();  
}  

$id_KhachHang = $_SESSION['id_KhachHang']; // ID khách hàng từ session  

// Truy vấn giỏ hàng của khách hàng  
$sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";  
$stmt = $conn->prepare($sql);  
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
$stmt->execute();  
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);  

// Lấy thông tin khách hàng  
$customers = getCustomerById($conn, $id_KhachHang) ?: ['Ten' => '', 'Email' => '', 'Sdt' => ''];  


// Khởi tạo biến cho thông tin thanh toán  
$feedback = '';  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    // Lấy dữ liệu từ form  
    $ten = trim($_POST['Ten'] ?? '');  
    $email = trim($_POST['Email'] ?? '');  
    $sdt = trim($_POST['Sdt'] ?? '');  
    $diaChi = trim($_POST['DiaChi'] ?? '');  
    $ghiChu = trim($_POST['GhiChu'] ?? '');  
    $paymentMethodId = $_POST['payment'] ?? '';  

    if (empty($ten) || empty($email) || empty($sdt) || empty($diaChi) || empty($paymentMethodId)) {  
        $feedback = "Vui lòng điền đầy đủ mọi thông tin.";  
    }  else {  
        try {   
                $sqlAddress = "INSERT INTO diachinguoidung (DiaChi, id_KhachHang) VALUES (:DiaChi, :id_KhachHang)";  
                $stmtAddress = $conn->prepare($sqlAddress);  
                $stmtAddress->bindParam(':DiaChi', $diaChi);  
                $stmtAddress->bindParam(':id_KhachHang', $id_KhachHang);  
                $stmtAddress->execute();  
                $addressId = $conn->lastInsertId();

             
            $total = 0;   
            foreach ($cartItems as $item) {  
                $product = getProductDetailsByCartId($item['id_SanPham']);  
                $discount = getDiscountByProductId($item['id_SanPham']);  
                $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);  
                $total += $itemTotal;  
            }  

           
            $sqlOrder = "INSERT INTO donhang (id_KhachHang, Tong) VALUES (:id_KhachHang, :Tong)";  
            $stmtOrder = $conn->prepare($sqlOrder);  
            $stmtOrder->bindParam(':id_KhachHang', $id_KhachHang);  
            $stmtOrder->bindParam(':Tong', $total);  

           
            if ($stmtOrder->execute()) {  
                $orderId = $conn->lastInsertId();   

                $sqlDetail = "INSERT INTO chitietdonhang (id_DonHang, id_SanPham, SoLuong, TongTien, id_DiaChi, id_PhuongThucThanhToan, GhiChu)   
                              VALUES (:id_DonHang, :id_SanPham, :SoLuong, :TongTien, :id_DiaChi, :id_PhuongThucThanhToan, :GhiChu)";  
                $stmtDetail = $conn->prepare($sqlDetail);  

                foreach ($cartItems as $item) {  
                    $product = getProductDetailsByCartId($item['id_SanPham']); 
                
                    
                    $discount = getDiscountByProductId($item['id_SanPham']);  
                    $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);   
                
                    $stmtDetail->bindParam(':id_DonHang', $orderId);  
                    $stmtDetail->bindParam(':id_SanPham', $item['id_SanPham']);  
                    $stmtDetail->bindParam(':SoLuong', $item['SoLuong']);  
                    $stmtDetail->bindParam(':TongTien', $itemTotal); 
                    $stmtDetail->bindParam(':id_DiaChi', $addressId);   
                    $stmtDetail->bindParam(':id_PhuongThucThanhToan', $paymentMethodId);
                    $stmtDetail->bindParam(':GhiChu', $ghiChu);   
                    $stmtDetail->execute();   
                }  
                $detailId = $conn->lastInsertId();  

                $sqlUpdateOrder = "UPDATE donhang SET id_ChiTietDonHang = :id_ChiTietDonHang WHERE id_DonHang = :id_DonHang";  
                $stmtUpdateOrder = $conn->prepare($sqlUpdateOrder);  
                $stmtUpdateOrder->bindParam(':id_ChiTietDonHang', $detailId); 
                $stmtUpdateOrder->bindParam(':id_DonHang', $orderId);  
                $stmtUpdateOrder->execute();



                $stmtDeleteCart = $conn->prepare("DELETE FROM giohang WHERE id_KhachHang = :id_KhachHang");  
                $stmtDeleteCart->bindParam(':id_KhachHang', $id_KhachHang);  
                $stmtDeleteCart->execute();  

                header("Location: {$base_url}/hoadon/" . $orderId); 
                exit();  
            } else {  
                $feedback = "Có lỗi trong quá trình tạo đơn hàng.";  
            }  
        } catch (Exception $e) {  
            $feedback = "Có lỗi xảy ra: " . $e->getMessage();  
        }  
    }  
}

    $ngayDatHang = date('Y-m-d H:i:s');
    $sqlOrder = "INSERT INTO donhang (id_KhachHang, Tong, NgayDatHang) VALUES (:id_KhachHang, :Tong, :NgayDatHang)";  
    $stmtOrder = $conn->prepare($sqlOrder);  
    $stmtOrder->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
    $stmtOrder->bindParam(':Tong', $total);  
    $stmtOrder->bindParam(':NgayDatHang', $ngayDatHang);  

 
?>  

<!DOCTYPE html>  
<html lang="vi">  
<head>  
<meta charset="UTF-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Thanh Toán</title>  
<link rel="stylesheet" href="../public/css/thanhtoan.css">  
<link rel="stylesheet" href="../public/css/style1.css">
<script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>  
</head>  
<style>
    .formSearchhome{
    position: absolute;
    right: 180px;
    top: 35px;
    }
    .searchhome {
        padding: 8px !important;
        border: none;
        border-radius: 5px;
        width: 180px;
        display: none;
        transition: transform 1s ease;
        transform: translateX(100%);
    }
    .searchhome.show {  
        display: block; 
        transform: translateX(0);  
    }
</style>
<body>  
<header>
        <!-- menu phu -->
        <nav class="menu-one">
            <ul>
                <li><a href="home">VSSport.vn</a></li>
                <div>
                    <li><a href="#">Giúp đỡ</a></li>
                    <li><a href="#">Ngôn ngữ</a></li>
                </div>
            </ul>
        </nav>
        <!-- menu chinh -->
        <nav class="menu-two">
            <a href="home"><img src="public/image/logo.png" alt="" style="width: 155px ;"></a>
            <ul>
                <li><a href="<?= $base_url ?>/home">TRANG CHỦ</a></li>
                <li><a href="<?= $base_url ?>/tonghoptt">Thông Tin</a></li>
                <li><a href="<?= $base_url ?>/dangky">ĐĂNG KÝ</a></li>
                <li><a href="<?= $base_url ?>/dangnhap">ĐĂNG NHẬP</a></li>
            </ul>
            <!-- icon bao gom "shoping" "user" "seach" -->
            <div class="icon">
            <i id="search" style="color: white; font-size: 20px;" class="fa-solid fa-magnifying-glass"></i>
                <a href="giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="hoso"><i class="fa-solid fa-user"></i></a>
                
            </div>
            <form action="searchome" class="formSearchhome" method="post">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

        </nav>

        <img src="" alt="">
        </section>
</header>
<div class="pay">  
    <?php if ($feedback): ?>  
        <div class="feedback"><?= htmlspecialchars($feedback) ?></div>  
    <?php endif; ?>  

    <form class="form-pay" action="" method="post">  
        <h2>Thông Tin Người Dùng</h2>  

        <label>Họ và Tên:</label>  
        <input class="input-onea" type="text" name="Ten" placeholder="Nhập họ và tên"   
               value="<?= htmlspecialchars($customers['Ten']) ?>" required><br>  

        <label>Email:</label>  
        <input class="input-onea" type="email" name="Email" placeholder="Nhập email"   
               value="<?= htmlspecialchars($customers['Email']) ?>" required><br>   

        <label>Số điện thoại:</label>  
        <input class="input-onea" type="tel" name="Sdt" placeholder="Nhập số điện thoại"   
               value="<?= htmlspecialchars($customers['Sdt']) ?>" required><br>  

        <label>Địa chỉ giao hàng:</label>  
        <input class="input-onea" type="text" name="DiaChi" placeholder="Nhập địa chỉ giao hàng"   
               value="<?= htmlspecialchars($_POST['DiaChi'] ?? ''); ?>" required><br>  

        <h3>Phương Thức Thanh Toán</h3>  
            <div class="payment-options">  
        <label>  
            <input class="input-onea" type="radio" name="payment" value="1" required>  
            Tiền mặt  
        </label>  
        <label>  
            <input class="input-onea" type="radio" name="payment" value="2" required> 
            Chuyển khoản  
        </label>  
    </div>

        <h3>Thông tin bổ sung</h3>  
        <textarea name="GhiChu" placeholder="Ghi chú...."><?= htmlspecialchars($_POST['GhiChu'] ?? '') ?></textarea>  
        <hr>  
        <button type="submit">Hoàn tất</button>  
    </form>  
    <div class="summary-pay">  
        <h3>Tóm tắt đơn hàng</h3>  
        <?php  
        $total = 0;  

        if (!empty($cartItems)):   
            foreach ($cartItems as $item):   
                $product = getProductDetailsByCartId($item['id_SanPham']);  
                $discount = getDiscountByProductId($item['id_SanPham']);  
                $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);  
                $total += $itemTotal;   
        ?>  
            <div class="item-onea">  
                <img src="../public/image/<?= htmlspecialchars($product['HinhAnh']); ?>" alt="<?= htmlspecialchars($product['TenSanPham']); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px; margin-right: 10px;">  
                <span><?= htmlspecialchars($product['TenSanPham']); ?></span>  
                <span><?= number_format($itemTotal, 0, ',', '.'); ?> đ</span>  
            </div>  
        <?php endforeach; ?>  
        <hr>  
        <div class="item-onea total">  
            <span>Tạm tính</span>  
            <span><?= number_format($total, 0, ',', '.'); ?> đ</span>  
        </div>  
        <div class="item-onea total">  
            <span>Phí giao hàng</span>  
            <span>30,000 đ</span>  
        </div>  
        <div class="item-onea total">  
            <span style="font-weight: bold; font-size: 1.1em;">Tổng cộng</span>  
            <span style="font-weight: bold; font-size: 1.1em;"><?= number_format($total + 30000, 0, ',', '.'); ?> đ</span>  
        </div>  
        <?php else: ?>  
            <p>Giỏ hàng của bạn đang trống.</p>  
        <?php endif; ?>  
    </div>  
</div>  
<script> 
document.getElementById('search').addEventListener('click',()=>{
  document.getElementById('searchInput').classList.toggle('show');
})
</script>
</body>  
</html>