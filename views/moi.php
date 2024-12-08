
<?php
session_start();


// Kiểm tra người dùng đăng nhập
if (!isset($_SESSION['id_KhachHang'])) {
    header("Location: dangnhap");
    exit();
}

$id_KhachHang = $_SESSION['id_KhachHang']; // ID khách hàng từ session

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $ten = trim($_POST['Ten'] ?? '');
    $email = trim($_POST['Email'] ?? '');
    $sdt = trim($_POST['Sdt'] ?? '');
    $diaChi = trim($_POST['DiaChi'] ?? '');
    $phuongthuc = trim($_POST['payment'] ?? '');
    $ghiChu = trim($_POST['GhiChu'] ?? '');

    try {
        // Bắt đầu giao dịch
        $conn->beginTransaction();

        // 1. Cập nhật hoặc thêm khách hàng
        $customer = getCustomerById($conn, $id_KhachHang);
        if ($customer) {
            updateCustomer($conn, $id_KhachHang, $ten, $email, $sdt);
        } else {
            insertCustomer($conn, $id_KhachHang, $ten, $email, $sdt);
        }

        // 2. Cập nhật hoặc thêm địa chỉ giao hàng
        $shipping = getShippingAddressByCustomerId($conn, $id_KhachHang);
        if ($shipping) {
            updateShippingAddress($conn, $id_KhachHang, $diaChi);
        } else {
            insertShippingAddress($conn, $id_KhachHang, $diaChi);
        }

        // 3. Cập nhật hoặc thêm phương thức thanh toán
        $payment = getPaymentMethodByCustomerId($conn, $id_KhachHang);
        if ($payment) {
            updatePaymentMethod($conn, $id_KhachHang, $phuongthuc);
        } else {
            insertPaymentMethod($conn, $id_KhachHang, $phuongthuc);
        }

        // 4. Tạo đơn hàng
        $id_DonHang = insertOrder($conn, $id_KhachHang, $ghiChu);

        // 5. Thêm chi tiết đơn hàng từ giỏ hàng
        $cartItems = getCartByCustomerId($conn, $id_KhachHang);
        foreach ($cartItems as $item) {
            $productId = $item['id_SanPham'];
            $soLuong = $item['SoLuong'];
            $gia = getProductPrice($conn, $productId); // Hàm lấy giá sản phẩm
            $discount = getDiscountByProductId($conn, $productId); // Lấy giảm giá
            $giaSauGiam = $gia * (1 - $discount / 100);

            // Thêm chi tiết đơn hàng
            insertOrderDetail($conn, $id_DonHang, $productId, $soLuong, $giaSauGiam);
        }

        // 6. Xóa giỏ hàng sau khi đặt hàng
        clearCart($conn, $id_KhachHang);

        // Hoàn tất giao dịch
        $conn->commit();

        echo "Đặt hàng thành công! Đơn hàng của bạn có ID: $id_DonHang";
    } catch (Exception $e) {
        // Rollback nếu có lỗi
        $conn->rollBack();
        echo "Có lỗi xảy ra: " . $e->getMessage();
    }
} else {
    echo "Yêu cầu không hợp lệ!";
    exit();
}

// --- Các hàm hỗ trợ --- //

function updateCustomer($conn, $id, $ten, $email, $sdt) {
    $sql = "UPDATE khachhang SET Ten = :ten, Email = :email, Sdt = :sdt WHERE id_KhachHang = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':ten' => $ten, ':email' => $email, ':sdt' => $sdt, ':id' => $id]);
}

function insertCustomer($conn, $id, $ten, $email, $sdt) {
    $sql = "INSERT INTO khachhang (id_KhachHang, Ten, Email, Sdt) VALUES (:id, :ten, :email, :sdt)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id, ':ten' => $ten, ':email' => $email, ':sdt' => $sdt]);
}

function updateShippingAddress($conn, $id, $diaChi) {
    $sql = "UPDATE diachi SET DiaChi = :diaChi WHERE id_KhachHang = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':diaChi' => $diaChi, ':id' => $id]);
}

function insertShippingAddress($conn, $id, $diaChi) {
    $sql = "INSERT INTO diachi (id_KhachHang, DiaChi) VALUES (:id, :diaChi)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id, ':diaChi' => $diaChi]);
}

function updatePaymentMethod($conn, $id, $phuongthuc) {
    $sql = "UPDATE phuongthucthanhtoan SET phuongthuc = :phuongthuc WHERE id_KhachHang = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':phuongthuc' => $phuongthuc, ':id' => $id]);
}

function insertPaymentMethod($conn, $id, $phuongthuc) {
    $sql = "INSERT INTO phuongthucthanhtoan (id_KhachHang, phuongthuc) VALUES (:id, :phuongthuc)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id, ':phuongthuc' => $phuongthuc]);
}

function insertOrder($conn, $id_KhachHang, $ghiChu) {
    $sql = "INSERT INTO donhang (id_KhachHang, GhiChu) VALUES (:id_KhachHang, :ghiChu)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_KhachHang' => $id_KhachHang, ':ghiChu' => $ghiChu]);
    return $conn->lastInsertId();
}

function insertOrderDetail($conn, $id_DonHang, $id_SanPham, $soLuong, $gia) {
    $sql = "INSERT INTO chitietdonhang (id_DonHang, id_SanPham, SoLuong, Gia) 
            VALUES (:id_DonHang, :id_SanPham, :soLuong, :gia)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_DonHang' => $id_DonHang, ':id_SanPham' => $id_SanPham, ':soLuong' => $soLuong, ':gia' => $gia]);
}

