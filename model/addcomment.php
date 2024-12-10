<?php

include_once 'init/config.php';


$id = intval($_GET['id']);


$news = getInfoDetail($id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_tintuc = $id;
    $binh_luan = $_POST['binh_luan'];
    $hinhanh = $news['HinhAnh'];
    $NgayDang = layNgayHienTai();


    $stmt = $conn->prepare("INSERT INTO binhluan (id_TinTuc, NoiDung, HinhAnh, NgayDang) VALUES (?, ?, ?, ?)");
    

    if ($stmt === false) {
        die("Lỗi khi chuẩn bị câu lệnh");
    }


    $stmt->bind_param("isss", $id_tintuc, $binh_luan, $hinhanh, $NgayDang);

    if ($stmt->execute()) {
        echo "Bình luận đã được thêm thành công!";
    } else {
        echo "Lỗi";
    }

}

