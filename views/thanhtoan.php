<?php
include_once "model/cart.php";
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
    <form class="form-pay" action="process_checkout.php" method="post">
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
