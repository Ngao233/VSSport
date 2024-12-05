<?php
function getUser($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM khachhang ORDER BY id_KhachHang $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetchAll();
    return $user; 
}