function clearCart($conn, $id_KhachHang) {
    $sql = "DELETE FROM giohang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_KhachHang' => $id_KhachHang]);
}

function getCartByCustomerId($conn, $id_KhachHang) {
    $sql = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_KhachHang' => $id_KhachHang]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<?php

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

// Lấy thông tin khách hàng, phương thức thanh toán và địa chỉ giao hàng
$customer = getCustomerById($conn, $id_KhachHang) ?: ['Ten' => '', 'Email' => '', 'Sdt' => ''];
$payment = getPaymentMethodByCustomerId($conn, $id_KhachHang) ?: ['phuongthuc' => ''];
$shippingAddress = getShippingAddressByCustomerId($conn, $id_KhachHang) ?: ['DiaChi' => ''];
?> 

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thanh Toán</title>
<link rel="stylesheet" href="public/css/thanhtoan.css">
<link rel="stylesheet" href="public/css/style1.css">
<link rel="stylesheet" href="../public/css/style1.css">
<link rel="stylesheet" href="../public/css/style.css">
<link rel="stylesheet" href="../public/css/thanhtoan.css">  
<link
    href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
    rel="stylesheet">
<script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>
<style>
    body h2 {
        font-family: 'Montserrat', sans-serif;
        margin-left: 10%;
        margin-top: 40px;
    }
</style>
</head>
<body>
<div class="pay">
<!-- Form thanh toán -->
<form class="form-pay" action="update_payment" method="post">
<h2>Thông Tin Người Dùng</h2>

<label>Họ và Tên:</label>
<input class="input-onea" type="text" name="Ten" placeholder="Nhập họ và tên" 
       value="<?= htmlspecialchars($customer['Ten']) ?>"><br>

<label>Email:</label>
<input class="input-onea" type="email" name="Email" placeholder="Nhập email" 
       value="<?= htmlspecialchars($customer['Email']) ?>"><br>

<label>Số điện thoại:</label>
<input class="input-onea" type="text" name="Sdt" placeholder="Nhập số điện thoại" 
       value="<?= htmlspecialchars($customer['Sdt']) ?>"><br>

<label>Địa chỉ giao hàng:</label>
<input class="input-onea" type="text" name="DiaChi" placeholder="Nhập địa chỉ giao hàng" 
       value="<?= htmlspecialchars($shippingAddress['DiaChi']) ?>"><br>

<h3>Phương Thức Thanh Toán</h3>
<div class="payment-options">
    <label>
        <input class="input-onea" type="radio" name="payment" value="TienMat" 
               <?= $payment['phuongthuc'] === 'TienMat' ? 'checked' : '' ?>>
        Tiền mặt
    </label>
    <label>
        <input class="input-onea" type="radio" name="payment" value="ChuyenKhoan" 
               <?= $payment['phuongthuc'] === 'ChuyenKhoan' ? 'checked' : '' ?>>
        Chuyển khoản
    </label>
</div>

<h3>Thông tin bổ sung</h3>
<textarea name="GhiChu" placeholder="Ghi chú...."><?= htmlspecialchars($_POST['GhiChu'] ?? '') ?></textarea>
<hr>
<div>
    <q>
        Bằng cách tiến hành mua hàng, bạn phải điền đầy đủ thông tin của chúng tôi.
    </q>
</div>
<button type="submit">Hoàn tất</button>
</form>


<!-- Tóm tắt đơn hàng -->
<div class="summary-pay">
<h3>Tóm tắt đơn hàng</h3>
<?php
$total = 0; // Khởi tạo tổng tiền giỏ hàng

    if (!empty($cartItems)): 
        
        $total = 0; // Khởi tạo tổng ở đây  
        foreach ($cartItems as $item):   
            // Lấy thông tin sản phẩm từ id_SanPham  
            $product = getProductDetailsByCartId($item['id_SanPham']); // Hàm lấy chi tiết sản phẩm  
            $discount = getDiscountByProductId($item['id_SanPham']); // Lấy giá trị giảm giá từ bảng sản phẩm  

            // Tính tổng tiền sản phẩm sau giảm giá  
            $itemTotal = $product['Gia'] * $item['SoLuong'] * (1 - $discount / 100);  
            $total += $itemTotal;   
?>
    <div class="item-onea">
        <img src="public/image/<?= htmlspecialchars($product['HinhAnh']); ?>" alt="<?= htmlspecialchars($product['TenSanPham']); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
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
<!--js mien phi shipping-->
<script>
// Lấy checkbox và phần hiển thị phí giao hàng
const freeShippingCheckbox = document.getElementById("freeShipping");
const shippingCostElement = document.getElementById("shippingCost");

// Lắng nghe sự kiện thay đổi trạng thái của checkbox
freeShippingCheckbox.addEventListener("change", function () {
    if (this.checked) {
        // Nếu "Miễn phí shipping" được chọn
        shippingCostElement.innerHTML = 
            '<span>Giao hàng đến VietNam</span>' +
            '<span>Miễn phí</span>';
    } else {
        // Nếu "Miễn phí shipping" không được chọn
        shippingCostElement.innerHTML = 
            '<span>Giao hàng đến VietNam</span>' +
            '<span>30,000đ</span>';
    }
});
</script>


</body>
</html>
