<?php
include_once 'model/lichsu.php'
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
        p {
            text-align: center;
            font-size: 18px;
            color: #555;
        }
        .alert {
            text-align: center;
            color: red;
            font-size: 18px;
        }

        input[type="submit"] {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type="submit"]:disabled {
            background-color: grey;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Lịch Sử Đơn Hàng</h1>
    <?php if (!empty($orderHistory)): ?>
        <table>
            <thead>
                <tr>
                    <th>Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
                    <th>Chi Tiết</th>
                    <th>Hủy Đơn</th>
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
                        <td>
                            <!-- Hiển thị nút hủy chỉ khi trạng thái không phải là "Đã hủy" và "Đã xử lý" -->
                            <?php if ($order['TrangThai'] != 'Đã hủy' && $order['TrangThai'] != 'Đã xử lý'): ?>
                                <form method="POST" style="margin: 0;">
                                    <input type="hidden" name="order_id" value="<?= $order['id_DonHang'] ?>">
                                    <input type="submit" name="cancel_order" value="Hủy Đơn">
                                </form>
                            <?php else: ?>
                                <input type="submit" value="Không thể hủy" disabled>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có đơn hàng nào trong lịch sử của bạn.</p>
    <?php endif; ?>
</body>
</html>
