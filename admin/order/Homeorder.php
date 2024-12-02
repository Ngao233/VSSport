<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve'])) {
        $orderId = $_POST['order_id'];
        // Cập nhật trạng thái đơn hàng
        updateOrderStatus($orderId, 'approved');
    } elseif (isset($_POST['delete'])) {
        $orderId = $_POST['order_id'];
        $order = getOrderById($orderId); // Lấy chi tiết đơn hàng
        if ($order['TrangThai'] === 'pending') {
            deleteOrder($orderId); // Xóa đơn hàng
        } else {
            echo "<script>alert('Không thể xóa đơn hàng đã được duyệt!');</script>";
        }
    }
}
?>

<h3>Danh Sách Đơn Hàng</h3>  
<table>  
    <thead>  
        <tr>  
            <th>ID Đơn Hàng</th>  
            <th>Ngày Đặt Hàng</th>  
            <th>Trạng Thái</th>  
            <th>Hành Động</th>  
        </tr>  
    </thead>  
    <tbody>  
        <?php foreach ($order as $order): ?>  
            <tr>  
                <td><?= $order['id_DonHang'] ?></td>  
                <td><?= $order['NgayDatHang'] ?></td>  
                <td><?= $order['TrangThai'] === 'approved' ? 'Đã duyệt' : 'Chưa duyệt' ?></td>
                <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?= $order['id_DonHang'] ?>">
                            <?php if ($order['TrangThai'] === 'pending'): ?>
                                <button type="submit" name="approve">Duyệt</button>
                            <?php endif; ?>
                            <button type="submit" name="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                        </form>
                    </td>
            </tr>  
        <?php endforeach; ?>  
    </tbody>  
</table>