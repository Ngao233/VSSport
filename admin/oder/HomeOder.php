<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <h2 class="mb-3">Danh sách đơn hàng</h2>
    <form action="searchproduct" method="post">
        <input type="search" class="form-control mb-3" name="search" placeholder="Tìm kiếm đơn hàng...">
        <button class="btn btn-primary">Tìm</button>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <tr>
                    <th>Id đơn hàng</th>
                    <th>Id Khách Hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oder as $oder): ?>
                    <tr>
                        <td><?=$oder["id_DonHang"]?></td>
                        <td><?=$oder["id_KhachHang"]?></td>
                        <td><?=$oder["NgayDatHang"]?></td>
                        <td><?=$oder["TrangThai"]?></td>
                        <td>
                            <!-- Nút Duyệt thay vì Sửa -->
                            <?php if ($oder["TrangThai"] !== 'Đã xử lý'): ?>
                                <a href="/<?=$oder["id_DonHang"]?>" class="btn btn-sm btn-success">
                                    Duyệt
                                </a>
                            <?php else: ?>
                                <span class="btn btn-sm btn-secondary" disabled>Đã xử lý</span>
                            <?php endif; ?>
                            <br>
                            <a href="deleteoder/<?=$oder["id_DonHang"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger">
                                <i data-feather="trash-2"></i>Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
