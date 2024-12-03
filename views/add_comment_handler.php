<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ yêu cầu
    $id_TinTuc = intval($_POST['id_TinTuc']);
    $NoiDung = $_POST['NoiDung'];

    // Gọi hàm thêm bình luận
    if (addComment($id_TinTuc, $NoiDung)) {
        echo json_encode(['success' => true]); // Trả về kết quả thành công
    } else {
        echo json_encode(['success' => false]); // Trả về kết quả thất bại
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ.']);
}
?>