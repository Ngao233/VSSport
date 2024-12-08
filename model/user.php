<?php
function getUser($sort="DESC"){
    global $conn;
    $sql = "SELECT * FROM khachhang ORDER BY id_KhachHang $sort";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetchAll();
    return $user; 
}
function getUserid($id){
    global $conn;
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user; 
}
