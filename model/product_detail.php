<?php
function getProduct($sort="DESC"){
    global $conn;
    $sql = "SELECT *  FROM products  WHERE id_SanPham = 'ID_SAN_PHAM' AND id_SanPhamChiTiet = 'ID_SAN_PHAM_CHI_TIET'; ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll();
    return $product_detail; 
}
?>
