
    <style>
      main {
    background-color: #fff; /* Màu nền trắng cho phần chính */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
    padding: 20px;
    }

    /* Định dạng cho tiêu đề */
    main h1.h2 {
        color: #333;
    }

    /* Định dạng cho các thẻ thống kê */
    .stat-card {
        background-color: #ffffff; /* Nền màu trắng */
        border: 1px solid #ddd; /* Viền nhẹ */
        border-radius: 8px; /* Bo góc */
        padding: 15px; /* Padding */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        transition: transform 0.2s; /* Hiệu ứng khi hover */
    }

    .stat-card:hover {
        transform: translateY(-5px); /* Nâng thẻ lên khi hover */
    }

    /* Định dạng cho các tiêu đề trong thẻ */
    main h5 {
        margin-bottom: 10px; /* Khoảng cách dưới tiêu đề */
        color: #007bff; /* Màu xanh cho tiêu đề */
    }

    /* Định dạng cho danh sách sản phẩm sắp hết hàng */
    main ul {
        list-style-type: none; /* Loại bỏ dấu đầu dòng */
        padding: 0; /* Xóa padding */
    }

    main ul li {
        padding: 5px 0; /* Khoảng cách giữa các sản phẩm */
        color: #555; /* Màu chữ cho sản phẩm */
    }

    /* Định dạng cho các thẻ p */
    main p {
        margin: 0 0 5px; /* Khoảng cách dưới mỗi đoạn văn */
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stat-card {
            margin-bottom: 20px; /* Khoảng cách dưới cho các thẻ trên màn hình nhỏ */
        }
    }
    </style>
</head>



<?php

// Hàm để lấy thông tin sản phẩm
function getProductCount($conn) {
  // Tính tổng số sản phẩm
  $totalSql = "SELECT COUNT(*) AS total FROM sanpham";
  $totalStmt = $conn->query($totalSql);
  $totalCount = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];

  // Tính số sản phẩm còn hàng
  $inStockSql = "SELECT COUNT(*) AS in_stock FROM sanpham WHERE SoLuong > 5";
  $inStockStmt = $conn->query($inStockSql);
  $inStockCount = $inStockStmt->fetch(PDO::FETCH_ASSOC)['in_stock'];

  // Lấy thông tin sản phẩm sắp hết hàng
  $lowStockSql = "SELECT * FROM sanpham WHERE SoLuong <= 5";
  $lowStockStmt = $conn->query($lowStockSql);
  $lowStockProducts = $lowStockStmt->fetchAll(PDO::FETCH_ASSOC);

  return [
      'total' => $totalCount,
      'in_stock' => $inStockCount,
      'low_stock' => $lowStockProducts // Trả về danh sách sản phẩm sắp hết hàng
  ];
}

// Hàm để lấy thông tin đơn hàng
function getOrderStats($conn) {
    $todaySql = "SELECT COUNT(*) AS today FROM donhang WHERE DATE(NgayDatHang) = CURDATE()";
    $confirmedSql = "SELECT COUNT(*) AS confirmed FROM donhang WHERE TrangThai = 'Đã xử lý'";
    
    $todayResult = $conn->query($todaySql);
    $confirmedResult = $conn->query($confirmedSql);
    
    return [
        'today' => $todayResult->fetch(PDO::FETCH_ASSOC)['today'], // Sử dụng fetch() ở đây
        'confirmed' => $confirmedResult->fetch(PDO::FETCH_ASSOC)['confirmed'] // Sử dụng fetch() ở đây
    ];
}

// Hàm để lấy số lượng người dùng
function getUserCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM khachhang";
    $result = $conn->query($sql);
    return $result->fetch(PDO::FETCH_ASSOC)['count']; // Sử dụng fetch() ở đây
}

// Hàm để lấy thông tin thống kê bán hàng
function getSalesStats($conn) {
  // Tính tổng doanh thu
  $revenueSql = "SELECT SUM(TongTien) AS revenue FROM chitietdonhang WHERE TrangThai = 'Đã xử lý'";
  $revenueResult = $conn->query($revenueSql);
  
  // Tính số đơn hàng chưa xử lý
  $pendingSql = "SELECT COUNT(*) AS pending FROM donhang WHERE TrangThai = 'Chưa xử lý'";
  $pendingResult = $conn->query($pendingSql);
  
  // Tính tổng số lượng đơn hàng
  $totalOrdersSql = "SELECT COUNT(*) AS total_orders FROM donhang";
  $totalOrdersResult = $conn->query($totalOrdersSql);

  return [
      'revenue' => $revenueResult->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0, // Sử dụng ?? để trả về 0 nếu revenue là NULL
      'pending' => $pendingResult->fetch(PDO::FETCH_ASSOC)['pending'],
      'total_orders' => $totalOrdersResult->fetch(PDO::FETCH_ASSOC)['total_orders']
  ];
}

// Lấy thông tin
$productStats = getProductCount($conn);
$orderStats = getOrderStats($conn);
$userCount = getUserCount($conn);
$salesStats = getSalesStats($conn);
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Thống Kê</h1>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <h5>Sản phẩm</h5>
                <p>Tổng số: <?php echo $productStats['total']; ?></p>
                <p>Sản phẩm còn hàng: <?php echo $productStats['in_stock']; ?></p>
                <h6>Sản phẩm sắp hết hàng:</h6>
                <ul>
                    <?php foreach ($productStats['low_stock'] as $product): ?>
                        <li><?php echo htmlspecialchars($product['TenSanPham']) . " (Số lượng: " . $product['SoLuong'] . ")"; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <h5>Đơn hàng</h5>
                <p>Tổng số đơn hàng: <?php echo $salesStats['total_orders']; ?></p>
                <p>Hôm nay: <?php echo $orderStats['today']; ?></p>
                <p>Đã xử lý: <?php echo $orderStats['confirmed']; ?></p>
                <p>Đơn hàng chưa xử lý: <?php echo $salesStats['pending']; ?></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <h5>Người dùng</h5>
                <p>Số tài khoản đã đăng ký: <?php echo $userCount; ?></p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stat-card">
                <h5>Thống kê bán hàng</h5>
                <p>Tổng doanh thu: $<?php echo number_format($salesStats['revenue'], 0); ?></p>
                <p>Đơn hàng đã xử lý: <?php echo $salesStats['total_orders']; ?></p>
            </div>
        </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>