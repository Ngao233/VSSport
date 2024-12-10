<?php

function getCountP($conn) {
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
