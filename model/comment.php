<?php
function getComment($id) {
    global $conn;
    $sql = "SELECT * FROM binhluan WHERE id_TinTuc = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute();
    $getComment = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $getComment; 
}

function addComment($id_TinTuc, $NoiDung, $HinhAnh = null) {
    global $conn;

    $sql = "INSERT INTO binhluan (id_TinTuc, NoiDung, HinhAnh, ThoiGianBinhLuan) 
            VALUES (:id_TinTuc, :noidung, :hinhAnh, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_TinTuc', $id_TinTuc, PDO::PARAM_INT);
    $stmt->bindParam(':noidung', $NoiDung, PDO::PARAM_STR);
    $stmt->bindParam(':hinhAnh', $HinhAnh, PDO::PARAM_STR);
    if ($stmt->execute()) {
        return true; 
    } else {
        return false;
    }

}

