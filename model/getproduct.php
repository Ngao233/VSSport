<?php
function getCountP($conn) {

  $totalSql = "SELECT COUNT(*) AS total FROM sanpham";
  $totalStmt = $conn->query($totalSql);
  $totalCount = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];


  $inStockSql = "SELECT COUNT(*) AS in_stock FROM sanpham WHERE SoLuong > 5";
  $inStockStmt = $conn->query($inStockSql);
  $inStockCount = $inStockStmt->fetch(PDO::FETCH_ASSOC)['in_stock'];


  $lowStockSql = "SELECT * FROM sanpham WHERE SoLuong <= 5";
  $lowStockStmt = $conn->query($lowStockSql);
  $lowStockProducts = $lowStockStmt->fetchAll(PDO::FETCH_ASSOC);

  return [
      'total' => $totalCount,
      'in_stock' => $inStockCount,
      'low_stock' => $lowStockProducts 
  ];
}

function getCountProduct($conn) {

  $totalSql = "SELECT COUNT(*) AS total FROM sanpham";
  $totalStmt = $conn->query($totalSql);
  $totalCount = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];


  $inStockSql = "SELECT COUNT(*) AS in_stock FROM sanpham WHERE SoLuong > 5";
  $inStockStmt = $conn->query($inStockSql);
  $inStockCount = $inStockStmt->fetch(PDO::FETCH_ASSOC)['in_stock'];


  $lowStockSql = "SELECT * FROM sanpham WHERE SoLuong <= 5";
  $lowStockStmt = $conn->query($lowStockSql);
  $lowStockProducts = $lowStockStmt->fetchAll(PDO::FETCH_ASSOC);

  return [
      'total' => $totalCount,
      'in_stock' => $inStockCount,
      'low_stock' => $lowStockProducts 
  ];
}

function getOrderStats($conn) {
  $todaySql = "SELECT COUNT(*) AS today FROM donhang WHERE DATE(NgayDatHang) = CURDATE()";
  $confirmedSql = "SELECT COUNT(*) AS confirmed FROM donhang WHERE TrangThai = 'Đã xử lý'";
  
  $todayResult = $conn->query($todaySql);
  $confirmedResult = $conn->query($confirmedSql);
  
  return [
      'today' => $todayResult->fetch(PDO::FETCH_ASSOC)['today'], 
      'confirmed' => $confirmedResult->fetch(PDO::FETCH_ASSOC)['confirmed'] 
  ];
}


function getUserCount($conn) {
  $sql = "SELECT COUNT(*) AS count FROM khachhang";
  $result = $conn->query($sql);
  return $result->fetch(PDO::FETCH_ASSOC)['count'];
}


function getSalesStats($conn) {

$revenueSql = "SELECT SUM(TongTien) AS revenue FROM chitietdonhang WHERE TrangThai = 'Đã xử lý'";
$revenueResult = $conn->query($revenueSql);


$pendingSql = "SELECT COUNT(*) AS pending FROM donhang WHERE TrangThai = 'Chưa xử lý'";
$pendingResult = $conn->query($pendingSql);


$totalOrdersSql = "SELECT COUNT(*) AS total_orders FROM donhang";
$totalOrdersResult = $conn->query($totalOrdersSql);

return [
    'revenue' => $revenueResult->fetch(PDO::FETCH_ASSOC)['revenue'] ?? 0, 
    'pending' => $pendingResult->fetch(PDO::FETCH_ASSOC)['pending'],
    'total_orders' => $totalOrdersResult->fetch(PDO::FETCH_ASSOC)['total_orders']
];
}
