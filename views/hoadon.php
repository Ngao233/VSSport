<!-- hoadon.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Hóa Đơn</title>
</head>
<body>
    <h1>Hóa Đơn</h1>
    <p>Mã đơn hàng: <?php echo $donHang['id_DonHang']; ?></p>
    <p>Ngày đặt hàng: <?php echo $donHang['NgayDatHang']; ?></p>
    <p>Trạng thái: <?php echo $donHang['TrangThai']; ?></p>
    <h2>Chi Tiết Đơn Hàng</h2>
    <table border="1">
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
        </tr>
        <?php foreach ($chiTietDonHang as $chiTiet) { ?>
        <tr>
            <td><?php echo $chiTiet['id_SanPham']; ?></td>
            <td><?php echo $chiTiet['SoLuong']; ?></td>
            <td><?php echo $chiTiet['Gia']; ?></td>
            <td><?php echo $chiTiet['TongTien']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <p><strong>Tổng tiền: <?php echo array_sum(array_column($chiTietDonHang, 'TongTien')); ?></strong></p>
</body>
</html>
