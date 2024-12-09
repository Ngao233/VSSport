<?php
$orderId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra id_DonHang có hợp lệ không
if ($orderId === 0) {
    echo "ID đơn hàng không hợp lệ.";
    exit();
}

try {
    // Truy vấn thông tin đơn hàng
    $sql = "SELECT donhang.NgayDatHang, donhang.TrangThai, donhang.Tong,
                    chitietdonhang.SoLuong, chitietdonhang.TongTien, sanpham.TenSanPham,
                    khachhang.Ten, khachhang.Email, khachhang.id_KhachHang
            FROM donhang
            JOIN chitietdonhang ON donhang.id_DonHang = chitietdonhang.id_DonHang
            JOIN sanpham ON chitietdonhang.id_SanPham = sanpham.id_SanPham
            JOIN khachhang ON donhang.id_KhachHang = khachhang.id_KhachHang
            WHERE donhang.id_DonHang = :orderId";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmt->execute();
    $orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($orderDetails)) {
        echo "Không tìm thấy đơn hàng. ID: " . htmlspecialchars($orderId);
        exit();
    }

    // Lấy id_KhachHang
    $idKhachHang = $orderDetails[0]['id_KhachHang'];

    // Truy vấn địa chỉ
    $addressSql = "SELECT DiaChi FROM diachinguoidung WHERE id_KhachHang = :idKhachHang";
    $addressStmt = $conn->prepare($addressSql);
    $addressStmt->bindParam(':idKhachHang', $idKhachHang, PDO::PARAM_INT);
    $addressStmt->execute();
    $address = $addressStmt->fetch(PDO::FETCH_ASSOC);

    if (empty($address)) {
        echo "Không tìm thấy địa chỉ cho khách hàng ID: " . htmlspecialchars($idKhachHang);
        exit();
    }

    $customerAddress = $address['DiaChi'] ?? 'Không có địa chỉ';
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hóa Đơn</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/hoadon.css"> 
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/search.css">
     <!-- <link rel="stylesheet" href="public/css/dangky.css"> -->
     <!-- <link rel="stylesheet" href="public/css/dangnhap.css"> -->
     <!-- <link rel="stylesheet" href="public/css/diachi.css"> -->
     <!-- <link rel="stylesheet" href="public/css/doimatkhau.css"> -->
     <!-- <link rel="stylesheet" href="public/css/hoso.css"> -->

     <link rel="stylesheet" href="public/css/sanpham.css">
     <link rel="stylesheet" href="public/css/styleAdmin.css">
     <!-- <link rel="stylesheet" href="public/css/thanhtoan.css"> -->
     <link rel="stylesheet" href="public/css/tintuc.css">

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
                margin-top: 60px;
            }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #ff6600;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            width: 30%;
            float: left;
            padding-right: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .order-info {
            width: 65%;
            margin: 0 auto; /* Căn giữa */
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #ff6600;
            color: white;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        /* Đảm bảo layout không bị xô đẩy khi thu nhỏ màn hình */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
            }

            .user-info, .order-info {
                width: 100%;
                float: none;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
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
            <a href="../home"><img src="../public/image/logo.png" alt="" style="width: 155px ;"></a>
            <ul>
                <li><a href="../home">TRANG CHỦ</a></li>
                <li><a href="../tonghoptt">THÔNG TIN</a></li>
                <li><a href="../dangky">ĐĂNG KÝ</a></li>
                <li><a href="../dangnhap">ĐĂNG NHẬP</a></li>
            </ul>
            <!-- icon bao gom "shoping" "user" "seach" -->
            <div class="icon">
            <i id="search" style="color: white; font-size: 20px;" class="fa-solid fa-magnifying-glass"></i>
                <a href="../giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="../hoso"><i class="fa-solid fa-user"></i></a>
                
            </div>
            <form action="searchome" class="formSearchhome" method="post">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

        </nav>
 
    <div class="container">
        <h1>Chi Tiết Hóa Đơn</h1>

        <div class="user-info">
            <!-- Hiển thị thông tin khách hàng -->
            <?php if ($orderDetails): ?>
                <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($orderDetails[0]['Ten']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($orderDetails[0]['Email']) ?></p>
                <!-- Hiển thị địa chỉ -->
                <?php if ($address): ?>
                    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($address['DiaChi']) ?></p>
                <?php else: ?>
                    <p><strong>Địa chỉ không có sẵn.</strong></p>
                <?php endif; ?>
            <?php else: ?>
                <p>Không tìm thấy thông tin chi tiết cho đơn hàng này.</p>
            <?php endif; ?>
        </div>

        <div class="order-info">
            <!-- Hiển thị thông tin đơn hàng -->
            <?php if ($orderDetails): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderDetails as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['TenSanPham']) ?></td>
                                <td><?= htmlspecialchars($item['SoLuong']) ?></td>
                                <td><?= number_format($item['TongTien'] / max($item['SoLuong'], 1), 0, ',', '.') ?> đ</td>
                                <td><?= number_format($item['TongTien'], 0, ',', '.') ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Hiển thị tổng cộng đơn hàng -->
                <div class="total">
                    <p><strong>Tổng cộng:</strong> <?= number_format($orderDetails[0]['Tong'], 0, ',', '.') ?> đ</p>
                </div>
            <?php endif; ?>
        </div>

        <div style="clear: both;"></div>
    </div>
    <footer>
    <div class="footer-column-left">
        <h3>Liên hệ</h3>
        <hr>
        <h3>Hotline: </h3>
        <p>(+84)098765432</p>
        <h3>Email: </h3>
        <p>support@gmail.com</p>
        <h3>Thời gian làm việc</h3>
        <p>06:00 - 18:00 hằng ngày</p>
    </div>
    <div class="footer-column-left">

    </div>
    <div class="footer-column-right">
        <h3>Theo dõi tại</h3>
        <hr>
        <a href="#">Facebook</a><br>
        <a href="#">Twitter</a><br>
        <a href="#">Youtube</a><br>
        <a href="#">Instagram</a><br>

    </div>
</footer>
</body>
</html>
