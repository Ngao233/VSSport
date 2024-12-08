<?php  
// Lấy id_DonHang từ URL  
$orderId = isset($_GET['id']) ? intval($_GET['id']) : 0;  

// Truy vấn lấy thông tin chi tiết của đơn hàng và thông tin người dùng  
$sql = "SELECT donhang.NgayDatHang, donhang.TrangThai, donhang.Tong,
                chitietdonhang.SoLuong, chitietdonhang.TongTien, sanpham.TenSanPham,
                khachhang.Ten, khachhang.Email, khachhang.id_DiaChi
        FROM donhang
        JOIN chitietdonhang ON donhang.id_DonHang = chitietdonhang.id_DonHang
        JOIN sanpham ON chitietdonhang.id_SanPham = sanpham.id_SanPham
        JOIN khachhang ON donhang.id_KhachHang = khachhang.id_KhachHang
        WHERE donhang.id_DonHang = :orderId";
        
$stmt = $conn->prepare($sql);
$stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
$stmt->execute();
$orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lấy id_DiaChi của khách hàng
$idDiaChi = $orderDetails[0]['id_DiaChi'] ?? 0;

// Truy vấn để lấy thông tin địa chỉ từ bảng diachinguoidung
$addressSql = "SELECT DiaChi FROM diachinguoidung WHERE id_DiaChi = :idDiaChi";
$addressStmt = $conn->prepare($addressSql);
$addressStmt->bindParam(':idDiaChi', $idDiaChi, PDO::PARAM_INT);
$addressStmt->execute();
$address = $addressStmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hóa Đơn</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        
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

</body>
</html>
