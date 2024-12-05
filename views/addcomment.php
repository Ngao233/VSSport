<?php

include_once 'init/config.php';

// Chuyển đổi ID thành số nguyên để bảo mật
$id = intval($_GET['id']);

// Lấy thông tin chi tiết bài viết
$news = getInfoDetail($id);

// Kiểm tra xem có dữ liệu từ form không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $id_tintuc = $id;
    $binh_luan = $_POST['binh_luan'];
    $hinhanh = $news['HinhAnh'];
    $NgayDang = layNgayHienTai();

    // Chuẩn bị và thực thi câu lệnh SQL
    $stmt = $conn->prepare("INSERT INTO binhluan (id_TinTuc, NoiDung, HinhAnh, NgayDang) VALUES (?, ?, ?, ?)");
    
    // Kiểm tra xem câu lệnh chuẩn bị có thành công không
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh");
    }

    // Ràng buộc tham số
    $stmt->bind_param("isss", $id_tintuc, $binh_luan, $hinhanh, $NgayDang);

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        echo "Bình luận đã được thêm thành công!";
    } else {
        echo "Lỗi";
    }

}

