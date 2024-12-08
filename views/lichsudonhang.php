<?php

// Kiểm tra khách hàng đã đăng nhập chưa
if (session_status() == PHP_SESSION_NONE) {  
    session_start();  
}
if (!isset($_SESSION['id_KhachHang'])) {
    echo "Bạn cần đăng nhập để xem lịch sử đơn hàng.";
    exit();
}

$id_KhachHang = $_SESSION['id_KhachHang'];  // Lấy id khách hàng từ session

// Truy vấn lịch sử đơn hàng của khách hàng
$sql = "SELECT donhang.id_DonHang, donhang.NgayDatHang, donhang.TrangThai, donhang.Tong
        FROM donhang
        WHERE donhang.id_KhachHang = :id_KhachHang
        ORDER BY donhang.NgayDatHang DESC";  // Sắp xếp theo ngày đặt hàng giảm dần
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
$stmt->execute();
$orderHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Đơn Hàng</title>
            <style>
        h1 {
            text-align: center;
            color: black;
            margin-top: 20px;
            font-size: 32px;
        }

        /* Kiểu dáng cho bảng lịch sử đơn hàng */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #FFA031;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            color: #FFA031;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Khi không có đơn hàng */
        p {
            text-align: center;
            font-size: 18px;
            color: #555;
        }

        /* Định dạng cho các thông báo lỗi hoặc yêu cầu đăng nhập */
        .alert {
            text-align: center;
            color: red;
            font-size: 18px;
        }
            </style>
</head>
<body>
    <h1>Lịch Sử Đơn Hàng</h1>
    
    <!-- Hiển thị danh sách đơn hàng -->
    <?php if (!empty($orderHistory)): ?>
        <table border="1" cellspacing="0" cellpadding="10" style="width: 80%; margin: 20px auto; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #FFA031; color: white;">
                    <th>Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderHistory as $order): ?>
                    <tr>
                        <td>Số <?= htmlspecialchars($order['id_DonHang']) ?></td>
                        <td><?= date('Y/m/d H:i:s', strtotime($order['NgayDatHang'])) ?></td>
                        <td><?= htmlspecialchars($order['TrangThai']) ?></td>
                        <td><?= number_format($order['Tong'], 0, ',', '.') ?> đ</td>
                        <td><a href="chitiet/<?= $order['id_DonHang'] ?>">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có đơn hàng nào trong lịch sử của bạn.</p>
    <?php endif; ?>
</body>
</html>

