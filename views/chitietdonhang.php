<?php
// Lấy id_DonHang từ URL
$requestUri = $_SERVER['REQUEST_URI'];  
$parts = explode('/', $requestUri);  
$orderId = intval(end($parts)); // Đảm bảo orderId là số nguyên  

// Kiểm tra nếu không có orderId hoặc không hợp lệ  
if (!$orderId) {  
    echo "Không tìm thấy ID đơn hàng.";  
    exit();  
}  

try {
    // Truy vấn lấy thông tin chi tiết của đơn hàng và thông tin người dùng
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
        echo "Không tìm thấy thông tin đơn hàng.";
        exit();
    }

    // Lấy id_KhachHang từ kết quả đơn hàng
    $idKhachHang = $orderDetails[0]['id_KhachHang'];

    // Truy vấn để lấy thông tin địa chỉ từ bảng diachinguoidung
    $addressSql = "SELECT DiaChi FROM diachinguoidung WHERE id_KhachHang = :idKhachHang";
    $addressStmt = $conn->prepare($addressSql);
    $addressStmt->bindParam(':idKhachHang', $idKhachHang, PDO::PARAM_INT);
    $addressStmt->execute();
    $address = $addressStmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra nếu không tìm thấy địa chỉ
    $customerAddress = $address['DiaChi'] ?? 'Không có địa chỉ';
} catch (PDOException $e) {
    echo "Lỗi truy vấn: " . $e->getMessage();
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
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
</head>
<body>
    <h1>Chi Tiết Đơn Hàng</h1>
    <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($orderDetails[0]['Ten']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($orderDetails[0]['Email']) ?></p>
    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($customerAddress) ?></p>

    <h2>Chi tiết sản phẩm:</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['TenSanPham']) ?></td>
                    <td><?= htmlspecialchars($item['SoLuong']) ?></td>
                    <td><?= number_format($item['TongTien'], 0, ',', '.') ?> đ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Tổng cộng:</strong> <?= number_format($orderDetails[0]['Tong'], 0, ',', '.') ?> đ</p>


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
