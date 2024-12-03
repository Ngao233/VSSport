<?php
function getComment($id) {
    global $conn;
    $sql = "SELECT * FROM binhluan WHERE id_TinTuc = :id";   
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Ràng buộc kiểu dữ liệu là INT
    $stmt->execute();
    $getComment = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả bình luận
    return $getComment; 
}

function addComment($id_TinTuc, $NoiDung, $HinhAnh = null) {
    global $conn; // Kết nối tới cơ sở dữ liệu

    // Chuẩn bị câu lệnh SQL để chèn bình luận
    $sql = "INSERT INTO binhluan (id_TinTuc, NoiDung, HinhAnh, ThoiGianBinhLuan) 
            VALUES (:id_TinTuc, :noidung, :hinhAnh, NOW())";

    $stmt = $conn->prepare($sql);

    // Ràng buộc tham số
    $stmt->bindParam(':id_TinTuc', $id_TinTuc, PDO::PARAM_INT);
    $stmt->bindParam(':noidung', $NoiDung, PDO::PARAM_STR);
    $stmt->bindParam(':hinhAnh', $HinhAnh, PDO::PARAM_STR);

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        return true; // Trả về true nếu thêm bình luận thành công
    } else {
        return false; // Trả về false nếu có lỗi
    }
}

